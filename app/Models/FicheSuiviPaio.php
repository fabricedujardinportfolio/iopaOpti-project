<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FicheSuiviPaio extends Model
{
    use HasFactory;

    protected $table = "iopa_fiche_type_paio_fichesuivi";

    protected $fillable = [
        'iopa_fiche_type_paio_fichesuivi_id',
        'iopa_fiche_type_paio_id'
    ];
    public function ficheTypeId()
    {
        # code...
        return $this->hasMany(FicheTypePaio::class);
    }
}
