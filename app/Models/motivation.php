<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class motivation extends Model
{
    use HasFactory;
    protected $table = 'motivation';
    public $timestamps = false;

    protected $casts =[
        'id_abonne' => 'int'
    ];
    protected $fillable =[
        "intitule",
        "id_abonne",
    ];

    public function abonne(){
        return $this->belongsTo(abonne::class, 'id_abonne');
    }
}
