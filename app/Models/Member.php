<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\GrantAccess;
use App\Models\Program;

class Member extends Authenticatable
{
    public $table = 'member';
    public $guard = 'member';
    protected $primaryKey  = 'matrix_card';

    public $incrementing = false;
    protected $keyType = 'string';

    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'matrix_card',
        'name',
        'email',
        'password',
        'batch',
        'program_code',
        'degree',
        'address',
        'access_grant',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function grant_access(){
        return $this->hasOne(GrantAccess::class);
    }
    public function program(){
        return $this->hasOne(Program::class);
    }
    public function feedback(){
        return $this->hasMany(Feedback::class);
    }
}
