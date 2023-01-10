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
                    <li class="breadcrumb-item active">Comments</li>
                </ol>
            </nav>
            <h1 class="m-0">Comments</h1>
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
                    <tr>

             

                  
                        
                        <th>Comment</th>
                        <th >USER</th>
                        <th >PRODUCT</th>
                        <th >Created At</th>
                        <th >operatins</th>
                        {{-- <th style="width: 100px; text-align: right;">
                            <div class="dropdown pull-right">
                                <a href="#"
                                   data-toggle="dropdown"
                                   class="dropdown-toggle">Bulk</a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="javascript:void(0)"
                                       class="dropdown-item"><i class="material-icons icon-18pt mr-1">work</i> Set Price</a>
                                    <a href="javascript:void(0)"
                                       class="dropdown-item"><i class="material-icons icon-18pt mr-1">archive</i> Archive</a>
                                </div>
                            </div>
                        </th> --}}
                    </tr>
                </thead>
                <tbody class="list"
                       id="products">

                    {{-- @forelse($comments as $key => $comment) --}}
                    @foreach($comments as $comment)

                    <tr>
                        
                        <td>
                            <div >{{ $comment->comment }}</div>
                        </td>
                        {{-- <td>
                            <img src="{{ $comment->comment }}"
                                 alt="product"
                                 style="width:35px"
                                 class="rounded mr-2">
                            <a href="#"></a>
                        </td> --}}
                        {{-- <td style="width: 120px;"
                            class="text-center">
                            10 items</td> --}}
                        <td >{{ $comment->commentable->product_name }}</td>
                        <td >

                           {{ $comment->commentable->product_name }}

                        </td>

                        <td >{{ $comment->created_at }}</td>
                        <td>
                            
                            
                            
                            <div class="btn-group">
                                <form>
                                   <button class="btn btn-xs btn-danger delete_me" data-id="{{ $comment->id }}">
                                      <i class="ace-icon fa fa-trash-o bigger-120">Delete</i></i>
                                   </button>
                                </form>
                                @if(!$comment->approved)
                                   <form>
                                      <button class="btn btn-success btn-xs approved_me" title="approved"
                                              data-route="{{ route('comment.approve',$comment->id) }}">
                                         <i class="ace-icon fa fa-thumbs-up bigger-120"></i>
                                      </button>
                                   </form>
                                @endif
                             </div>
           
                        </td>
                    </tr>

                    @endforeach

                </tbody>
            </table>
        </div>

        <div class="card-body text-right">
            {{ $comments->links() }}
            {{-- 15 <span class="text-muted">of 25</span> <a href="#"class="text-muted-light"><i class="material-icons ml-1">arrow_forward</i></a> --}}
        </div>

    </div>
</div>

</div>



 @endsection   