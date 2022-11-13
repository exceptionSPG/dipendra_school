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

                        <h4 class="card-title">Add Event</h4>
                        <form method="POST" action="{{ route('events.store') }}" enctype="multipart/form-data">
                            @csrf

                            <!-- name	designation	photo	email	phone	address	profession	 -->

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Event Title:</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="title" placeholder="Bhupu Bidhyarthi milan">
                                            @error('title')
                                            <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- end row -->
                                </div>
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Location:</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" required type="text" name="location" placeholder="School Meeting Hall">
                                            @error('location')
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
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Event Date:</label>
                                        <div class="col-sm-10">
                                            <input type="date" name="date" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" class="form-control">
                                            @error('date')
                                            <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- end row -->
                                </div>
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Event Time:</label>
                                        <div class="col-sm-10">
                                            <!-- <input class="form-control" type="text" name="phone" placeholder="98********"> -->
                                            <input type="text" required class="form-control datetimepicker" name="time">
                                            <!-- <input type="datetime-local" id="meeting-time" name="meeting-time" min="{{ Carbon\Carbon::now() }}"> -->
                                            @error('time')
                                            <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- end row -->
                                </div>
                            </div>




                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Event Details:</label>
                                <div class="col-sm-10">
                                    <textarea id="editor3" required name="description">

                                    </textarea>
                                    @error('description')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->




                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Thumbnail Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="slide_image" name="thumbnail" accept="image/png, image/jpeg">
                                    <span>Image Dimension: <strong class="text-danger"> 1165x583 px</strong></span>
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
                            <input type="submit" value="Insert Event Data" class="btn btn-info waves-effect waves-light">
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