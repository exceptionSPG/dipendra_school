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

                        <h4 class="card-title">Add New Notice</h4>
                        <form method="POST" action="{{ route('notice.store') }}">
                            @csrf

                            <!-- title	description	notice_date	created_at	updated_at		 -->

                            <div class="row">

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Notice Title:</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" required name="title" placeholder="Title">
                                        @error('title')
                                        <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- end row -->

                            </div>

                            <div class="row">

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Notice Published Date:</label>
                                    <div class="col-sm-10">
                                        <input type="date" name="notice_date" required max="{{ Carbon\Carbon::now()->format('Y-m-d') }}" class="form-control">
                                        @error('notice_date')
                                        <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- end row -->


                            </div>




                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Notice Details:</label>
                                <div class="col-sm-10">
                                    <textarea id="editor3" required name="description">

                                    </textarea>
                                    @error('description')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->




                            <input type="submit" value="Insert Notice Data" class="btn btn-info waves-effect waves-light">
                        </form>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>


    </div>
</dev>



@endsection