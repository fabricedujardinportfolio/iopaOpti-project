<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppartienService extends Model
{
    use HasFactory;
    
    protected $table = "appartienservices";
    
    protected $fillable = [
        'ressource_id',
        'poles_service_id'
    ];

    public function ressource()
    {
        # code...
        return $this->belongsTo(Ressource::class);
    }
    public function service()
    {
        # code...
        return $this->belongsTo(Service::class);
    }
}