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
      return $this->hasMany('App\Vote', 'foreign_id');
    }

    public function upVotes($id) {
      return $this->votes()->where("status",1)
                           ->where("foreign_id",$id)
                           ->where('type',"=","0")
                           ->count();
    }

    public function downVotes($id) {
      return $this->votes()->where("status",-1)
                           ->where("foreign_id",$id)
                           ->where('type',"=","0")
                           ->count();
    }
}
