<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstituteList extends Model
{
    use HasFactory;
    protected $table = 'institute_lists';
    protected $guarded = ['id'];
}
