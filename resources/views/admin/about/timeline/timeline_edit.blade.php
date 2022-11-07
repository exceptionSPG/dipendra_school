@extends('admin.admin_master')
@section('admin')


<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Update Timeline </h4>


                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">

            <!-- -----------------Add Brand Col -->

            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Update Timeline Event</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">


                            <form action="{{ route('timeline.update') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $timeline->id }}">

                                <div class="form-group">
                                    <h5>Year: <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="year" value="{{ $timeline->year }}" class="form-control">

                                        @error('year')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="form-group ">
                                    <h5>Title: <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="title" value="{{ $timeline->title }}" class="form-control">

                                        @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3 pt-3">
                                    <h5 for="example-text-input" class="col-sm-2 col-form-label">Description:<span class="text-danger">*</span></h5>
                                    <div class="col-sm-10">
                                        <textarea id="editor1" name="description">
                                        {{ $timeline->description }}

                                        </textarea>
                                    </div>
                                </div>
                                <!-- end row -->


                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update" />
                                </div>
                            </form>




                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                <!-- /.box -->
            </div>
            <!-- /.col 4 -->
        </div> <!-- end row -->





    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->



@endsection