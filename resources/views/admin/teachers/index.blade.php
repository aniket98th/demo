@extends('layouts.app')
@section('content')
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

   <!-- begin:: Content Head -->
   <div class="kt-subheader   kt-grid__item" id="kt_subheader">
      <div class="kt-container  kt-container--fluid ">
         <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
               Teachers
            </h3>
            <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            <div class="kt-subheader__toolbar" id="kt_subheader_search">
               <span class="kt-subheader__desc" id="kt_subheader_total">
                  {{$teachers->count()}} Total </span>
               <!-- <form class="kt-subheader__search" id="kt_subheader_search_form">
                  <div class="input-group">
                     <input type="text" class="form-control" placeholder="Search..." id="generalSearch">
                     <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">
                           <i class="flaticon2-search-1"></i>
                        </span>
                     </div>
                  </div>
               </form> -->
            </div>
            <div class="kt-subheader__toolbar kt-hidden" id="kt_subheader_group_actions">
               <div class="kt-subheader__desc"><span id="kt_subheader_group_selected_rows"></span> Selected:</div>
               <div class="btn-toolbar kt-margin-l-20">
                  <div class="dropdown" id="kt_subheader_group_actions_status_change">
                     <button type="button" class="btn btn-label-brand btn-bold btn-sm dropdown-toggle" data-toggle="dropdown">
                        Update Status
                     </button>
                     <div class="dropdown-menu">
                        <ul class="kt-nav">
                           <li class="kt-nav__section kt-nav__section--first">
                              <span class="kt-nav__section-text">Change status to:</span>
                           </li>
                           <li class="kt-nav__item">
                              <a href="#" class="kt-nav__link" data-toggle="status-change" data-status="1">
                                 <span class="kt-nav__link-text"><span class="kt-badge kt-badge--unified-success kt-badge--inline kt-badge--bold">Approved</span></span>
                              </a>
                           </li>
                           <li class="kt-nav__item">
                              <a href="#" class="kt-nav__link" data-toggle="status-change" data-status="2">
                                 <span class="kt-nav__link-text"><span class="kt-badge kt-badge--unified-danger kt-badge--inline kt-badge--bold">Rejected</span></span>
                              </a>
                           </li>
                           <li class="kt-nav__item">
                              <a href="#" class="kt-nav__link" data-toggle="status-change" data-status="3">
                                 <span class="kt-nav__link-text"><span class="kt-badge kt-badge--unified-warning kt-badge--inline kt-badge--bold">Pending</span></span>
                              </a>
                           </li>
                           <li class="kt-nav__item">
                              <a href="#" class="kt-nav__link" data-toggle="status-change" data-status="4">
                                 <span class="kt-nav__link-text"><span class="kt-badge kt-badge--unified-info kt-badge--inline kt-badge--bold">On Hold</span></span>
                              </a>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <button class="btn btn-label-brand btn-bold btn-sm btn-icon-h" id="kt_subheader_group_actions_fetch" data-toggle="modal" data-target="#kt_datatable_records_fetch_modal">
                     Fetch Selected
                  </button>
                  <button class="btn btn-label-brand btn-bold btn-sm btn-icon-h" id="kt_subheader_group_actions_delete_all">
                     Delete All
                  </button>
               </div>
            </div>
         </div>
         <div class="kt-subheader__toolbar">
            <a href="#" class="">
            </a>
            <!-- <a href="custom/users/add.html" class="btn btn-brand btn-bold">
               Add User </a> -->
<!--             <div class="kt-subheader__wrapper">
               <div class="dropdown dropdown-inline" data-toggle="kt-tooltip-" title="Quick actions" data-placement="left">
                  <a href="#" class="btn btn-label-brand btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <i class="flaticon2-plus"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-fit dropdown-menu-md dropdown-menu-right"> -->
                     <!--begin::Nav-->
<!--                      <ul class="kt-nav">
                        <li class="kt-nav__head">
                           Add New:
                           <i class="flaticon2-information" data-toggle="kt-tooltip" data-placement="right" title="Click to learn more..."></i>
                        </li>
                        <li class="kt-nav__separator"></li>
                        <li class="kt-nav__item">
                           <a href="#" class="kt-nav__link">
                              <i class="kt-nav__link-icon flaticon2-drop"></i>
                              <span class="kt-nav__link-text">Orders</span>
                           </a>
                        </li>
                        <li class="kt-nav__item">
                           <a href="#" class="kt-nav__link">
                              <i class="kt-nav__link-icon flaticon2-new-email"></i>
                              <span class="kt-nav__link-text">Members</span>
                              <span class="kt-nav__link-badge">
                                 <span class="kt-badge kt-badge--brand kt-badge--rounded">15</span>
                              </span>
                           </a>
                        </li>
                        <li class="kt-nav__item">
                           <a href="#" class="kt-nav__link">
                              <i class="kt-nav__link-icon flaticon2-calendar-8"></i>
                              <span class="kt-nav__link-text">Reports</span>
                           </a>
                        </li>
                        <li class="kt-nav__item">
                           <a href="#" class="kt-nav__link">
                              <i class="kt-nav__link-icon flaticon2-link"></i>
                              <span class="kt-nav__link-text">Finance</span>
                           </a>
                        </li>
                        <li class="kt-nav__separator"></li>
                        <li class="kt-nav__foot">
                           <a class="btn btn-label-brand btn-bold btn-sm" href="#">More options</a>
                           <a class="btn btn-clean btn-bold btn-sm kt-hidden" href="#" data-toggle="kt-tooltip" data-placement="right" title="Click to learn more...">Learn more</a>
                        </li>
                     </ul> -->
                     <!--end::Nav-->

<!--                   </div>
               </div>
            </div> -->
         </div>
      </div>
   </div>

   <!-- end:: Content Head -->

   <!-- begin:: Content -->
   <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

      <!--begin: Row-->
      <div class="row">
         @foreach($teachers as $teacher)
         <div class="col-xl-4 col-lg-6">

            <!--begin::Portlet-->
            <div class="kt-portlet kt-portlet--height-fluid">
               <div class="kt-widget kt-widget--general-2">
                  <div class="kt-portlet__body kt-portlet__body--fit">
                <div class="progress" style="height: 2px;">



                  <div class="progress-bar bg-success bg-brand" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                     </div>

<div class="d-flex flex-row-reverse">
  <div class="p-2"><div class="dropdown dropdown-inline pull-left">
   <button type="button" class="btn btn-hover-brand btn-elevate-hover btn-icon btn-sm btn-icon-md btn-circle pull-left" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                             <i class="flaticon-more-1"></i>
                                          </button>
                                          <div class="dropdown-menu dropdown-menu-left" style="margin-left:-150px; ">
                                             <a class="dropdown-item" href="#"><i class="la la-plus"></i> New Report</a>
                                             <a class="dropdown-item" href="#"><i class="la la-user"></i> Add Customer</a>
                                             <a class="dropdown-item" href="#"><i class="la la-cloud-download"></i> New Download</a>
                                             <div class="dropdown-divider"></div>
                                             <a class="dropdown-item" href="#"><i class="la la-cog"></i> Settings</a>
                                          </div>
                                       </div>
                                    </div>
 
</div>


   <div class="kt-widget__top" style="margin-top: -50px;">
                        <div class="kt-media kt-media--lg kt-media--circle">
                           {{-- Need to insert teacher image here --}}
                           <!-- <img src="assets/media/users/100_6.jpg" alt="image"> -->
                           <img src="assets/media/users/default.jpg" alt="image">
                           
                        </div>
                        <div class="kt-widget__wrapper">
                           <div class="kt-widget__label">
                              <a href="#" class="kt-widget__title">
                                 {{ucfirst($teacher->first_name)}} {{ucfirst($teacher->last_name)}}
                              </a>
                              <span class="kt-widget__desc">
                                 {{$teacher->work_email}}
                              </span>
<!--                               <span class="kt-widget__desc">
                                 {{$teacher->personal_email}}
                              </span> -->
                           </div>
                           <div class="kt-widget__toolbar">
                              <a href="#" class="btn btn-icon btn-circle btn-label-facebook">
                                 <i class="socicon-googlegroups"></i>
                              </a>
                              <a href="#" class="btn btn-icon btn-circle btn-label-twitter">
                                 <i class="socicon-mail"></i>
                              </a>
                              <a href="#" class="btn btn-icon btn-circle btn-label-linkedin">
                                 <i class="socicon-identica"></i>
                              </a>
                           </div>
                        </div>
                     </div>
                     <div class="kt-widget__bottom">
                        <!--<div class="kt-widget__progress">
                           <div class="kt-widget__stat">
                              <span class="kt-widget__caption">Progress</span>
                              <span class="kt-widget__value">40</span>
                           </div>
                           <div class="progress">-->

                              <!-- Doc: A bootstrap progress bar can be used to show a user how far along it's in a process, see https://getbootstrap.com/docs/4.1/components/progress/ -->
                              <!--<div class="progress-bar bg-brand" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                           </div>
                        </div>-->
                        <div class="kt-widget__actions">
                  <!--          <a href="#" class="btn btn-default btn-sm btn-bold btn-upper">chat</a> -->
                           <a href="custom/profile/overview-1.html" target="_blank" class="btn btn-default btn-sm btn-bold btn-upper">profile</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!--end::Portlet-->
         </div>
         @endforeach
      </div>
      <!--end: Row-->
<div class="kt-pagination kt-pagination--brand kt-margin-t-10">
{!! $teachers->links() !!}
</div>
      <!--begin: Pagination-->
<!--       <div class="kt-pagination kt-pagination--brand kt-margin-t-10">
         <ul class="kt-pagination__links">
            <li class="kt-pagination__link--first">
               <a href="#"><i class="fa fa-angle-double-left"></i></a>
            </li>
            <li class="kt-pagination__link--next">
               <a href="#"><i class="fa fa-angle-left"></i></a>
            </li>
            <li>
               <a href="#">...</a>
            </li>
            <li>
               <a href="#">29</a>
            </li>
            <li>
               <a href="#">30</a>
            </li>
            <li class="kt-pagination__link--active">
               <a href="#">32</a>
            </li>
            <li>
               <a href="#">34</a>
            </li>
            <li>
               <a href="#">...</a>
            </li>
            <li class="kt-pagination__link--prev">
               <a href="#"><i class="fa fa-angle-right"></i></a>
            </li>
            <li class="kt-pagination__link--last">
               <a href="#"><i class="fa fa-angle-double-right"></i></a>
            </li>
         </ul>
         <div class="kt-pagination__toolbar">
            <select class="form-control" style="width: 60px;">
               <option value="10">10</option>
               <option value="20">20</option>
               <option value="30">30</option>
               <option value="50">50</option>
               <option value="100">100</option>
            </select>
            <span class="pagination__desc">
               10 of 230
            </span>
         </div>
      </div> -->

      <!--end: Pagination-->
   </div>

   <!-- end:: Content -->
</div>
@endsection