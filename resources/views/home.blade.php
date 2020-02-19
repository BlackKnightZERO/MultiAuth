@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User Dashboard</div>

                <!-- <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in as USER!
                </div> -->
                @component('components.who')
                @endcomponent
                <br>
                <div class="container">
                Request:
                <form  method="post" action="{{ route('user.request') }}">
                    @csrf
                    <input type="text" name="request_item" class="form-control">
                    <br>
                    <input type="submit" name="submit" value="submit" class="btn btn-sm">
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
