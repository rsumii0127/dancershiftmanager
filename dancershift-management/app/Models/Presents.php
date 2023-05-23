<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presents extends Model
{
    use HasFactory;
    protected $primaryKey = 'present_id';

    protected $fillable = [
        'present_name',
        'brand',
        'price',
        'present_from',
        'present_to',
        'present_date',
        'present_purpose',
    ];
}
