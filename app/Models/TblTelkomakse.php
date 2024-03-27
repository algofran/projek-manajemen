<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblTelkomakse extends Model
{
    use HasFactory;
    protected $table = 'tbl_telkomakses';
    protected $guarded = ['id'];
}
