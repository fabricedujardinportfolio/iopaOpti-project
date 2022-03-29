<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentaireFicheSuiviPaio extends Model
{
    use HasFactory;

    protected $table = "iopa_fiche_type_paio_fichesuivi_commentaire";

    protected $fillable = [
        'iopa_fiche_type_paio_fichesuivi_commentaire_id',
        'iopa_fiche_type_paio_fichesuivi_id',
        'iopa_fiche_type_paio_fichesuivi_commentaire'
    ];
    public function fichesSuiviTypeId()
    {
        # code...
        return $this->hasMany(FicheSuiviPaio::class);
    }
}
