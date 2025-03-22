<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DataSir extends Model
{
    use HasFactory;
    protected $table = 'data_sirs'; // 

    protected $fillable = [
        'user_id',
        'nama',
        'position',
        'no_sir',
        'expire_date',
        'status',
        'reminder',
        'location',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
