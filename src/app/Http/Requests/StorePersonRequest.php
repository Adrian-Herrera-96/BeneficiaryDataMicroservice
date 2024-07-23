<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Person;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class StorePersonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'city_birth_id' => 'integer|min:0',
            'pension_entity_id'=>'integer|min:0',
            'financial_entity_id'=>'integer|min:0',
            'first_name' => 'nullable|string|max:255',
            'second_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'mothers_last_name' => 'nullable|string|max:255',
            'surname_husband' => 'nullable|string|max:255',
            'identity_card' => 'required|string|max:20',
            'due_date' => 'date',
            'is_duedate_undefined' => 'boolean',
            'gender' => 'required',
            'civil_status' => 'required|string|max:1',
            'birth_date' => 'date',
            'date_death' => 'nullable|date',
            'death_certificate_number' => 'nullable|string|max:255',
            'reason_death' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'cell_phone_number' => 'nullable|string|max:20',
            'nua' => 'nullable|integer',
            'account_number' => 'nullable|integer|digits_between:1,20',
            'sigep_status' => 'nullable|string|max:255',
            'id_person_senasir' => 'nullable|integer',
            'date_last_contribution' => 'nullable|date',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => false,
            'errors' => $validator->errors(),
        ], 422));
    }
}
