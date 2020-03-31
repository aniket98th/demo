@extends('layouts.app')
@section('title', 'Quick')

@push('head-script')
<link href="{{URL::asset('assets/css/move-student.css')}}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
    <!-- begin:: Subheader -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid " style="width:40%;">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">Events</h3>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">
                        Move Student 
                    </a>
                </div>
                <!-----con--------->
            </div>
        </div>
        <!--start form contaner-->
        <div class="container" >
        </div>

        <!--end contaner-->
    </div>


    <!-- end:: Subheader -->
    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="row">
    <div class="col-lg-12">
        <div class="kt-portlet">
            <div class="kt-portlet__body">
                <div class="selected-wrapper">
                    <div class="row">
                          <div class="col-md-12">
                            <div class="selected-wrapper">
                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="listbox__title">Source Batch</div>
                                        <div class="selected-wrap">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <select class="form-control" id="exampleSelect1">
                                                        <option>Subject</option>
                                                        <option value="1">2</option>
                                                        <option value="1">3</option>
                                                        <option value="1">4</option>
                                                        <option value="1">5</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-4">
                                                    <select class="form-control" id="exampleSelect1">
                                                        <option>Teacher</option>
                                                        <option value="1">2</option>
                                                        <option value="1">3</option>
                                                        <option value="1">4</option>
                                                        <option value="1">5</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-5">
                                                    <select class="form-control" id="exampleSelect1">
                                                        <option>Event</option>
                                                        <option value="1">2</option>
                                                        <option value="1">3</option>
                                                        <option value="1">4</option>
                                                        <option value="1">5</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-5">
                                        <div class="listbox__title">Destination Batch</div>
                                        <div class="selected-wrap">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <select class="form-control" id="exampleSelect1">
                                                        <option>Subject</option>
                                                        <option value="1">2</option>
                                                        <option value="1">3</option>
                                                        <option value="1">4</option>
                                                        <option value="1">5</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-4">
                                                    <select class="form-control" id="exampleSelect1">
                                                        <option>Teacher</option>
                                                        <option value="1">2</option>
                                                        <option value="1">3</option>
                                                        <option value="1">4</option>
                                                        <option value="1">5</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-5">
                                                    <select class="form-control" id="exampleSelect1">
                                                        <option>Event</option>
                                                        <option value="1">2</option>
                                                        <option value="1">3</option>
                                                        <option value="1">4</option>
                                                        <option value="1">5</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="jp-multiselect row">
                              <div class="col-lg-5">
                                <select name="from[]" class="select-control" size="8" multiple="multiple">
                                  <option value="1" style='background-image:url("<?php echo asset('assets/media/users/profile.png'); ?>");background-repeat: no-repeat;background-position: 15px 8px;padding-left: 80px;    background-size: 48px;'> Pranav Krishna</option>
                                  <option value="2" style='background-image:url("<?php echo asset('assets/media/users/profile.png'); ?>");background-repeat: no-repeat;background-position: 15px 8px;padding-left: 80px;    background-size: 48px;'> Navkiran Kour Singh</option>
                                  <option value="3" style='background-image:url("<?php echo asset('assets/media/users/profile.png'); ?>");background-repeat: no-repeat;background-position: 15px 8px;padding-left: 80px;    background-size: 48px;'> Kavya Uppalapati</option>
                                  <option value="4" style='background-image:url("<?php echo asset('assets/media/users/profile.png'); ?>");background-repeat: no-repeat;background-position: 15px 8px;padding-left: 80px;    background-size: 48px;'> Aravind K</option>
                                </select>
                              </div>
                              <div class="move-panel col-lg-2">
                                <button type="button" class="btn-move-all-right btn-primary"></button>
                                <button type="button" class="btn-move-selected-right"></button>
                                <button type="button" class="btn-move-all-left"></button>
                                <button type="button" class="btn-move-selected-left"></button>
                              </div>
                              <div class="col-lg-5">
                                <select name="to[]" class="select-control" size="8" multiple="multiple">
                                    <option value="1" style='background-image:url("<?php echo asset('assets/media/users/profile.png'); ?>");background-repeat: no-repeat;background-position: 15px 8px;padding-left: 80px;    background-size: 48px;'> Pranav Krishna</option>
                                  <option value="2" style='background-image:url("<?php echo asset('assets/media/users/profile.png'); ?>");background-repeat: no-repeat;background-position: 15px 8px;padding-left: 80px;    background-size: 48px;'> Navkiran Kour Singh</option>
                                  <option value="3" style='background-image:url("<?php echo asset('assets/media/users/profile.png'); ?>");background-repeat: no-repeat;background-position: 15px 8px;padding-left: 80px;    background-size: 48px;'> Kavya Uppalapati</option>
                                  <option value="4" style='background-image:url("<?php echo asset('assets/media/users/profile.png'); ?>");background-repeat: no-repeat;background-position: 15px 8px;padding-left: 80px;    background-size: 48px;'> Aravind K</option>
                                </select>
                              </div>
                            </div>
                          </div>


                    </div>
                </div>
                <div class="footer-wrapper">
                    <div class="footer-block">  
                        <div class="btnRow">
                            <button type="button" class="btn btn-secondary btn-wide">Reset</button>
                        </div>
                        <div class="btnRow">
                            <div class="kt-portlet__head-group">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-focus btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Actions
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" style="">
                                        <a class="dropdown-item" href="#">Move Students</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModal">Promote All</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!---Modal start-->
                <div class="kt-section__content kt-section__content--border">
                    <!-- Modal -->
                    <div class="modal fade bd-example-modal-sm" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Select Module</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="modal-content-wrap">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <form class="kt-form" action="">
                                                    <select class="form-control" id="exampleSelect1">
                                                        <option>Module 1</option>
                                                        <option value="1">Module 2</option>
                                                        <option value="1">Module 3</option>
                                                        <option value="1">Module 4</option>
                                                        <option value="1">Module 5</option>
                                                    </select>
                                                    <button type="Submit" class="btn btn-primary">Submit</button>
                                                </form>
                                            </div>
                                            <div class="col-lg-3"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!---Modal end-->
            </div>
        </div>
    </div>
</div>
</div>
    </div>
 </div>
    <!-- end:: Content -->
</div>
</div>
@endsection

@push('footer-script')
<script src="https://www.jqueryscript.net/demo/Dual-List-Box-Multi-Selection/jquery.multi-selection.v1.js"></script>
<script>
  $(function(){
  $(".jp-multiselect").jQueryMultiSelection();

});
</script>
@endpush