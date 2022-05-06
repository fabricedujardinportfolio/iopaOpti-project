<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FichierAtelier extends Model
{
    use HasFactory;

    protected $table = "iopa_fiche_type_atelier_fichier";

    protected $fillable = [
        'iopa_fiche_type_atelier_fichier_id',
        'iopa_fiche_type_atelier_fichier',
        'iopa_fiche_type_atelier_id'
    ];
    public function ficheTypeId()
    {
        # code...
        return $this->hasMany(FicheTypeAtelier::class);
    }
}
