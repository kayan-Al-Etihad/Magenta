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

        <h1 class="m-0">Tables</h1>
    </div>
</div>

<div class="container-fluid page__container">
   

    <div class="card card-form">
        <div class="row no-gutters">
            <div class="col-lg-4 card-body">
                <p><strong class="headings-color">Search</strong></p>
                <p class="text-muted">Add search functionality to your tables with List.js. Please read the <a href="http://listjs.com/"
                       target="_blank">official plugin documentation</a> for a full list of options.</p>
            </div>
            <div class="col-lg-8 card-form__body">

                <div class="table-responsive border-bottom"
                     data-toggle="lists"
                     data-lists-values='["js-lists-values-employee-name"]'>

                    <div class="search-form search-form--light m-3">
                        <input type="text"
                               class="form-control search"
                               placeholder="Search">
                        <button class="btn"
                                type="button"><i class="material-icons">search</i></button>
                    </div>

                    <table class="table mb-0 thead-border-top-0">
                        <thead>
                            <tr>

                                <th>Employee</th>

                                <th style="width: 37px;">Status</th>
                                <th style="width: 120px;">Last Activity</th>
                                <th style="width: 51px;">Earnings</th>
                                <th style="width: 24px;"></th>
                            </tr>
                        </thead>
                        <tbody class="list"
                               id="staff02">

                            <tr>

                                <td>

                                    <span class="js-lists-values-employee-name">Michael Smith</span>

                                </td>

                                <td><span class="badge badge-warning">ADMIN</span></td>
                                <td><small class="text-muted">3 days ago</small></td>
                                <td>&dollar;12,402</td>
                                <td><a href=""
                                       class="text-muted"><i class="material-icons">more_vert</i></a></td>
                            </tr>
                            <tr>

                                <td>

                                    <span class="js-lists-values-employee-name">Connie Smith</span>

                                </td>

                                <td><span class="badge badge-success">USER</span></td>
                                <td><small class="text-muted">1 week ago</small></td>
                                <td>&dollar;1,943</td>
                                <td><a href=""
                                       class="text-muted"><i class="material-icons">more_vert</i></a></td>
                            </tr>
                            <tr>

                                <td>

                                    <span class="js-lists-values-employee-name">John Connor</span>

                                </td>

                                <td><span class="badge badge-primary">MANAGER</span></td>
                                <td><small class="text-muted">1 week ago</small></td>
                                <td>&dollar;1,943</td>
                                <td><a href=""
                                       class="text-muted"><i class="material-icons">more_vert</i></a></td>
                            </tr>

                            <tr>

                                <td>

                                    <span class="js-lists-values-employee-name">Michael Smith</span>

                                </td>

                                <td><span class="badge badge-warning">ADMIN</span></td>
                                <td><small class="text-muted">3 days ago</small></td>
                                <td>&dollar;12,402</td>
                                <td><a href=""
                                       class="text-muted"><i class="material-icons">more_vert</i></a></td>
                            </tr>
                            <tr>

                                <td>

                                    <span class="js-lists-values-employee-name">Connie Smith</span>

                                </td>

                                <td><span class="badge badge-success">USER</span></td>
                                <td><small class="text-muted">1 week ago</small></td>
                                <td>&dollar;1,943</td>
                                <td><a href=""
                                       class="text-muted"><i class="material-icons">more_vert</i></a></td>
                            </tr>
                            <tr>

                                <td>

                                    <span class="js-lists-values-employee-name">John Connor</span>

                                </td>

                                <td><span class="badge badge-primary">MANAGER</span></td>
                                <td><small class="text-muted">1 week ago</small></td>
                                <td>&dollar;1,943</td>
                                <td><a href=""
                                       class="text-muted"><i class="material-icons">more_vert</i></a></td>
                            </tr>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

   
</div>

</div>

@endsection