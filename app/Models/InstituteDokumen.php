<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstituteDokumen extends Model
{
    use HasFactory;
    protected $table = 'institute_dokumens';
    protected $guarded = ['id'];
}
