<head>
<link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
<script src="{{asset('js/app.js')}}" defer></script>


</head>
<body>
<div class="container">
        <div class="panel panel-default">
              <div class="panel-body">
              <br>
              <br>

              Chau a todos {{$topic}}
<div id="app">
  <line-chart topic='{{$topic}}'></line-chart>
</div>


</body>