<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kms extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = ['name', 'age', 'weight', 'height', 'institution','location'] ;
    protected $table = 'kms';
    
}
