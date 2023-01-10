@extends('layout.admin.app')
@section('content')

<div class="container-fluid page__heading-container">
    <div class="page__heading">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>
                <li class="breadcrumb-item">UI Components</li>
                <li class="breadcrumb-item active"
                    aria-current="page">Tables</li>
            </ol>
        </nav>

        <h1 class="m-0">Category</h1>
    </div>
</div>

<div class="container-fluid page__container">

    <div class="card card-form">
        <div class="row no-gutters">
         
            <div class="col-lg-8 card-form__body border-left">

                <div data-toggle="lists"
                     data-lists-values='["js-lists-values-employee-name", "js-lists-values-employee-title"]'
                     class="table-responsive border-bottom">
                    <table class="table mb-0 thead-border-top-0">
                        <thead class="bg-white">
                            <tr>
                                <th colspan="2">Category name</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                          


                            @foreach($main_categories as $category)
                                <th data-id="{{ $category->category_id }}"><b>{{ $category->category_name }}</b>
                                   @if($category->children->count())
                                      @include('admin.category._indexSub', ['subs' => $category->children])
                                   @endif
                                </th>
                             @endforeach
                             
                     

                   

                     
                       
                        

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

</div>

@endsection