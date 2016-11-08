<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Vote;
use App\Tutor;
use App\Document;

class VoteController extends Controller {


    public function index() {
      return view("heelhome")->with(['tutors' => Tutor::all()]);
    }

    public function tutors() {
      return view("tutors")->with(['tutors' => Tutor::all()]);
    }

    public function documents() {
      return view("documents")->with(['documents' => Document::all()]);
    }

    public function voteTutors(Request $request) {
      $type = $request->input('type');
      $tutor = $request->input('tutor_id');
      $resource = $request->input('resource');

      $vote = new Vote();

      $vote->foreign_id = $tutor;

      if($resource === "tutor") {
        $vote->type = 0;
      }

      else $vote->type = 1;

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
