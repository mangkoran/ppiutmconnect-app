<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Division;

class Aspiration extends Model
{
    use HasFactory;
    public $table = 'aspiration';

    protected $fillable = [
        'matrix_card',
        'posted_on',
        'division_name',
        'aspiration_subject',
        'aspiration_content',
    ];

    public function division(){
        return $this->belongsTo(Division::class);
    }

}
