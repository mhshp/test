<?php

namespace App\Http\Requests;

use App\Rules\Uppercase;
use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize ()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules ()
    {
        return [
            'title' => ['max:20' , 'required' , new Uppercase()] ,
            'description' => 'required'
        ];
    }

    public function messages ()
    {
        return [
            'title.required' => 'لطفا عنوان پست را وارد نمایید' ,
            'title.max' => 'عنوان پست باید حداکثر بیست کارکترباشد' ,
            'description.required' => 'لطفا متن پست را وارد نمایید'

        ];
    }
}
