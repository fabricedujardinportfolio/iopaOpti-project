<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentaireSpip extends Model
{
    use HasFactory;

    protected $table = "iopa_fiche_type_spip_commentaire";

    protected $fillable = [
        'iopa_fiche_type_spip_commentaire_id',
        'iopa_fiche_type_paio_id',
        'iopa_fiche_type_spip_commentaire'
    ];
    public function ficheTypeId()
    {
        # code...
        return $this->hasMany(FicheTypeSpip::class);
    }
}
