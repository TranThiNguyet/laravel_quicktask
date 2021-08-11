<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' =>'required|max:255|unique:tasks,name'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên nhiệm vụ!',
            'name.max'=>'Vui lòng không nhập quá 255 ký tự !',
            'name.unique'=>'Nhiệm vụ này đã tồn tại !',
        ];
    }
}
