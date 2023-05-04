<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'age' => 'nullable|in:20代,30代,40代,50代,60代,70代,80代',
            'gender'  => 'nullable|in:男性,女性',
            'school_type' => 'nullable|in:小学校,中学校,高校',
            'school_year' => 'nullable|string',
            'subject' => 'nullable|string|max:20',
            'club' => 'nullable|string|max:20',
            'comment' => 'nullable|string|max:300',
        ];
    }

    public function attributes()
    {
        return [
            'user_image' => 'プロフィール写真',
            'age' => '年齢',
            'gender'  => '性別',
            'school_type' => '学校種別',
            'school_year' => '学年',
            'subject' => '教科',
            'club' => '部活動',
            'comment' => 'コメント',
        ];
    }
}
