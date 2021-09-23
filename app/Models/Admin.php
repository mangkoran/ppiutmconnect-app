<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Member;

class Admin extends Member
{
    use HasFactory;
    public $table = 'admin';
    protected $primaryKey = 'matrix_card';
    public $guard = 'admin';

    protected $fillable = [
        'matrix_card',
        'admin_year',
    ];

    public function member(){
        return $this->belongsToMany(Member::class);
    }
}
