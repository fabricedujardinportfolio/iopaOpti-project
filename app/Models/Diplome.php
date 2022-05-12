<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diplome extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "iopa_individudiplome";
    protected $fillable = [
        'iopa_IndividuDiplome_id ',
        'anneDiplome_individu',
        'nameDiplome_individu',
        'iopa_individu_id'
    ];
    public function individuId()
    {
        return $this->belongsTo(Individu::class);
    }
}
