<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Management;

class Role extends Model
{
    use HasFactory;
    public $table = 'role';

    protected $fillable = [
        'role_id',
        'role_desc',
    ];


    public function management(){
        return $this->belongsTo(Management::class);
    }
}
