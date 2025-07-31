<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNewsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth('admin')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:50',
            'body' => 'required|string|max:1000',
            'category' => 'required|in:臨時休診,お知らせ,イベント',
            'is_published' => 'nullable|boolean',
        ];
    }

    /**
     * バリデーションエラーメッセージのカスタマイズ
     */
    public function messages(): array
    {
        return [
            'title.required' => 'タイトルは必須です。',
            'title.max' => 'タイトルは50文字以内で入力してください。',
            'body.required' => '本文は必須です。',
            'body.max' => '本文は1000文字以内で入力してください。',
            'category.required' => 'カテゴリは必須です。',
            'category.in' => '有効なカテゴリを選択してください。',
        ];
    }

    /**
     * サービス層で使用するためのデータを取得
     */
    public function getServiceData(): array
    {
        return [
            'title' => $this->title,
            'body' => $this->body,
            'category' => $this->category,
            'is_published' => $this->boolean('is_published', true),
        ];
    }
}
