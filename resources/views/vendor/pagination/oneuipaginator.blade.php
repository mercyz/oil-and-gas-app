@if($paginator->hasPages())
	<ul class="pagination">
		{{-- Previous Page Link --}}
		@if ($paginator->onFirstPage())
			<li class="paginate_button page-item previous disabled" id="DataTables_Table_3_previous"><a href="#" aria-controls="DataTables_Table_3" data-dt-idx="0" tabindex="0" class="page-link"><i class="fa fa-angle-left"></i></a></li>
		@else
		<li class="paginate_button page-item previous" id="DataTables_Table_3_previous"><a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-controls="DataTables_Table_3" data-dt-idx="0" tabindex="0" class="page-link"><i class="fa fa-angle-left"></i></a></li>
		@endif
		  {{-- Next Page Link --}}
		@if ($paginator->hasMorePages())
		<li class="paginate_button page-item next" id="DataTables_Table_3_next"><a href="{{ $paginator->nextPageUrl() }}" aria-controls="DataTables_Table_3" data-dt-idx="5" tabindex="0" class="page-link"><i class="fa fa-angle-right"></i></a></li>
		@else
		<li class="paginate_button page-item disabled" id="DataTables_Table_3_next"><a href="{{ $paginator->nextPageUrl() }}" aria-controls="DataTables_Table_3" data-dt-idx="5" tabindex="0" class="page-link"><i class="fa fa-angle-right"></i></a></li>
		@endif
	</ul>	
@endif