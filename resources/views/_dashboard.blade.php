@extends('master')

@section('head')
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
@endsection

@section('main')
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            @yield('sidebar')
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
          <h1 class="page-header">
              @yield('h1')
          </h1>

          @yield('panels')
        </div>
      </div>
    </div>
@endsection
