<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserCatalogueRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'description' => 'required',
        ];
    }

    public function messages():array{
        return [
            'name.required' => 'Bạn phải nhập tên nhóm người dùng',
            'name.string' => 'Dữ liệu nhập phải ở dạng ký tự',
            'description.required' => 'Bạn phải nhập mô tả cho nhóm người dùng này'
        ];
    }
}
