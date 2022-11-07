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

                        <h4 class="card-title">Add Teacher</h4>
                        <form method="POST" action="{{ route('teacher.store') }}" enctype="multipart/form-data">
                            @csrf

                            <!-- name	designation	description	photo	email	phone	facebook	instagram	youtube	address	interests	qualification	experience	biography	mfs	since -->

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Teacher Name:</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="name" placeholder="Raju GC">
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
                                            <input class="form-control" type="text" name="designation" placeholder="Science Teacher">
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
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Teacher email:</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="email" placeholder="abcd@gmail.com">
                                            @error('email')
                                            <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- end row -->
                                </div>
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Teacher Phone:</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="phone" placeholder="98********">
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
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Facebook Link:</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="facebook" placeholder="https://www.facebook.com/">
                                            @error('facebook')
                                            <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- end row -->
                                </div>
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Instagram Link:</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="instagram" placeholder="Science Teacher">
                                            @error('instagram')
                                            <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- end row -->
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Youtube Link:</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="youtube" placeholder="https://www.youtube.com/">
                                            @error('youtube')
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
                                            <input class="form-control" type="text" name="address" placeholder="Gorahi,Dang">
                                            @error('address')
                                            <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- end row -->
                                </div>
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Qualification:</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="qualification" placeholder="Msc. Physics">
                                            @error('qualification')
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
                                        <label for="example-text-input" class="col-sm-2 col-form-label ">Experience<span class="text-danger">*</span></label><br>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="number" min="1" max="40" name="experience" placeholder="17">
                                            @error('experience')
                                            <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- end row -->
                                </div>
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Since:</label>
                                        <div class="col-sm-10">
                                            <input type="date" name="since" max="{{ Carbon\Carbon::now()->format('Y-m-d') }}" class="form-control">
                                            @error('since')
                                            <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- end row -->
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea id="editor1" name="description">


                                    </textarea>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Interests</label>
                                <div class="col-sm-10">
                                    <textarea id="editor2" name="interests" placeholder="singing,research">


                                    </textarea>
                                </div>
                            </div>
                            <!-- end row -->


                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Biography</label>
                                <div class="col-sm-10">
                                    <textarea id="editor3" name="biography">


                                    </textarea>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Message For Students</label>
                                <div class="col-sm-10">
                                    <span class="text-danger">Must for Principal</span>
                                    <textarea id="editor4" name="mfs" placeholder="singing,research">


                                    </textarea>

                                </div>
                            </div>
                            <!-- end row -->



                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Teacher Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="slide_image" name="photo" accept="image/png, image/jpeg">
                                    <span>Image Dimension: <strong class="text-danger"> 371x418 px</strong></span>
                                </div>

                            </div>
                            <!-- end row -->

                            <div class="row mb-3">

                                <div class="col-sm-10">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                    <img class="rounded avatar-lg" id="showImage" src="{{ url('upload/no_image.png') }}" alt="Card image cap">


                                </div>
                            </div>
                            <!-- end row -->
                            <input type="submit" value="Insert Teacher Data" class="btn btn-info waves-effect waves-light">
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