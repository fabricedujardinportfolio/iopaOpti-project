<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fiche extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "iopa_fiche";
    protected $fillable = [
        'iopa_fiche_id',
        'iopa_individu_id',
        'agent_id'
    ];
    public function agentsId()
    {
        # code...
        return $this->belongsTo(Agent::class);
    }
    public function individuId()
    {
        return $this->belongsTo(Individu::class);
    }
}
