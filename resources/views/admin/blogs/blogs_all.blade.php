@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Blog List <span class="text-danger "> {{ count($blogs) }}</span></h4>

                    <a href="{{ route('blogs.add') }}" class="btn btn-primary" style="float: right;">Add Blog</a><span></span>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Blogs All</h4>


                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Detail</th>
                                    <th>Date</th>
                                    <th>Action</th>

                                </tr>
                            </thead>


                            <tbody>
                                @php($i = 1)
                                @foreach($blogs as $item)
                                <tr>
                                    <td>{{ $i++}}</td>
                                    <td><img src="{{ asset($item->image) }}" alt="{{ $item->title }} Photo" style="width:60px; height:60px;"></td>
                                    <td>{{ $item->title }}</td>

                                    <td>{{ $item->author }}</td>
                                    <td>{!! Str::limit($item->detail,50) !!}</td>
                                    <td>{{ $item->date }}</td>


                                    <td>
                                        <a href="{{ route('blogs.edit',$item->id) }}" class="btn btn-info sm" title="Edit Data"><i class="fas fa-edit"> </i></a>
                                        <a href="{{ route('blogs.delete',$item->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete"><i class="fas fa-trash-alt"> </i></a>
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