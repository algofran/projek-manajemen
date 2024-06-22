<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectAktivitis extends Model
{
    use HasFactory;
    protected $table = 'project_aktivitis';
    protected $guarded = ['id'];
}
