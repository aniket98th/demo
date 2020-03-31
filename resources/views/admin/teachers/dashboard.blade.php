 @extends('layouts.app')
@section('title', 'Quick')

@push('head-script')
<link href="{{URL::asset('assets/css/teacher-dashboard.css')}}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
    <!-- begin:: Subheader -->
 <div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">Teacher Dashboard </h3>      
        </div>
        <div class="top-select-wrap">
            <ul>
                <li>
                    <select class="form-control" id="exampleSelect1">
                        <option>Math</option>
                        <option value="1">Grade 2</option>
                        <option value="1">Grade 3</option>
                        <option value="1">Grade 4</option>
                        <option value="1">Grade 5</option>
                    </select>
                </li>
                <li>
                    <select class="form-control" id="exampleSelect1">
                        <option>Tasneem Oz</option>
                        <option value="1">Grade 2</option>
                        <option value="1">Grade 3</option>
                        <option value="1">Grade 4</option>
                        <option value="1">Grade 5</option>
                    </select>
                </li>
                <li>
                     <select class="form-control" id="exampleSelect1">
                        <option>D-TSNM-MTWT-7PM-M5</option>
                        <option value="1">Grade 2</option>
                        <option value="1">Grade 3</option>
                        <option value="1">Grade 4</option>
                        <option value="1">Grade 5</option>
                    </select>
                </li>
                <li><button type="button" class="btn btn-primary">Go</button></li>
            </ul>
        </div>
    </div>
</div>

    <!-- end:: Subheader -->
    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="topHeader">
        <div class="row">
            <div class="col">
                <div class="kt-portlet kt-widget kt-widget--fit kt-widget--general-3">
                    <div class="kt-portlet__body">
                        <div class="kt-widget__top">
                            <div class="kt-widget__wrapper">
                                <div class="col-lg-2">
                                    <div class="kt-widget__links">
                                        <div class="kt-widget__cont">
                                            <div class="kt-widget__link">
                                                <i class="flaticon2-user"></i><a href="#">Tasneem Oz</a>
                                            </div>
                                            <div class="kt-widget__link">
                                                <i class="flaticon2-phone"></i><a href="#">+1 987654321</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="kt-widget__links">
                                        <div class="kt-widget__cont">
                                            <div class="kt-widget__link">
                                                <i class="flaticon2-send"></i><a href="#">dev2@gmail.com</a>
                                            </div>
                                            <div class="kt-widget__link">
                                                <i class="flaticon2-send"></i><a href="#">dev2@98thpecentile.com</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-1"></div>
                                <div class="col-lg-2">
                                    <div class="progress-wrapper">
                                        <div class="kt-widget-11">
                                            <div class="kt-widget-11__item">
                                                <div class="kt-widget-11__wrapper">
                                                    <div class="kt-widget-11__title">
                                                        Slots
                                                    </div>
                                                    <div class="kt-widget-11__value">
                                                        05/07
                                                    </div>
                                                </div>
                                                <div class="kt-widget-11__progress">
                                                    <div class="progress">
                                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="kt-widget-11__item">
                                                <div class="kt-widget-11__wrapper">
                                                    <div class="kt-widget-11__title">
                                                        Students
                                                    </div>
                                                    <div class="kt-widget-11__value">
                                                        15/25
                                                    </div>
                                                </div>
                                                <div class="kt-widget-11__progress">
                                                    <div class="progress">
                                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-1"></div>
                                <div class="col-lg-3"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    <div class="tabsWrapper">
        <div class="row">
          <div class="col-lg-12">
            <div class="kt-portlet">
              <div class="kt-portlet__body">
                        <ul class="nav nav-tabs nav-fill" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#kt_tabs_4_1">Today's Classes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_tabs_4_2">Upcoming Classes</a>
                            </li>
                        </ul>         
                        <div class="tab-content">
                            <div class="tab-pane active" id="kt_tabs_4_1" role="tabpanel">
                                <div class="information-wrapper">
                                    <ul>
                                       <li><strong>D-TSNM-MW-6PM-M</strong></li> 
                                       <li><i class="flaticon-calendar-2"></i>12-Feb-2020</li>  
                                       <li><i class="flaticon2-crisp-icons-1"></i>07 PM</li>  
                                       <li><i class="flaticon-placeholder-2"></i>Arizana</li>  
                                       <li><i class="flaticon-user"></i>Lesson 1/42</li>  
                                       <li><i class="flaticon-edit-1"></i>SAT-STD-L1</li>  
                                       <li><button type="button" class="btn btn-primary">Join class Now</button>
                                           <div class="dropdown dropdown-inline">
                                                <button type="button" class="btn btn-hover-brand btn-elevate-hover btn-icon btn-sm btn-icon-md btn-circle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="flaticon-more-1"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right" style="">
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModal">New Report</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#">Settings</a>
                                                </div>
                                            </div>
                                       </li>  
                                    </ul>
                                </div>
                                <div class="information-wrapper">
                                    <ul>
                                       <li><strong>D-TSNM-MW-6PM-M</strong></li> 
                                       <li><i class="flaticon-calendar-2"></i>12-Feb-2020</li>  
                                       <li><i class="flaticon2-crisp-icons-1"></i>07 PM</li>  
                                       <li><i class="flaticon-placeholder-2"></i>Arizana</li>  
                                       <li><i class="flaticon-user"></i>Lesson 1/42</li>  
                                       <li><i class="flaticon-edit-1"></i>SAT-STD-L1</li>  
                                       <li><button type="button" class="btn btn-primary">Join class Now</button>
                                           <div class="dropdown dropdown-inline">
                                                <button type="button" class="btn btn-hover-brand btn-elevate-hover btn-icon btn-sm btn-icon-md btn-circle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="flaticon-more-1"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right" style="">
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModal">New Report</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#">Settings</a>
                                                </div>
                                            </div>
                                       </li>  
                                    </ul>
                                </div>
                                <div class="information-wrapper">
                                    <ul>
                                       <li><strong>D-TSNM-MW-6PM-M</strong></li> 
                                       <li><i class="flaticon-calendar-2"></i>12-Feb-2020</li>  
                                       <li><i class="flaticon2-crisp-icons-1"></i>07 PM</li>  
                                       <li><i class="flaticon-placeholder-2"></i>Arizana</li>  
                                       <li><i class="flaticon-user"></i>Lesson 1/42</li>  
                                       <li><i class="flaticon-edit-1"></i>SAT-STD-L1</li>  
                                       <li><button type="button" class="btn btn-primary">Join class Now</button>
                                           <div class="dropdown dropdown-inline">
                                                <button type="button" class="btn btn-hover-brand btn-elevate-hover btn-icon btn-sm btn-icon-md btn-circle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="flaticon-more-1"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right" style="">
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModal">New Report</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#">Settings</a>
                                                </div>
                                            </div>
                                       </li>  
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-pane" id="kt_tabs_4_2" role="tabpanel">
                                <div class="information-wrapper">
                                    <ul>
                                       <li><strong>D-TSNM-MW-6PM-M</strong></li> 
                                       <li><i class="flaticon-calendar-2"></i>12-Feb-2020</li>  
                                       <li><i class="flaticon2-crisp-icons-1"></i>07 PM</li>  
                                       <li><i class="flaticon-placeholder-2"></i>Arizana</li>  
                                       <li><i class="flaticon-user"></i>Lesson 1/42</li>  
                                       <li><i class="flaticon-edit-1"></i>SAT-STD-L1</li>  
                                       <li><button type="button" class="btn btn-primary">Join class Now</button>
                                           <div class="dropdown dropdown-inline">
                                                <button type="button" class="btn btn-hover-brand btn-elevate-hover btn-icon btn-sm btn-icon-md btn-circle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="flaticon-more-1"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right" style="">
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModal">New Report</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#">Settings</a>
                                                </div>
                                            </div>
                                       </li>  
                                    </ul>
                                </div>
                                <div class="information-wrapper">
                                    <ul>
                                       <li><strong>D-TSNM-MW-6PM-M</strong></li> 
                                       <li><i class="flaticon-calendar-2"></i>12-Feb-2020</li>  
                                       <li><i class="flaticon2-crisp-icons-1"></i>07 PM</li>  
                                       <li><i class="flaticon-placeholder-2"></i>Arizana</li>  
                                       <li><i class="flaticon-user"></i>Lesson 1/42</li>  
                                       <li><i class="flaticon-edit-1"></i>SAT-STD-L1</li>  
                                       <li><button type="button" class="btn btn-primary">Join class Now</button>
                                           <div class="dropdown dropdown-inline">
                                                <button type="button" class="btn btn-hover-brand btn-elevate-hover btn-icon btn-sm btn-icon-md btn-circle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="flaticon-more-1"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right" style="">
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModal">New Report</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#">Settings</a>
                                                </div>
                                            </div>
                                       </li>  
                                    </ul>
                                </div>
                                <div class="information-wrapper">
                                    <ul>
                                       <li><strong>D-TSNM-MW-6PM-M</strong></li> 
                                       <li><i class="flaticon-calendar-2"></i>12-Feb-2020</li>  
                                       <li><i class="flaticon2-crisp-icons-1"></i>07 PM</li>  
                                       <li><i class="flaticon-placeholder-2"></i>Arizana</li>  
                                       <li><i class="flaticon-user"></i>Lesson 1/42</li>  
                                       <li><i class="flaticon-edit-1"></i>SAT-STD-L1</li>  
                                       <li><button type="button" class="btn btn-primary">Join class Now</button>
                                           <div class="dropdown dropdown-inline">
                                                <button type="button" class="btn btn-hover-brand btn-elevate-hover btn-icon btn-sm btn-icon-md btn-circle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="flaticon-more-1"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right" style="">
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModal">New Report</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#">Settings</a>
                                                </div>
                                            </div>
                                       </li>  
                                    </ul>
                                </div>
                            </div>
                        </div>      
                    </div>
            </div>
          </div>
        </div>
    </div>
    <div class="chart-wrapper">
        <div class="row">
            <!--begin::Portlet-->
            <div class="col-lg-6 col-xl-4 order-lg-1 order-xl-1">
                <div class="kt-portlet kt-portlet--height-fluid">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">Demo Conversions</h3>
                        </div>
                        <div class="chart-select-wrap">
                            <select class="form-control" id="exampleSelect1">
                                <option>Jan</option>
                                <option value="1">Feb</option>
                                <option value="1">Mar</option>
                                <option value="1">Apr</option>
                                <option value="1">May</option>
                                <option value="1">June</option>
                                <option value="1">July</option>
                                <option value="1">Aug</option>
                                <option value="1">Sept</option>
                                <option value="1">Oct</option>
                                <option value="1">Nov</option>
                                <option value="1">Dec</option>
                            </select>
                        </div>
                    </div>
                    <div class="kt-portlet__body kt-portlet__body--fluid">
                        <div class="kt-widget-21">
                            <div class="kt-widget-21__title kt-widget-21__data">
                                <div class="kt-widget-21__legends">
                                <div class="kt-widget-21__legend">
                                <i class="kt-bg-brand"></i>
                                <span>Success: 18</span>
                                </div>
                                <div class="kt-widget-21__legend">
                                <i class="kt-shape-bg-color-4"></i>
                                <span>Failed: 12</span>
                                </div>
                                <div class="kt-widget-21__legend">
                                <span>Percentage: 60%</span>
                                </div>
                                </div>
                            </div>
                            <div class="kt-widget-21__data">
                                <!-- <div class="chart-wrap"><canvas id="kt_chartjs_4" style="width: 100%;height: 100px;display: block;" width="100%" height="100"></canvas></div> -->
                                <div class="chart-wrap"><canvas id="demo-conversions" style="width: 100%;height: 100px;display: block;" width="100%" height="100"></canvas></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Portlet-->
            <!--begin::Portlet--> 
            <div class="col-lg-6 col-xl-4 order-lg-1 order-xl-1">
                <div class="kt-portlet kt-portlet--height-fluid">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">Absence</h3>
                        </div>
                        <div class="chart-select-wrap">
                            <select class="form-control" id="exampleSelect1">
                                <option>Jan</option>
                                <option value="1">Feb</option>
                                <option value="1">Mar</option>
                                <option value="1">Apr</option>
                                <option value="1">May</option>
                                <option value="1">June</option>
                                <option value="1">July</option>
                                <option value="1">Aug</option>
                                <option value="1">Sept</option>
                                <option value="1">Oct</option>
                                <option value="1">Nov</option>
                                <option value="1">Dec</option>
                            </select>
                        </div>
                    </div>
                    <div class="kt-portlet__body kt-portlet__body--fluid">
                        <div class="kt-widget-21">
                            <div class="kt-widget-21__title kt-widget-21__data">
                                <div class="kt-widget-21__legends">
                                <div class="kt-widget-21__legend">
                                <i class="kt-bg-brand"></i>
                                <span>Total Classes</span>
                                </div>
                                <div class="kt-widget-21__legend">
                                <i class="kt-shape-bg-color-4"></i>
                                <span>Attended</span>
                                </div>
                                </div>
                            </div>
                            <div class="kt-widget-21__data">
                                <div class="kt-widget-21__chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                <div class="kt-widget-21__stat">+84%</div>
                                <canvas id="Absence" class="chartjs-render-monitor" style="width: 100%;height: 100px;display: block;" width="100%" height="100"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Portlet-->
            <!--begin::Portlet--> 
            <div class="col-lg-6 col-xl-4 order-lg-1 order-xl-1">
                <div class="kt-portlet kt-portlet--height-fluid">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">Customer Reviews</h3>
                        </div>
                        <div class="chart-select-wrap">
                            <select class="form-control" id="exampleSelect1">
                                <option>Jan</option>
                                <option value="1">Feb</option>
                                <option value="1">Mar</option>
                                <option value="1">Apr</option>
                                <option value="1">May</option>
                                <option value="1">June</option>
                                <option value="1">July</option>
                                <option value="1">Aug</option>
                                <option value="1">Sept</option>
                                <option value="1">Oct</option>
                                <option value="1">Nov</option>
                                <option value="1">Dec</option>
                            </select>
                        </div>
                    </div>
                    <div class="kt-portlet__body kt-portlet__body--fluid">
                        <div class="kt-widget-21">
                            <div class="kt-widget-21__title kt-widget-21__data">
                                <div class="kt-widget-21__legends">
                                <div class="kt-widget-21__legend">
                                <i class="kt-bg-brand"></i>
                                <span>5 Star</span>
                                </div>
                                <div class="kt-widget-21__legend">
                                <i class="kt-shape-bg-color-4"></i>
                                <span>4 Star</span>
                                </div>
                                <div class="kt-widget-21__legend">
                                <i class="kt-shape-bg-color-3"></i>
                                <span>3 Star</span>
                                </div>
                                <div class="kt-widget-21__legend">
                                <i class="kt-shape-bg-color-2"></i>
                                <span>2 Star</span>
                                </div>
                                <div class="kt-widget-21__legend">
                                <i class="kt-shape-bg-color-1"></i>
                                <span>1 Star</span>
                                </div>
                                </div>
                            </div>
                            <div class="kt-widget-21__data">
                                <!-- <div class="chart-wrap"><canvas id="kt_chartjs_2" style="width: 100%;height: 100px;display: block;" width="100%" height="100"></canvas></div> -->
                                <div class="chart-wrap"><canvas id="Customer-Reviews" style="width: 100%;height: 100px;display: block;" width="100%" height="100"></canvas></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Portlet-->
            <!--begin::Portlet-->
            <div class="col-lg-6 col-xl-4 order-lg-1 order-xl-1">
                <div class="kt-portlet kt-portlet--height-fluid">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">Punctuallity</h3>
                        </div>
                        <div class="chart-select-wrap">
                            <select class="form-control" id="exampleSelect1">
                                <option>Jan</option>
                                <option value="1">Feb</option>
                                <option value="1">Mar</option>
                                <option value="1">Apr</option>
                                <option value="1">May</option>
                                <option value="1">June</option>
                                <option value="1">July</option>
                                <option value="1">Aug</option>
                                <option value="1">Sept</option>
                                <option value="1">Oct</option>
                                <option value="1">Nov</option>
                                <option value="1">Dec</option>
                            </select>
                        </div>
                    </div>
                    <div class="kt-portlet__body kt-portlet__body--fluid">
                        <div class="kt-widget-21">
                            <div class="kt-widget-21__title kt-widget-21__data">
                                <div class="kt-widget-21__legends">
                                <div class="kt-widget-21__legend">
                                <i class="kt-bg-brand"></i>
                                <span>On time</span>
                                </div>
                                <div class="kt-widget-21__legend">
                                <i class="kt-shape-bg-color-4"></i>
                                <span>Late</span>
                                </div>
                                </div>
                            </div>
                            <div class="kt-widget-21__data">
                                <div class="chart-wrap"><canvas id="Punctuallity" style="width: 100%;height: 100px;display: block;" width="100%" height="100"></canvas></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Portlet-->
            <!--begin::Portlet--> 
            <div class="col-lg-6 col-xl-4 order-lg-1 order-xl-1">
                <div class="kt-portlet kt-portlet--height-fluid">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">Average Homework</h3>
                        </div>
                        <div class="chart-select-wrap">
                            <select class="form-control" id="exampleSelect1">
                                <option>Jan</option>
                                <option value="1">Feb</option>
                                <option value="1">Mar</option>
                                <option value="1">Apr</option>
                                <option value="1">May</option>
                                <option value="1">June</option>
                                <option value="1">July</option>
                                <option value="1">Aug</option>
                                <option value="1">Sept</option>
                                <option value="1">Oct</option>
                                <option value="1">Nov</option>
                                <option value="1">Dec</option>
                            </select>
                        </div>
                    </div>
                    <div class="kt-portlet__body kt-portlet__body--fluid">
                        <div class="kt-widget-21">
                            <div class="kt-widget-21__title kt-widget-21__data">
                                <div class="kt-widget-21__legends">
                                <div class="kt-widget-21__legend">
                                <i class="kt-bg-brand"></i>
                                <span>Data Content</span>
                                </div>
                                <div class="kt-widget-21__legend">
                                <i class="kt-shape-bg-color-4"></i>
                                <span>Data Content</span>
                                </div>
                                </div>
                            </div>
                            <div class="kt-widget-21__data">
                                <div class="chart-wrap"><canvas id="Average-Homework" style="width: 100%;height: 100px;display: block;" width="100%" height="100"></canvas></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Portlet-->
            <!--begin::Portlet--> 
            <div class="col-lg-6 col-xl-4 order-lg-1 order-xl-1">
                <div class="kt-portlet kt-portlet--height-fluid">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">Test Score</h3>
                        </div>
                        <div class="chart-select-wrap">
                            <select class="form-control" id="exampleSelect1">
                                <option>Jan</option>
                                <option value="1">Feb</option>
                                <option value="1">Mar</option>
                                <option value="1">Apr</option>
                                <option value="1">May</option>
                                <option value="1">June</option>
                                <option value="1">July</option>
                                <option value="1">Aug</option>
                                <option value="1">Sept</option>
                                <option value="1">Oct</option>
                                <option value="1">Nov</option>
                                <option value="1">Dec</option>
                            </select>
                        </div>
                    </div>
                    <div class="kt-portlet__body kt-portlet__body--fluid">
                        <div class="kt-widget-21">
                            <div class="kt-widget-21__title kt-widget-21__data">
                                <div class="kt-widget-21__legends">
                                <div class="kt-widget-21__legend">
                                <i class="kt-bg-brand"></i>
                                <span>Data Content</span>
                                </div>
                                <div class="kt-widget-21__legend">
                                <i class="kt-shape-bg-color-4"></i>
                                <span>Data Content</span>
                                </div>
                                </div>
                            </div>
                            <div class="kt-widget-21__data">
                                <div class="kt-widget-21__chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                <div class="kt-widget-21__stat">+84%</div>
                                <canvas id="TestScore" class="chartjs-render-monitor" style="width: 100%;height: 100px;display: block;" width="100%" height="100"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Portlet-->   
        </div>
    </div>
</div>
 </div>
    <!-- end:: Content -->
</div>
@endsection

@push('footer-script')
<script src="{{URL::asset('assets/js/pages/teacher-dashboard.js')}}" type="text/javascript"></script>

@endpush

