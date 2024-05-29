<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstituteTask extends Model
{
    use HasFactory;
    protected $table = 'institute_tasks';
    protected $guarded = ['id'];
}