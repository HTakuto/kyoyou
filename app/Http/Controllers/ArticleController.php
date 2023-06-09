<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use App\User;
use App\Profile;
use App\Notification;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Article::class, 'article');
    }

    public function index(Request $request)
    {
        $articles = Article::with(['user', 'likes', 'tags'])
                    ->orderByDesc('created_at')
                    ->take(20)
                    ->get();

        $keyword = $request->input('keyword');

        if(!empty($keyword)) {
            $query = Article::query();
            $query->where('title', 'LIKE', "%{$keyword}%")
                  ->orWhere('body', 'LIKE', "%{$keyword}%");
            $articles = $query->get();
        }

        $like_articles = Article::withCount('likes')
                        ->orderByDesc('likes_count')
                        ->take(10)
                        ->get();

        $follow_ranking = User::withCount('followers')
                        ->orderByDesc('followers_count')
                        ->take(10)
                        ->get();

        $profile = auth()->user()->profile ?? new Profile();

        return view('articles.index', compact('articles', 'keyword', 'like_articles', 'follow_ranking', 'profile'));
    }

    public function create()
    {
        $allTagNames = Tag::all()->map(function ($tag) {
            return ['text' => $tag->name];
        });

        return view('articles.create', [
            'allTagNames' => $allTagNames,
        ]);
    }

    public function store(ArticleRequest $request, Article $article)
    {
        $article->fill($request->all());
        $article->user_id = $request->user()->id;

        // PDFファイルの保存
        if ($request->hasFile('pdf_file')) {
            $pdf = $request->file('pdf_file');
            $filename = time() . '_' . $pdf->getClientOriginalName();
            $path = $pdf->storeAs('public/pdfs', $filename);
            $article->pdf_file = $filename;
        }

        $article->save();

        $request->tags->each(function ($tagName) use ($article) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $article->tags()->attach($tag);
        });

        return redirect()->route('articles.index');
    }

    public function edit(Article $article)
    {
        $tagNames = $article->tags->map(function ($tag) {
            return ['text' => $tag->name];
        });

        $allTagNames = Tag::all()->map(function ($tag) {
            return ['text' => $tag->name];
        });

        return view('articles.edit', [
            'article' => $article,
            'tagNames' => $tagNames,
            'allTagNames' => $allTagNames,
        ]);
    }

    public function update(ArticleRequest $request, Article $article)
    {
        // PDFファイルの保存
        if ($request->hasFile('pdf_file')) {
            $pdf = $request->file('pdf_file');
            $filename = time() . '_' . $pdf->getClientOriginalName();
            $path = $pdf->storeAs('public/pdfs', $filename);
            $article->pdf_file = $filename;
        }

        $article->fill($request->all())->save();

        $article->tags()->detach();
        $request->tags->each(function ($tagName) use ($article) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $article->tags()->attach($tag);
        });
        return redirect()->route('articles.index');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index');
    }

    public function show(Article $article)
    {
        return view('articles.show', ['article' => $article]);
    }

    public function like(Request $request, Article $article)
    {
        $article->likes()->detach($request->user()->id);
        $article->likes()->attach($request->user()->id);

        // 通知を作成
        if ($article->user_id !== $request->user()->id) {
            $notification = new Notification();
            $notification->user_id = $article->user_id;
            $notification->notifiable_id = $article->id;
            $notification->type = 'like';
            $notification->notifiable_type = Article::class;
            $notification->caused_by_user_id = auth()->user()->id;
            $notification->save();
        }

        return [
            'id' => $article->id,
            'countLikes' => $article->count_likes,
        ];
    }

    public function unlike(Request $request, Article $article)
    {
        $article->likes()->detach($request->user()->id);

        return [
            'id' => $article->id,
            'countLikes' => $article->count_likes,
        ];
    }
}
