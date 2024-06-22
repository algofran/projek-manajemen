<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstituteMitra extends Model
{
    use HasFactory;
    protected $table = 'institute_mitras';
    protected $guarded = ['id'];
}
