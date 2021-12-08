<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdukRequest extends FormRequest
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
            'name'=>'required',
            'price' => 'required|numeric',
            'qty' => 'required|numeric',
            'note' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Nama wajib diisi.",
            'price.required' => "Harga wajib diisi.",
            'price.numeric' => "Harga harus berupa angka.",
            'qty.required' => "Jumlah wajib diisi.",
            'qty.numeric' => "Jumlah harus berupa angka.",
            'note.required' => "Keterangan wajib diisi."
        ];
    }
}
