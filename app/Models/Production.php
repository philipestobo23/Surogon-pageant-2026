<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    use HasFactory;

    protected $table = 'production_event';
    protected $fillable = ['contestant_number' , 'constestan_name', 'Address', 'Judge1',  
    'Judge2',  'Judge3',  'Judge4',  'Judge5', 'Judge1_ranking','Judge2_ranking', 'Judge3_ranking', 'Judge4_ranking', 'Judge5_ranking',
    'total_ranking'];

}
