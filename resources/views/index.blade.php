@extends('master')
@section('title', 'Home')
@section('content')

<div class="scrollable">
  <div class="scrollable-content">

    <div class="list-group text-center">
      <div class="list-group-item list-group-item-home">
        <h1>Mobile Angular UI  Demo <small>1.3</small></h1>
      </div>
      <div class="list-group-item list-group-item-home">
        <div>
          <i class="fa fa-gamepad feature-icon text-primary"></i>
        </div>
        <div>
            <h3 class="home-heading">Play around a little</h3>
            Open the sidebar and start testing features
        </div>
      </div>


      <div class="list-group-item list-group-item-home">
        <div>
          <i class="fa fa-tachometer feature-icon  text-primary"></i>
        </div>
        <div>
            <h3 class="home-heading">Test responsiveness and speed</h3>
            Scroll, tap, navigate, test that everything is smooth
        </div>
      </div>


      <div class="list-group-item list-group-item-home">
        <div>
          <i class="fa fa-expand feature-icon  text-primary"></i>
        </div>
        <div>
            <h3 class="home-heading">Resize your browser</h3>
            Stretch and squeeze your browser window to see both mobile and desktop versions.
        </div>
      </div>

      <div class="list-group-item list-group-item-home">
        <div>
          <i class="fa fa-stethoscope feature-icon  text-primary"></i>
        </div>
        <div>
            <h3 class="home-heading">Submit an issue</h3>
            <p>Please submit any issue you'll find, <a href="https://github.com/mcasimir/mobile-angular-ui/issues" target="blank" id="#home-report">reporting</a> your user agent string:<br>
            </p>
<pre><%userAgent%></pre>
            <p>
              It would help a lot!
            </p>
        </div>
      </div>

    </div>

  </div>
</div>

@endsection