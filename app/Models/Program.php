<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Member;

class Program extends Model
{
    use HasFactory;
    public $table = 'program';

    protected $fillable = [
        'program_code',
        'program_name',
        'faculty',
    ];


    public function member(){
        return $this->belongsTo(Member::class);
    }

}
