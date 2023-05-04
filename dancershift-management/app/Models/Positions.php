<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Positions extends Model
{
    use HasFactory;

    public function shows() {
        return $this->belongsTo(Shows::class, 'show_id');
    }


    protected $fillable = [
        'show_id',
        'position_name'
    ];
}
