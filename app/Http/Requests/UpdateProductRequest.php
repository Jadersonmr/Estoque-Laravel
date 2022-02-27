<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
//        $id = $this->segment(2);

        return [
            'name' => "required|min:3|max:255|unique:products,name,{$this->id},id",
            'description' => 'required|min:3|max:10000',
            'image' => 'image'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório',
            'name.min' => 'O campo nome precisa ter pelo menos 3 caracteres',
            'name.unique' => 'Este nome ja está sendo utilizado',
            'description.required' => 'O campo descrição é obrigatório',
            'description.min' => 'O campo descrição precisa ter pelo menos 3 caracteres'
        ];
    }
}
