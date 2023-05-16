<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class abonne extends Model
{
    use HasFactory;
    protected $table = 'abonne';
    

    protected $fillable = [
        'nom',
        'prenom',
        'age',
        'sexe',
        'profession',
        'rue'
    ];

    protected $hidden = [

    ];

    protected $carts = [
        'id'=> 'int', 'nom'=> 'string', 'prenom'=>'string', 'age'=> 'int', 'sexe'=>'string', 'profession'=>'string', 'rue'=> 'string'
    ];

    public $timestamps = false;
}
