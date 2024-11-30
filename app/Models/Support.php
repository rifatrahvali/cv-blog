<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory;

    protected $connection = 'support'; // Yeni bağlantıyı tanımla
    protected $table = 'supports'; // Tablo adını belirt
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'budget',
        'project_description',
        'has_logo',
        'deadline',
        'page_count',
        'has_hosting',
        'use_existing_content',
        'target_audience',
        'color_preferences',
        'competitor_websites',
        'liked_websites',
        'additional_comments',
    ];
}