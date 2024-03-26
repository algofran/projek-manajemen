<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblIconnets extends Model
{
    use HasFactory;
    protected $table = 'tbl_iconnets';
    protected $guarded = ['id'];
}
