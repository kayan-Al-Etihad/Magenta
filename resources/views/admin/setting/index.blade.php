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

        <h1 class="m-0">Forms</h1>
    </div>
</div>

<div class="container-fluid page__container">


    <div class="card card-form" style="padding: 2%">
        <div class="row no-gutters">
            <form id="setting_form"
         action="{{ isset($setting) ? route('settings.update',$setting->setting_id) : route('settings.store') }}"
         method="post" enctype="multipart/form-data"
   >
      {{ isset($setting) ? method_field('PUT') : '' }}
      {{ csrf_field() }}

      <div class="form-group {{ $errors->has('site_title') ? 'has-error' : '' }}">
         <label class="bolder bigger-110" for="site_title">Site Title</label>
         <input type="text" name="site_title" maxlength="21" id="site_title" placeholder="Site Title"
                value="{{ isset($setting) ? $setting->site_title : old('site_title')}}" required
                class="form-control">
         <span class="text-danger">{{ $errors->first('site_title') }}</span>
      </div>

      <div class="form-group {{ $errors->has('site_phone') ? 'has-error' : '' }}">
         <label class="bolder bigger-110" for="site_phone">Site Phone</label>
         <input type="text" name="site_phone" id="site_phone" placeholder="Site Phone"
                value="{{ isset($setting) ? $setting->site_phone : old('site_phone')}}" required
                class="form-control">
         <span class="text-danger">{{ $errors->first('site_phone') }}</span>
      </div>

      <div class="form-group {{ $errors->has('site_fax') ? 'has-error' : '' }}">
         <label class="bolder bigger-110" for="site_fax">Site fax</label>
         <input type="text" name="site_fax" id="site_fax" placeholder="Site fax"
                value="{{ isset($setting) ? $setting->site_fax : old('site_fax')}}" required
                class="form-control">
         <span class="text-danger">{{ $errors->first('site_fax') }}</span>
      </div>

      <div class="form-group {{ $errors->has('site_email') ? 'has-error' : '' }}">
         <label class="bolder bigger-110" for="site_email">Site Email</label>
         <input type="email" name="site_email" id="site_email" placeholder="Site Email"
                value="{{ isset($setting) ? $setting->site_email : old('site_email')}}" required
                class="form-control">
         <span class="text-danger">{{ $errors->first('site_email') }}</span>
      </div>

      <div class="form-group {{ $errors->has('site_address') ? 'has-error' : '' }}">
         <label class="bolder bigger-110" for="site_address">Site address</label>
         <input type="text" name="site_address" id="site_address" placeholder="Site address"
                value="{{ isset($setting) ? $setting->site_address : old('site_address')}}" required
                class="form-control">
         <span class="text-danger">{{ $errors->first('site_address') }}</span>
      </div>

      <div class="form-group {{ $errors->has('site_description') ? 'has-error' : '' }}">
         <label class="bolder bigger-110" for="site_description">Site Description</label>
         <textarea type="text" name="site_description" id="site_description" placeholder="site Description" required
                   class="form-control">{{isset($setting) ? $setting->site_description :old('site_description')}}</textarea>
         <span class="text-danger">{{ $errors->first('site_description') }}</span>
      </div>
      <div class="row">
         <div class="col-sm-5 col-xs-12">
            <div class="form-group" id="_logo">
               @if ($setting->site_logo)
                  <img src="{{ $setting->src  }}" alt="logo" class="img-thumbnail" width="100" height="200">
               @endif
            </div>
            <div class="form-group {{ $errors->has('site_logo') ? 'has-error' : '' }}">
               <label class="bolder bigger-110" for="site_logo">Site Logo</label>

               <input type="file" name="site_logo" id="site_logo" class="form-control">
               <span class="text-danger">{{ $errors->first('site_logo') }}</span>
            </div>
         </div>
         <div class="col-sm-2"></div>
         <div class="col-sm-5 col-xs-12">
            <div class="form-group" id="_icon">
               @if ($setting->site_icon)
                  <img src="{{ $setting->icon  }}" alt="icon" class="img-thumbnail" width="100" height="200">
               @endif
            </div>
            <div class="form-group {{ $errors->has('site_icon') ? 'has-error' : '' }}">
               <label class="bolder bigger-110" for="site_icon">Site icon</label>

               <input type="file" name="site_icon" id="site_icon" class="form-control">
               <span class="text-danger">{{ $errors->first('site_icon') }}</span>
            </div>
         </div>
      </div>
      <div class="row mt-5">
         <div class="col-sm-5 col-xs-12">
            <div class="form-group" id="_slider_image1">
               @if ($setting->slider_image1)
                  <img src="{{ asset('front-end-assets/img/slider/slider-2') }}/{{ $setting->slider_image1  }}" alt="slider_image1" class="img-thumbnail" width="100" height="200">
               @endif
            </div>
            <div class="form-group {{ $errors->has('slider_image1') ? 'has-error' : '' }}">
               <label class="bolder bigger-110" for="slider_image1">slider_image1</label>

               <input type="file" name="slider_image1" id="slider_image1" class="form-control">
               <span class="text-danger">{{ $errors->first('slider_image1') }}</span>
            </div>
         </div>
         <div class="col-sm-2"></div>
         <div class="col-sm-5 col-xs-12">
            <div class="form-group" id="_slider_image2">
               @if ($setting->slider_image2)
                  <img src="{{ asset('front-end-assets/img/slider/slider-2') }}/{{ $setting->slider_image2  }}" alt="slider_image2" class="img-thumbnail" width="100" height="200">
               @endif
            </div>
            <div class="form-group {{ $errors->has('slider_image2') ? 'has-error' : '' }}">
               <label class="bolder bigger-110" for="slider_image2">slider_image2</label>

               <input type="file" name="slider_image2" id="slider_image2" class="form-control">
               <span class="text-danger">{{ $errors->first('slider_image2') }}</span>
            </div>
         </div>
      </div>
      <div class="row mt-5">
         <div class="col-sm-5 col-xs-12">
            <div class="form-group" id="_slider_image3">
               @if ($setting->slider_image3)
                  <img src="{{ asset('front-end-assets/img/slider/slider-2') }}/{{ $setting->slider_image3  }}" alt="slider_image3" class="img-thumbnail" width="100" height="200">
               @endif
            </div>
            <div class="form-group {{ $errors->has('slider_image3') ? 'has-error' : '' }}">
               <label class="bolder bigger-110" for="slider_image3">slider_image3</label>

               <input type="file" name="slider_image3" id="slider_image3" class="form-control">
               <span class="text-danger">{{ $errors->first('slider_image3') }}</span>
            </div>
         </div>
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
