<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use OwenIt\Auditing\Contracts\Auditable;

class Content extends Model implements Auditable
{
    use HasFactory;

    use \OwenIt\Auditing\Auditable;

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
