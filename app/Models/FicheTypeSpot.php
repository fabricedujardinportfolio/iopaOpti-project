<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FicheTypeSpot extends Model
{
    use HasFactory;

    protected $table = "iopa_fiche_type_spot";

    protected $fillable = [
        'iopa_fiche_type_spot_id',
        'iopa_fiche_type_spot_title',
        'iopa_fiche_id'
    ];
    public function ficheId()
    {
        # code...
        return $this->hasMany(Fiche::class);
    }
}
