<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentaireVae extends Model
{
    use HasFactory;

    protected $table = "iopa_fiche_type_vae_commentaire";

    protected $fillable = [
        'iopa_fiche_type_vae_commentaire_id',
        'iopa_fiche_type_paio_id',
        'iopa_fiche_type_vae_commentaire'
    ];
    public function ficheTypeId()
    {
        # code...
        return $this->hasMany(FicheTypeVae::class);
    }
}
