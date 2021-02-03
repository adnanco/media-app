<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AddressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:3|max:60',
            'address' => 'required|min:3|max:500',
            'postcode' => 'required|min:1|max:15',
            'cityname' => 'required',
            'countryname' => 'required',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Adres Başlığı',
            'address' => 'Adres',
            'postcode' => 'Posta Kodu',
            'cityname' => 'Şehir',
            'countryname' => 'Ülke'
        ];
    }

    public function validate(): array
    {
        $instance = $this->getValidatorInstance();
        if ($instance->fails()) {
            throw new HttpResponseException(response()->json($instance->errors(), 422));
        }
    }
}
