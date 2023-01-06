<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_path',
        'attachable_type',
        'file_name',
        'attachable_id',
        'extention',
        'mime_type',
        'size',
    ];

    public function course()
    {
      return $this->morphOne(Course::class, 'productable');
    }
}
