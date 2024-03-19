<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iconnet extends Model
{
    use HasFactory;
    protected $table = 'iconnet_exps';
    protected $primaryKey = 'id';
}
