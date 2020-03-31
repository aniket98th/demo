@extends('layouts.app')
@section('title', 'Quick')

@push('head-script')
<link href="{{URL::asset('assets/css/enter-time-off.css')}}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
    <!-- begin:: Subheader -->
 <div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">Teacher Planned Absence </h3>      
        </div>
    </div>
</div>

    <!-- end:: Subheader -->
    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="kt-portlet">
                    <div class="kt-portlet__body">
                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-8">
                                <div class="myRadioGroup">
                                    <form class="kt-form">
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-4 col-form-label">Teacher</label>
                                        <div class="col-8">
                                            <select class="form-control" id="exampleSelectd">
                                                <option>Selected Teacher</option>
                                                <option>Selected Teacher</option>
                                                <option>Selected Teacher</option>
                                                <option>Selected Teacher</option>
                                                <option>Selected Teacher</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-4 col-form-label">Absence Title</label>
                                        <div class="col-8">
                                            <input class="form-control" type="text"  placeholder="Enter Title" value="" id="example-text-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-4"></div>
                                        <div class="col-lg-8">
                                            <div class="kt-radio-inline">
                                                <label class="kt-radio kt-radio--brand">
                                                    <input type="radio" name="day_time_off" checked="" id="day_time_off"> Day
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio kt-radio--brand">
                                                    <input type="radio" name="day_time_off" id="batch_time_off"> Batch
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="Radio-content-wrap">
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-4 col-sm-12">Start Date</label>
                                            <div class="col-8">
                                                <div class="input-group date">
                                                    <input type="text" readonly="" name="start_date" value="" class="start_date form-control" id="start_date" aria-describedby="start_date-error" aria-invalid="false">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="la la-calendar"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="day_section" class="kt-radio-content">
                                            
                                                
                                                <div class="form-group row">
                                                    <label class="col-form-label col-lg-4 col-sm-12">End Date</label>
                                                    <div class="col-8">
                                                        <div class="input-group date">
                                                            <input type="text" readonly="" name="end_date" value="" class="end_date form-control" id="end_date" aria-describedby="start_date-error" aria-invalid="false">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">
                                                                    <i class="la la-calendar"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-4 col-form-label">No of Days</label>
                                                    <div class="col-8">
                                                        <input class="form-control" type="text" value="" placeholder="No of days" id="example-text-input">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-4 col-form-label">Note</label>
                                                    <div class="col-8">
                                                        <textarea class="form-control" rows="3"></textarea>
                                                    </div>
                                                </div>
                                                <div class="btn-group text-right">
                                                    <button type="reset" class="btn btn-brand">Submit</button>
                                                </div>
                                            
                                        </div>
                                        <div id="batch_section" class="kt-radio-content" style="display: none;">
                                            <div class="form-group row">
                                                <div class="col-lg-4"></div>
                                                <div class="col-lg-8">
                                                    <div class="kt-checkbox-list">
                                                        <label class="kt-checkbox kt-checkbox--bold kt-checkbox--brand">
                                                            <input type="checkbox"> D-TSNM-MW-6PM-M3
                                                            <span></span>
                                                        </label>
                                                        <label class="kt-checkbox kt-checkbox--bold kt-checkbox--brand">
                                                            <input type="checkbox" checked="checked"> D-TSNM-MW-7PM-M5
                                                            <span></span>
                                                        </label>
                                                        <label class="kt-checkbox kt-checkbox--bold kt-checkbox--brand">
                                                            <input type="checkbox"> D-TSNM-MW-8PM-M4
                                                            <span></span>
                                                        </label>
                                                        <label class="kt-checkbox kt-checkbox--bold kt-checkbox--brand">
                                                            <input type="checkbox"> D-TSNM-MW-9PM-M4
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-4 col-form-label">Note</label>
                                                <div class="col-8">
                                                    <textarea class="form-control" rows="3"></textarea>
                                                </div>
                                            </div>
                                            <div class="btn-group text-right">
                                                <button type="reset" class="btn btn-brand">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                </div>
                            </div>
                            <div class="col-lg-2"></div>
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
    <!-- end:: Content -->
</div>
@endsection

@push('footer-script')
<script type="text/javascript">
    var KTBootstrapDatepicker = function() {
        var t;
        t = KTUtil.isRTL() ? {
            leftArrow: '<i class="la la-angle-right"></i>',
            rightArrow: '<i class="la la-angle-left"></i>'
        } : {
            leftArrow: '<i class="la la-angle-left"></i>',
            rightArrow: '<i class="la la-angle-right"></i>'
        };
        return {
            init: function() {
                $("#start_date").datepicker({
                    rtl: KTUtil.isRTL(),
                    todayBtn: "linked",
                    clearBtn: !0,
                    todayHighlight: !0,
                    format: 'yyyy-mm-dd',
                    templates: t
                }),
                $("#end_date").datepicker({
                    rtl: KTUtil.isRTL(),
                    todayBtn: "linked",
                    clearBtn: !0,
                    todayHighlight: !0,
                    format: 'yyyy-mm-dd',
                    templates: t
                })
            }
        }
    }();

   jQuery(document).ready(function() {
      KTBootstrapDatepicker.init();
   });

  $(document).ready(function() {
    $("#day_time_off").click(function() {
        $("#day_section").show();
        $("#batch_section").hide();
    });
    $("#batch_time_off").click(function() {
        $("#batch_section").show();
        $("#day_section").hide();
    });
  });
</script>

@endpush

