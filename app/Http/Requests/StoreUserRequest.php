<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'email'=>'required|string|email|unique:users|max:191',
            'name' => 'required|string',
            // 'group_user' => 'required|integer|gt:0',
            'birthday' => 'required',
            'password'=>'required|string|min:6',
            'repassword'=> 'required|string|same:password',
        ];
    }

    public function messages():array{
        return [

            'email' => [
                'required' => "Bạn chưa nhập email",
                'email'=> 'Email chưa đúng định dạng. Ví dụ acb@gmail.com',
                'unique' => "Email đã tồn tại, vui lòng chọn email khác",
            ],

            'password.required' => "Bạn chưa nhập password",
            'name.required' => 'Bạn phải nhập họ tên',
            // 'group_user.required' => 'Bạn phải chọn nhóm người dùng',
            'birthday.required' => 'Bạn phải chọn ngày sinh',
            'repassword' =>[
                'required' => 'Bạn phải nhập lại password',
                'same' => 'Password phải trùng khớp'
            ],

        ];
    }
}
