@extends('master')
@section('title', 'Home')
@section('content')
<div ui-content-for="title">
  <span>Overlays</span>
</div>

<div class="scrollable">
  <div class="scrollable-content">
        <legend>Login</legend>
    <div class="section section-break">
      <a href=""
          ui-turn-on="modal1"
          class="btn btn-default">Show Modal</a>
      <a href=""
          ui-turn-on="modal2"
          class="btn btn-default">Show Overlay</a>
    </div>

    <div class="section section-break">
      <p>
        <%lorem%>
      </p>
    </div>
  </div>
</div>






@endsection