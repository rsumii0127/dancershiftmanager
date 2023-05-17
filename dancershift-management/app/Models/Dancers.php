<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dancers extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'dancer_id';

    

    protected $fillable = [ 
        'dancer_name',
        'performance_park',
        'performance_show_1',
        'performance_show_2'
     ];
}
