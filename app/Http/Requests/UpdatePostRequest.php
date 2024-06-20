<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'post_title'        => ['required','string','max:255','unique:posts,post_title,' .$this->post->id],
            'post_slug'         => ['required', 'string', 'max:255', 'unique:posts,post_slug,' .$this->post->id],
            'post_description'  => ['nullable','string'],
            'status'            => ['nullable', 'numeric', 'in:1,2'],
            'post_image'        => ['nullable'],
            'meta_title'        => ['nullable', 'string', 'max:255'],
            'meta_description'  => ['nullable', 'string', 'max:255'],
            'meta_keywords'     => ['nullable', 'string', 'max:255'],
            'meta_image'        => ['nullable']
            
        ];
    }
}
