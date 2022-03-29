<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentairePsy extends Model
{
    use HasFactory;

    protected $table = "iopa_commentaire_psy";
    
    protected $fillable = [
        'iopa_commentaire_id',
        'commentaire',
        'agent_id',
        'iopa_individu_id '
    ];

    public function agentsId()
    {
        # code...
        return $this->hasMany(Agent::class);
    }
    public function individuId()
    {
        return $this->hasMany(Individu::class);
    }
}
