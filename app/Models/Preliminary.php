<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preliminary extends Model
{
    use HasFactory;
    protected $table = 'preliminary_event';
    protected $fillable = ['contestant_number' , 'constestant_name', 'Address',
         'photogenic','advocacy', 'talent', 'friendship', 'production_number', 'modernized_barong', 'production_wear', 'eloquent', 
         'total_ranking', 'rank'];
}
