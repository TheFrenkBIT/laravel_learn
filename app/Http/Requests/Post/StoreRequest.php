<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;
use function Symfony\Component\Translation\t;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'count_of_posts' => 'required|integer',
            'description' => 'string',
            'category' => '',
            'category.id' => 'integer',
            'category.name' => 'string',
            'tags' => '',
            'tags.*.name' => 'string',
            'tags.*.id' => 'integer'
        ];
    }
}
