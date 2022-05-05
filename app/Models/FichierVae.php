<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FichierVae extends Model
{
    use HasFactory;

    protected $table = "iopa_fiche_type_vae_fichier ";

    protected $fillable = [
        'iopa_fiche_type_vae_fichier_id',
        'iopa_fiche_type_vae_fichier',
        'iopa_fiche_type_vae_id'
    ];
    public function ficheTypeId()
    {
        # code...
        return $this->hasMany(FicheTypeVae::class);
    }
}
