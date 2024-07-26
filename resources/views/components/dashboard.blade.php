@extends('layouts_bak.app')

@section('title', 'Dashboard')


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

                    <!-- Add your dashboard content here -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">Section 1</div>
                                <div class="card-body">
                                    <!-- Section 1 content -->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">Section 2</div>
                                <div class="card-body">
                                    <!-- Section 2 content -->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">Section 3</div>
                                <div class="card-body">
                                    <!-- Section 3 content -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection