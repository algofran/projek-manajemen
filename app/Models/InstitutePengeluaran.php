<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstitutePengeluaran extends Model
{
    use HasFactory;
    protected $table = 'institute_pengeluarans';
    protected $guarded = ['id'];
}
