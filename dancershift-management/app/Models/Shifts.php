<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shifts extends Model
{
    use HasFactory;

    public function dancers() {
        return $this->belongsTo(Dancers::class, 'dancer_id');
    }

    protected $fillable = [
        'dancer_id',
        'show_name',
        'position',
        'date',
        'off'
    ];
}
