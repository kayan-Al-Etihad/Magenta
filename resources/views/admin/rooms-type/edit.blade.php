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
        <h1 class="m-0">Edit Room Type</h1>

    </div>
</div>
<div class="container-fluid page__container">


    <div class="card card-form">
        <div class="row no-gutters">
            <div class="col-lg-8 card-form__body card-body">

            <form id="category_form" action="{{ route('room-type.update', $roomType->id ) }}" method="post">
                {{ csrf_field() }}
                @csrf
                @method('PATCH')
                <div class="form-group  {{ $errors->has('name') ? 'has-error' : '' }} ">
                    <label for="title">Room Type Name</label>
                    <input name="name"
                            maxlength="21"
                            value="{{ old('name', optional($roomType ?? null)->name) }}" required
                            id="title"
                           type="text"
                           class="form-control"
                           placeholder="Category Name">
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                </div>
               <div class="col-lg-4 card-body">
                 <div class="btn-group">
                <button type="submit" class="btn btn-info ">SAVE</button>
                <a href="{{ route('room-type.index') }}" class="btn  btn-dark mx-1">Back</a>
             </div>
              </div>

           </form>
           @if (\Session::has('message'))
           <div class="alert alert-success">
              <ul>
                 <li>{!! \Session::get('message') !!}</li>
              </ul>
           </div>
        @endif
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
