<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLanguageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'canonical' => 'required|unique:languages,canonical, '.$this->id.'',
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
