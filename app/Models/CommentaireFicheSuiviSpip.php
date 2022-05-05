<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentaireFicheSuiviSpip extends Model
{
    use HasFactory;

    protected $table = "iopa_fiche_type_spip_fichesuivi_commentaire";

    protected $fillable = [
        'iopa_fiche_type_spip_fichesuivi_commentaire_id',
        'iopa_fiche_type_spip_fichesuivi_id',
        'iopa_fiche_type_spip_fichesuivi_commentaire'
    ];
    public function fichesSuiviTypeId()
    {
        # code...
        return $this->hasMany(FicheSuiviSpip::class);
    }
}
