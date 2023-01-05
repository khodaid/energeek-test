<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\SoftDeletes;

class Candidate extends Model
{
    use HasFactory, SoftDeletes, Userstamps;

    protected $fillable = ['job_id', 'name', 'email', 'phone', 'year'];
    protected $guard = [];

    /**
     * The roles that belong to the Candidate
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function SkillSet()
    {
        return $this->belongsToMany(Candidate::class, 'skill_sets', 'candidate_id', 'skill_id');
    }
}
