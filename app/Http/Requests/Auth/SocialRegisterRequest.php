<?php

namespace App\Http\Requests\Auth;

use App\Enums\SocialProviderEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class SocialRegisterRequest extends FormRequest
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
            'provider' => ['required', 'string', new Enum(SocialProviderEnum::class)]
        ];
    }

    public function validationData(): ?array
    {
        return array_merge($this->route()->parameters(), $this->all());
    }
}
