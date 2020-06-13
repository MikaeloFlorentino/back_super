<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Super extends Model
{
    //
    //protected $table = "supers";

    protected $fillable = [ 'area_super', 'area_casa', 'atiende', 'articulo'];
}
