<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'beneficiaries.persons';

    protected $fillable = [

        'city_birth_id',
        'pension_entity_id',
        'financial_entity_id',
        'first_name',
        'second_name',
        'last_name',
        'mothers_last_name',
        'surname_husband',
        'identity_card',
        'due_date',
        'is_duedate_undefined',
        'gender',
        'civil_status',
        'birth_date',
        'date_death',
        'death_certificate_number',
        'reason_death',
        'phone_number',
        'cell_phone_number',
        'nua',
        'account_number',
        'sigep_status',
        'id_person_senasir',
        'date_last_contribution'
    ];

}
