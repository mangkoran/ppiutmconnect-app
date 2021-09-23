<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;
    public $table='campaign_list';
    protected $primaryKey = 'campaign_id';

    protected $fillable = [
        'campaign_id',
        'campaign_name',
        'subject',
        'total_participant',
    ];

}
