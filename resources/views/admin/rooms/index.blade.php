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

        <h1 class="m-0">Rooms</h1>
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
                                <th>rooms type</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>embeded code</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="list" id="products">
                            @foreach($rooms as $room)
                            <tr>
                                <td >{{ $room->id }}</td>
                                @php
                                    $type =$roomType->where('id', '==', $room->rooms_type_id)->first()
                                @endphp
                                <td >{{ $type->name }}</td>
                                <td >{{ $room->name }}</td>
                                <td >{{ $room->price }}</td>
                                <td >{{ $room->description }}</td>
                                <td >{{ $room->embeded_code }}</td>
                                <td >{{ $room->created_at->diffForHumans() }}</td>
                                <td>
                                    <a style="width: 72px" href="{{ route('rooms.edit', $room->id) }}" class="btn  btn-dark my-1">Edit</a>
                                    <div class="btn-group">
                                        <form action="{{ route('rooms.destroy', $room->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                           <button class="btn btn-xs btn-danger delete_me" data-id="{{ $room->id }}">
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
