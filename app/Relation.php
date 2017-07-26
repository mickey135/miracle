<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relation extends Model
{
    protected $table = 'relations';
    protected $primaryKey = 'relation_id';
    public $timestamps = false;
}
