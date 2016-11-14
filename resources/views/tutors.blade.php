@extends('master')

@section('content')
  <ul id="information-list">
    <li class="tutor">
      <span class="outer"><h2>Name</h2></span>
      <span class="outer"><h2>Number</h2></span>
      <span class="outer"><h2>Email</h2></span>
      <span class="outer"><h2>Rate/Hour</h2></span>
      <span class="outer"><h2>Rating</h2></span>
    </li>
    @foreach($tutors as $tutor)
    <li class="tutor">
      <span class="outer">{{ $tutor->name }}</span>
      <span class="outer">{{ $tutor->phone_number }}</span>
      <span class="outer">{{ $tutor->email }}</span>
      <span class="outer">${{ $tutor->hourly_rate }}</span>
      <span class="outer">
        <span class="vote up">Vote Good  &#9650;</span>
        <span class="vote-count good" data-tutor="{{$tutor->id}}"> {{ $tutor->upVotes($tutor->id) }}</span>
        |
        <span class="vote down">Vote Bad  &#9660;</span>
        <span class="vote-count bad" data-tutor="{{$tutor->id}}"> {{ $tutor->downVotes($tutor->id) }}</span></span>
    </li>
    @endforeach
  </ul>


  <script>

  //Taken from Stack overflow

  function makeRequest (opts) {
    return new Promise(function (resolve, reject) {
      var xhr = new XMLHttpRequest();
      xhr.open(opts.method, opts.url);
      xhr.onload = function () {
        if (this.status >= 200 && this.status < 300) {
          resolve(xhr.response);
        } else {
          reject({
            status: this.status,
            statusText: xhr.statusText
          });
        }
      };
      xhr.onerror = function () {
        reject({
          status: this.status,
          statusText: xhr.statusText
        });
      };
      if (opts.headers) {
        Object.keys(opts.headers).forEach(function (key) {
          xhr.setRequestHeader(key, opts.headers[key]);
        });
      }
      var params = opts.params;
      // We'll need to stringify if we've been given an object
      // If we have a string, this is skipped.
      if (params && typeof params === 'object') {
        params = Object.keys(params).map(function (key) {
          return encodeURIComponent(key) + '=' + encodeURIComponent(params[key]);
        }).join('&');
      }
      xhr.send(params);
    });
  }

  //Apply onclick function to all matching elements
    document.querySelectorAll(".vote").forEach(function(el) {
      //onclick function
      el.onclick = function() {
        //Vote count element
        var voteCountDown = el.parentNode.querySelector(".vote-count.bad");
        var voteCountUp = el.parentNode.querySelector(".vote-count.good");

        //If vote up clicked...
        if(el.classList.contains("up")) {

          var data = {
            'type': 'up',
            'tutor_id': voteCountUp.dataset.tutor,
            'resource': 'tutor'
          }
          // Headers and params are optional
          makeRequest({
            method: 'POST',
            url: '/api/vote',
            params: data,
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded',
              'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
          })
          .then(function (data) {
            console.log(data);
            voteCountUp.innerHTML++;
          })
          .catch(function (err) {
            console.error('Augh, there was an error!', err.statusText);
          });
        }
        //If vote down clicked...
        else if(el.classList.contains("down")) {

          console.log(voteCountDown.dataset.tutor);
          var data = {
            'type': 'down',
            'tutor_id': voteCountDown.dataset.tutor,
            'resource': 'tutor'
          }

          console.log(data);

          makeRequest({
            method: 'POST',
            url: '/api/vote',
            params: data,
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded',
              'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
          })
          .then(function (data) {
            console.log(data);
            voteCountDown.innerHTML++;
          })
          .catch(function (err) {
            console.error('Augh, there was an error!', err);
          });
        }
      }
    })
  </script>
@endsection
