@extends('layout.admin.app')
@section('content')

<div class="container-fluid page__heading-container">
    <div class="page__heading">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>
                <li class="breadcrumb-item">UI Components</li>
                <li class="breadcrumb-item active"
                    aria-current="page">Attribute</li>
            </ol>
        </nav>
        <h1 class="m-0">Add Attribute</h1>
    </div>
</div>
<div class="container-fluid page__container">


    <div class="card card-form">
        <div class="row no-gutters">
            <div class="col-lg-8 card-form__body card-body">

          
                <form id="attr_form_create" method="post" action="{{ route('attribute.store') }}">
                    @csrf
                    <!-- if isset $product it means it coming from route(attribute.createNew)  -->
                 
                       <div class="row">
                          <div class="col-sm-6">
                             @if (isset($product))
                                <span class="h3">product Name:</span><span class="h2 bolder"><a
                                           href="{{ route('product.show',$product->product_id) }}">{{ $product->product_name }}</a></span>
                                <input class="product_id" type="hidden" value="{{$product->product_id}}" name="product_id">
                             @else
                                <div class="form-group">
                                   <label for="form-field-select-3">Choose a Product:</label>
                                   <br/>
                                   <select class="chosen-select form-control product_id" name="product_id" id="form-field-select-3"
                                           data-placeholder="Choose a Product">
                                      <option value=""></option>
                                      @forelse($products as $product)
                                         <option value="{{ $product->product_id }}">{{ $product->product_name }}</option>
                                      @empty
                                         <option disabled="">NO DATA</option>
                                      @endforelse
                                   </select>
                                </div>
                             @endif
                          </div>
                          <div class="col-sm-6">
                             <div class="form-group">
                                <label for="attr_name" class="">Attribute Name:</label>
                                <input type="text" name="attr_name" id="attr_name" class="form-control"/>
                             </div>
                          </div>
                       </div>
                       <div class="center h3">Add Attribute Value:</div>
                       <div class="row">
                 
                          <div class="col-sm-3">
                             <button class="btn btn-info" id="add_val">Add Value</button>
                             <input class="btn btn-success" type="submit" value="SAVE">
                          </div>
                          <div class="col-sm-6" id="div_value">
                 
                             <div id="widget_value" class="widget-box">
                                <div class="widget-header">
                                   <h4 class="widget-title">Value:</h4>
                                   <span class="widget-toolbar">
                                      <a href="#" data-action="collapse">
                                         <i class="ace-icon fa fa-chevron-up"></i>
                                      </a>
                                      <a href="#" data-action="close">
                                         <i class="ace-icon fa fa-times"></i>
                                      </a>
                                   </span>
                                </div>
                                <div class="widget-body">
                                   <div class="widget-main center">
                                      <div class="form-group">
                                         <label for="value"></label>
                                         <input type="text" id="value" name="value[]" class="input form-control valuesCreate"
                                                placeholder="Value">
                                      </div>
                                   </div>
                                </div>
                             </div>
                 
                          </div>
                          <div class="col-sm-3"></div>
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