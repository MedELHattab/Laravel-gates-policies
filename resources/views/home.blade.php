@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    @can('isAdmin')
                       <h4 class="text-center">This is section for admin</h4>
                    @endcan
                    @can('isVendor')
                       <h4 class="text-center">This is section for vendor</h4>
                    @endcan
                    @can('isCustomer')
                       <h4 class="text-center">This is section for customer</h4>
                    @endcan

                    <a href="{{ route('gate') }}" class="btn btn-sm btn-primary">Gate</a>
                    <br>
                    <hr>
                    <a href="{{ route('post.index') }}" class="btn btn-sm btn-success">Posts</a>
                </div>
            </div> 
        </div>
    </div>
</div>
@endsection
