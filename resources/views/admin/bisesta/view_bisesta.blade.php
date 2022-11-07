@extends('admin.admin_master')
@section('admin')








<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0"> विशेषता List <span class="text-danger">{{ count($bisesta) }}</span></h4>


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
                                    <th>विशेषता icon</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Action</th>

                                </tr>
                            </thead>


                            <tbody>

                                @foreach($bisesta as $item)
                                <tr>
                                    <td><span><i class="{{ $item->icon }}"></i></span></td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->description }} </td>
                                    <td width=30%><a href="{{ route('bisesta.edit',$item->id) }}" class="btn btn-info sm" title="Edit Data"><i class="fa fa-edit"></i></a>
                                        <a href="{{ route('bisesta.delete',$item->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete"><i class="fa fa-trash"></i></a>


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
                        <h3 class="box-title">Add विशेषता</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">


                            <form action="{{ route('bisesta.store') }}" method="post">
                                @csrf


                                <div class="form-group">
                                    <h5>Title: <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="title" class="form-control">

                                        @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Description: <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="description" class="form-control">
                                        @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Icon: <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="icon" class="form-control" placeholder="ti-book">
                                        @error('icon')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

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