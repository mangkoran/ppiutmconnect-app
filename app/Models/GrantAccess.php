<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Member;

class GrantAccess extends Model
{
    use HasFactory;
    public $table = 'grant_access';

    protected $fillable = [

        'grant_id',
        'grant_desc',
    ];

    public function member(){
        return $this->belongsToMany(Member::class);
    }
}
