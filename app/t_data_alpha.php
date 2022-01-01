<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class t_data_alpha extends Model
{
    use SoftDeletes;
    protected $table = 'data_table_alphavantage';
    protected $primaryKey = 'id';

    public function relation_symbol()
    {
        return $this->belongsTo('App\m_symbol','symbol','id');
    }
}
