<?php

namespace App\Http\Requests\Device;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BulkUpdateUserAPIRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'data.*.username' => ['nullable', 'string'],
            'data.*.password' => ['nullable', 'string'],
            'data.*.email' => ['nullable', 'string', 'unique:users,email,'.$this->route('user')],
            'data.*.name' => ['nullable', 'string'],
            'data.*.email_verified_at' => ['nullable'],
            'data.*.is_active' => ['boolean'],
            'data.*.user_type' => [Rule::in([User::TYPE_ADMIN, User::TYPE_USER])],
        ];
    }
}
