<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Aspiration;

class Division extends Model
{
    use HasFactory;
    public $table = 'division';

    protected $fillable = [
        'division_name',
    ];

    public function aspiration(){
        return $this->hasMany(Aspiration::class);
    }
}
