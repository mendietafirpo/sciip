<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Design extends Model
{
    use HasFactory;

    protected $fillable = [
        'pageweb',
        'element',
        'lang',
        'color_bg',
        'color_tx_1',
        'color_tx_2',
        'text_sz_1',
        'text_sz_2',
        'class',
        'title',
        'description',
        'status',
        'redirect'
    ];
}
