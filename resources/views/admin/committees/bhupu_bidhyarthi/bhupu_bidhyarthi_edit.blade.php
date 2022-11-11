@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<dev class="page-content">
    <div class="container-fluid">
        <br><br><br>
        <div class="row p-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Update Member</h4>
                        <form method="POST" action="{{ route('bhupu_bidhyarthi.update') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $member->id }}">
                            <!-- name	designation	description	photo	email	phone	facebook	instagram	youtube	address	interests	qualification	experience	biography	mfs	since -->

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Member Name:</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="name" value="{{ $member->name }}">
                                            @error('name')
                                            <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- end row -->
                                </div>
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Designation:</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="designation" value="{{ $member->designation }}">
                                            @error('designation')
                                            <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- end row -->
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">email:</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="email" value="{{ $member->email }}">
                                            @error('email')
                                            <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- end row -->
                                </div>
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">member Phone:</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="phone" value="{{ $member->phone }}">
                                            @error('phone')
                                            <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- end row -->
                                </div>
                            </div>





                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Address:</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="address" value="{{ $member->address }}">
                                            @error('address')
                                            <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- end row -->
                                </div>
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Profession:</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="profession" value="{{ $member->profession }}">
                                            @error('profession')
                                            <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- end row -->
                                </div>
                            </div>







                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">member Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="slide_image" name="photo" accept="image/png, image/jpeg">
                                    <span>Image Dimension: <strong class="text-danger"> 371x418 px</strong></span>
                                </div>

                            </div>
                            <!-- end row -->

                            <div class="row mb-3">

                                <div class="col-sm-10">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                    <img class="rounded avatar-lg" id="showImage" src="{{ asset($member->photo) }}" alt="{{ $member->name }} Photo">


                                </div>
                            </div>
                            <!-- end row -->
                            <input type="submit" value="Update Member Data" class="btn btn-info waves-effect waves-light">
                        </form>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>


    </div>
</dev>

<script type="text/javascript">
    $(new Document).ready(function() {
        $('#slide_image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection