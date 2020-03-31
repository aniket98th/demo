 @extends('layouts.app')
@section('title', 'Quick')

@push('head-script')
<link href="{{URL::asset('assets/css/pages/wizards/wizard-v2.css')}}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
    <!-- begin:: Subheader -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid " style="width:40%;">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">Teacher Onboarding</h3>
                <span class="kt-subheader__separator kt-hidden"></span>
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
      <div class="kt-portlet">
    <div class="kt-portlet__body kt-portlet__body--fit">
      <div class="kt-grid kt-grid--desktop-xl kt-grid--ver-desktop-xl  kt-wizard-v2" id="teacher_onboarding" data-ktwizard-state="first">
         <div class="kt-grid__item kt-wizard-v2__aside">

            <!--begin: Form Wizard Nav -->
            <div class="kt-wizard-v2__nav">
               <!--doc: Remove "kt-wizard-v2__nav-items--clickable" class and also set 'clickableSteps: false' in the JS init to disable manually clicking step titles -->
               <div class="kt-wizard-v2__nav-items kt-wizard-v2__nav-items--clickable">
                  <div class="kt-wizard-v2__nav-item" data-ktwizard-type="step" data-ktwizard-state="current">
                     <span>1</span><i class="fa fa-check"></i> Basic Details
                  </div>
                  <div class="kt-wizard-v2__nav-item" data-ktwizard-type="step" data-ktwizard-state="pending">
                     <span>2</span><i class="fa fa-check"></i> Contact Details
                  </div>
                  <div class="kt-wizard-v2__nav-item" data-ktwizard-type="step" data-ktwizard-state="pending">
                     <span>3</span><i class="fa fa-check"></i> Week Availability
                  </div>
               </div>
            </div>
            <!--end: Form Wizard Nav -->

         </div>
         <div class="kt-grid__item kt-grid__item--fluid kt-wizard-v2__wrapper">
            <!--begin: Form Wizard Form-->
            <form class="kt-form" id="teacher_onboarding_form" novalidate="novalidate">

               <!--begin: Form Wizard Step 1-->
               <div class="kt-wizard-v2__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
                  <div class="kt-separator kt-separator--height-xs"></div>
                  <div class="kt-form__section kt-form__section--first">
                     <div class="row">
                        <!-- <div class="col-xl-6">
                           <div class="form-group">
                              <label>Country:</label>
                              <select name="country" class="form-control">
                                 <option value="">Select</option>
                                 <option value="US" selected="">United States</option>
                                 <option value="IN">India</option>
                                 <option value="IN">Germany</option>
                                 <option value="AF">Afghanistan</option>
                                 <option value="AX">Åland Islands</option>
                                 <option value="AL">Albania</option>
                                 <option value="DZ">Algeria</option>
                                 <option value="AS">American Samoa</option>
                                 <option value="AD">Andorra</option>
                                 <option value="AO">Angola</option>
                                 <option value="AI">Anguilla</option>
                              </select>
                           </div>
                        </div> -->
                        <div class="col-xl-6">
                           <div class="form-group">
                              <label>Timezone:</label>
                              <select name="timezone" class="form-control">
                                 <option value="">Select</option>
                                 <option value="PST">PST</option>
                                 <option value="CST">CST</option>
                                 <option value="PDT">PDT</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-xl-6">
                           <div class="form-group">
                              <label>Module:</label>
                              <select name="subject_module" id="subject_module"   multiple="multiple" class="form-control kt-select2">
                                 <option value="">Select</option>
                                 <option value="1">GRADE1</option>
                                 <option value="2">GRADE2</option>
                                 <option value="3">GRADE3</option>
                                 <option value="4">GRADE4</option>
                                 <option value="5">GRADE5</option>
                                 <option value="6">GRADE6</option>
                                 <option value="7">GRADE7</option>
                                 <option value="8">GRADE8</option>
                                 <option value="9">ALGEBRA1</option>
                                 <option value="10">ALGEBRA2</option>
                              </select>
                           </div>
                        </div>
                     </div>
                   <!--   <div class="row">
                        <div class="col-xl-6">
                           <div class="form-group">
                              <label>Module:</label>
                              <select name="subject_module" id="subject_module"   multiple="multiple" class="form-control kt-select2">
                                 <option value="">Select</option>
                                 <option value="1">GRADE1</option>
                                 <option value="2">GRADE2</option>
                                 <option value="3">GRADE3</option>
                                 <option value="4">GRADE4</option>
                                 <option value="5">GRADE5</option>
                                 <option value="6">GRADE6</option>
                                 <option value="7">GRADE7</option>
                                 <option value="8">GRADE8</option>
                                 <option value="9">ALGEBRA1</option>
                                 <option value="10">ALGEBRA2</option>
                              </select>
                           </div>
                        </div>
                     </div> -->
                  </div>
               </div>
               <!--end: Form Wizard Step 1-->

               <!--begin: Form Wizard Step 2-->
               <div class="kt-wizard-v2__content" data-ktwizard-type="step-content">
                  <div class="kt-separator kt-separator--height-xs"></div>
                  <div class="kt-form__section kt-form__section--first">
                     <div class="row">
                        <div class="col-lg-6">
                                 <div class="form-group">
                                    <label>First Name:</label>
                                    <input type="text" class="form-control" name="first_name" placeholder="Enter first name" value="" id="f_name">
                                 </div>
                                 <div class="form-group">
                                    <label>Short Name:  <a href="javascript:void(0)" style="display:none;" id="sn_chng">(Change)</a></label>
                                    <input type="text" class="form-control" name="short_name" placeholder="Enter short number" value="" id="s_name">
                                  
                                </div>
                              <div class="form-group">
                                 <label>Personal Email:</label>
                                 <input type="text" class="form-control" name="personal_email" placeholder="Enter personal email" value="">
                              </div>
                              
                        </div>
                        <div class="col-lg-6">
                           <div class="form-group">
                                 <label>Last Name:</label>
                                 <input type="text" class="form-control" name="last_name" placeholder="Enter your last name" value="" id="l_name">
                              </div>
                              <div class="form-group">
                                 <label>Work Email:</label>
                                 <input type="text" class="form-control" name="work_email" placeholder="Enter work email" value="">
                              </div>
                           <div class="form-group">
                                 <label>Phone Number:</label>
                                 <input type="text" class="form-control" name="phone" placeholder="Enter your phone number" value="">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!--end: Form Wizard Step 2-->

               <!--begin: Form Wizard Step 3-->
               <div class="kt-wizard-v2__content" data-ktwizard-type="step-content">
                  <div class="kt-separator kt-separator--height-xs"></div>
                  <div class="kt-form__section kt-form__section--first">
                     <div class="row">
                        <div class="col-xl-6">
                           <div class="form-group">
                              <label>Teacher Admin:</label>
                              <select name="teacher_admin" class="form-control">
                                 <option value="">Select</option>
                                 <option value="a">A</option>
                                 <option value="B">B</option>
                                 <option value="C">C</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-xl-6">
                        </div>
                     </div>
                     <div class="form-group">
                        <label>Week Availability in CST</label>
                     </div>
                     <div class="row">
                        <div class="col-xl-6">
                           <div class="form-group">
                              <label>Monday:</label>
                              <select name="monday_time[]" id="monday_time"
                                  class="monday_time m-b-10 kt-select2"
                                  style="width: 100%" multiple="multiple"
                                  data-placeholder="Monday Availability">
                                  <option value="">Start Time</option>
                                  <?php for ($i=0; $i < 24; $i++) { ?>
                                      <option value="<?php echo date('H:i',strtotime($i.":00")); ?>"><?php  if(date('H:i A',strtotime($i.":00")) == "00:00 AM") echo "12:00 AM"; else echo date('h:i A',strtotime($i.":00")); ?></option>
                                  <?php } ?>
                              </select>
                           </div>
                        </div>
                        <div class="col-xl-6">
                           <div class="form-group">
                              <label>Tuesday:</label>
                              <select name="tuesday_time[]" id="tuesday_time"
                                  class="tuesday_time m-b-10 kt-select2"
                                  style="width: 100%" multiple="multiple"
                                  data-placeholder="Tuesday Availability">
                                  <option value="">Start Time</option>
                                  <?php for ($i=0; $i < 24; $i++) { ?>
                                      <option value="<?php echo date('H:i',strtotime($i.":00")); ?>"><?php  if(date('H:i A',strtotime($i.":00")) == "00:00 AM") echo "12:00 AM"; else echo date('h:i A',strtotime($i.":00")); ?></option>
                                  <?php } ?>
                              </select>
                           </div>
                        </div>
                        <div class="col-xl-6">
                           <div class="form-group">
                              <label>Wednesday:</label>
                                <select name="wednesday_time[]" id="wednesday_time"
                                  class="wednesday_time m-b-10 kt-select2"
                                  style="width: 100%" multiple="multiple"
                                  data-placeholder="Wednesday Availability">
                                  <option value="">Start Time</option>
                                  <?php for ($i=0; $i < 24; $i++) { ?>
                                      <option value="<?php echo date('H:i',strtotime($i.":00")); ?>"><?php  if(date('H:i A',strtotime($i.":00")) == "00:00 AM") echo "12:00 AM"; else echo date('h:i A',strtotime($i.":00")); ?></option>
                                  <?php } ?>
                              </select>
                           </div>

                        </div>
                        <div class="col-xl-6">
                           <div class="form-group">
                              <label>Thursday:</label>
                              <select name="thursday_time[]" id="thursday_time"
                                  class="thursday_time m-b-10 kt-select2"
                                  style="width: 100%" multiple="multiple"
                                  data-placeholder="Thursday Availability">
                                  <option value="">Start Time</option>
                                  <?php for ($i=0; $i < 24; $i++) { ?>
                                      <option value="<?php echo date('H:i',strtotime($i.":00")); ?>"><?php  if(date('H:i A',strtotime($i.":00")) == "00:00 AM") echo "12:00 AM"; else echo date('h:i A',strtotime($i.":00")); ?></option>
                                  <?php } ?>
                              </select>
                           </div>
                        </div>
                        <div class="col-xl-6">
                           <div class="form-group">
                              <label>Friday:</label>
                              <select name="friday_time[]" id="friday_time"
                                  class="friday_time m-b-10 kt-select2"
                                  style="width: 100%" multiple="multiple"
                                  data-placeholder="Friday Availability">
                                  <option value="">Start Time</option>
                                  <?php for ($i=0; $i < 24; $i++) { ?>
                                      <option value="<?php echo date('H:i',strtotime($i.":00")); ?>"><?php  if(date('H:i A',strtotime($i.":00")) == "00:00 AM") echo "12:00 AM"; else echo date('h:i A',strtotime($i.":00")); ?></option>
                                  <?php } ?>
                              </select>
                           </div>
                        </div>
                        <div class="col-xl-6">
                           <div class="form-group">
                              <label>Saturday:</label>
                              <select name="saturday_time[]" id="saturday_time"
                                  class="saturday_time m-b-10 kt-select2"
                                  style="width: 100%" multiple="multiple"
                                  data-placeholder="Saturday Availability">
                                  <option value="">Start Time</option>
                                  <?php for ($i=0; $i < 24; $i++) { ?>
                                      <option value="<?php echo date('H:i',strtotime($i.":00")); ?>"><?php  if(date('H:i A',strtotime($i.":00")) == "00:00 AM") echo "12:00 AM"; else echo date('h:i A',strtotime($i.":00")); ?></option>
                                  <?php } ?>
                              </select>
                           </div>
                        </div>
                        <div class="col-xl-6">
                           <div class="form-group">
                              <label>Sunday:</label>
                              <select name="sunday_time[]" id="sunday_time"
                                  class="sunday_time m-b-10 kt-select2"
                                  style="width: 100%" multiple="multiple"
                                  data-placeholder="Sunday Availability">
                                  <option value="">Start Time</option>
                                  <?php for ($i=0; $i < 24; $i++) { ?>
                                      <option value="<?php echo date('H:i',strtotime($i.":00")); ?>"><?php  if(date('H:i A',strtotime($i.":00")) == "00:00 AM") echo "12:00 AM"; else echo date('h:i A',strtotime($i.":00")); ?></option>
                                  <?php } ?>
                              </select>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!--end: Form Wizard Step 3-->

               <!--begin: Form Actions -->
               <div class="kt-form__actions pull-right">
                  <div class="btn btn-outline-brand btn-md btn-tall btn-wide btn-bold btn-upper" data-ktwizard-type="action-prev">
                     Previous
                  </div>&nbsp;
                  <div class="btn btn-brand btn-md btn-tall btn-wide btn-bold btn-upper" data-ktwizard-type="action-submit">
                     Submit
                  </div>&nbsp;
                  <div class="btn btn-brand btn-md btn-tall btn-wide btn-bold btn-upper" data-ktwizard-type="action-next">
                     Next Step
                  </div>
               </div>
               <!--end: Form Actions -->
            </form>
            <!--end: Form Wizard Form-->
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
   var KTTeacherWizard = function() {
        var e, r, i;
        return {
            init: function() {
                var t;
                KTUtil.get("teacher_onboarding"), e = $("#teacher_onboarding_form"), (i = new KTWizard("teacher_onboarding", {
                    startStep: 1,
                    clickableSteps: !0
                })).on("beforeNext", function(e) {
                    !0 !== r.form() && e.stop()
                }), i.on("beforePrev", function(e) {
                    !0 !== r.form() && e.stop()
                }), i.on("change", function(e) {
                    KTUtil.scrollTop()
                }), r = e.validate({
                    ignore: ":hidden",
                    rules: {
                    },
                    messages: {
                        "recurence[]": {
                            required: "Please select any recurence."
                        }
                    },
                    invalidHandler: function(e, r) {
                        KTUtil.scrollTop(), swal.fire({
                            title: "",
                            text: "There are some errors in your submission. Please correct them.",
                            type: "error",
                            confirmButtonClass: "btn btn-secondary m-btn m-btn--wide"
                        })
                    },
                    submitHandler: function(e) {}
                }), (t = e.find('[data-ktwizard-type="action-submit"]')).on("click", function(i) { 
                    //alert("SUBMIITTED");
                    //$('.ajax-loader').show();

                    var current_url = $(location). attr("href");
            })
            }
        }
    }();

    var KTSelect2 = {
        init: function() {
            $(".monday_time").select2(),
            $(".tuesday_time").select2(),
            $(".wednesday_time").select2(),
            $(".thursday_time").select2(),
            $(".friday_time").select2(),
            $(".saturday_time").select2(),
            $(".sunday_time").select2()

        }
    };

    "use strict";
var KTBootstrapDatetimepicker = {
    init: function() {
        $("#wednesday").datetimepicker({
            format: "hh:ii",
            showMeridian: !0,
            todayHighlight: !0,
            autoclose: !0,
            startView: 1,
            minView: 0,
            maxView: 1,
            forceParse: 0,
            pickerPosition: "bottom-left"
        })
    }
};
   var SubjectModule = {
        init: function() {
            $("#subject_module").select2()
        }
    };
   jQuery(document).ready(function() {
      KTTeacherWizard.init();
      KTSelect2.init();
      KTBootstrapDatetimepicker.init();
      SubjectModule.init();

//*************************31-03-2020****************************//
      $("#l_name").focusout(function(){
        var fname=$('#f_name').val();
        var lname=$(this).val();
        var shortname=fname.slice(0,1).toUpperCase()+''+lname.slice(0,3).toUpperCase();
        $('#s_name').val(shortname);
        $('#sn_chng').show();
        $("#s_name").prop("readonly", true);
      });

      $('#sn_chng').click(function(){
        $('#s_name').focus();
        $("#s_name").prop("readonly", false);
      }); 
      $("#s_name").focusout(function(){
        $(this).val($(this).val().toUpperCase());
        $("#s_name").prop("readonly", true);
      });

      $('#monday_time').change(function(){
 
        if($(this).val().indexOf('18:00')!=-1)
        {
           var tue=$('#tuesday_time').val();
             if(tue!="")
             {
               var tue1=tue+','+'18:00';
             }
             else
             {
              var tue1='18:00';
             }
            var finaltue = tue1.split(',');
            $('#tuesday_time').val(finaltue).trigger('change');

            var wed=$('#wednesday_time').val();
           if(wed!="")
           {
             var wed1=wed+','+'18:00';
           }
           else
           {
            var wed1='18:00';
           }
            var finalwed = wed1.split(',');
            $('#wednesday_time').val(finalwed).trigger('change');


            var thu=$('#thursday_time').val();
           if(thu!="")
           {
             var thu1=thu+','+'18:00';
           }
           else
           {
            var thu1='18:00';
           }
            var finalthu = thu1.split(',');
           $('#thursday_time').val(finalthu).trigger('change');


           var fri=$('#friday_time').val();
           if(fri!="")
           {
             var fri1=fri+','+'18:00';
           }
           else
           {
            var fri1='18:00';
           }
            var finalfri = fri1.split(',');
           $('#friday_time').val(finalfri).trigger('change');


           var sat=$('#saturday_time').val();
           if(sat!="")
           {
             var sat1=sat+','+'18:00';
           }
           else
           {
            var sat1='18:00';
           }
            var finalsat = sat1.split(',');
           $('#saturday_time').val(finalsat).trigger('change');


           var sun=$('#sunday_time').val();
           if(sun!="")
           {
             var sun1=sun+','+'18:00';
           }
           else
           {
            var sun1='18:00';
           }
            var finalsun = sun1.split(',');
           $('#sunday_time').val(finalsun).trigger('change');
        }
      });
   });
</script>
@endpush

