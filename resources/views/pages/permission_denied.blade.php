@extends('layouts.app')
@section('title', '无权限访问')

@section('content')

<div class="col-md-4 col-md-offset-4">
    <div class="panel panel-default">
        <div class="panel-body">
            @if (Auth::check())
                <div class="alert alert-danger text-center">
                    You have no right to access this page.
                </div>
            @else
                <div class="alert alert-danger text-center">
                    Login please!
                </div>

                <a class="btn btn-lg btn-primary btn-block" href="{{ route('login') }}">
                    <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>
                    Login
                </a>
            @endif
        </div>
    </div>
</div>

@stop
