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

                        <h4 class="card-title">Add Blog</h4>
                        <form method="POST" action="{{ route('blogs.store') }}" enctype="multipart/form-data">
                            @csrf

                            <!-- name	designation	photo	email	phone	address	profession	 -->

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Blog Title:</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="title" placeholder="Title">
                                            @error('title')
                                            <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- end row -->
                                </div>
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Author:</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" required type="text" name="author" placeholder="Author">
                                            @error('author')
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
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Blog Date:</label>
                                        <div class="col-sm-10">
                                            <input type="date" name="date" max="{{ Carbon\Carbon::now()->format('Y-m-d') }}" class="form-control">
                                            @error('date')
                                            <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- end row -->
                                </div>
                                <div class="col-md-6">


                                </div>
                            </div>




                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Event Details:</label>
                                <div class="col-sm-10">
                                    <textarea id="editor3" required name="detail">

                                    </textarea>
                                    @error('detail')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->




                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Blog Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="slide_image" name="image" accept="image/png, image/jpeg">
                                    <span>Image Dimension: <strong class="text-danger"> 1172x648 px</strong></span>
                                </div>

                            </div>
                            <!-- end row -->

                            <div class="row mb-3">

                                <div class="col-sm-10">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                    <img class="rounded avatar-lg" id="showImage" src="{{ url('upload/no_image.png') }}" alt="Member image">


                                </div>
                            </div>
                            <!-- end row -->
                            <input type="submit" value="Insert Blog Data" class="btn btn-info waves-effect waves-light">
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


    $(function() {
        $('.datetimepicker').datetimepicker();
    });
</script>



@endsection