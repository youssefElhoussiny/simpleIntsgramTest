<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
        $rules = [
            'username'=>'required',
            'name'=>'required',
            'email'=> 'required|email',
            'bio'=>'nullable|string',
            'password'=>'nullable|confirmed|min:8',
            'image'=>'nullable|image|mimes:png,jpg,jpeg,gif',
        ];
        if(request()->username != auth()->user()->username)
        {
            $rules['username'].='|unique:users,username';
        }

        return $rules;
    }
}
