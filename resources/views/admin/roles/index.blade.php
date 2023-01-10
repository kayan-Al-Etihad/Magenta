@extends('layout.admin.app')
@section('content')



<div class="container-fluid page__heading-container">
    <div class="page__heading">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>
                <li class="breadcrumb-item">UI Components</li>
                <li class="breadcrumb-item active"
                    aria-current="page">Roles</li>
            </ol>
        </nav>

        <h1 class="m-0">Tables</h1>
    </div>
</div>

<div class="container-fluid page__container">
  

    <div class="card card-form">
        <div class="row no-gutters">
       
            {{-- <div class="col-lg-8 card-form__body"> --}}

                <div class="table-responsive border-bottom"
                     data-toggle="lists"
                     data-lists-values='["js-lists-values-employee-name"]'>


                    <table class="table mb-0 thead-border-top-0">
                        <thead>
                            <tr>

                                
                                <th>No</th>
                                <th >Name</th>
                                <th >Description</th>
                                <th >Action</th>
                                
                            </tr>
                        </thead>
                        <tbody
                               >

                            @foreach ($roles as $key => $role)
                            <tr>
                                <td>{{ ++$i }} </td>
                                <td><span class="badge badge-warning">{{ $role->name }}</span></td>
                                <td>{{ $role->description }}</td>
                              
                                <td> 
                                    <div class="btn-group">
                                       <a class="btn btn-info click_me" href="{{ route('roles.show',$role->id) }}">Show</a>
                                       @can('role-edit')
                                          <a class="btn btn-primary click_me" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                                       @endcan
                                       @can('role-delete')
                                          <button class="btn  btn-danger delete_role" title="Delete" data-id="{{ $role->id }}">Delete
                                             <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                          </button>
                                       @endcan
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            {{-- </div> --}}
        </div>
    </div>

</div>

</div>


@endsection