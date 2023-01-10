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
        <a href="{{ asset('admin/product/create') }}"
           class="btn btn-success ml-3">Add Product</a>
    </div>
</div>

<div class="container-fluid page__container">

    <div class="card-group">
        <div class="card card-body text-center">

            <div class="d-flex flex-row align-items-center">
                <div class="card-header__title m-0"> <svg xmlns="http://www.w3.org/2000/svg" width="30" height="25" fill="currentColor" class="bi bi-bag-check-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zm-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                  </svg> All Orders</div>
                <div class="text-amount ml-auto">42</div>
            </div>
        </div>
        <div class="card card-body text-center">
            <div class="d-flex flex-row align-items-center">
                <div class="card-header__title m-0"> <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-send-check-fill" viewBox="0 0 16 16">
                    <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 1.59 2.498C8 14 8 13 8 12.5a4.5 4.5 0 0 1 5.026-4.47L15.964.686Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z"/>
                    <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-1.993-1.679a.5.5 0 0 0-.686.172l-1.17 1.95-.547-.547a.5.5 0 0 0-.708.708l.774.773a.75.75 0 0 0 1.174-.144l1.335-2.226a.5.5 0 0 0-.172-.686Z"/>
                  </svg> sent</div>
                <div class="text-amount ml-auto">311</div>
            </div>
        </div>
        <div class="card card-body text-center">
            <div class="d-flex flex-row align-items-center">
                <div class="card-header__title m-0"> <svg xmlns="http://www.w3.org/2000/svg" width="30" height="25" fill="currentColor" class="bi bi-bag-plus-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zM8.5 8a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V12a.5.5 0 0 0 1 0v-1.5H10a.5.5 0 0 0 0-1H8.5V8z"/>
                  </svg> New Orders </div>
                <div class="text-amount ml-auto">78</div>
                
            </div>
        </div>
        <div class="card card-body text-center">
            <div class="d-flex flex-row align-items-center">
                <div class="card-header__title m-0"> <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-hand-thumbs-down-fill" viewBox="0 0 16 16">
                    <path d="M6.956 14.534c.065.936.952 1.659 1.908 1.42l.261-.065a1.378 1.378 0 0 0 1.012-.965c.22-.816.533-2.512.062-4.51.136.02.285.037.443.051.713.065 1.669.071 2.516-.211.518-.173.994-.68 1.2-1.272a1.896 1.896 0 0 0-.234-1.734c.058-.118.103-.242.138-.362.077-.27.113-.568.113-.856 0-.29-.036-.586-.113-.857a2.094 2.094 0 0 0-.16-.403c.169-.387.107-.82-.003-1.149a3.162 3.162 0 0 0-.488-.9c.054-.153.076-.313.076-.465a1.86 1.86 0 0 0-.253-.912C13.1.757 12.437.28 11.5.28H8c-.605 0-1.07.08-1.466.217a4.823 4.823 0 0 0-.97.485l-.048.029c-.504.308-.999.61-2.068.723C2.682 1.815 2 2.434 2 3.279v4c0 .851.685 1.433 1.357 1.616.849.232 1.574.787 2.132 1.41.56.626.914 1.28 1.039 1.638.199.575.356 1.54.428 2.591z"/>
                  </svg> Not Complete</div>
                <div class="text-amount ml-auto">78</div>
            </div>
        </div>
    </div>
    <h3 class="m-0">Payments:</h3>

    <div class="row card-group-row">
        <div class="col-xl-3 col-md-6 card-group-row__col">
            <div class="card card-group-row__card card-body flex-row align-items-center">
                <div class="position-relative mr-2">
                    <div class="text-center fullbleed d-flex align-items-center justify-content-center flex-column z-0">
                        <h3 class="text-success mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-cash-stack" viewBox="0 0 16 16">
                            <path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1H1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                            <path d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V5zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2H3z"/>
                          </svg></h3>
                        
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
                    <div class="text-amount">20</div>
                    <div class="text-muted mt-1">All</div>
                    <!-- <div class="text-stats text-success">31.5% <i class="material-icons">arrow_upward</i></div> -->
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 card-group-row__col">
            <div class="card card-group-row__card card-body flex-row align-items-center">
                <div class="position-relative mr-2">
                    <div class="text-center fullbleed d-flex align-items-center justify-content-center flex-column z-0">
                        <h3 class="text-danger mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16">
                            <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                            <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z"/>
                          </svg></h3>
                        {{-- <small class="text-uppercase">Month</small> --}}
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
                    <div class="text-amount">4</div>
                    <div class="text-muted mt-1">Invalid Payments</div>
                    <!-- <div class="text-stats text-success">51.5% <i class="material-icons">arrow_upward</i></div> -->
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 card-group-row__col">
            <div class="card card-group-row__card card-body flex-row align-items-center">
                <div><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-calendar2-week" viewBox="0 0 16 16">
                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z"/>
                    <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4zM11 7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                  </svg></div>
                  <canvas width="90"
                  height="90"
                  class="position-relative z-1"
                  data-toggle="progress-chart"
                  data-progress-chart-value="68"
                  data-progress-chart-color="success"
                  data-progress-chart-tone="400"></canvas>
                <div class="flex">
                    <div class="text-amount">5</div>
                    <div class="text-muted mt-1">This week</div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 card-group-row__col">
            <div class="card card-group-row__card card-body flex-row align-items-center">
                <div><i class="material-icons text-success icon-48pt mr-2">check_circle</i></div>
                
                <div class="flex">
                    <div class="h4 mb-0">4</div>
                    <div class="text-muted mt-1">Successful Payments</div>
                </div>
            </div>
        </div>
    </div>

    <h3 class="m-0">Users</h3>
  
    <div class="card-group">
        <div class="card card-body text-center">

            <div class="d-flex flex-row align-items-center">
                <div class="card-header__title m-0"> <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                  </svg>  Users </div>
                <div class="text-amount ml-auto">42</div>
            </div>
        </div>
        <div class="card card-body text-center">
            <div class="d-flex flex-row align-items-center">
                <div class="card-header__title m-0"> <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                    <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z"/>
                  </svg> Employees </div>
                <div class="text-amount ml-auto">311</div>
            </div>
        </div>
        <div class="card card-body text-center">
            <div class="d-flex flex-row align-items-center">
                <div class="card-header__title m-0"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-fill-add" viewBox="0 0 16 16">
                    <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                    <path d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z"/>
                  </svg> New User</div>
                <div class="text-amount ml-auto">78</div>
            </div>
        </div>

    </div>







    <h3 class="m-0">Products</h3>
  
    <div class="card-group">
        <div class="card card-body text-center">

            <div class="d-flex flex-row align-items-center">
                <div class="card-header__title m-0"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-bag-fill" viewBox="0 0 16 16">
                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z"/>
                  </svg>  All products </div>
                <div class="text-amount ml-auto">42</div>
            </div>
        </div>
        <div class="card card-body text-center">
            <div class="d-flex flex-row align-items-center">
                <div class="card-header__title m-0"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-bag-check" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                  </svg>  Available Products
                </div>
                <div class="text-amount ml-auto">311</div>
            </div>
        </div>
        <div class="card card-body text-center">
            <div class="d-flex flex-row align-items-center">
                <div class="card-header__title m-0"> <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-bag-heart" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5Zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0ZM14 14V5H2v9a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1ZM8 7.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z"/>
                  </svg> Discounted Products</div>
                <div class="text-amount ml-auto">78</div>
            </div>
        </div>
        <div class="card card-body text-center">
            <div class="d-flex flex-row align-items-center">
                <div class="card-header__title m-0"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-plus-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zM8.5 8a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V12a.5.5 0 0 0 1 0v-1.5H10a.5.5 0 0 0 0-1H8.5V8z"/>
                  </svg> last week products
                </div>
                <div class="text-amount ml-auto">78</div>
            </div>
        </div>

    </div>

    <div class="row">
        {{-- <div class="col-lg-7">
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
        </div> --}}
        <div class="col-lg-5">
            <h3>Popular Products : </h3>
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
                        @foreach ($popular_products as $pro)
                            <div class="list-group-item d-flex align-items-center px-0">
                                <div class="mr-3 flex"> <i class="material-icons icon-18pt icon-muted">contacts</i>  {{ $pro->product_name }}</div>
                                <div class="mr-3 text-dark-gray">{{ $pro->created_at }}</div>
                                <div><a href="">&dollar;{{ $pro->sale_price }}</a></div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="card-footer text-center">
                    <a class="text-muted"
                       href="/admin/product">View All ({{ $available_products }})</a>
                </div>

            </div>
        </div>

        {{-- feedback section --M --}}
        <div class="col-lg-7">
            <h3>feedback : </h3>
            <div class="card">
                
                <div class="card-header card-header-large bg-white d-flex align-items-center">
                    <div class="flatpickr-wrapper flex">
                        <div>
                            <h4 class="card-header__title">Not Aroved :</h4>
                        </div>
                    </div>
                    <i class="material-icons icon-muted">help_outline</i>
                </div>

                <div class="card-body py-0">
                    <div class="list-group list-group-small list-group-flush">
                        @foreach($feedbacks as $feedback)

                            
                                <div class="py-2 d-flex align-items-center px-0" style="border-bottom: 1px solid #eee;">
                                    <div class="mr-3 flex">{{ $feedback->feedback }}</div>
                                    <div class="mr-3 text-dark-gray">{{ $feedback->created_at->diffForHumans() }}</div>
                                    <div>
                                        <form class="" method="post" action="{{ route('feedback.destroy', $feedback->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" class="btn btn-danger btn-sm mx-0 float-start PY-3 px-3" value="Delete" />
                                        </form>
                            
                                        <a href="{{route('feedback.updateStatus', $feedback->id)}}"
                                            class="btn btn-sm btn-primary">aproved</a>
                                    </div>
                                </div>
                            
                            
                        @endforeach

                    </div>
                </div>

                <div class="card-footer text-center">
                    <a class="text-muted"
                       href="/admin/feedback">View All ({{ $feedbacksCount }})</a>
                </div>

            </div>
        </div>
    </div>
</div>

</div>




 @endsection   