@extends('layouts.app')

@section('content')

    <div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
        <div class="panel panel-primary ">
            <div class="panel-heading">Brand <a  class="pull-right btn btn-primary btn-xs" href="/brands/create">Create New</a></div>
            <div class="panel-body">
                {{$products}}
            </div>
        </div>
    </div>

@endsection