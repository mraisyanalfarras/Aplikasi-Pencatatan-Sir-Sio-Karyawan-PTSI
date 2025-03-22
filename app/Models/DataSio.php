<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataSio extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'nik', 'name', 'position', 'no_sio',
        'type', 'class', 'expire_date', 'status', 'location'
    ];


    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Scope untuk data yang masih aktif
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    // Scope untuk data yang kadaluarsa
    public function scopeExpired($query)
    {
        return $query->where('status', 'expired');
    }

    // Scope untuk data yang mendekati kadaluarsa (misalnya 30 hari sebelum expired)
    public function scopeExpiringSoon($query)
    {
        return $query->where('expire_date', '<=', now()->addDays(30))
                     ->where('status', 'active');
    }
}
