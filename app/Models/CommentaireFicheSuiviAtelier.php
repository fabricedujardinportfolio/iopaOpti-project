<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentaireFicheSuiviAtelier extends Model
{
    use HasFactory;

    protected $table = "iopa_fiche_type_atelier_fichesuivi_commentaire";

    protected $fillable = [
        'iopa_fiche_type_atelier_fichesuivi_commentaire_id',
        'iopa_fiche_type_atelier_fichesuivi_id',
        'iopa_fiche_type_atelier_fichesuivi_commentaire'
    ];
    public function fichesSuiviTypeId()
    {
        # code...
        return $this->hasMany(FicheSuiviAtelier::class);
    }
}
