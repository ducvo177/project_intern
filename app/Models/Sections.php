<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sections extends Model
{
    use HasFactory;

    protected $table = 'sections';

    public $timestamps = true;

    public function courses()
    {
        return $this->belongsTo('App\Courses', 'course_id');
    }
}
