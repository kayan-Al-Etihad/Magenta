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
                    <li class="breadcrumb-item active">Brand</li>
                </ol>
            </nav>
            <h1 class="m-0">Brands</h1>
        </div>
    </div>
</div>

<div class="container-fluid page__container">
    <div class="card">

        <div class="table-responsive">
            
  
   <table id="simple-table" class="table  table-bordered table-hover">
    <thead>
    <tr>
       <th class="center">
          #
       </th>
       <th class="center">Name</th>
       <th class="center">Slug</th>
       <th class="center">Photo</th>
       <th class="center">Description</th>
       <th class="center">operations</th>
    </tr>
    </thead>
    <tbody>
    @forelse($admin_brands as $key=> $brand)
       <tr>
          <td class="center">
             <label class="pos-rel">
                {{ $key+1 }}
                <input type="checkbox" class="ace">
                <span class="lbl"></span>
             </label>
          </td>
          <td class="">{{ $brand->brand_name }}</td>
          <td class="">{{ $brand->brand_slug }}</td>
          <td class="center">
             <img src="{{ $brand->src }}" alt="brand image" class="img-responsive img-thumbnail" >
          </td>
          <td class="">{{ $brand->brand_description }}</td>
          <td class="center">
             <div class="btn-group">
                <form>
                   @can('product-delete')
                      <button class="btn btn-xs btn-danger delete_me" data-id="{{ $brand->brand_id }}">Delete
                         <i class="ace-icon fa fa-trash-o bigger-120"></i>
                      </button>
                   @endcan
                   @can('product-edit')
                      <a class="btn btn-warning btn-xs click_me" title="Edit"
                         href="{{ route('brand.edit',$brand->brand_id) }}" data-id="{{ $brand->brand_id }}">Edit
                         <i class="ace-icon fa fa-pencil bigger-120"></i>
                      </a>
                   @endcan
                </form>
             </div>
          </td>
       </tr>
    @empty
       <tr>
          <td colspan="3">No Data</td>
       </tr>
    @endforelse
    </tbody>
 </table>
        </div>

        <div class="card-body text-right">
            {{ $admin_brands->links() }}
            {{-- 15 <span class="text-muted">of 25</span> <a href="#"
               class="text-muted-light"><i class="material-icons ml-1">arrow_forward</i></a> --}}
        </div>

    </div>
</div>

</div>



 @endsection   