@extends('layout.admin.app')
@section('content')
   <div class="container-fluid page__heading-container">
      <div class="page__heading">
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
               <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>
               <li class="breadcrumb-item">UI Components</li>
               <li class="breadcrumb-item active" aria-current="page">Add 3D-Model Products</li>
            </ol>
         </nav>

         <h1 class="m-0 mt-5">Add 3D-Model</h1>
      </div>
   </div>

   <div class="container-fluid page__container">
      <div class="card card-form">
         <div class="row no-gutters">
            {{-- ========================add Products=============================== --}}
            <form method="post" action="{{ route('product3d.store') }}" id="product_form" enctype="multipart/form-data">
               @csrf
               @method('post')
               <div class="row">
                  <div class="col-xs-12 col-md-12 col-lg-12 mt-5">

                     <div class="row">
                        <div class="form-group col-md-6 col-lg-6 col-xs-12">
                           <label class="control-label no-padding-right" for="product_name"> Product Name </label>
                           <div class="clearfix">
                              <input placeholder="Product Name" name="product_name" value="{{ old('product_name') }}"
                                 id="product_name" class="form-control" type="text">
                           </div>
                        </div>
                        <div class="form-group col-md-6 col-lg-6 col-xs-12">
                           <label class="control-label no-padding-right" for="made_in"> Made IN: </label>
                           <div class="clearfix">
                              <input placeholder="Made IN" name="made_in" value="{{ old('made_in') }}" id="made_in"
                                 class="form-control" type="text">
                           </div>
                        </div>
                     </div>

                     <div class="row">
                        <div class="form-group col-md-6 col-lg-3 col-xs-12">
                           <label class=" control-label no-padding-right" for="brand_id">Choose your product
                              ranking</label>
                           <div class="clearfix">
                              <select name="product_ranking" id="product_ranking" class="form-control">
                                 <option value="" disabled selected>Choose your product ranking</option>
                                 @foreach ($productRank as $ranking)
                                     <option value="{{ $ranking->brand_id }}">{{ $ranking->product_name }}</option>
                                  @endforeach
                              </select>
                           </div>
                        </div>
                        <div class="form-group col-md-6 col-lg-3 col-xs-12">
                           <label class=" control-label no-padding-right" for="brand_id">Choose your brands</label>
                           <div class="clearfix">
                              <select name="brand_id" id="brand_id" class="form-control">
                                 <option value="" disabled selected>Choose your brands</option>
                                 @foreach ($productBrand as $brand)
                                     <option {{ old('brand_id') == $brand->brand_id ? 'selected' : '' }}
                                        value="{{ $brand->brand_id }}">{{ $brand->brand_name }}</option>
                                  @endforeach
                              </select>
                           </div>
                        </div>
                        <div class="form-group col-md-6 col-lg-6  col-xs-12">
                           <label class=" control-label no-padding-right" for="product_slug"> Product Slug </label>
                           <div class="clearfix">
                              <input placeholder="Product Slug" id="product_slug" name="product_slug"
                                 value="{{ old('product_slug') }}" class="form-control" type="text">
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="row form-group col-xs-12 col-md-12 col-lg-12">
                     <div class="form-group col-xs-6 col-md-6 col-lg-3">
                        <label class=" control-label no-padding-right" for="sale_price"> Sell Price </label>
                        <div class="clearfix">
                           <input placeholder="Sell Price" name="sale_price" value="{{ old('sale_price') }}"
                              id="sale_price" class="form-control" min="0" type="number">
                        </div>
                     </div>
                     <div class="form-group col-xs-6 col-md-6 col-lg-3">
                        <label class=" control-label no-padding-right" for="buy_price"> Buy Price </label>
                        <div class="clearfix">
                           <input placeholder="Buy Price" name="buy_price" value="{{ old('buy_price') }}" id="buy_price"
                              class="form-control" min="0" type="number">
                        </div>
                     </div>
                     <div class="form-group col-xs-6 col-md-6 col-lg-3">
                        <label class=" control-label no-padding-right" for="quantity">Quantity</label>
                        <div class="clearfix">
                           <input placeholder="Quantity" type="number" value="{{ old('quantity') }}" min="0"
                              name="quantity" class="form-control" id="quantity">
                        </div>
                     </div>
                     <div class="form-group col-xs-6 col-md-6 col-lg-3">
                        <label class=" control-label no-padding-right" for="quantity">sku</label>
                        <div class="clearfix">
                           <input placeholder="sku" type="number" value="{{ old('quantity') }}" min="0"
                              name="sku" class="form-control" id="sku">
                        </div>
                     </div>
                     <div class="form-group col-xs-6 col-md-6 col-lg-3">
                        <label for="weight">Weight</label>
                        <div class="clearfix">
                           <input placeholder="weight" type="number" value="{{ old('weight') }}" min="0"
                              name="weight" class="form-control" id="weight">
                        </div>
                     </div>
                  </div>


                  <div class="row">
                     <div class="col-xs-12 form-group col-md-12 col-lg-5 ml-1 mt-0">
                        <label for="description">Description</label>
                        <div class="clearfix">
                           <textarea id="description" rows="4" class="form-control" style="resize: none;" name="description">{{ old('description') }}</textarea>
                        </div>
                     </div>

                     <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="center col-xs-6 col-sm-6 col-lg-8 col-md-6">
                           <div class="form-group {{ $errors->has('cover') ? 'has-error' : '' }}">
                              <label class="bolder bigger-110 " for="brand_image">Cover</label>
                              {{-- <input type="file" name="cover" class="form-control" id="cover"> --}}
                              <input type="file" name="folder" class="form-control" id="cover">
                              <span class="text-danger">{{ $errors->first('cover') }}</span>
                           </div>
                        </div>
                     </div>
                  </div>

                  <hr>
                  <div class="form-group" style="margin: 3%">
                     <div class="btn-group btn-group-justified">
                        <div class="btn-group">
                           <input type="submit" class="btn btn-info" value="SAVE">
                        </div>
                        <div class="btn-group">
                           <a class="btn btn-danger" onclick="history.back()">BACK</a>
                        </div>
                     </div>
                  </div>

               </div>
            </form>
         </div>
      </div>
   </div>

   </div>




@section('extra_js')
   {{-- <script type="text/javascript">
      // show items
      function showMe() {
         jQuery(".available0").toggle();
      }

      function showDiscount() {
         jQuery(".div-discount").toggle();
      }

      // <!-- add site map of the page -->
      jQuery(document).one('load', function(e) {
         jQuery("#site_map").append(
            "<i class='ace-icon fa '></i><a href='{{ route('product.create') }}' class='click_me'>Create Product</a>"
            );
         // e.isImmediatePropagationStopped()
      });
   </script> --}}

   <!-- load cover image -->
   {{-- <script type="text/javascript">
      function readURL(input) {
         if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
               $('#show_image').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
         }
      }

      $("#cover").change(function() {
         readURL(this);
      });
   </script> --}}

   <!--FRONT VALIDATION -->
   {{-- <script type="text/javascript">
      jQuery(document).ready(function() {
         jQuery(function($) {
            $("#product_form").validate({
               errorElement: 'div',
               errorClass: 'help-block',
               focusInvalid: false,
               ignore: "",
               rules: {
                  product_name: "required",
                  product_slug: "required",
                  buy_price: {
                     required: true
                  },
                  sale_price: {
                     required: true
                  },
                  quantity: {
                     required: true
                  },
                  made_in: "required",
                  description: "required",
                  colors: "required",
                  brand_id: "required",
                  categories: "required",
               },
               messages: {},


               highlight: function(e) {
                  $(e).closest('.form-group').removeClass('has-info').addClass('has-error');
               },

               success: function(e) {
                  $(e).closest('.form-group').removeClass('has-error'); //.addClass('has-info');
                  $(e).remove();
               },

               errorPlacement: function(error, element) {
                  if (element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
                     var controls = element.closest('div[class*="col-"]');
                     if (controls.find(':checkbox,:radio').length > 1) controls.append(error);
                     else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
                  } else if (element.is('.select2')) {
                     error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
                  } else if (element.is('.chosen-select')) {
                     error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
                  } else error.insertAfter(element.parent());
               },

               submitHandler: function(form) {},
               invalidHandler: function(form) {}
            });

            $('#modal-wizard-container').ace_wizard();
            $('#modal-wizard .wizard-actions .btn[data-dismiss=modal]').removeAttr('disabled');

            $(document).one('ajaxloadstart.page', function(e) {
               //in ajax mode, remove remaining elements before leaving page
               $('[class*=select2]').remove();
            });
         })
      })
   </script> --}}

   {{-- send date with AJAX --}}
   {{-- @if (env('APP_AJAX'))
      <script type="text/javascript">
         $(document).ready(function() {
            $("#product_form").submit(function(e) {
               e.preventDefault();
               var form = $(this);
               var form_data = new FormData(this);
               // check if the input is valid
               // if (!form.valid()) return false;
               $.ajaxSetup({
                  headers: {
                     'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
               });
               $.ajax({
                  url: "{{ route('product.store') }}",
                  method: "post",
                  enctype: 'multipart/form-data',
                  data: form_data,
                  contentType: false,
                  cache: false,
                  processData: false,
                  beforeSend: function() {
                     $(".preview").toggle();
                  },
                  success: function(data) {
                     if (data.success === true) {
                        //show loading image ,reset forms ,clear gallery
                        $(".preview").hide();
                        $("#product_form")[0].reset();
                        $(".gallery").empty();
                        alert(data.message);
                        //   window.location.replace($('#redirect-route').val());
                     }
                  },
                  error: function(request, status, error) {
                     json = $.parseJSON(request.responseText);
                     if (json.success === false) {
                        alert(json.message);
                        $(".preview").hide();
                        return;
                     }
                     $(".preview").hide();
                     $("#error_result").empty();
                     $.each(json.errors, function(key, value) {
                        $('.alert-danger').show().append('<p>' + value + '</p>');
                     });
                     $('html, body').animate({
                           scrollTop: $("#error_result").offset().top,
                        },
                        500,
                     )
                     // $("#result").html('');
                  }
               });
            });
         });
      </script>
   @endif --}}
   <!-- show selected images -->



@stop

@endsection
