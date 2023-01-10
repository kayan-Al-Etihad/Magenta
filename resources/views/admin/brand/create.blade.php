@extends('layout.admin.app')
@section('content')

<div class="container-fluid page__heading-container">
    <div class="page__heading">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>
                <li class="breadcrumb-item">UI Components</li>
                <li class="breadcrumb-item active"
                    aria-current="page">Brand</li>
            </ol>
        </nav>
        <h1 class="m-0">Add Brands</h1>
    </div>
</div>
<div class="container-fluid page__container">


    <div class="card card-form">
        <div class="row no-gutters">
            <div class="col-lg-8 card-form__body card-body">

          
   <form id="brand_form"
   action="{{ isset($brand) ? route('brand.update',$brand->brand_id) : route('brand.store') }}"
   method="post" enctype="multipart/form-data"
>
{{ isset($brand) ? method_field('PUT') : '' }}
{{ csrf_field() }}
<div class="form-group {{ $errors->has('brand_name') ? 'has-error' : '' }}">
   <label class="bolder bigger-110" for="brand_name">Brand Name</label>
   <input type="text" name="brand_name" maxlength="21" id="brand_name" placeholder="Brand Name"
          value="{{ isset($brand) ? $brand->brand_name : old('brand_name')}}" required
          class="form-control">
   <span class="text-danger">{{ $errors->first('brand_name') }}</span>
</div>
<div class="form-group {{ $errors->has('brand_slug') ? 'has-error' : '' }}">
   <label class="bolder bigger-110" for="brand_slug">Brand Slug</label>
   <input type="text" name="brand_slug" maxlength="21" id="brand_slug" placeholder="Brand Slug"
          value="{{isset($brand) ? $brand->brand_slug :old('brand_slug')}}" required
          class="form-control">
   <span class="text-danger">{{ $errors->first('brand_slug') }}</span>
</div>

<div class="form-group {{ $errors->has('brand_description') ? 'has-error' : '' }}">
   <label class="bolder bigger-110" for="brand_description">Description</label>
   <textarea type="text" name="brand_description" id="brand_description" placeholder="Brand Slug" required
             class="form-control">{{isset($brand) ? $brand->brand_description :old('brand_description')}}</textarea>
   <span class="text-danger">{{ $errors->first('brand_description') }}</span>
</div>

@if (isset($brand) && $brand->brand_image != null)
   <input type="hidden" name="brand_image" value="{{ $brand->brand_image }}">
@endif
<img id="show_image" src="{{ isset($brand) ? $brand->src : '' }}" alt="" width="200" height="100" class="img-responsive img-thumbnail">
<div class="form-group {{ $errors->has('brand_image') ? 'has-error' : '' }}">
   <label class="bolder bigger-110" for="brand_image">Brand Image</label>
   <input type="file" name="brand_image" id="brand_image">
   <span class="text-danger">{{ $errors->first('brand_image') }}</span>
</div>

<div class="form-group">
   <div class="btn-group btn-group-justified">
      <div class="btn-group">
         <input type="submit" class="btn btn-info " value="SAVE">
      </div>
      <div class="btn-group">
         <a class="btn btn-danger" onclick="history.back()">BACK</a>
      </div>
   </div>
</div>
</form>
            </div>
        </div>
    </div>

<!-- <div class="card card-form">
<div class="row no-gutters">
<div class="col-lg-4 card-body">
<p><strong class="headings-color">Basic Information</strong></p>
<p class="text-muted">Edit your account details and settings.</p>
</div>
<div class="col-lg-8 card-form__body card-body">

</div>
</div>
</div> -->
</div>

</div>

@endsection