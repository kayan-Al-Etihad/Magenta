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
            {{-- 
            <div class="m-3">
                <div class="row">
                    <div class="col-md-4">
                        <select name="#"
                                class="form-control">
                            <option value="-1">All</option>
                            <option value="1">Hats</option>
                            <option value="2">Coats</option>
                            <option value="3">Jeans</option>
                            <option value="4">T-Shirt</option>
                            <option value="5">Other</option>
                        </select>
                    </div>
                    <div class="col-md-8">
                        <div class="search-form search-form--light">
                            <input type="text"
                                    class="form-control search"
                                    placeholder="Search">
                            <button class="btn"
                                    type="button"
                                    role="button"><i class="material-icons">search</i></button>
                                </div>
                            </div>
                        </div>
                    </div> --}}

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
                  {{-- <th class="center">Employee Name</th> --}}
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
         <div class="card-body text-right">
            {{ $orders->links() }}
            {{-- 15 <span class="text-muted">of 25</span> <a href="#"
                class="text-muted-light"><i class="material-icons ml-1">arrow_forward</i>
            </a> --}}
         </div>
      </div>
   </div>
@endsection
