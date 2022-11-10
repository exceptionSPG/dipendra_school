@extends('admin.admin_master')
@section('admin')








<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0"> Committees List <span class="text-danger">{{ count($committees) }}</span></h4>



                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Committees All</h4>


                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Thumbnail</th>
                                    <th>Name</th>
                                    <th>About</th>
                                    <th>Action</th>

                                </tr>
                            </thead>


                            <tbody>

                                @foreach($committees as $item)
                                <tr>
                                    <td width=25%><img src="{{ asset($item->thumbnail) }}" alt="" style="width: 60px; height: 50px;"></td>
                                    <td width=25%>{{ $item->name }}</td>
                                    <td width=25%>{!! Str::limit($item->about,200) !!} </td>
                                    <td width=25%><a href="{{ route('committee.edit',$item->id) }}" class="btn btn-info sm" title="Edit Data"><i class="fa fa-edit"></i></a>
                                        <!-- <a href="{{ route('bisesta.delete',$item->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete"><i class="fa fa-trash"></i></a> -->


                                    </td>

                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->

            <!-- -----------------Add Brand Col -->

        </div> <!-- end row -->





    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->



@endsection