<html>
  <head>
    <title>Tutor Voting System</title>
    <style type="text/css">
      html,
      body {
        width: 100%;
        margin: 0 auto;
        font-family: Arial, sans-serif;
      }

      .box {
        background-color: #007AFF;
        padding: 1rem;
        box-sizing: border-box;
      }

      .name {
        font-weight: bold;
        color: #FFF;
      }

      .name:before {
        content: 'Name: '
      }

      .vote {
        color: #FFF;
        text-decoration: underline;
        cursor: pointer;
      }

      .vote-count {
        font-weight: bold;
        color: #FFF;
      }

      .good {
        color: #4CD964;
      }

      .bad {
        color: #FF3B30;
      }

    </style>
  </head>
  <body>
    @foreach($tutors as $tutor)
    <div class="box">
      <h5 class="name">{{ $tutor->name }}</h5>
      <span class="vote up">Vote Up  &#9650;</span>
      <span class="vote-count good" data-tutor="{{$tutor->id}}"> {{ $tutor->upVotes($tutor->id) }}</span>

      |
      <span class="vote down">Vote Down  &#9660;</span>
      <span class="vote-count bad" data-tutor="{{$tutor->id}}"> {{ $tutor->downVotes($tutor->id) }}</span>
    </div>
    @endforeach

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
  </body>
</html>
