<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class m_symbol extends Model
{
    use SoftDeletes;
    protected $table = 'symbol_table';
    protected $primaryKey = 'id';

}

