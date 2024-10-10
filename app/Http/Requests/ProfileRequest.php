<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            "name" => "required",
            // "email" => "required|unique:profiles" Pour Ajouter et Probleme modifier,
            "email" => "required",
            "password" => "required|confirmed",
            "bio" => "required",
            "image"=>"image|mimes:png,jpg,svg,jpeg|max:2048"
        ];
    }
}
