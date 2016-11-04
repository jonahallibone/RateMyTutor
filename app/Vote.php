<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $table = 'votes';

    protected $fillable = [
      'tutor_id', 'status'
    ];

    public function tutor() {
      return $this->belongsTo('tutors');
    }
}
