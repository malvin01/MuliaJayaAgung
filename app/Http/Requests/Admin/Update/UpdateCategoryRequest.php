<?php

namespace App\Http\Requests\Admin\Update;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
    public function rules(Category $category)
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:65535',
            'slug' => 'required|alpha_dash|max:255|unique:categories,slug,' . $this->category->id,
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The Name cannot be empty',
            'description.required' => 'The Description cannot be empty',
            'slug.required' => 'The Slug cannot be empty',
        ];
    }
}
