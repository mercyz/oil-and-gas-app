@extends('layouts.backend')
<style type="text/css">
	.bt-trash{
    position: absolute;
    top: 0;
    right: 14px;
    line-height: 25px;
    border: medium none;
    width: 25px;
    height: 25px;
    opacity: 1;
    text-align: center;
    background: #c6454a;
    color: #fff;
    padding-left: 6px;
    transition: all .5s ease-in-out;
}
.bt-trash:hover{
	background:#fff;
	color:#c6454a;
}
</style>
@section('content')
   <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Edit Project <small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Edit Project</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="#">project</a>
                        </li>
                    </ol>
                </nav>
            </div>
       </div>
    </div>
    <!-- END Hero -->

        <!-- Page Content -->
    <div class="content">
        <!-- Your Block -->
        <div class="block">
            <div class="block-header">
                <h3 class="block-title">Edit Project</h3>
            </div>
            <div class="block-content">
               
			@if($errors->any())
			<div class="alert alert-danger d-flex align-items-center justify-content-between">	
				<ul class="flex-fill">
					@foreach($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif

		<form action="{{route('updateproject', $project->id)}}" method="POST" class="mb-5" enctype="multipart/form-data">
			@csrf
            {{ method_field('patch')}}
			<div class="form-group">
				<label for="title">Project Name</label>
				<input type="text" name="name" class="form-control {{$errors->has('name')? 'is-invalid': ''}}" value="{{$project->name}}" placeholder="Name">
			</div>
			
			<div class="form-group">
				<label for="description">Project Description</label>
				<textarea type="text" id="article-ckeditor" name="description" placeholder="Description" rows="5" class="form-control {{$errors->has('description')?'is-invalid': ''}}" >{{$project->description}}</textarea>
			</div>
			<div class="form-group">
				<label class="d-block" for="featuredimage">project Image</label>
				<input type="file" name="productimage[]" multiple accept="image/*"  placeholder="Image">
			</div>
			<div class="form-group">
				<label>Project Images</label>
				<div class="block-content-2">
					<div class="row items-push js-gallery img-fluid-100 js-gallery-enabled">
						@foreach($project->projectImage as $image)
						<div class="col-md-6 col-lg-4 col-xl-3">
							<img width="221" height="180" class="img-fluid" src="{{asset($image->uploadpath)}}">
							<button type="button" class="bt-trash" data-id="{{$image->id}}"><i class="fa fa-trash"></i></button>
						</div>
						@endforeach
					</div>
				</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Update Project</button>
			</div>
		</form>
     </div>
    </div>
   <!-- END Your Block -->
 </div>
    <!-- END Page Content -->
<script type="text/javascript">
	const pickImage = document.querySelector('.block-content-2');
	const reloadDom = document.querySelector('data-remove-image');
	pickImage.addEventListener('click', doSomething);

	function doSomething(e) {
		e.preventDefault();
		const url = "{{route('deleteImage', $project->id)}}";
		const findMatch = (el) => {
			if (el.classList.contains('bt-trash'))
				return el;
			if (el === pickImage) return false
			return findMatch(el.parentElement);
		}
		let btn = findMatch(e.target);
		if(!btn){
			return "";		}
		const formData = new FormData();
		formData.append('_token', '{{csrf_token()}}');
		formData.append('id', btn.getAttribute('data-id'));
		if(btn) {
			fetch(url, {
				method: 'POST',
				headers: {
					'X-Requested-With': 'XMLHttpRequest',
				},
				body: formData,
			})
			.then(function(res){
				btn.parentElement.outerHTML = "";
			});
		}

	}

</script>
@endsection