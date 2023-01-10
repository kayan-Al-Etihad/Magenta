@extends('layout.admin.app')
@section('content')

<div class="container-fluid page__heading-container">
    <div class="page__heading">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>
                <li class="breadcrumb-item">UI Components</li>
                <li class="breadcrumb-item active"
                    aria-current="page">Forms</li>
            </ol>
        </nav>
        <h1 class="m-0">Add Category</h1>
    </div>
</div>
<div class="container-fluid page__container">


    <div class="card card-form">
        <div class="row no-gutters">
            <div class="col-lg-8 card-form__body card-body">

            <form id="category_form" action="{{ route('category.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group  {{ $errors->has('category_name') ? 'has-error' : '' }} ">
                    <label for="title">Category Name</label>
                    <input name="category_name"
                            maxlength="21"
                            value="{{old('category_name')}}" required
                            id="title"
                           type="text"
                           class="form-control"
                           placeholder="Category Name">
                    <span class="text-danger">{{ $errors->first('category_name') }}</span>
                </div>

                <div class="form-group" {{ $errors->has('category_slug') ? 'has-error' : '' }}>
                    <label  for="category_slug">Category Slug</label>
                    <input  name="category_slug"
                           maxlength="21"
                            id="category_slug"
                             placeholder="Category Slug"
                           type="text"
                           value="{{old('category_slug')}}" required
                           class="form-control">
                    <span class="text-danger">{{ $errors->first('category_slug') }}</span>
                </div>
                {{-- <div class="form-group">
                    <label for="maskSample03">Parent Category</label>
                    <input id="maskSample03"
                           type="text"
                           class="form-control">
                </div> --}}
                <div class="form-group {{ $errors->has('parent_id') ? 'has-error' : '' }}">
                    <label class="bolder bigger-110" for="Category">Parent Category </label>
                    <select name="parent_id" id="Category" class="form-control">
                       @if(count($allCategories) == 0)
                          <option disabled="">NO CATEGORIES</option>
                       @else
                          <option value="">Parent Category</option>
                          @foreach($allCategories as $Category)
                             <option value="{{ old('category_id',$Category->category_id) }}">
                                {{ !$Category->parent_id ? '--'.$Category->category_name : $Category->category_name }}
                             </option>
                          @endforeach
                       @endif
                    </select>
                    <span class="text-danger">{{ $errors->first('parent_id') }}</span>
                 </div>
               <div class="col-lg-4 card-body">
                 <div class="btn-group">
                <button type="submit" class="btn btn-info ">SAVE</button>
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