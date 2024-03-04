<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
class Glossary extends Model implements Auditable
{
    use HasFactory;

    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'slug',
        'term_eng',
        'term_fil',
        'description_eng',
        'description_fil',
        'mag_antsi',
    ];

    public function attachments() {
        return $this->hasMany(Attachment::class, 'glossary_id');
    }
}
