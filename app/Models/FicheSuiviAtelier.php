<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FicheSuiviAtelier extends Model
{
    use HasFactory;

    protected $table = "iopa_fiche_type_atelier_fichesuivi ";

    protected $fillable = [
        'iopa_fiche_type_atelier_fichesuivi_id',
        'iopa_fiche_type_atelier_id'
    ];
    public function ficheTypeId()
    {
        # code...
        return $this->hasMany(FicheTypeAtelier::class);
    }
}
