<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preliminary extends Model
{
    use HasFactory;
    protected $table = 'preliminary_event';
    protected $fillable = ['contestant_number', 'contestant_name', 'Address',
         'closed_interview', 'photogenic', 'white_collection', 'tourism_video', 'talent',
         'filipiniana', 'production_wear', 'production_number', 'runway',
         'total_ranking', 'rank'];
}
