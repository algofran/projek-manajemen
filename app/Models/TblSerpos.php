<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblSerpos extends Model
{
    use HasFactory;
    protected $table = 'tbl_serpos';
    protected $guarded = ['id'];
}
