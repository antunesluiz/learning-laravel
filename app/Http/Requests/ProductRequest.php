<?php

namespace App\Http\Requests;

use App\Models\Category;
use App\Models\Color;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'name'  => 'required',
            'price' => 'required',
            'category_id'   => [
                'required',
                Rule::in(Category::pluck('id')->toArray()),
                Rule::exists('categories', 'id')
            ],
            'color_id' => [
                'required',
                'integer',
                Rule::in(Color::pluck('id')->toArray()),
                Rule::exists('colors', 'id')
            ],
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'category_id'   => $this->categoryId,
            'color_id'      => $this->colorId   
        ]);
    }
}
