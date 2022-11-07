@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<dev class="page-content">
    <div class="container-fluid">
        <br><br><br>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Edit About Introduction</h4>
                        <form method="POST" action="{{ route('update.introduction') }}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $intro->id }}">


                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea id="editor1" name="description">
                                    {{ $intro->description }}

                                    </textarea>
                                    @error('description')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Mission</label>
                                <div class="col-sm-10">
                                    <textarea id="editor2" name="mission">
                                    {{ $intro->mission }}

                                    </textarea>
                                    @error('mission')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Vision</label>
                                <div class="col-sm-10">
                                    <textarea id="editor3" name="vision">
                                    {{ $intro->vision }}

                                    </textarea>
                                    @error('vision')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Thumbnail Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="slide_image" name="thumbnail" accept="image/png, image/jpeg">
                                    <span>Image Dimension: <strong class="text-danger"> 869x461 px</strong></span>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">

                                <div class="col-sm-10">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                    <img class="rounded avatar-lg" id="showImage" src="{{ (!empty($intro->thumbnail))? url($intro->thumbnail):url('upload/no_image.png') }}" alt="Card image cap">


                                </div>
                            </div>
                            <!-- end row -->
                            <input type="submit" value="Update About" class="btn btn-info waves-effect waves-light">
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