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

        <h1 class="m-0">Users</h1>
    </div>
</div>

<div class="container-fluid page__container">
    <div class="card card-form">
        <div class="row no-gutters">
            {{-- <div class="col-lg-4 card-body">
                <p><strong class="headings-color">Toggle Checkboxes</strong></p>
                <p class="text-muted">A tiny plugin which adds the ability to toggle all checkboxes within a table.</p>
            </div> --}}
            {{-- <div class="col-lg-8 card-form__body"> --}}

                <div class="table-responsive border-bottom"
                     data-toggle="lists"
                     data-lists-values='["js-lists-values-employee-name"]'>

                    <table class="table mb-0 thead-border-top-0">
                        <thead>
                            <tr>
                                {{-- <th style="width: 18px;">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox"
                                               class="custom-control-input js-toggle-check-all"
                                               data-target="#staff"
                                               id="customCheckAll">
                                        <label class="custom-control-label"
                                               for="customCheckAll"><span class="text-hide">Toggle all</span></label>
                                    </div>
                                </th> --}}
                                <th>ID</th>
                                <th>User Name</th>
                                <th style="width: 37px;">Status</th>
                                <th style="width: 120px;">Last Activity</th>
                                <th style="width: 51px;">Earnings</th>
                                <th style="width: 24px;"></th>
                            </tr>
                        </thead>
                        <tbody class="list"
                               id="staff">

                               
                            
                            <tr class="selected">

                                {{-- <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox"
                                               class="custom-control-input js-check-selected-row"
                                               checked=""
                                               id="customCheck1_1">
                                        <label class="custom-control-label"
                                               for="customCheck1_1"><span class="text-hide">Check</span></label>
                                    </div>
                                </td> --}}
                                @forelse($users as $user)
                                <td><span class="badge ">#{{ $user->user_id }}</span></td>
                                <td>
                                    
                                    <div class="media align-items-center">
                                        {{-- <div class="avatar avatar-xs mr-2">
                                            <img src="assets/images/256_luke-porter-261779-unsplash.jpg"
                                                 alt="Avatar"
                                                 class="avatar-img rounded-circle">
                                        </div> --}}
                                        <div class="media-body">

                                            <span class="js-lists-values-employee-name">{{ $user->name }}</span>

                                        </div>
                                    </div>

                                </td>

                                <td><span class="badge badge-warning">user</span></td>
                                <td><small class="text-muted">3 days ago</small></td>
                                <td>&dollar;12,402</td>
                                <td><a href=""
                                       class="text-muted"><i class="material-icons">more_vert</i></a></td>
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
<!-- // END drawer-layout__content -->



@endsection