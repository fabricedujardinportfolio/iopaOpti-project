<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FicheSuiviSpip extends Model
{
    use HasFactory;

    protected $table = "iopa_fiche_type_spip_fichesuivi ";

    protected $fillable = [
        'iopa_fiche_type_spip_fichesuivi_id',
        'iopa_fiche_type_spip_id'
    ];
    public function ficheTypeId()
    {
        # code...
        return $this->hasMany(FicheTypeSpip::class);
    }
}
