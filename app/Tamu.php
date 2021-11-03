<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tamu extends Model
{
    //
    public $timestamps = false;
    protected $table = 'tbl_master_tamu';
    protected $guarded = [''];
}
