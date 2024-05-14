<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListDokumen extends Model
{
    use HasFactory;
    protected $table = 'list_dokumen_projeks';
    protected $guarded = ['id'];

    public function dokumenTahun()
    {
        return $this->hasMany(DokumenTahun::class);
    }
}
