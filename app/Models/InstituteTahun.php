<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstituteTahun extends Model
{
    use HasFactory;
    protected $table = 'institute_list_dokumen';
    protected $guarded = ['id'];
}
