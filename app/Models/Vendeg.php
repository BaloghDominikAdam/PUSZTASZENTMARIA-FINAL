<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendeg extends Model
{
    protected $table = "vendegkonyv";
    public $timestamps = false;
    protected $primaryKey = 'vendegkonyv_id';
}
