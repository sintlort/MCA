<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class t_data_yahoo extends Model
{
    use SoftDeletes;
    protected $table = 'data_table';
    protected $primaryKey = 'id';

    public function relation_symbol()
    {
        return $this->belongsTo('App\m_symbol','symbol','id');
    }
}
