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
                <br>
                <div class="container">
                    <table id="myTable" class="row-border compact stripe hover" style="width:100%">
                        <thead style="text-align: center;">
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Intro</th>
                                <th>Email</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        
                    </table>    


                </div>
            </div>
        </div>
    </div>
</div>
<!-- <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
 -->
<script type="text/javascript">
    $(document).ready( function () {
    $('#myTable').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": "{!! route('user.user') !!}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'intro', name: 'intro'},
            {data: 'email', name: 'email'},
            {data: 'created_at', name: 'created_at'},
            {data: 'updated_at', name: 'updated_at'},
            {data: 'action', name: 'action'},
            // {data: 'action', name: 'action', orderable: false, searchable: false},
        ]

    } );

} );
</script>
<script type="text/javascript">
    $(function() {
    $(".update_btn").click(function() {
        alert("!");
    });
});
</script>
@endsection
