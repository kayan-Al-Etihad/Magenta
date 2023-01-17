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

        <h1 class="m-0">Rooms type</h1>
    </div>
</div>

<div class="container-fluid page__container">

    <div class="card card-form">
        <div class="row no-gutters">

            <div class="col-lg-12 card-form__body border-left">
                @if ($message = Session::get('status'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif

                <div data-toggle="lists"
                     data-lists-values='["js-lists-values-employee-name", "js-lists-values-employee-title"]'
                     class="table-responsive border-bottom">
                    <table class="table mb-0 thead-border-top-0 table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Created at</th>
                                <th >Action</th>
                            </tr>
                        </thead>
                        <tbody class="list"
                               id="products">
                            @foreach($roomType as $type)

                            <tr>
                                <td >{{ $type->id }}</td>
                                <td >{{ $type->name }}</td>
                                <td >{{ $type->created_at->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ route('room-type.edit', $type->id) }}" class="btn  btn-dark mx-1">Edit</a>
                                    <div class="btn-group">
                                        <form action="{{ route('room-type.destroy', $type->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                           <button class="btn btn-xs btn-danger delete_me" data-id="{{ $type->id }}">
                                              <i class="ace-icon fa fa-trash-o bigger-120">Delete</i></i>
                                           </button>
                                        </form>
                                     </div>
                                </td>
                            </tr>

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
