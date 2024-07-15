<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisdatSerposerveUserTelegram extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';
    protected $table = 'visdat_serposerve_user_telegram';

    protected $fillable = [
        'user_id',
        'telegram_id',
    ];
}
