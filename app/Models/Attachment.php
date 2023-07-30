<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'media',
        'glossary_id',
    ];

    public function glossary() {
        return $this->belongsTo(User::class, 'glossary_id');
    }
}
