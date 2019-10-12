@extends('layouts.backend')
@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Add Product <small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Add Product</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="#">product</a>
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
            <h3 class="block-title">Add Product</h3>
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

    <form action={{route('storeproduct')}} method="Post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Product Name</label>
            <input type="text" name="name" class="form-control {{$errors->has('name')? 'is-invalid': ''}}" placeholder="Name">
        </div>
        <div class="form-group">
            <label for="description">Product Description</label>
            <textarea type="text" id="article-ckeditor" name="description" placeholder="Description" rows="5" class="form-control {{$errors->has('description')?'is-invalid': ''}}" ></textarea>
        </div>
        <div class="form-group">
            <label class="d-block" for="featuredimage">Product Image</label>
            <input type="file" name="productimage[]" multiple accept="image/*" /> 
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Add Product</button>
        </div>
    </form>
 </div>
</div>
   <!-- END Your Block -->
</div>
    <!-- END Page Content -->
@endsection