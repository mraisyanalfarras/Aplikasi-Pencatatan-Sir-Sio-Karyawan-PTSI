<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSir extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nik',
        'nama',
        'position',
        'no_sir',
        'expire_date',
        'status',
        'reminder',
        'location',
    ];

    protected $casts = [
        'expire_date' => 'date',
        'reminder' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
