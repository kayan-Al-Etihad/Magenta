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
        <h1 class="m-0">Add Room</h1>
    </div>
</div>
<div class="container-fluid page__container">


    <div class="card card-form">
        <div class="row no-gutters">
            <div class="col-lg-8 card-form__body card-body">

            <form id="category_form" action="{{ route('rooms.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group  {{ $errors->has('name') ? 'has-error' : '' }} ">
                    <label for="title">Room Name</label>
                    <input name="name"
                            maxlength="21"
                            value="{{old('name')}}" required
                            id="title"
                           type="text"
                           class="form-control"
                           placeholder="Room Name">
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                </div>
                <div class="form-group  {{ $errors->has('rooms_type_id') ? 'has-error' : '' }} ">
                    <label for="title">Room Type</label>
                    <select class="form-control" name="rooms_type_id" id="title">
                        <option value="">Choose Room Type</option>
                        @foreach ($roomType as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                    <span class="text-danger">{{ $errors->first('rooms_type_id') }}</span>
                </div>
                <div class="form-group  {{ $errors->has('price') ? 'has-error' : '' }} ">
                    <label for="title">Price</label>
                    <input name="price"
                            maxlength="21"
                            value="{{old('price')}}" required
                            id="title"
                           type="text"
                           class="form-control"
                           placeholder="price">
                    <span class="text-danger">{{ $errors->first('price') }}</span>
                </div>
                <div class="form-group  {{ $errors->has('description') ? 'has-error' : '' }} ">
                    <label for="title">Description</label>
                           <textarea name="description" class="form-control" value="{{old('description')}}" required id="title" cols="30" rows="10">
                            {{old('description')}}
                           </textarea>
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                </div>
                <div class="form-group  {{ $errors->has('embeded_code') ? 'has-error' : '' }} ">
                    <label for="title">Embeded code</label>
                           <textarea name="embeded_code" class="form-control" value="{{old('embeded_code')}}" required id="title" cols="30" rows="10">
                            {{old('embeded_code')}}
                           </textarea>
                    <span class="text-danger">{{ $errors->first('embeded_code') }}</span>
                </div>
               <div class="col-lg-4 card-body">
                 <div class="btn-group">
                <button type="submit" class="btn btn-info ">SAVE</button>
                <a href="{{ route('rooms.index') }}" class="btn  btn-dark mx-1">Back</a>
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
