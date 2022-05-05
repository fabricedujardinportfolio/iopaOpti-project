<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FicheTypeVae extends Model
{
    use HasFactory;

    protected $table = "iopa_fiche_type_vae";

    protected $fillable = [
        'iopa_fiche_type_vae_id',
        'iopa_fiche_type_vae_title',
        'iopa_fiche_id'
    ];
    public function ficheId()
    {
        # code...
        return $this->hasMany(Fiche::class);
    }
}
