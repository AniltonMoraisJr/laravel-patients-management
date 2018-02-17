<?php

namespace App\Modules\Patient;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = 'patients';
    protected $fillable = [
        'id',
        'full_name',
        'email',
        'birthday',
        'phone',
        'genre',
        'zip_code',
        'address_one',
        'address_two',
        'city',
        'state',
        'country'
    ];
}
