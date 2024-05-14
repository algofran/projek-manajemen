<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemsSettings extends Model
{
    use HasFactory;
    protected $table = 'system_settings';
    protected $primaryKey = 'id';
}
