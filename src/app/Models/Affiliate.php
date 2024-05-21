<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Affiliate extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        
        'degree_id',
        'unit_id',
        'category_id',
        'registration',
        'type',
        'date_entry',
        'date_derelict',
        'reason_derelict',
        'service_years',
        'service_months',
        'unit_police_description',
        
    ];

}
