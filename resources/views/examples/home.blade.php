@extends('master')
@section('title', 'Home')
@section('content')
<div class="scrollable">
 <div class="scrollable-content section" ui-swipe-left="swiped('LEFT')" ui-swipe-right="swiped('RIGHT')">
 <h2>Swipe me</h2>
  <div style="-webkit-user-drag: none; -webkit-touch-callout: none; -webkit-user-select: none; -khtml-user-select: none; -moz-user-select: none; -ms-user-select: none; user-select: none;">



<div class="container">
    <div class="row">
        <div class="col-md-6 paddingbottom10">
            <h1>Do you drink coffee?</h1>
            <p class="lead">You're probably thinking why would I pay $4.99 for a PRO Membership when I can just buy a latte for the same price?</p>
        </div>
        <div class="col-md-3 paddingbottom20">
            <img src="http://i.imgur.com/3FV3UqO.png" alt="" width="200" height="200">
      </div>
    </div>

      <div class="col-md-12 paddingbottom20">
        <p class="col-md-5">The decisions...decisions...very very tough to make. I know how you feel. 
        Latte is nice a nice way to kickstart your morning when you're searching for auditions.</p>
      </div>
      <div class="col-md-12 paddingbottom20">
        <h2>Do you want more audition?</h2>
      </div>
      <div class="col-md-3 paddingbottom20">
        <img src="http://i.imgur.com/jET9Bgb.jpg" class="thumbnail" width="200">
    </div>
      <div class="col-md-9 paddingbottom20">
        <p class="lead col-md-8">Why would I pay $5 for a latte that would only last me a few minutes when I can have a CastCaller Pro Account 
        for 30 days? Exactly what I'm thinking.</p>
        <p class="col-md-12">This an even harder decision eh?</p>
    <p  class="col-md-12"><a href="http://castcaller.com" class="btn btn-primary btn-primary btn-outline">Upgrade Now <span class="glyphicon glyphicon-star-empty"></span></a></strong></p>
      </div>
        <div class="col-md-12 paddingbottom20 paddingtop20">
            <p class="lead col-md-8">Still not convinced? Let me break down the benefits for you.</p>
        </div>
        <div class="col-md-6 paddingbottom20">      
        <ul class="font-raleway">
            <li>Apply for <span class="alert-warning">unlimited castings</span>. Basic member is limited to one application per day.</li>
            <li>Unlimited messaging. Basic Member is limited to three messages per day.</li>
            <li>Make your profile beautiful with videos and extra photos</li>
            <li>Get featured in the homepage and talent directory</li>
            <li>Get a PRO seal of aPROval</li>
            <li>Get promoted on our popular social media channels. We always scour pro members 
                             profiles and pick talent of the week and feature it on our blog</li>
        </ul>
        <p class="lead">See I told you it's going to be an easy decision. Now upgrade to Pro Membership</p>
        </div>
        <div class="col-md-12 paddingbottom20">
        <p><a href="http://castcaller.com" class="btn btn-primary btn-primary btn-lg">Upgrade Now <span class="glyphicon glyphicon-star-empty"></span></a></strong></p>
        </div>
  </div>
</div>

		    <div ui-content-for="navbarAction">
		      <!-- <i class="fa fa-reply-all" aria-hidden="true"></i> -->
		      <a class="btn" ng-click="login()">Salir</a>
		    </div>

  </div>
 </div>
</div>
@endsection