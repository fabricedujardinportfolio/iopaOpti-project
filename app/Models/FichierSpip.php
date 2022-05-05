<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FichierSpip extends Model
{
    use HasFactory;

    protected $table = "iopa_fiche_type_spip_fichier ";

    protected $fillable = [
        'iopa_fiche_type_spip_fichier_id',
        'iopa_fiche_type_spip_fichier',
        'iopa_fiche_type_spip_id'
    ];
    public function ficheTypeId()
    {
        # code...
        return $this->hasMany(FicheTypeSpip::class);
    }
}
