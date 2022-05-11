<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PcoPerson extends Model
{
    protected $table = "pco_persons";

    public $fillable = array(
        'name',
        'birth_date',
    );
}
