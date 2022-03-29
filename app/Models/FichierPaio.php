<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FichierPaio extends Model
{
    use HasFactory;

    protected $table = "iopa_fiche_type_paio_fichier";

    protected $fillable = [
        'iopa_fiche_type_paio_fichier_id',
        'iopa_fiche_type_paio_fichier',
        'iopa_fiche_type_paio_id'
    ];
    public function ficheTypeId()
    {
        # code...
        return $this->hasMany(FicheTypePaio::class);
    }
}
