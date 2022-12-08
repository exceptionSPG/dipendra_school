@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Notice List <span class="text-danger "> {{ count($notices) }}</span></h4>

                    <a href="{{ route('notice.add') }}" class="btn btn-primary" style="float: right;">Add Notice</a><span></span>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">All Notices</h4>


                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Notice Date</th>
                                    <th>Title</th>
                                    <th>Detail</th>
                                    <th>Action</th>
                                </tr>
                            </thead>


                            <tbody>
                                @php($i = 1)
                                @foreach($notices as $item)
                                <tr>
                                    <td>{{ $i++}}</td>
                                    <td>{{ $item->notice_date }}</td>

                                    <td>{{ $item->title }}</td>
                                    <td>{!! Str::limit($item->description,50) !!}</td>


                                    <td>
                                        <a href="{{ route('notice.edit',$item->id) }}" class="btn btn-info sm" title="Edit Data"><i class="fas fa-edit"> </i></a>
                                        <a href="{{ route('notice.delete',$item->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete"><i class="fas fa-trash-alt"> </i></a>
                                    </td>

                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->





    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->


@endsection