<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Individu extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "iopa_individu";
    protected $fillable = [
        'iopa_individu_id',
        'name_individu',
        'lastName_individu',
        'maidenName_individu',
        'nationality_individu',
        'sexe_individu',
        'dateofBirth_individu',
        'regionBirth_individu',
        'age_individu',
        'familyStatus_individu',
        'permisDeConduire_individu'
    ];
}
