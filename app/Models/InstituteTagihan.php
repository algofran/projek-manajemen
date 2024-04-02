<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstituteTagihan extends Model
{
    use HasFactory;
    protected $table = 'institute_tagihans';
    protected $guarded = ['id'];
}
