@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

                @if (Auth::user())

                <div class="card">
                    <div class="card-header">{{ __('Status') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>

                @else

                <div class="card">
                    <div class="card-header">{{ __('Status') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You need to login!') }}
                    </div>
                </div>

                @endif

        </div>
    </div>
</div>
@endsection
