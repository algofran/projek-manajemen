<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstituteProyek extends Model
{
    use HasFactory;
    protected $table = 'institute_proyeks';
    protected $guarded = ['id'];
}
