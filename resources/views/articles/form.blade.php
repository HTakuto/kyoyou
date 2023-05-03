@csrf
<div class="md-form">
  <label>授業タイトル</label>
  <input type="text" name="title" class="form-control" required value="{{ $article->title ?? old('title') }}">
</div>
<div class="form-group">
  <article-tags-input
    :initial-tags='@json($tagNames ?? [])'
    :autocomplete-items='@json($allTagNames ?? [])'
  >
  </article-tags-input>
</div>
<div class="form-group">
  <label></label>
  <textarea name="body" required class="form-control" rows="16" placeholder="授業の内容を簡潔に記述してください">{{ $article->body ?? old('body') }}</textarea>
</div>
<div class="form-group">
    <label for="pdf_file">PDFファイル</label>
    <input type="file" class="form-control-file" name="pdf_file" id="pdf_file">
</div>
