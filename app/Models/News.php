<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    public $table = 'news';
    protected $primaryKey = 'news_id';

    protected $fillable = [
        'news_id',
        'news_category',
        'news_title',
        'news_content',
        'posted_on',
        'news_pic1',
        'news_pic2',
        'news_pic3'
    ];
}
