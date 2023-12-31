<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug,' . request()->route('category'),
            'position' => 'required|integer',
            'thumbnail' => 'required|string',
            'parent_id' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'parent_id.integer' => 'The parent field is required.'
        ];
    }
}
