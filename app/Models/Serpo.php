<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class serpo extends Model
{
    use HasFactory;
    protected $table = 'serpo_exps';
    protected $primaryKey = 'id';
}
