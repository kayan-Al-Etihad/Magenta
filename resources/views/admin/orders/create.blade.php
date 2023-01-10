@extends('layout.admin.app')
@section('content')

   <div class="container-fluid page__heading-container">
      <div class="page__heading">
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
               <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>
               <li class="breadcrumb-item">order</li>
               <li class="breadcrumb-item active" aria-current="page">new order</li>
            </ol>
         </nav>

         <h1 class="m-0">Add New order</h1>
      </div>
   </div>

   <div class="container-fluid page__container">
      <div class="card card-form">
         <div class="row no-gutters">
            <form method="post" action="{{ route('order.store') }}" id="product_form" enctype="multipart/form-data">
               @csrf
               @method('post')
               <div class="row w-ful">

                  <div class="col-xs-12 col-md-12 col-lg-12 pt-3 ">
                     <label class="control-label ml-2 bg-secondary rounded px-1 pt-0 text-white"> address : </label>
                     <div class="row">
                        <div class="for inputForm col-xs-6 col-md-6 col-lg-3">
                           <label class=" control-label no-padding-right" for="name">name</label>
                           <div class="clearfix">
                              <input placeholder="name" name="name" value="{{ old('name') }}" id="name"
                                 class="form-control" min="0" type="text">
                           </div>
                           @error('name')
                              <span class="text-danger">{{ $message }}</span>
                           @enderror
                        </div>
                        <div class="form-group col-xs-6 col-md-6 col-lg-3">
                           <label class=" control-label no-padding-right" for="surname">surname</label>
                           <div class="clearfix">
                              <input placeholder="surname" name="surname" value="{{ old('surname') }}" id="surname"
                                 class="form-control" min="0" type="text">
                           </div>
                           @error('surname')
                              <span class="text-danger">{{ $message }}</span>
                           @enderror
                        </div>
                        <div class="form-group col-xs-6 col-md-6 col-lg-3">
                           <label class=" control-label no-padding-right" for="state">state</label>
                           <div class="clearfix">
                              <input placeholder="state" name="state" value="{{ old('state') }}" id="state"
                                 class="form-control" min="0" type="text">
                           </div>
                           @error('state')
                              <span class="text-danger">{{ $message }}</span>
                           @enderror
                        </div>
                        <div class="form-group col-xs-6 col-md-6 col-lg-3">
                           <label class=" control-label no-padding-right" for="city">city</label>
                           <div class="clearfix">
                              <input placeholder="city" type="text" value="{{ old('city') }}" min="0"
                                 name="city" class="form-control" id="city">
                              @error('city')
                                 <span class="text-danger">{{ $message }}</span>
                              @enderror
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="form-group col-xs-6 col-md-6 col-lg-3">
                           <label for="area">area</label>
                           <div class="clearfix">
                              <input placeholder="area" type="text" value="{{ old('area') }}" min="0"
                                 name="area" class="form-control" id="area">
                              @error('area')
                                 <span class="text-danger">{{ $message }}</span>
                              @enderror
                           </div>
                        </div>
                        <div class="form-group col-xs-6 col-md-6 col-lg-3">
                           <label for="street">street</label>
                           <div class="clearfix">
                              <input placeholder="street" type="text" value="{{ old('street') }}" min="0"
                                 name="street" class="form-control" id="street">
                              @error('street')
                                 <span class="text-danger">{{ $message }}</span>
                              @enderror
                           </div>
                        </div>
                        <div class="form-group col-xs-6 col-md-6 col-lg-3">
                           <label for="phone_number">phone Number</label>
                           <div class="clearfix">
                              <input placeholder="phone Number" type="text" value="{{ old('phone_number') }}"
                                 min="0" name="phone_number" class="form-control" id="phone_number" required>
                              @error('phone_number')
                                 <span class="text-danger">{{ $message }}</span>
                              @enderror
                           </div>
                        </div>
                        <div class="form-group col-xs-6 col-md-6 col-lg-3">
                           <label for="number">number</label>
                           <div class="clearfix">
                              <input placeholder="number" type="text" value="{{ old('number') }}"
                                 name="number" class="form-control" id="number">
                              @error('number')
                                 <span class="text-danger">{{ $message }}</span>
                              @enderror
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="form-group col-xs-6 col-md-6 col-lg-3">
                           <label for="postal_code">postal_code</label>
                           <div class="clearfix">
                              <input placeholder="postal_code" type="text" value="{{ old('postal_code') }}"
                                 min="0" name="postal_code" class="form-control" id="postal_code">
                              @error('postal_code')
                                 <span class="text-danger">{{ $message }}</span>
                              @enderror
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="col-xs-12 col-md-12 col-lg-12 pt-3 ">
                     <label class="control-label ml-2 bg-secondary rounded px-1 pt-0 text-white"> payment status : </label>
                     <div class="form-group col-md-6 col-lg-6 col-xs-12">
                        <label class="control-label no-padding-right" for="Payments">Payments status :</label>
                        <div class="clearfix">
                           <select name="Payments" id="Payments" class="form-control">
                              <option value="" disabled selected>Payments</option>
                              <option value="0">Invalid</option>
                              <option value="1">Completed</option>
                           </select>
                        </div>
                     </div>
                  </div>

                  <div class="col-xs-12 col-md-12 col-lg-12 pt-3 ">
                     <label class="control-label ml-2 bg-secondary rounded px-1 pt-0 text-white"> order : </label>

                     <div class="row">
                        <div class="form-group col-md-6 col-lg-6 col-xs-12">
                           <label class="control-label no-padding-right" for="order_status">order status</label>
                           <div class="clearfix">
                              <select name="order_status" id="order_status" class="form-control">
                                 <option value="" disabled selected>order status</option>
                                 <option value="0">INVALID</option>
                                 <option value="1">VALID</option>
                                 <option value="2">NOTHING</option>
                              </select>
                           </div>
                        </div>
                        <div class="form-group col-md-6 col-lg-6 col-xs-12">
                           <label class=" control-label no-padding-right" for="Price"> Total Price </label>
                           <div class="clearfix">
                              <input placeholder="Total Price" id="total_price" name="total_price"
                                 value="{{ old('total_price') }}" class="form-control" type="text">
                              @error('total_price')
                                 <span class="text-danger">{{ $message }}</span>
                              @enderror
                           </div>
                        </div>
                     </div>

                     <div class="row">
                        <div class="form-group col-md-6 col-lg-6 col-xs-12">
                           <label class=" control-label no-padding-right" for="client_name"> clint name </label>
                           <div class="clearfix">
                              <input placeholder="client_name" id="client_name" name="client_name"
                                 value="{{ old('client_name') }}" class="form-control" type="text">
                              @error('client_name')
                                 <span class="text-danger">{{ $message }}</span>
                              @enderror
                           </div>
                        </div>

                        <div class="form-group col-md-6 col-lg-6 col-xs-12">
                           <label class=" control-label no-padding-right" for="email"> email : </label>
                           <div class="clearfix">
                              <input placeholder="email" id="email" name="email"
                                 value="{{ old('email') }}" class="form-control" type="text">
                              @error('email')
                                 <span class="text-danger">{{ $message }}</span>
                              @enderror
                           </div>
                        </div>
                     </div>

                     <div class="row">
                        <div class="form-group col-md-6 col-lg-6 col-xs-12">
                           <label for="details">more details</label>
                           <div class="clearfix">
                              <textarea name="details" id="details" rows="3" class="form-control" name="details" style="resize: none;">
                                 {{ old('details') }}
                              </textarea>
                           </div>
                           @error('total_price')
                              <span class="text-danger">{{ $message }}</span>
                           @enderror
                        </div>
                     </div>
                  </div>

                  <div class="col-xs-12 col-md-12 col-lg-12 pt-3 ">
                     <label class="control-label ml-2 bg-secondary rounded px-1 pt-0 text-white"> Gift card :</label>
                     <div class="form-group col-md-6 col-lg-6 col-xs-12">
                        <label class=" control-label no-padding-right" for="gift_name"> Gift name </label>
                        <div class="clearfix">
                           <input placeholder="gift name" id="gift_name" name="gift_name"
                              value="{{ old('gift_name') }}" class="form-control" type="text">
                           @error('gift_name')
                              <span class="text-danger">{{ $message }}</span>
                           @enderror
                        </div>
                     </div>
                  </div>

                  <hr>
                  <div class="form-group col-xs-12 col-md-12 col-lg-12 ml-3 pb-3">
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
            {{-- @if (\Session::has('success'))
               <div class="alert alert-success">
                  <ul>
                     <li>{!! \Session::get('success') !!}</li>
                  </ul>
               </div>
            @endif --}}
         </div>
      </div>


   </div>

   </div>




@section('extra_js')
   <script type="text/javascript">
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
   </script>

   <!-- load cover image -->
   <script type="text/javascript">
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
   </script>

   <!--FRONT VALIDATION -->
   <script type="text/javascript">
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
   </script>

   {{-- send date with AJAX --}}
   @if (env('APP_AJAX'))
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
   @endif
   <!-- show selected images -->



@stop

@endsection
