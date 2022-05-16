<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permi extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "iopa_individupermi";
    protected $fillable = [
        'iopa_individupermi_id  ',
        'iopa_individu_id',
        'iopa_individupermi_name'
    ];
    public function individuId()
    {
        return $this->belongsTo(Individu::class);
    }
}
