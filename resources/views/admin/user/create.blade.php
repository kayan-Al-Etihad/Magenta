@extends('layout.admin.app')
@section('content')

<div class="container-fluid page__heading-container">
    <div class="page__heading">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>
                
                <li class="breadcrumb-item active"
                    aria-current="page">Users</li>
            </ol>
        </nav>

        <h1 class="m-0">Add User</h1>
    </div>
</div>

<div class="container-fluid page__container">

    <div class="card card-form">
        <div class="row no-gutters">
     
            <div class="col-lg-8 card-form__body card-body">
                <form id="user_form" action="{{ route('user.store') }}" method="post" enctype="multipart/form-data" >
                    {{ csrf_field() }}

                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }} ">


                        <label class="bolder bigger-110" for="name">Name</label>
                        <input type="text" name="name" maxlength="21" id="name" placeholder="Name"
                        value="{{ old('name')}}" required class="form-control">
                       <span class="text-danger">{{ $errors->first('name') }}</span>
                    </div>


                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }} ">
                        <label class="bolder bigger-110" for="email">Email:</label>
                        <input type="email" name="email" maxlength="21" id="email" placeholder="Email"
                        value="{{old('email')}}" required class="form-control">
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    </div>


                    @can('role-create')
                    <div class="form-group {{ $errors->has('role') ? 'has-error' : '' }}">
                        <label class="bolder bigger-110" for="role">Role:</label>
                        <select class="form-control select2" name="roles" id="role" multiple>
                            <option value="" selected>NORMAL USER</option>
                            @forelse($roles as $role)
                               <option value="{{ $role->id }}" {{ $role->id == old('role') ? 'selected' : '' }}>{{ $role->name }}</option>
                               @empty
                            @endforelse
                         </select>
                         <span class="text-danger">{{ $errors->first('role') }}</span>
                    </div>
                    @endcan


                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                        <label for="password" class="bolder bigger-110">{{ __('Password') }}</label>
                           <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                           @error('password')
                           <span class="invalid-feedback text-danger" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                     </div>
                     <div class="form-group ">
                        <label for="password_confirm" class="bolder bigger-110">{{ __('Confirm Password') }}</label>
                        <input id="password_confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                     </div>

                     <div class="form-group">
                        <div class="btn-group btn-group-justified">
                           <div class="btn-group">
                              <input type="submit" class="btn btn-primary " value="SAVE">
                           </div>
                           <div class="btn-group">
                              <a class="btn btn-danger" onclick="history.back()">BACK</a>
                           </div>
                        </div>
                     </div>

                    {{-- <button type="submit"
                            class="btn btn-primary">Submit</button> --}}
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