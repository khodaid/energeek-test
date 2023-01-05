<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill_Set extends Model
{
    use HasFactory;

    protected $table = 'skill_sets';
    protected $primaryKey = ['candidate_id','skill_id'];
}
