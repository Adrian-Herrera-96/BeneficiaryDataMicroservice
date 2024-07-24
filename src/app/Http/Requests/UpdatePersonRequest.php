<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdatePersonRequest extends FormRequest
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
        $personId = $this->route('person'); // Obtener el ID de la persona desde la ruta

        return [
            'city_birth_id' => 'sometimes|required|integer|min:1',
            'pension_entity_id' => 'sometimes|required|integer|min:1',
            'financial_entity_id' => 'sometimes|required|integer|min:1',
            'first_name' => 'nullable|string|max:255',
            'second_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'mothers_last_name' => 'nullable|string|max:255',
            'surname_husband' => 'nullable|string|max:255',
            'identity_card' => 'sometimes|required|string|max:20|unique:persons,identity_card,' . $personId,
            'due_date' => 'nullable|date',
            'is_duedate_undefined' => 'nullable|boolean',
            'gender' => 'nullable|string|in:M,F',
            'civil_status' => 'nullable|string|in:C,S,V,D|max:1',
            'birth_date' => 'nullable|date',
            'date_death' => 'nullable|date',
            'death_certificate_number' => 'nullable|string|max:255',
            'reason_death' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'cell_phone_number' => 'nullable|string|max:20',
            'nua' => 'nullable|integer',
            'account_number' => 'nullable|integer|digits_between:1,20',
            'sigep_status' => 'nullable|string|max:255',
            'id_person_senasir' => 'nullable|integer|unique:persons,id_person_senasir,' . $personId,
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