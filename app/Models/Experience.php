<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "iopa_experienceindividu";
    protected $fillable = [
        'iopa_experienceIndividu_id',
        'iopa_experienceIndividu_annee',
        'iopa_experienceIndividu_metier',
        'iopa_experienceIndividu_entreprise',
        'iopa_experienceIndividu_duree',
        'iopa_individu_id'
    ];
    public function individuId()
    {
        return $this->belongsTo(Individu::class);
    }
}
