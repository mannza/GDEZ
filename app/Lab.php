<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    //Maklumkan nama table yang perlu dihubungi
    // protected $table = 'Contoh';

    #column yang dibenarkan diubah
    protected $fillable = [
'nama',
'kapasiti',
'status'
    ];
  
}
