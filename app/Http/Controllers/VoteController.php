<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Vote;
use App\Tutor;

class VoteController extends Controller {


    public function index() {
      return view("welcome")->with(['tutors' => Tutor::all()]);
    }

    public function store(Request $request, $id) {
      $type = $request->input('type');
      $tutor = $request->input('tutor_id');
      $vote = new Vote();
      $vote->tutor_id = $tutor;

      if($type === 'up') {
        $vote->status = 1;
      }

      else if($type === 'down') {
        $vote->status = -1;
      }

      else $vote->status = 0;

      $vote->save();

      return $vote;

    }

}
