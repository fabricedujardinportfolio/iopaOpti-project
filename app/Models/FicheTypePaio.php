<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FicheTypePaio extends Model
{
    use HasFactory;

    protected $table = "iopa_fiche_type_paio";

    protected $fillable = [
        'iopa_fiche_type_paio_id',
        'iopa_fiche_type_paio_title',
        'iopa_fiche_id'
    ];
    public function ficheId()
    {
        # code...
        return $this->hasMany(Fiche::class);
    }
}
