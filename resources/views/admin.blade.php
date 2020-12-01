@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Dashboard Admin') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Management</div>
                <div class="card-body">
                    <div class="card">
                        <div class="card-header">
                            <h6><a class="collapsed card-link" href="{{url('driver/create')}}"><i class="fa fa-address-card-o fa-fw" aria-hidden="true"></i> Add Data Driver<button type="button" class="btn btn-primary pull-right btn-sm"><i class="fa fa-plus fa-fw" aria-hidden="true"></i>
                                    </button></a></h6>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h6><a class="collapsed card-link" href="{{url('driver/list')}}"><i class="fa fa-table
                            fa-fw" aria-hidden="true"></i> List data Driver<button type="button" class="btn btn-danger
                            pull-right btn-sm">{{$drivers->count()}}</button></a></h6>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h6><a href="{{url('driver/request')}}"> <i class="fa fa-envelope-o fa-fw" aria-hidden="true"></i> Order request<button type="button" class="btn btn-warning pull-right btn-sm">4        </button></a></h6>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h6><a class="collapsed card-link" href="{{url('driver/ondelivery')}}"><i class="fa fa-truck fa-fw" aria-hidden="true"></i> On Delivery<button type="button" class="btn btn-info pull-right btn-sm">2        </button></a></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
