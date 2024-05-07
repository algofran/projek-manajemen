<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstituteDokumen extends Model
{
    use HasFactory;
    protected $table = 'dokumens';
    protected $guarded = ['id'];

    public function InstituteTahun()
    {
        return $this->belongsTo(InstituteTahun::class);
    }
}
