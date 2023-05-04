<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shows extends Model
{
    use HasFactory;
    protected $primaryKey = 'show_id';

    public function positions() {
        return $this->hasMany(Positions::class, 'show_id');
    }

    protected $fillable = [
        'show_name',
        'hold_park',
        'show_type',
        'start_date',
        'end_date'
    ];
}
