<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event;

class Feedback extends Model
{
    use HasFactory;
    public $table = 'feedback';
    protected $primaryKey = 'matrix_card_feedback';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'matrix_card_feedback',
        'comment_on',
        'event_id',
        'feedback',
        'rate_event',
    ];

    public function member(){
        return $this->belongsTo(Member::class);
    }
    public function event(){
        return $this->belongsTo(Event::class);
    }
}
