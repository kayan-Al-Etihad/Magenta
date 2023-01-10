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

        <h1 class="m-0">brands</h1>
    </div>
</div>

<div class="container-fluid page__container">
  

    <div class="card card-form">
        <div class="row no-gutters">
            <div class="col-lg-4 card-body">
                <p><strong class="headings-color">Sort Columns</strong></p>
                <p class="text-muted">Add sorting functionality to your tables with by List.js. Please read the <a href="http://listjs.com/"
                       target="_blank">official plugin documentation</a> for a full list of options.</p>
            </div>
            <div class="col-lg-8 card-form__body border-left">

                <div data-toggle="lists"
                     data-lists-values='["js-lists-values-employee-name", "js-lists-values-employee-title"]'
                     class="table-responsive border-bottom">
                    <table class="table mb-0 thead-border-top-0">
                        <thead class="bg-white">
                            <tr>
                                <th colspan="2">
                                    <a href="javascript:void(0)"
                                       class="sort"
                                       data-sort="js-lists-values-employee-name">Employee name</a>
                                    <a href="javascript:void(0)"
                                       class="sort"
                                       data-sort="js-lists-values-employee-title">Employee title</a>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="list">

                            <tr>
                                <td>
                                    <div class="media align-items-center">
                                        <div class="avatar avatar-sm mr-3">
                                            <img src="assets/images/256_rsz_1andy-lee-642320-unsplash.jpg"
                                                 alt="Avatar"
                                                 class="avatar-img rounded-circle">
                                        </div>
                                        <div class="media-body">
                                            <strong class="js-lists-values-employee-name">Jenell D. Matney</strong><br>
                                            <span class="text-muted js-lists-values-employee-title">Founder and CEO</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-right"><a href=""
                                       class="text-muted"><i class="material-icons">more_vert</i></a></td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="media align-items-center">
                                        <div class="avatar avatar-sm mr-3">
                                            <img src="assets/images/256_daniel-gaffey-1060698-unsplash.jpg"
                                                 alt="Avatar"
                                                 class="avatar-img rounded-circle">
                                        </div>
                                        <div class="media-body">
                                            <strong class="js-lists-values-employee-name">Sherri J. Cardenas</strong><br>
                                            <span class="text-muted js-lists-values-employee-title">Software Engineer</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-right"><a href=""
                                       class="text-muted"><i class="material-icons">more_vert</i></a></td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="media align-items-center">
                                        <div class="avatar avatar-sm mr-3">
                                            <img src="assets/images/256_jeremy-banks-798787-unsplash.jpg"
                                                 alt="Avatar"
                                                 class="avatar-img rounded-circle">
                                        </div>
                                        <div class="media-body">
                                            <strong class="js-lists-values-employee-name">Joseph S. Ferland</strong><br>
                                            <span class="text-muted js-lists-values-employee-title">Web Designer</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-right"><a href=""
                                       class="text-muted"><i class="material-icons">more_vert</i></a></td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="media align-items-center">
                                        <div class="avatar avatar-sm mr-3">
                                            <img src="assets/images/256_joao-silas-636453-unsplash.jpg"
                                                 alt="Avatar"
                                                 class="avatar-img rounded-circle">
                                        </div>
                                        <div class="media-body">
                                            <strong class="js-lists-values-employee-name">Bryan K. Davis</strong><br>
                                            <span class="text-muted js-lists-values-employee-title">Web Developer</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-right"><a href=""
                                       class="text-muted"><i class="material-icons">more_vert</i></a></td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="media align-items-center">
                                        <div class="avatar avatar-sm mr-3">
                                            <img src="assets/images/256_luke-porter-261779-unsplash.jpg"
                                                 alt="Avatar"
                                                 class="avatar-img rounded-circle">
                                        </div>
                                        <div class="media-body">
                                            <strong class="js-lists-values-employee-name">Elizabeth J. Ohara</strong><br>
                                            <span class="text-muted js-lists-values-employee-title">Business Analyst</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-right"><a href=""
                                       class="text-muted"><i class="material-icons">more_vert</i></a></td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="media align-items-center">
                                        <div class="avatar avatar-sm mr-3">
                                            <img src="assets/images/256_michael-dam-258165-unsplash.jpg"
                                                 alt="Avatar"
                                                 class="avatar-img rounded-circle">
                                        </div>
                                        <div class="media-body">
                                            <strong class="js-lists-values-employee-name">Kaci M. Langston</strong><br>
                                            <span class="text-muted js-lists-values-employee-title">Human Resources</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-right"><a href=""
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