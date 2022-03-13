<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    protected $table = "agents";

    protected $fillable = [
        'id',
        'name',
        'first_name',   
        'function',
        'passwords',
        'active',
        'email',
        'poles_services_id'
    ];

    protected $hidden = [
        'passwords',
    ];

    public function service()
    {
        # code...
        return $this->belongsTo(Service::class);
    }
}
