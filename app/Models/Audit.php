<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
class Audit extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'audits';
    protected $fillable = [
        'user_type',
        'user_id',
        'event',
        'auditable_type',
        'old_value',
        'new_value',
        'url',
        'ip_address',
        'user_agent',
        'tags',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
