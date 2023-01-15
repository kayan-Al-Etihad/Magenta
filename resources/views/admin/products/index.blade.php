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
                  <li class="breadcrumb-item active">Products</li>
               </ol>
            </nav>
            <h1 class="m-0">Products</h1>
         </div>
      </div>
   </div>
   <div class="container-fluid page__container">
      <div class="card">
         <div class="table-responsive">
            <table class="table mb-0 thead-border-top-0 table-striped">
               <thead>
                  <tr>
                     <th style="width: 30px;" class="text-center">#ID</th>
                     <th>Product</th>
                     <th>Name</th>
                     {{-- <th class="text-center">Stock</th> --}}
                     <th class="">Category</th>
                     <th class="text-right">Price</th>
                     <th class="text-right">operatins</th>
                  </tr>
               </thead>
               <tbody class="list" id="products">
                  @foreach ($products as $product)
                     <tr>
                        <td>
                           <div class="badge badge-soft-dark">{{ $product->product_id }}</div>
                        </td>
                        <td>
                           <img src="{{ $product->cover }}" alt="product" style="width:35px" class="rounded mr-2">
                           <a href="#"></a>
                        </td>
                        <td>{{ $product->product_name }}</td>
                        <td style="width:200px">
                           <a href="#">{{ $product->product_slug }}</a>
                        </td>
                        <td class="text-right">{{ $product->buy_price }}</td>
                        <td class="text-right"><a href="{{ route('product.edit', $product->product_id) }}"
                              class="btn btn-sm btn-primary">EDIT
                        </td>
                        <td>
                           <form class="" method="post"
                              action="{{ route('product.destroy', $product->product_id) }}">
                              @csrf
                              @method('DELETE')
                              <input onclick="return confirm('Are you sure you want to delete this Message?')"
                                 type="submit" class="btn btn-danger btn-sm mx-1 float-end PY-3 px-3" value="Delete" />
                           </form>
                        </td>
                     </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
         <div class="card-body text-right">
            {{ $products->links() }}
         </div>
      </div>
   </div>
   </div>



@endsection
