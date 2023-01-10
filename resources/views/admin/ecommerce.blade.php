@extends('layout.admin.app')
@section('content')



                        
<div class="container-fluid page__container">
    <div class="page__heading d-flex align-items-center">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active"
                        aria-current="page">E-commerce</li>
                </ol>
            </nav>
            <h1 class="m-0">E-commerce</h1>
        </div>
        <a href=""
           class="btn btn-success ml-3">Add Product</a>
    </div>
</div>

<div class="container-fluid page__container">

    <div class="card-group">
        <div class="card card-body text-center">

            <div class="d-flex flex-row align-items-center">
                <div class="card-header__title m-0"> <i class="material-icons icon-muted icon-30pt">assessment</i> Visits</div>
                <div class="text-amount ml-auto">3,642</div>
            </div>
        </div>
        <div class="card card-body text-center">
            <div class="d-flex flex-row align-items-center">
                <div class="card-header__title m-0"><i class="material-icons icon-muted icon-30pt">shopping_basket</i> Purchases</div>
                <div class="text-amount ml-auto">&dollar;12,311</div>
            </div>
        </div>
        <div class="card card-body text-center">
            <div class="d-flex flex-row align-items-center">
                <div class="card-header__title m-0"><i class="material-icons  icon-muted icon-30pt">perm_identity</i> Customers</div>
                <div class="text-amount ml-auto">78</div>
            </div>
        </div>
    </div>

    <div class="row card-group-row">
        <div class="col-xl-3 col-md-6 card-group-row__col">
            <div class="card card-group-row__card card-body flex-row align-items-center">
                <div class="position-relative mr-2">
                    <div class="text-center fullbleed d-flex align-items-center justify-content-center flex-column z-0">
                        <h3 class="text-danger mb-0">12%</h3>
                        <small class="text-uppercase">Today</small>
                    </div>
                    <canvas width="90"
                            height="90"
                            class="position-relative z-1"
                            data-toggle="progress-chart"
                            data-progress-chart-value="12"
                            data-progress-chart-color="danger"
                            data-progress-chart-tone="300"></canvas>
                </div>
                <!-- <div><i class="material-icons icon-muted icon-40pt mr-3">gps_fixed</i></div> -->
                <div class="flex">
                    <div class="text-amount">&dollar;1,020</div>
                    <div class="text-muted mt-1">Total Sales</div>
                    <!-- <div class="text-stats text-success">31.5% <i class="material-icons">arrow_upward</i></div> -->
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 card-group-row__col">
            <div class="card card-group-row__card card-body flex-row align-items-center">
                <div class="position-relative mr-2">
                    <div class="text-center fullbleed d-flex align-items-center justify-content-center flex-column z-0">
                        <h3 class="text-success mb-0">68%</h3>
                        <small class="text-uppercase">Month</small>
                    </div>
                    <canvas width="90"
                            height="90"
                            class="position-relative z-1"
                            data-toggle="progress-chart"
                            data-progress-chart-value="68"
                            data-progress-chart-color="success"
                            data-progress-chart-tone="400"></canvas>
                </div>
                <!-- <div><i class="material-icons icon-muted icon-40pt mr-3">monetization_on</i></div> -->
                <div class="flex">
                    <div class="text-amount">&dollar;6,670</div>
                    <div class="text-muted mt-1">Sales for June</div>
                    <!-- <div class="text-stats text-success">51.5% <i class="material-icons">arrow_upward</i></div> -->
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 card-group-row__col">
            <div class="card card-group-row__card card-body flex-row align-items-center">
                <div><i class="material-icons text-primary icon-48pt mr-2">account_circle</i></div>
                <div class="flex">
                    <div class="text-amount">87%</div>
                    <div class="text-muted mt-1">Sign-Up Percentage</div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 card-group-row__col">
            <div class="card card-group-row__card card-body flex-row align-items-center">
                <div><i class="material-icons text-success icon-48pt mr-2">check_circle</i></div>
                <div class="flex">
                    <div class="h4 mb-0">Network Stats</div>
                    <div class="text-muted mt-1">All systems working!</div>
                </div>
            </div>
        </div>
    </div>

    
    <div class="card card-form d-flex flex-column flex-sm-row">
        <div class="card-form__body card-body-form-group flex">
            <div class="row">
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label for="filter_name">Name</label>
                        <input id="filter_name"
                               type="text"
                               class="form-control"
                               placeholder="Search by name">
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label for="filter_category">Category</label><br>
                        <select id="filter_category"
                                class="custom-select"
                                style="width: 200px;">
                            <option value="all">All Categories</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label for="filter_stock">In stock?</label>
                        <div class="custom-control custom-checkbox mt-sm-2">
                            <input type="checkbox"
                                   class="custom-control-input"
                                   id="filter_stock"
                                   checked="">
                            <label class="custom-control-label"
                                   for="filter_stock">Yes</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="form-group"
                         style="width: 200px;">
                        <label for="filter_date">Order date</label>
                        <input id="filter_date"
                               type="text"
                               class="form-control"
                               placeholder="Select date ..."
                               value="13/03/2018 to 20/03/2018"
                               data-toggle="flatpickr"
                               data-flatpickr-mode="range"
                               data-flatpickr-alt-format="d/m/Y"
                               data-flatpickr-date-format="d/m/Y">
                    </div>
                </div>
            </div>
        </div>
        <button class="btn bg-white border-left border-top border-top-sm-0 rounded-top-0 rounded-top-sm rounded-left-sm-0"><i class="material-icons text-primary icon-20pt">refresh</i></button>
    </div>

    <div class="row">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center text-center mb-4">
                        <div class="border-right pr-4 mr-4">
                            <div class="mb-0">Total Views</div>
                            <div class="text-amount">4,412</div>
                        </div>
                        <div>
                            <div class="mb-0">Conv. Ratio</div>
                            <div class="text-amount">4%</div>
                        </div>
                        <div class="ml-auto">
                            <a href="#"
                               class="btn btn-primary">Export Data <i class="material-icons">file_download</i></a>
                        </div>
                    </div>
                    <div class="chart"
                         style="height: 295px;">
                        <canvas id="viewsChart">
                            <span style="font-size: 1rem;"><strong>Views</strong> area chart goes here.</span>
                        </canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header card-header-large bg-white d-flex align-items-center">
                    <div class="flatpickr-wrapper flex">
                        <div id="recent_orders_date"
                             data-toggle="flatpickr"
                             data-flatpickr-wrap="true"
                             data-flatpickr-static="true"
                             data-flatpickr-mode="range"
                             data-flatpickr-alt-format="d/m/Y"
                             data-flatpickr-date-format="d/m/Y">
                            <h4 class="card-header__title">Recent Orders</h4>
                            <a href="javascript:void(0)"
                               class="link-date"
                               data-toggle>13/03/2018 to 20/03/2018</a>
                            <input class="flatpickr-hidden-input"
                                   type="hidden"
                                   value="13/03/2018 to 20/03/2018"
                                   data-input>
                        </div>
                    </div>
                    <i class="material-icons icon-muted">help_outline</i>
                </div>
                <div class="card-body py-0">
                    <div class="list-group list-group-small list-group-flush">

                        <div class="list-group-item d-flex align-items-center px-0">
                            <div class="mr-3 flex"> <i class="material-icons icon-18pt icon-muted">contacts</i> Sherri J. Cardenas</div>
                            <div class="mr-3 text-dark-gray">3 days ago</div>
                            <div><a href="">&dollar;123</a></div>
                        </div>

                        <div class="list-group-item d-flex align-items-center px-0">
                            <div class="mr-3 flex"> <i class="material-icons icon-18pt icon-muted">contacts</i> Joseph S. Ferland</div>
                            <div class="mr-3 text-dark-gray">2 days ago</div>
                            <div><a href="">&dollar;246</a></div>
                        </div>

                        <div class="list-group-item d-flex align-items-center px-0">
                            <div class="mr-3 flex"> <i class="material-icons icon-18pt icon-muted">contacts</i> Bryan K. Davis</div>
                            <div class="mr-3 text-dark-gray">1 day ago</div>
                            <div><a href="">&dollar;369</a></div>
                        </div>

                        <div class="list-group-item d-flex align-items-center px-0">
                            <div class="mr-3 flex"> <i class="material-icons icon-18pt icon-muted">contacts</i> Elizabeth J. Ohara</div>
                            <div class="mr-3 text-dark-gray">4 hours ago</div>
                            <div><a href="">&dollar;492</a></div>
                        </div>

                        <div class="list-group-item d-flex align-items-center px-0">
                            <div class="mr-3 flex"> <i class="material-icons icon-18pt icon-muted">contacts</i> Kaci M. Langston</div>
                            <div class="mr-3 text-dark-gray">just now</div>
                            <div><a href="">&dollar;615</a></div>
                        </div>

                    </div>
                </div>
                <div class="card-footer text-center">
                    <a class="text-muted"
                       href="">View All (54)</a>
                </div>
            </div>
        </div>
    </div>

</div>

</div>




 @endsection   