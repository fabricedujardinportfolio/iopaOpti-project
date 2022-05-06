<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FicheTypeAtelier extends Model
{
    use HasFactory;

    protected $table = "iopa_fiche_type_atelier";

    protected $fillable = [
        'iopa_fiche_type_atelier_id',
        'iopa_fiche_type_atelier_title',
        'iopa_fiche_id'
    ];
    public function ficheId()
    {
        # code...
        return $this->hasMany(Fiche::class);
    }
}
