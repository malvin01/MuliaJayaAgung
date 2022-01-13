<?php

namespace App\Http\Requests\Admin\Update;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDiscountRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:65535',
            'discount_percent' => 'required|numeric|max:100',
            'is_active' => 'required|boolean|in:0,1',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The Name cannot be empty',
            'description.required' => 'The Description cannot be empty',
            'discount_percent.required' => 'The Discount Percnet cannot be empty',
            'is_active.required' => 'The Status cannot be empty',
        ];
    }
}
