<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentaireAtelier extends Model
{
    use HasFactory;

    protected $table = "iopa_fiche_type_atelier_commentaire";

    protected $fillable = [
        'iopa_fiche_type_atelier_commentaire_id',
        'iopa_fiche_type_atelier_id',
        'iopa_fiche_type_atelier_commentaire'
    ];
    public function ficheTypeId()
    {
        # code...
        return $this->hasMany(FicheTypeAtelier::class);
    }
}
