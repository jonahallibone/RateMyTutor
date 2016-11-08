<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = 'documents';

    protected $fillable = [
      'document_name',
      'document_link',
      'document_help'
    ];

    public function votes() {
      return $this->hasMany('App\Vote', 'foreign_id');
    }

    public function upVotes($id) {
      return $this->votes()->where("status",1)
                           ->where("foreign_id",$id)
                           ->where('type',"=","1")
                           ->count();
    }

    public function downVotes($id) {
      return $this->votes()->where("status",-1)
                           ->where("foreign_id",$id)
                           ->where('type',"=","1")
                           ->count();
    }
}
