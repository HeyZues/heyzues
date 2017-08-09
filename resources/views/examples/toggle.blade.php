@extends('master')
@section('title', 'Home')
@section('content')
<div ui-content-for="title">
  <span>Toggle</span>
</div>
<div class="scrollable">
<div class="scrollable-content">
  <div class="container-fluid section section-break" id="toggleExample">
    <legend>Login</legend>
    <p ui-shared-state id="lightbulb"
        ui-class="{'text-primary': lightbulb}" 
           class="text-default">

      <i class="fa fa-lightbulb-o"></i>
    </p>

    <div class="btn-group justified nav-tabs">
      <a  
         ui-toggle="lightbulb"
         ui-class="{'active': lightbulb}" 
         class="btn btn-default" href>
          Toggle
      </a>
      <a  
         ui-turn-on="lightbulb"
         ui-class="{'active': lightbulb}" 
         class="btn btn-default" href>
          Turn On
      </a>
      <a  
         ui-turn-off="lightbulb"
         ui-class="{'active': !lightbulb}"
         class="btn btn-default" href>
          Turn Off
      </a>       
    </div>

    <hr>

    <h5>ExclusionGroup example</h5>

    <div class="btn-group">
      <a href class="btn btn-default" ui-turn-on="button1" ui-shared-state="button1" ui-class="{'active': button1}" ui-exclusion-group="myButtons">1</a>
      <a href class="btn btn-default" ui-turn-on="button2" ui-shared-state="button2" ui-class="{'active': button2}" ui-exclusion-group="myButtons">2</a>
      <a href class="btn btn-default" ui-turn-on="button3" ui-shared-state="button3" ui-class="{'active': button3}" ui-exclusion-group="myButtons">3</a>
    </div>

  </div>
</div>
</div>
@endsection