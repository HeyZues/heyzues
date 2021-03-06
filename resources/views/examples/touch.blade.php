@extends('master')
@section('title', 'Home')
@section('content')
<div ui-content-for="title">
  <span>Touch</span>
</div>

<div class="section toucharea">
    <div ng-if="touch">
      <div ng-show="touch.type !== 'touchend'" class="touch-mark" style="left: <%touch.startX - containerRect.left%>px; top: <%touch.startY - containerRect.top%>px; background-color: yellow;">
      </div>

      <div ng-show="touch.type !== 'touchend'" class="touch-mark" style="left: <%touch.x - (containerRect.left)%>px; top: <%touch.y - containerRect.top%>px; background-color: orange;">
      </div>

      <ul>
        <li>type: <%touch.type%></li>
        <li>point: [<%touch.x%>, <%touch.y%>]</li>
        <li>step: <%touch.step%> [<%touch.stepX%>, <%touch.stepY%>]</li>
        <li>distance: <%touch.distance%> [<%touch.distanceX%>, <%touch.distanceY%>]</li>
        <li>total: <%touch.total%> [<%touch.totalX%>, <%touch.totalY%>]</li>
        <li>velocity: <%touch.velocity%> px/sec</li>
        <li>averageVelocity: <%touch.averageVelocity%> px/sec</li>
        <li>angle: <%touch.angle == null ? '-' : touch.angle%> deg</li>
        <li>direction: <%touch.direction == null ? '-' : touch.direction%></li>
      </ul>
    </div>

    <div ng-hide="touch">
      <h1>Touch Me!</h1>
    <div>
</div>
@endsection