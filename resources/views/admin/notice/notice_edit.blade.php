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

                        <h4 class="card-title">Edit Notice</h4>
                        <form method="POST" action="{{ route('notice.update') }}">
                            @csrf

                            <!-- name	designation	photo	email	phone	address	profession	 -->
                            <input type="hidden" name="id" value="{{ $notice->id }}">

                            <div class="row">

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Notice Title:</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="title" value="{{ $notice->title }}">
                                        @error('title')
                                        <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- end row -->


                            </div>

                            <div class="row">

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Notice Date:</label>
                                    <div class="col-sm-10">
                                        <input type="date" value="{{ $notice->notice_date }}" name="notice_date" max="{{ Carbon\Carbon::now()->format('Y-m-d') }}" class="form-control">
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
                                    {{ $notice->description }}
                                    </textarea>
                                    @error('description')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->




                            <input type="submit" value="Update Notice Data" class="btn btn-info waves-effect waves-light">
                        </form>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>


    </div>
</dev>




@endsection