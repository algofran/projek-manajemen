<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telkomakses extends Model
{
    use HasFactory;
    protected $table = 'telkomakses_exps';
    protected $primaryKey = 'id';
}
