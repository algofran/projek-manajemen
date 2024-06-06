<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstituteProyeks extends Model
{
    use HasFactory;
    protected $table = 'institute_proyeks';
    protected $guarded = ['id'];

    public function InstitutePengeluaran()
    {
        return $this->hasMany(InstitutePengeluaran::class, 'project_id', 'id');
    }
}
