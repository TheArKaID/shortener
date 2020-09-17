@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        <h4>Whoops</h4>
    </div>
    <div class="card-body">
        <div class="empty-state" data-height="600" style="height: 600px;">
            <img class="img-fluid" src="../assets/img/drawkit/drawkit-full-stack-man-colour.svg" alt="image">
            <h2 class="mt-0">We can't reach the server</h2>
            <p class="lead">
                We were unable to reach the server, it seemed like it was sleeping, so we were reluctant to wake it up.
            </p>
            <a href="#" class="btn btn-warning mt-4">Try Again</a>
            <a href="#" class="mt-4 bb">Need Help?</a>
        </div>
        </div>
</div>

@endsection