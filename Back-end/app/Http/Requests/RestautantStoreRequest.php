<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RestautantStoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:80',
            'address' => 'required|string|max:255',
            'vat_number' => 'required|string|max:11|'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Il nome è obbligatorio',
            'name.string' => 'Il nome deve essere una stringa',
            'name.max' => 'Il nome non deve superare gli 80 caratteri',
            'address.required' => 'L\'indirizzo è obbligatorio',
            'address.string' => 'L\'indirizzo deve essere una stringa',
            'address.max' => 'L\'indirizzo non deve superare i 255 caratteri',
            'vat_number.required' => 'La partita iva è obbligatoria',
            'vat_number.string' => 'La partita iva deve essere una stringa di numeri',
            'vat_number.max' => 'La partita iva non deve superare gli 11 caratteri'
        ];
    }
}
