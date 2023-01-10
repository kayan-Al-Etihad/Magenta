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

        <h1 class="m-0">Add Role</h1>
    </div>
</div>

<div class="container-fluid page__container">


    <div class="card card-form">
        <div class="row no-gutters">
            {{-- ++++++++++++++++++++++++add roles++++++++++++++++++++++++++ --}}
        
             
            
          
            <form id="role_form" action="{{ route('roles.update', $role->id) }}" method="post">
                @csrf
                @method('put')
          
                <div class="row">
                   <div style="margin: 4%">
                      <div class="form-group">
                         <label for="name"><strong>Name:</strong></label>
                         <input type="text" value="{{ $role->name }}" id="name" name="name" placeholder="name"
                                class="form-control">
                      </div>
                   </div>
                   <div style="margin: 4%">
                      <div class="form-group">
                         <label for="description"><strong>description:</strong></label>
                         <input type="text" value="{{ $role->description }}" id="description" name="description"
                                placeholder="description" class="form-control">
                      </div>
                   </div>
                   <div class="col-xs-12 col-sm-12 col-md-12" style="margin: 4%">
                      <div class="form-group">
                         <strong>Permission:</strong>
                         <br/>
                         @foreach($permission as $value)
                            <label>
                               <input type="checkbox" class="checkbox"
                                      {{in_array($value->id, $rolePermissions) ? 'checked' : ''}} name="permission[]"
                                      value="{{$value->id}}">
                               {{ $value->name }}</label>
                            <br/>
                         @endforeach
          
                      </div>
                   </div>
                   <div class="col-xs-12 col-sm-12 col-md-12 " style="margin: 4%">
                      <div class="form-group">
                         <div class="btn-group btn-group-justified">
                            <div class="btn-group">
                               <button type="submit" id="role_submit" class="btn btn-info">SAVE</button>
                            </div>
                            <div class="btn-group">
                               <a class="btn btn-danger" onclick="history.back()">BACK</a>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </form>
          
            {{-- ++++++++++++++++++++++++++++++++++++++++++++++++++ --}}

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