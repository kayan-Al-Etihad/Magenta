@extends('layout.admin.app')
@section('title')
   @lang('models/products.plural') @lang('ext.list')
@stop
@section('content')


   <div class="container-fluid page__heading-container">
         <div class="page__heading d-flex align-items-center">
            <div class="flex">
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0">
                     <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>
                     <li class="breadcrumb-item active">Orders</li>
                  </ol>
               </nav>
               <h1 class="m-0">Orders</h1>
            </div>
         </div>
      </div>

   <div class="container-fluid page__container">
      <div class="card">
         <div class="table-responsive">
            <table class="table mb-0 thead-border-top-0 table-striped">
               <thead>
                  <th class="center">ID</th>
                  <th class="center">Order Status</th>
                  <th class="center">Track Code</th>
                  <th class="center">Payments</th>
                  <th class="center">Address</th>
                  <th class="center">Customer User</th>
                  <th class="center">Client Name</th>
                  <th class="center">Client Phone, Email</th>
                  <th class="center">Total Price</th>
                  <th class="center">Gift Card</th>
                  <th class="center">Date</th>
                  <th class="center">Operations</th>
               </thead>
               <tbody class="list" id="products">
                  @include('admin.orders._data')
               </tbody>
            </table>
         </div>
      </div>
   </div>
   </div>

@endsection