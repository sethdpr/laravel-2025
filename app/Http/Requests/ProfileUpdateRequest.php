<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)], //"Rule::unique(User::class)->ignore($this->user()->id)": this code makes sure that the email is unique in the database, but ignores the current user's ID. This means that the current user can keep their existing email even if it is not unique.
            'username' => ['nullable', 'string', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)], // "Rule::unique(User::class)->ignore($this->user()->id)": this code makes sure that the username is unique in the database, but ignores the current user's ID. This means that the current user can keep their existing username even if it is not unique.
            'birthdate' => ['nullable', 'date', 'before:today'],
            'about_me' => ['nullable', 'string', 'max:1000'],
            'profile_picture' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048']
        ];
    }
}
