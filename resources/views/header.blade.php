<html>
  <head>
    <title>Heel Grade System</title>
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,700" rel="stylesheet">
    <style>
      html,
      body {
        width: 100%;
        margin: 0 auto;
        font-family: Arial, sans-serif;
        font-size: 16px;
      }

      #wrapper {
        display: block;
        width: 70%;
        margin: 0 auto;
        padding: 1rem;
        box-sizing: border-box;
      }

      h2.course-title {
        font-weight: bold;
        text-align: center;
        font-size: 2.15rem;
        font-family: 'Oswald', sans-serif;
        margin: 0;
      }

      h3.professor-title {
        font-weight: 500;
        text-align: center;
        font-size: 1.25rem;
        font-family: 'Oswald', sans-serif;
        margin: 0;
      }

      ul#menu {
        display: flex;
        width: 100%;
        flex-direction: row;
        justify-content: center;
        flex-grow: 1;
        margin: 0;
        padding: 0;
        list-style: none;
        padding: 1rem 0;
      }

      ul#menu a {
        display: inline-block;
        width: 33%;
        text-align: center;
        margin: .25rem;
        padding: .5rem;
        background-color: #81B2FF;
        font-weight: bold;
        color: #000;
      }

      ul#information-list {
        margin: 0;
        padding: 0;
        list-style: none;
        display: block;
      }

      ul#information-list li {
        display: flex;
        width: 100%;
        flex-direction: row;
        justify-content: center;
        flex-grow: 1;
        margin: 0;
        list-style: none;
        padding: .25rem 0;
      }

      ul#information-list li span.outer {
        display: inline-block;
        text-align: center;
        padding: .5rem 0;
        color: #000;
        vertical-align: middle;
      }

      ul#information-list li.tutor span.outer {
        width: 20%;
      }

      ul#information-list li.documents span.outer {
        width: 33.3333%;
      }

      /*** Vote Styles ***/

      .vote {
        color: #007AFF;
        text-decoration: underline;
        cursor: pointer;
      }

      .vote-count {
        font-weight: bold;
        color: #007AFF;
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
    <div id="wrapper">
      <header>
        <img src="{{ asset('img/pasted-svg-2172x74.svg') }}" />
        <h2 class="course-title">Econ 410</h2>
        <h3 class="professor-title">Professor Sheran Andrews</h2>
        <ul id="menu">
          <a href="/econ-410/links"><li>Helpful Links</li></a>
          <a href="/econ-410/documents"><li>Documents</li></a>
          <a href="/econ-410/tutors"><li>Tutors</li></a>
        </ul>
      </header>
