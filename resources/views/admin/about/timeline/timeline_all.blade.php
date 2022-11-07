@extends('admin.admin_master')
@section('admin')


<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">All Timeline List <span class="text-danger "> {{ count($timelines) }}</span></h4>


                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-7">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Timelines All</h4>


                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Year</th>
                                    <th>Title</th>
                                    <th>Description</th>

                                    <th>Action</th>

                                </tr>
                            </thead>


                            <tbody>
                                @php($i = 1)
                                @foreach($timelines as $item)
                                <tr>
                                    <td>{{ $i++}}</td>

                                    <td>{{ $item->year }}</td>

                                    <td>{{ $item->title }}</td>
                                    <td>{!! $item->description !!}</td>

                                    <td width=20%>
                                        <a href="{{ route('timeline.edit',$item->id) }}" class="btn btn-info sm" title="Edit Data"><i class="fas fa-edit"> </i></a>
                                        <a href="{{ route('timeline.delete',$item->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete"><i class="fas fa-trash-alt"> </i></a>
                                    </td>

                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->

            <!-- -----------------Add Brand Col -->

            <div class="col-5">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Timeline Event</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">


                            <form action="{{ route('timeline.store') }}" method="post">
                                @csrf

                                <div class="form-group">
                                    <h5>Year: <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="year" class="form-control">

                                        @error('year')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="form-group ">
                                    <h5>Title: <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="title" class="form-control">

                                        @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3 pt-3">
                                    <h5 for="example-text-input" class="col-sm-2 col-form-label">Description:<span class="text-danger">*</span></h5>
                                    <div class="col-sm-10">
                                        <textarea id="editor1" name="description">


                                        </textarea>
                                    </div>
                                </div>
                                <!-- end row -->


                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New" />
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