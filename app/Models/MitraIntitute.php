<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MitraIntitute extends Model
{
    use HasFactory;
    protected $table = 'mitra_institutes';
    protected $guarded = ['id'];
}
