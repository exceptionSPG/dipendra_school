@extends('admin.admin_master')
@section('admin')

<dev class="page-content">
    <div class="container-fluid">
        <br><br><br>
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <br>
                    <center>
                        <img class="rounded-circle avatar-xl" src="{{ asset('upload/admin_images/'.$adminData->profile_image) }}" alt="Card image cap">

                    </center>
                    <div class="card-body">
                        <h4 class="card-title">Name: {{ $adminData-> name }}</h4>

                        <hr>
                        <h4 class="card-title">Name: {{ $adminData-> email }}</h4>
                        <hr>
                        <h4 class="card-title">Name: {{ $adminData-> username }}</h4>
                        <hr>

                        <a href="{{ route('edit.profile') }}" class="btn btn-info waves-effect waves-light">Edit Profile</a>

                    </div>
                </div>
            </div>


        </div>


    </div>
</dev>


@endsection