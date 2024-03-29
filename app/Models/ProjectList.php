<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectList extends Model
{
    use HasFactory;
    protected $table = 'project_lists';
    protected $guarded = ['id'];
}
