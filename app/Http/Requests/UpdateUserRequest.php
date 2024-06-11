<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'email'=>'required|string|email|unique:users,email, '.$this->id.'|max:191',
            'fullname' => 'required|string',
            // 'group_user' => 'required|integer|gt:0',
            'birthday' => 'required',
        ];
    }

    public function messages():array{
        return [

            'email' => [
                'required' => "Bạn chưa nhập email",
                'email'=> 'Email chưa đúng định dạng. Ví dụ acb@gmail.com',
                'unique' => "Email đã tồn tại, vui lòng chọn email khác",
            ],

            'fullname.required' => 'Bạn phải nhập họ tên',
            // 'group_user.required' => 'Bạn phải chọn nhóm người dùng',
            'birthday.required' => 'Bạn phải chọn ngày sinh',


        ];
    }
}
