<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FichierSpot extends Model
{
    use HasFactory;

    protected $table = "iopa_fiche_type_spot_fichier";

    protected $fillable = [
        'iopa_fiche_type_spot_fichier_id',
        'iopa_fiche_type_spot_fichier',
        'iopa_fiche_type_spot_id'
    ];
    public function ficheTypeId()
    {
        # code...
        return $this->hasMany(FicheTypeSpot::class);
    }
}
