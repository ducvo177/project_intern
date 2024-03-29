<?php

declare(strict_types=1);

namespace App\Models;

use App\Notifications\VerifyAccount;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'phone',
        'email',
        'password',
        'type',
        'is_delete'
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public const TYPES = [
        'admin' => 1,
        'student' => 3,
    ];

    public function isAdmin()
    {
        return $this->type == static::TYPES['admin'];
    }

    public function isStudent()
    {
        return $this->type == static::TYPES['student'];
    }

    protected function roleName(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->type == static::TYPES['admin'] ? "Admin" : "Student"
        );
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

    protected $casts = [
        'email_verified_at' => 'datetime',
        'deleted_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function course()
    {
        return $this->belongsToMany(Course::class, 'CourseUser', 'user_id', 'course_id');
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify((new VerifyAccount())->onQueue('default'));
    }
}
