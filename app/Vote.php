<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $table = 'votes';

    protected $fillable = [
      'foreign_id', 'status', 'type'
    ];

    public function tutor() {
      return $this->belongsTo('App\Tutor', 'foreign_id');
    }
}
