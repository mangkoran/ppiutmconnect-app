<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Feedback;

class Event extends Model
{
    use HasFactory;
    public $table = 'event';
    protected $primaryKey  = 'event_id';

    protected $fillable = [
        'event_id',
        'event_title',
        'event_category',
        'event_venue',
        'posted_on',
        'open_for',
        'closed_on',
        'event_details',
        'event_url',
        'event_date',
        'event_pic1',
        'event_pic2',
        'event_pic3',
    ];

    public function feedback(){
        return $this->hasMany(Feedback::class);
    }
}
