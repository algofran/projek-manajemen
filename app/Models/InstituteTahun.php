<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstituteTahun extends Model
{
    use HasFactory;
    protected $table = 'list_dokumen_institutes';
    protected $guarded = ['id'];

    public function InstituteDokumen()
    {
        return $this->hasMany(InstituteDokumen::class);
    }
}
