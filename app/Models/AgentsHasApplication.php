<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentsHasApplication extends Model
{
    use HasFactory;
    protected $table = "agents_has_applications";
    protected $fillable = [
        'agents_id',
        'applications_id',
        'droit'
    ];
    public function agentsId()
    {
        # code...
        return $this->hasMany(Agent::class);
    }
    public function applicationsId()
    {
        # code...
        return $this->hasMany(Application::class);
    }
}