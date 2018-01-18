<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'title' => 'required',
            //'image' => 'required',
            'stock' => 'required'
        ];
    }

    public function messages(){
        return [
            'title.required' => 'Preencha o campo TÍTULO',
            //'image.required' => 'Selecione uma IMAGEM para o produto',
            'stock.required' => 'Informe a quantidade do produto em estoque'
        ];
    }
}
