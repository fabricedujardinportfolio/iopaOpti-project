<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Individu extends Model
{
    use HasFactory;
    
    protected $table = "iopa_individu";

    protected $fillable = [
        'iopa_individu_id',
        'name_individu'
    ];
}
