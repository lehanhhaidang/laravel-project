<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreLanguageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'canonical' => [
                'required',
                Rule::unique('languages')->whereNull('deleted_at'),
            ],
        ];
    }

    public function messages():array{
        return [
            'name.required' => 'Bạn phải nhập tên ngôn ngữ',
            'name.string' => 'Dữ liệu nhập phải ở dạng ký tự',
            'canonical.required' => 'Bạn phải nhập từ khóa cho ngôn ngữ (ví dụ: VN)',
            'canonical.unique'=> 'Từ khóa đã tồn tại, hãy chọn từ khóa khác',
        ];
    }
}
