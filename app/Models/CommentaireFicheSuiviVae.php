<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentaireFicheSuiviVae extends Model
{
    use HasFactory;

    protected $table = "iopa_fiche_type_vae_fichesuivi_commentaire";

    protected $fillable = [
        'iopa_fiche_type_vae_fichesuivi_commentaire_id',
        'iopa_fiche_type_vae_fichesuivi_id',
        'iopa_fiche_type_vae_fichesuivi_commentaire'
    ];
    public function fichesSuiviTypeId()
    {
        # code...
        return $this->hasMany(FicheSuiviVae::class);
    }
}
