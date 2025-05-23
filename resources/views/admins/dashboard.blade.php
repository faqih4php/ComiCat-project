@extends('admins.layouts.base')
@section('title')
Dashboard | Admin
@endsection
@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row">
      <div class="col-xxl-8 mb-6 order-0">
        <div class="card">
          <div class="d-flex align-items-start row">
            <div class="col-sm-7">
              <div class="card-body">
                <h5 class="card-title text-primary mb-3">Congratulations John! 🎉</h5>
                <p class="mb-6">You have done 72% more sales today.<br>Check your new badge in your profile.</p>

                <a href="javascript:;" class="btn btn-sm btn-label-primary">View Badges</a>
              </div>
            </div>
            <div class="col-sm-5 text-center text-sm-left">
              <div class="card-body pb-0 px-0 px-md-6">
                <img src="/assets/img/illustrations/man-with-laptop.png" height="175" class="scaleX-n1-rtl"
                  alt="View Badge User">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xxl-4 col-lg-12 col-md-4 order-1">
        <div class="row">
          <div class="col-lg-6 col-md-12 col-6 mb-6">
            <div class="card h-100">
              <div class="card-body pb-4">
                <span class="d-block fw-medium mb-1">Order</span>
                <h4 class="card-title mb-0">276k</h4>
              </div>
              <div id="orderChart" class="pb-3 pe-1"></div>
            </div>
          </div>
          <div class="col-lg-6 col-md-12 col-6 mb-6">
            <div class="card h-100">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between mb-4">
                  <div class="avatar flex-shrink-0">
                    <img src="/assets/img/icons/unicons/wallet-info.png" alt="wallet info" class="rounded">
                  </div>
                  <div class="dropdown">
                    <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">
                      <i class="icon-base bx bx-dots-vertical-rounded text-body-secondary"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                      <a class="dropdown-item" href="javascript:void(0);">View More</a>
                      <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                    </div>
                  </div>
                </div>
                <p class="mb-1">Sales</p>
                <h4 class="card-title mb-3">$4,679</h4>
                <small class="text-success fw-medium"><i class="icon-base bx bx-up-arrow-alt"></i>
                  +28.42%</small>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Total Revenue -->
      <div class="col-12 col-xxl-8 order-2 order-md-3 order-xxl-2 mb-6">
        <div class="card">
          <div class="row row-bordered g-0">
            <div class="col-lg-8">
              <div class="card-header d-flex align-items-center justify-content-between">
                <div class="card-title mb-0">
                  <h5 class="m-0 me-2">Total Revenue</h5>
                </div>
                <div class="dropdown">
                  <button class="btn p-0" type="button" id="totalRevenue" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="icon-base bx bx-dots-vertical-rounded icon-lg text-body-secondary"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="totalRevenue">
                    <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                    <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                    <a class="dropdown-item" href="javascript:void(0);">Share</a>
                  </div>
                </div>
              </div>
              <div id="totalRevenueChart" class="px-3"></div>
            </div>
            <div class="col-lg-4">
              <div class="card-body px-xl-9 py-12 d-flex align-items-center flex-column">
                <div class="text-center mb-6">
                  <div class="btn-group">
                    <button type="button" class="btn btn-label-primary">
                      <script>
                        document.write(new Date().getFullYear() - 1);
                      </script>
                    </button>
                    <button type="button" class="btn btn-label-primary dropdown-toggle dropdown-toggle-split"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="javascript:void(0);">2021</a></li>
                      <li><a class="dropdown-item" href="javascript:void(0);">2020</a></li>
                      <li><a class="dropdown-item" href="javascript:void(0);">2019</a></li>
                    </ul>
                  </div>
                </div>

                <div id="growthChart"></div>
                <div class="text-center fw-medium my-6">62% Company Growth</div>

                <div class="d-flex gap-11 justify-content-between">
                  <div class="d-flex">
                    <div class="avatar me-2">
                      <span class="avatar-initial rounded-2 bg-label-primary"><i
                          class="icon-base bx bx-dollar icon-lg text-primary"></i></span>
                    </div>
                    <div class="d-flex flex-column">
                      <small>
                        <script>
                          document.write(new Date().getFullYear() - 1);
                        </script>
                      </small>
                      <h6 class="mb-0">$32.5k</h6>
                    </div>
                  </div>
                  <div class="d-flex">
                    <div class="avatar me-2">
                      <span class="avatar-initial rounded-2 bg-label-info"><i
                          class="icon-base bx bx-wallet icon-lg text-info"></i></span>
                    </div>
                    <div class="d-flex flex-column">
                      <small>
                        <script>
                          document.write(new Date().getFullYear() - 2);
                        </script>
                      </small>
                      <h6 class="mb-0">$41.2k</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--/ Total Revenue -->
      <div class="col-12 col-md-8 col-lg-12 col-xxl-4 order-3 order-md-2">
        <div class="row">
          <div class="col-6 mb-6">
            <div class="card h-100">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between mb-4">
                  <div class="avatar flex-shrink-0">
                    <img src="/assets/img/icons/unicons/paypal.png" alt="paypal" class="rounded">
                  </div>
                  <div class="dropdown">
                    <button class="btn p-0" type="button" id="cardOpt4" data-bs-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">
                      <i class="icon-base bx bx-dots-vertical-rounded text-body-secondary"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                      <a class="dropdown-item" href="javascript:void(0);">View More</a>
                      <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                    </div>
                  </div>
                </div>
                <p class="mb-1">Payments</p>
                <h4 class="card-title mb-3">$2,456</h4>
                <small class="text-danger fw-medium"><i class="icon-base bx bx-down-arrow-alt"></i>
                  -14.82%</small>
              </div>
            </div>
          </div>
          <div class="col-6 mb-6">
            <div class="card h-100">
              <div class="card-body pb-0">
                <span class="d-block fw-medium mb-1">Revenue</span>
                <h4 class="card-title mb-0 mb-lg-4">425k</h4>
                <div id="revenueChart"></div>
              </div>
            </div>
          </div>
          <div class="col-12 mb-6">
            <div class="card">
              <div class="card-body">
                <div
                  class="d-flex justify-content-between align-items-center flex-sm-row flex-column gap-10 flex-wrap">
                  <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                    <div class="card-title mb-6">
                      <h5 class="text-nowrap mb-1">Profile Report</h5>
                      <span class="badge bg-label-warning">YEAR 2022</span>
                    </div>
                    <div class="mt-sm-auto">
                      <span class="text-success text-nowrap fw-medium"><i
                          class="icon-base bx bx-up-arrow-alt"></i> 68.2%</span>
                      <h4 class="mb-0">$84,686k</h4>
                    </div>
                  </div>
                  <div id="profileReportChart"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <!-- Order Statistics -->
      <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-6">
        <div class="card h-100">
          <div class="card-header d-flex justify-content-between">
            <div class="card-title mb-0">
              <h5 class="mb-1 me-2">Order Statistics</h5>
              <p class="card-subtitle">42.82k Total Sales</p>
            </div>
            <div class="dropdown">
              <button class="btn text-body-secondary p-0" type="button" id="orederStatistics"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="icon-base bx bx-dots-vertical-rounded icon-lg"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
                <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                <a class="dropdown-item" href="javascript:void(0);">Share</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-6">
              <div class="d-flex flex-column align-items-center gap-1">
                <h3 class="mb-1">8,258</h3>
                <small>Total Orders</small>
              </div>
              <div id="orderStatisticsChart"></div>
            </div>
            <ul class="p-0 m-0">
              <li class="d-flex align-items-center mb-5">
                <div class="avatar flex-shrink-0 me-3">
                  <span class="avatar-initial rounded bg-label-primary"><i
                      class="icon-base bx bx-mobile-alt"></i></span>
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Electronic</h6>
                    <small>Mobile, Earbuds, TV</small>
                  </div>
                  <div class="user-progress">
                    <h6 class="mb-0">82.5k</h6>
                  </div>
                </div>
              </li>
              <li class="d-flex align-items-center mb-5">
                <div class="avatar flex-shrink-0 me-3">
                  <span class="avatar-initial rounded bg-label-success"><i
                      class="icon-base bx bx-closet"></i></span>
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Fashion</h6>
                    <small>T-shirt, Jeans, Shoes</small>
                  </div>
                  <div class="user-progress">
                    <h6 class="mb-0">23.8k</h6>
                  </div>
                </div>
              </li>
              <li class="d-flex align-items-center mb-5">
                <div class="avatar flex-shrink-0 me-3">
                  <span class="avatar-initial rounded bg-label-info"><i
                      class="icon-base bx bx-home-alt"></i></span>
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Decor</h6>
                    <small>Fine Art, Dining</small>
                  </div>
                  <div class="user-progress">
                    <h6 class="mb-0">849k</h6>
                  </div>
                </div>
              </li>
              <li class="d-flex align-items-center">
                <div class="avatar flex-shrink-0 me-3">
                  <span class="avatar-initial rounded bg-label-secondary"><i
                      class="icon-base bx bx-football"></i></span>
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Sports</h6>
                    <small>Football, Cricket Kit</small>
                  </div>
                  <div class="user-progress">
                    <h6 class="mb-0">99</h6>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!--/ Order Statistics -->

      <!-- Expense Overview -->
      <div class="col-md-6 col-lg-4 order-1 mb-6">
        <div class="card h-100">
          <div class="card-header nav-align-top">
            <ul class="nav nav-pills flex-wrap row-gap-2" role="tablist">
              <li class="nav-item">
                <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                  data-bs-target="#navs-tabs-line-card-income" aria-controls="navs-tabs-line-card-income"
                  aria-selected="true">Income</button>
              </li>
              <li class="nav-item">
                <button type="button" class="nav-link" role="tab">Expenses</button>
              </li>
              <li class="nav-item">
                <button type="button" class="nav-link" role="tab">Profit</button>
              </li>
            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content p-0">
              <div class="tab-pane fade show active" id="navs-tabs-line-card-income" role="tabpanel">
                <div class="d-flex mb-6">
                  <div class="avatar flex-shrink-0 me-3">
                    <img src="/assets/img/icons/unicons/wallet-primary.png" alt="User">
                  </div>
                  <div>
                    <p class="mb-0">Total Balance</p>
                    <div class="d-flex align-items-center">
                      <h6 class="mb-0 me-1">$459.10</h6>
                      <small class="text-success fw-medium">
                        <i class="icon-base bx bx-chevron-up icon-lg"></i>
                        42.9%
                      </small>
                    </div>
                  </div>
                </div>
                <div id="incomeChart"></div>
                <div class="d-flex align-items-center justify-content-center mt-6 gap-3">
                  <div class="flex-shrink-0">
                    <div id="expensesOfWeek"></div>
                  </div>
                  <div>
                    <h6 class="mb-0">Income this week</h6>
                    <small>$39k less than last week</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--/ Expense Overview -->

      <!-- Transactions -->
      <div class="col-md-6 col-lg-4 order-2 mb-6">
        <div class="card h-100">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title m-0 me-2">Transactions</h5>
            <div class="dropdown">
              <button class="btn text-body-secondary p-0" type="button" id="transactionID"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="icon-base bx bx-dots-vertical-rounded icon-lg"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
              </div>
            </div>
          </div>
          <div class="card-body pt-4">
            <ul class="p-0 m-0">
              <li class="d-flex align-items-center mb-6">
                <div class="avatar flex-shrink-0 me-3">
                  <img src="/assets/img/icons/unicons/paypal.png" alt="User" class="rounded">
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <small class="d-block">Paypal</small>
                    <h6 class="fw-normal mb-0">Send money</h6>
                  </div>
                  <div class="user-progress d-flex align-items-center gap-2">
                    <h6 class="fw-normal mb-0">+82.6</h6>
                    <span class="text-body-secondary">USD</span>
                  </div>
                </div>
              </li>
              <li class="d-flex align-items-center mb-6">
                <div class="avatar flex-shrink-0 me-3">
                  <img src="/assets/img/icons/unicons/wallet.png" alt="User" class="rounded">
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <small class="d-block">Wallet</small>
                    <h6 class="fw-normal mb-0">Mac'D</h6>
                  </div>
                  <div class="user-progress d-flex align-items-center gap-2">
                    <h6 class="fw-normal mb-0">+270.69</h6>
                    <span class="text-body-secondary">USD</span>
                  </div>
                </div>
              </li>
              <li class="d-flex align-items-center mb-6">
                <div class="avatar flex-shrink-0 me-3">
                  <img src="/assets/img/icons/unicons/chart.png" alt="User" class="rounded">
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <small class="d-block">Transfer</small>
                    <h6 class="fw-normal mb-0">Refund</h6>
                  </div>
                  <div class="user-progress d-flex align-items-center gap-2">
                    <h6 class="fw-normal mb-0">+637.91</h6>
                    <span class="text-body-secondary">USD</span>
                  </div>
                </div>
              </li>
              <li class="d-flex align-items-center mb-6">
                <div class="avatar flex-shrink-0 me-3">
                  <img src="/assets/img/icons/unicons/cc-primary.png" alt="User" class="rounded">
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <small class="d-block">Credit Card</small>
                    <h6 class="fw-normal mb-0">Ordered Food</h6>
                  </div>
                  <div class="user-progress d-flex align-items-center gap-2">
                    <h6 class="fw-normal mb-0">-838.71</h6>
                    <span class="text-body-secondary">USD</span>
                  </div>
                </div>
              </li>
              <li class="d-flex align-items-center mb-6">
                <div class="avatar flex-shrink-0 me-3">
                  <img src="/assets/img/icons/unicons/wallet.png" alt="User" class="rounded">
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <small class="d-block">Wallet</small>
                    <h6 class="fw-normal mb-0">Starbucks</h6>
                  </div>
                  <div class="user-progress d-flex align-items-center gap-2">
                    <h6 class="fw-normal mb-0">+203.33</h6>
                    <span class="text-body-secondary">USD</span>
                  </div>
                </div>
              </li>
              <li class="d-flex align-items-center">
                <div class="avatar flex-shrink-0 me-3">
                  <img src="/assets/img/icons/unicons/cc-warning.png" alt="User" class="rounded">
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <small class="d-block">Mastercard</small>
                    <h6 class="fw-normal mb-0">Ordered Food</h6>
                  </div>
                  <div class="user-progress d-flex align-items-center gap-2">
                    <h6 class="fw-normal mb-0">-92.45</h6>
                    <span class="text-body-secondary">USD</span>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!--/ Transactions -->
      <!-- Activity Timeline -->
      <div class="col-md-12 col-lg-6 order-4 order-lg-3">
        <div class="card h-100">
          <div class="card-header d-flex justify-content-between">
            <h5 class="card-title m-0 me-2">Activity Timeline</h5>
            <div class="dropdown">
              <button class="btn text-body-secondary p-0" type="button" id="timelineWapper"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="icon-base bx bx-dots-vertical-rounded icon-lg"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="timelineWapper">
                <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                <a class="dropdown-item" href="javascript:void(0);">Share</a>
              </div>
            </div>
          </div>
          <div class="card-body pt-2">
            <ul class="timeline mb-0">
              <li class="timeline-item timeline-item-transparent">
                <span class="timeline-point timeline-point-primary"></span>
                <div class="timeline-event">
                  <div class="timeline-header mb-3">
                    <h6 class="mb-0">12 Invoices have been paid</h6>
                    <small class="text-body-secondary">12 min ago</small>
                  </div>
                  <p class="mb-2">Invoices have been paid to the company</p>
                  <div class="d-flex align-items-center mb-1">
                    <div class="badge bg-lighter rounded-2">
                      <img src="/assets/img/icons/misc/pdf.png" alt="img" width="15" class="me-2">
                      <span class="h6 mb-0 text-body">invoices.pdf</span>
                    </div>
                  </div>
                </div>
              </li>
              <li class="timeline-item timeline-item-transparent">
                <span class="timeline-point timeline-point-success"></span>
                <div class="timeline-event">
                  <div class="timeline-header mb-3">
                    <h6 class="mb-0">Client Meeting</h6>
                    <small class="text-body-secondary">45 min ago</small>
                  </div>
                  <p class="mb-2">Project meeting with john @10:15am</p>
                  <div class="d-flex justify-content-between flex-wrap gap-2">
                    <div class="d-flex flex-wrap align-items-center">
                      <div class="avatar avatar-sm me-2">
                        <img src="/assets/img/avatars/1.png" alt="Avatar" class="rounded-circle">
                      </div>
                      <div>
                        <p class="mb-0 small fw-medium">Lester McCarthy (Client)</p>
                        <small>CEO of ThemeSelection</small>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li class="timeline-item timeline-item-transparent">
                <span class="timeline-point timeline-point-info"></span>
                <div class="timeline-event">
                  <div class="timeline-header mb-3">
                    <h6 class="mb-0">Create a new project for client</h6>
                    <small class="text-body-secondary">2 Day Ago</small>
                  </div>
                  <p class="mb-2">6 team members in a project</p>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap p-0">
                      <div class="d-flex flex-wrap align-items-center">
                        <ul class="list-unstyled users-list d-flex align-items-center avatar-group m-0 me-2">
                          <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                            title="Vinnie Mostowy" class="avatar pull-up">
                            <img class="rounded-circle" src="/assets/img/avatars/5.png" alt="Avatar">
                          </li>
                          <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                            title="Allen Rieske" class="avatar pull-up">
                            <img class="rounded-circle" src="/assets/img/avatars/12.png" alt="Avatar">
                          </li>
                          <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                            title="Julee Rossignol" class="avatar pull-up">
                            <img class="rounded-circle" src="/assets/img/avatars/6.png" alt="Avatar">
                          </li>
                          <li class="avatar">
                            <span class="avatar-initial rounded-circle pull-up text-heading"
                              data-bs-toggle="tooltip" data-bs-placement="bottom" title="3 more">+3</span>
                          </li>
                        </ul>
                      </div>
                    </li>
                  </ul>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!--/ Activity Timeline -->
      <!-- pill table -->
      <div class="col-md-6 order-3 order-lg-4 mb-6 mb-lg-0">
        <div class="card text-center h-100">
          <div class="card-header nav-align-top">
            <ul class="nav nav-pills flex-wrap row-gap-2" role="tablist">
              <li class="nav-item">
                <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                  data-bs-target="#navs-pills-browser" aria-controls="navs-pills-browser"
                  aria-selected="true">Browser</button>
              </li>
              <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                  data-bs-target="#navs-pills-os" aria-controls="navs-pills-os" aria-selected="false">Operating
                  System</button>
              </li>
              <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                  data-bs-target="#navs-pills-country" aria-controls="navs-pills-country"
                  aria-selected="false">Country</button>
              </li>
            </ul>
          </div>
          <div class="tab-content pt-0 pb-4">
            <div class="tab-pane fade show active" id="navs-pills-browser" role="tabpanel">
              <div class="table-responsive text-start text-nowrap">
                <table class="table table-borderless">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Browser</th>
                      <th>Visits</th>
                      <th class="w-50">Data In Percentage</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>
                        <div class="d-flex align-items-center">
                          <img src="/assets/img/icons/brands/chrome.png" alt="Chrome" height="24"
                            class="me-3">
                          <span class="text-heading">Chrome</span>
                        </div>
                      </td>
                      <td class="text-heading">8.92k</td>
                      <td>
                        <div class="d-flex justify-content-between align-items-center gap-4">
                          <div class="progress w-100" style="height:10px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 64.75%"
                              aria-valuenow="64.75" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <small class="fw-medium">64.75%</small>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>
                        <div class="d-flex align-items-center">
                          <img src="/assets/img/icons/brands/safari.png" alt="Safari" height="24"
                            class="me-3">
                          <span class="text-heading">Safari</span>
                        </div>
                      </td>
                      <td class="text-heading">1.29k</td>
                      <td>
                        <div class="d-flex justify-content-between align-items-center gap-4">
                          <div class="progress w-100" style="height:10px;">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 18.43%"
                              aria-valuenow="18.43" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <small class="fw-medium">18.43%</small>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>
                        <div class="d-flex align-items-center">
                          <img src="/assets/img/icons/brands/firefox.png" alt="Firefox" height="24"
                            class="me-3">
                          <span class="text-heading">Firefox</span>
                        </div>
                      </td>
                      <td class="text-heading">328</td>
                      <td>
                        <div class="d-flex justify-content-between align-items-center gap-4">
                          <div class="progress w-100" style="height:10px;">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 8.37%"
                              aria-valuenow="8.37" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <small class="fw-medium">8.37%</small>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>
                        <div class="d-flex align-items-center">
                          <img src="/assets/img/icons/brands/edge.png" alt="Edge" height="24" class="me-3">
                          <span class="text-heading">Edge</span>
                        </div>
                      </td>
                      <td class="text-heading">142</td>
                      <td>
                        <div class="d-flex justify-content-between align-items-center gap-4">
                          <div class="progress w-100" style="height:10px;">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 6.12%"
                              aria-valuenow="6.12" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <small class="fw-medium">6.12%</small>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td>
                        <div class="d-flex align-items-center">
                          <img src="/assets/img/icons/brands/opera.png" alt="Opera" height="24"
                            class="me-3">
                          <span class="text-heading">Opera</span>
                        </div>
                      </td>
                      <td class="text-heading">82</td>
                      <td>
                        <div class="d-flex justify-content-between align-items-center gap-4">
                          <div class="progress w-100" style="height:10px;">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 2.12%"
                              aria-valuenow="1.94" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <small class="fw-medium">2.12%</small>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>6</td>
                      <td>
                        <div class="d-flex align-items-center">
                          <img src="/assets/img/icons/brands/uc.png" alt="uc" height="24" class="me-3">
                          <span class="text-heading">UC Browser</span>
                        </div>
                      </td>
                      <td class="text-heading">328</td>
                      <td>
                        <div class="d-flex justify-content-between align-items-center gap-4">
                          <div class="progress w-100" style="height:10px;">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 20.14%"
                              aria-valuenow="1.94" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <small class="fw-medium">20.14%</small>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="tab-pane fade" id="navs-pills-os" role="tabpanel">
              <div class="table-responsive text-start text-nowrap">
                <table class="table table-borderless">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>System</th>
                      <th>Visits</th>
                      <th class="w-50">Data In Percentage</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>
                        <div class="d-flex align-items-center">
                          <img src="/assets/img/icons/brands/windows.png" alt="Windows" height="24"
                            class="me-3">
                          <span class="text-heading">Windows</span>
                        </div>
                      </td>
                      <td class="text-heading">875.24k</td>
                      <td>
                        <div class="d-flex justify-content-between align-items-center gap-4">
                          <div class="progress w-100" style="height:10px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 61.50%"
                              aria-valuenow="61.50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <small class="fw-medium">61.50%</small>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>
                        <div class="d-flex align-items-center">
                          <img src="/assets/img/icons/brands/mac.png" alt="Mac" height="24" class="me-3">
                          <span class="text-heading">Mac</span>
                        </div>
                      </td>
                      <td class="text-heading">89.68k</td>
                      <td>
                        <div class="d-flex justify-content-between align-items-center gap-4">
                          <div class="progress w-100" style="height:10px;">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 16.67%"
                              aria-valuenow="16.67" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <small class="fw-medium">16.67%</small>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>
                        <div class="d-flex align-items-center">
                          <img src="/assets/img/icons/brands/ubuntu.png" alt="Ubuntu" height="24"
                            class="me-3">
                          <span class="text-heading">Ubuntu</span>
                        </div>
                      </td>
                      <td class="text-heading">37.68k</td>
                      <td>
                        <div class="d-flex justify-content-between align-items-center gap-4">
                          <div class="progress w-100" style="height:10px;">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 12.82%"
                              aria-valuenow="12.82" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <small class="fw-medium">12.82%</small>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>
                        <div class="d-flex align-items-center">
                          <img src="/assets/img/icons/brands/chrome.png" alt="Chrome" height="24"
                            class="me-3">
                          <span class="text-heading">Chrome</span>
                        </div>
                      </td>
                      <td class="text-heading">8.34k</td>
                      <td>
                        <div class="d-flex justify-content-between align-items-center gap-4">
                          <div class="progress w-100" style="height:10px;">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 6.25%"
                              aria-valuenow="6.25" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <small class="fw-medium">6.25%</small>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td>
                        <div class="d-flex align-items-center">
                          <img src="/assets/img/icons/brands/cent.png" alt="Cent" height="24" class="me-3">
                          <span class="text-heading">Cent</span>
                        </div>
                      </td>
                      <td class="text-heading">2.25k</td>
                      <td>
                        <div class="d-flex justify-content-between align-items-center gap-4">
                          <div class="progress w-100" style="height:10px;">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 2.76%"
                              aria-valuenow="2.76" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <small class="fw-medium">2.76%</small>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>6</td>
                      <td>
                        <div class="d-flex align-items-center">
                          <img src="/assets/img/icons/brands/linux.png" alt="linux" height="24"
                            class="me-3">
                          <span class="text-heading">Linux</span>
                        </div>
                      </td>
                      <td class="text-heading">328k</td>
                      <td>
                        <div class="d-flex justify-content-between align-items-center gap-4">
                          <div class="progress w-100" style="height:10px;">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 20.14%"
                              aria-valuenow="2.76" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <small class="fw-medium">20.14%</small>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="tab-pane fade" id="navs-pills-country" role="tabpanel">
              <div class="table-responsive text-start text-nowrap">
                <table class="table table-borderless">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Country</th>
                      <th>Visits</th>
                      <th class="w-50">Data In Percentage</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>
                        <div class="d-flex align-items-center">
                          <i class="fis fi fi-us rounded-circle fs-4 me-3"></i>
                          <span class="text-heading">USA</span>
                        </div>
                      </td>
                      <td class="text-heading">87.24k</td>
                      <td>
                        <div class="d-flex justify-content-between align-items-center gap-4">
                          <div class="progress w-100" style="height:10px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 38.12%"
                              aria-valuenow="38.12" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <small class="fw-medium">38.12%</small>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>
                        <div class="d-flex align-items-center">
                          <i class="fis fi fi-br rounded-circle fs-4 me-3"></i>
                          <span class="text-heading">Brazil</span>
                        </div>
                      </td>
                      <td class="text-heading">42.68k</td>
                      <td>
                        <div class="d-flex justify-content-between align-items-center gap-4">
                          <div class="progress w-100" style="height:10px;">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 28.23%"
                              aria-valuenow="28.23" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <small class="fw-medium">28.23%</small>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>
                        <div class="d-flex align-items-center">
                          <i class="fis fi fi-in rounded-circle fs-4 me-3"></i>
                          <span class="text-heading">India</span>
                        </div>
                      </td>
                      <td class="text-heading">12.58k</td>
                      <td>
                        <div class="d-flex justify-content-between align-items-center gap-4">
                          <div class="progress w-100" style="height:10px;">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 14.82%"
                              aria-valuenow="14.82" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <small class="fw-medium">14.82%</small>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>
                        <div class="d-flex align-items-center">
                          <i class="fis fi fi-au rounded-circle fs-4 me-3"></i>
                          <span class="text-heading">Australia</span>
                        </div>
                      </td>
                      <td class="text-heading">4.13k</td>
                      <td>
                        <div class="d-flex justify-content-between align-items-center gap-4">
                          <div class="progress w-100" style="height:10px;">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 12.72%"
                              aria-valuenow="12.72" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <small class="fw-medium">12.72%</small>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td>
                        <div class="d-flex align-items-center">
                          <i class="fis fi fi-fr rounded-circle fs-4 me-3"></i>
                          <span class="text-heading">France</span>
                        </div>
                      </td>
                      <td class="text-heading">2.21k</td>
                      <td>
                        <div class="d-flex justify-content-between align-items-center gap-4">
                          <div class="progress w-100" style="height:10px;">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 7.11%"
                              aria-valuenow="7.11" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <small class="fw-medium">7.11%</small>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>6</td>
                      <td>
                        <div class="d-flex align-items-center">
                          <i class="fis fi fi-ca rounded-circle fs-4 me-3"></i>
                          <span class="text-heading">Canada</span>
                        </div>
                      </td>
                      <td class="text-heading">22.35k</td>
                      <td>
                        <div class="d-flex justify-content-between align-items-center gap-4">
                          <div class="progress w-100" style="height:10px;">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 15.13%"
                              aria-valuenow="7.11" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <small class="fw-medium">15.13%</small>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--/ pill table -->
    </div>

</div>
  <!--/ Content -->
  @endsection