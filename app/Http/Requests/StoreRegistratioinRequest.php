<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRegistratioinRequest extends FormRequest
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
            'name'=>'required|string',
            'phone'=>['required','numeric',Rule::unique('student_informations', 'phone')->where(function ($query) {
                    $query->where('deleted', 0);
                }),],
            'passing_year'=>'required|numeric',
            'gender'=>'required',
            't_shirt_size'=>'required',
            'payment_method'=>'required',
            'account_no'=>'required',
            'transaction_no'=>'required',

        ];
    }
}
