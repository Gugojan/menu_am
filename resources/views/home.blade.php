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
                        @if(request()->user()->user_type_id===1)
                            <a href=" admin/product">Menu.am
                            </a>
                        @else
                        <a href=" user/order">Menu.am
                        </a>
                            @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
