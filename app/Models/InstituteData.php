<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstituteData extends Model
{
    use HasFactory;
    protected $table = 'institute_datas';
    protected $guarded = ['id'];
}
