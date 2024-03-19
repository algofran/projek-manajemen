<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagSerpos extends Model
{
    use HasFactory;
    protected $table = 'tag_serpos';
    protected $primaryKey = 'id';
}
