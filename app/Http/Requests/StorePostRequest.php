<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{

    public function attributes()
    {
        return [
            'title' => 'Sarlavha majburiy',
            'short_content' => 'Qisqacha mazmun majburiy',
            'part' => 'Umumiy malumot majburiy',
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|unique:posts|max:255',
            'short_content' => 'required',
            'part' => 'required',
        ];
    }
}
