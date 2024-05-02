<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEmploye extends Model
{
    use HasFactory;
    protected $table = 'user';
    protected $guarded = ['id'];
    // protected $fillable = ['firstname', 'lastname', 'id'];
}
