<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Role;
use App\Models\Member;

class Management extends Member
{
    public $table = 'management';
    protected $primaryKey = 'management_matrix_card';
    public $guard = 'management';
    use HasFactory;

    protected $fillable = [
        'management_matrix_card',
        'management_year',
        'management_role_id',
        'division_name'
    ];

    public function role(){
        return $this->hasOne(Role::class);
    }
    public function member(){
        return $this->belongsToMany(Member::class);
    }
}
