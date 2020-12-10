<?php

namespace App\Http\Requests;

use App\Models\Categories;
use Illuminate\Foundation\Http\FormRequest;

class UpdateNewsRequest extends FormRequest
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
        $categoriesTableName = (new Categories())->getTable();

        return [
            'category_id' => "required|integer|exists:{$categoriesTableName},id",
            'image' => 'image',
            'is_private' => 'min:0|max:1',
            'title' => 'required',
            'spoiler' => 'required',
            'text' => 'required'
        ];
    }
}
