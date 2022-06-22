<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contactm extends Model
{
    use HasFactory;

    protected $table = 'contacts';

    protected $fillable = [
        'lang',
        'name',
        'surname',
        'subject',
        'messege',
        'email',
        'phone',
        'city',
        'country',
        ];
}
