<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProductivity extends Model
{
    use HasFactory;
    protected $table = 'user_productivitys';
    protected $guarded = ['id', 'task_id'];
    protected $primaryKey = 'id';
}
