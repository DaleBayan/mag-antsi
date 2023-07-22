<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'spotlight',
        'slug',
        'title_eng',
        'title_fil',
        'body_eng',
        'body_fil',
        'mag_antsi',
        'media_type',
        'media',
    ];

}
