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
                        <img class="rounded-circle avatar-xl" src="{{ (!empty($editData->profile_image))? url('upload/admin_images/'.$editData->profile_image):url('upload/no_image.png') }}" alt="Card image cap">

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