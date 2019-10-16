@extends('layouts.backend')

@section('content')
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">
                Staffs<small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
            </h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href=""> all staffs</a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="block">
	<div class="block-header">
	<h3 class="block-title">All Staffs<small> Record</small></h3>
	</div>
	<div class="block-content block-content-full">
	<!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
	<div id="DataTables_Table_3_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12"><div class="text-center bg-body-light py-2 mb-2"><div class="dt-buttons">   <button class="dt-button buttons-copy buttons-html5 btn btn-sm btn-primary" tabindex="0" aria-controls="DataTables_Table_3" type="button"><span>Copy</span></button> <button class="dt-button buttons-csv buttons-html5 btn btn-sm btn-primary" tabindex="0" aria-controls="DataTables_Table_3" type="button"><span>CSV</span></button> <button class="dt-button buttons-print btn btn-sm btn-primary" tabindex="0" aria-controls="DataTables_Table_3" type="button"><span>Print</span></button> </div></div></div></div><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="DataTables_Table_3_length"><label><select name="DataTables_Table_3_length" aria-controls="DataTables_Table_3" class="form-control form-control-sm"><option value="5">5</option><option value="10">10</option><option value="15">15</option><option value="20">20</option></select></label></div></div><div class="col-sm-12 col-md-6"><div id="DataTables_Table_3_filter" class="dataTables_filter"><label><input type="search" class="form-control form-control-sm" placeholder="Search.." aria-controls="DataTables_Table_3"></label></div></div></div><div class="row"><div class="col-sm-12"><table class="table table-bordered table-striped table-vcenter js-dataTable-buttons dataTable no-footer" id="DataTables_Table_3" role="grid" aria-describedby="DataTables_Table_3_info">
	<thead>
	    <tr role="row"><th class="text-center sorting_asc" style="width: 80px;" tabindex="0" aria-controls="DataTables_Table_3" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending">S/N</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_3" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Name</th><th class="d-none d-sm-table-cell sorting" style="width: 30%;" tabindex="0" aria-controls="DataTables_Table_3" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">Email</th><th class="d-none d-sm-table-cell sorting" style="width: 15%;" tabindex="0" aria-controls="DataTables_Table_3" rowspan="1" colspan="1" aria-label="Access: activate to sort column ascending">Access</th><th style="width: 15%;" class="sorting" tabindex="0" aria-controls="DataTables_Table_3" rowspan="1" colspan="1" aria-label="Registered: activate to sort column ascending">Registered</th></tr>
	</thead>
<tbody> 
	@foreach($staffs as $key => $staff)
	<tr role="row" class="odd">
	    <td class="text-center font-size-sm sorting_1">{{$key+1}}</td>
	    <td class="font-w600 font-size-sm">
	        <a href="be_pages_generic_blank.html">{{$staff->firstname}} {{$staff->lastname}}</a>
	    </td>
	    <td class="d-none d-sm-table-cell font-size-sm">
	        <em class="text-muted">{{$staff->email}}</em>
	    </td>
	    <td class="d-none d-sm-table-cell">
	        <div class="btn-group">
                <a href="{{route('staffDetails', $staff->id)}}" class="btn btn-sm btn-info js-tooltip-enabled">View</a>
                <a href="{{route('editStaff', $staff->id)}}" class="btn btn-sm btn-primary js-tooltip-enabled" ><i class="fa fa-fw fa-pencil-alt"></i></a>
                <form method="post" action="{{route('deleteStaff', $staff->id)}}">
                    @csrf
                    <input value="delete" type="hidden" name="_method">
	        	<button class="btn btn-sm btn-danger js-tooltip-enabled"><i class="fa fa-fw fa-times"></i></button>
                </form>
	        </div>
	    </td>
	    <td>
	        <em class="text-muted font-size-sm">{{\Carbon\Carbon::parse($staff->created_at)->diffForHumans()}}</em>
	    </td>
	</tr>
@endforeach
  	</tbody>
        </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="DataTables_Table_3_info" role="status" aria-live="polite">Page <strong>1</strong> of <strong>4</strong></div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_3_paginate"> {{ $staffs->links('vendor.pagination.oneuipaginator') }}</div></div></div></div>
    </div>
</div>
@endsection