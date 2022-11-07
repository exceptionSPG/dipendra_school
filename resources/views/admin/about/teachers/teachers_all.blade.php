@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">All Teachers List <span class="text-danger "> {{ count($teachers) }}</span></h4>

                    <a href="{{ route('teachers.add') }}" class="btn btn-primary" style="float: right;">Add Teacher</a><span></span>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Teachers All</h4>


                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>email</th>
                                    <th>Phone</th>
                                    <th>Action</th>

                                </tr>
                            </thead>


                            <tbody>
                                @php($i = 1)
                                @foreach($teachers as $item)
                                <tr>
                                    <td>{{ $i++}}</td>
                                    <td><img src="{{ asset($item->photo) }}" alt="{{ $item->name }} Photo" style="width:60px; height:60px;"></td>
                                    <td>{{ $item->name }}</td>

                                    <td>{{ $item->designation }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>
                                        <a href="{{ route('teachers.edit',$item->id) }}" class="btn btn-info sm" title="Edit Data"><i class="fas fa-edit"> </i></a>
                                        <a href="{{ route('teacher.delete',$item->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete"><i class="fas fa-trash-alt"> </i></a>
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