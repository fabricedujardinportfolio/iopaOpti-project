<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FicheSuiviSpot extends Model
{
    use HasFactory;

    protected $table = "iopa_fiche_type_spot_fichesuivi ";

    protected $fillable = [
        'iopa_fiche_type_spot_fichesuivi_id',
        'iopa_fiche_type_spot_id'
    ];
    public function ficheTypeId()
    {
        # code...
        return $this->hasMany(FicheTypeSpot::class);
    }
}
