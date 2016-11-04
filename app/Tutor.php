<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    protected $table = 'tutors';

    protected $fillable = [
      'name'
    ];

    public function votes() {
      return $this->hasMany('App\Vote');
    }

    public function upVotes($id) {
      return $this->votes()->where("status",1)->where("tutor_id",$id)->count();
    }

    public function downVotes($id) {
      return $this->votes()->where("status",-1)->where("tutor_id",$id)->count();
    }
}
