<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstituteTugas extends Model
{
    use HasFactory;
    protected $table = 'institute_tugas';
    protected $guarded = ['id'];
}
