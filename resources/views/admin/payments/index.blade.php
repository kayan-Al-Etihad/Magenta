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
            <table id="simple-table" class="table table-hover table-responsive table-bordered">
               <thead class="table-header">
                  <tr class="info">
                     <td class="center">id</td>
                     <td class="center">User</td>
                     <td class="center">Order</td>
                     <td class="center">sub total</td>
                     <td class="center">Status</td>
                     <td class="center">Payment Status</td>
                     <td class="center">Data</td>
                     {{--         <td class="center">Operations</td> --}}
                  </tr>
               </thead>
               <tbody>
                  @forelse ($payments as $payment)
                     <tr>
                        <td class="center">{{ $payment->payment_id }}</td>
                        <td class="center">
                           @if ($payment->users)
                              <a href="{{ route('user.show', $payment->user_id) }}">{{ $payment->users->name }}</a>3
                           @else
                              <span class="label label-default">GUEST</span>
                           @endif
                        </td>
                        <td class="center">
                           <a href="{{ route('order.show', $payment->order_id) }}">{{ $payment->order->track_code }}</a>
                        </td>
                        <td class="center">{{ $payment->sub_total }}</td>
                        <td class="center">
                           @if ($payment->status)
                              <span class="label label-success label-large">PAID</span>
                           @else
                              <span class="label label-danger label-large">NOT-PAID</span>
                           @endif

                        </td>
                        <td class="center">{{ $payment->payment_status }}</td>
                        <td class="center">{{ $payment->created_at }}</td>

                     </tr>


                  @empty
                     <tr>
                        <td colspan="9">NO Data</td>
                     </tr>
                  @endforelse
               </tbody>

            </table>

         </div>

         <div class="card-body text-right">
            {{-- {{ $payment->links() }} --}}
            {{-- 15 <span class="text-muted">of 25</span> <a href="#"
               class="text-muted-light"><i class="material-icons ml-1">arrow_forward</i></a> --}}
         </div>

      </div>
   </div>

   </div>



@endsection
