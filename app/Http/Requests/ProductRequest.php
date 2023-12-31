<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'position' => 'required|integer',
            'price' => 'required|integer|gt:0',
            'thumbnail' => 'required|string',
            'abums' => 'required|string',
            'category_id' => 'required|integer',
            'slug' => 'required|string|max:255|unique:products,slug,' . request()->route('product'),
        ];
    }

    public function messages()
    {
        return [
            'category_id.integer' => 'The category field is required.'
        ];
    }
}
