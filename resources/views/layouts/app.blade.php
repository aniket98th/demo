<!DOCTYPE html>
<html lang="{{ app()->getLocale()}}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token()}}">

  <!--         <base href="{{URL::asset('/')}}" target="_top">-->
        <meta name="description" content="Latest updates and statistic charts">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!--begin::Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">
        <!--end::Fonts -->
        <!--begin::Page Vendors Styles(used by this page) -->
        <link href="{{URL::asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>

       <!--end::Page Vendors Styles -->
       <!--begin::Global Theme Styles(used by all pages) -->
        <link href="{{URL::asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
         <!--end::Global Theme Styles -->
        <!--begin::Layout Skins(used by all pages) -->
        <link href="{{URL::asset('assets/css/skins/header/base/light.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::asset('assets/css/skins/header/menu/light.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::asset('assets/css/skins/brand/navy.css')}}" rel="stylesheet" type="text/css" />
       <!--end::Layout Skins -->
        <link href="{{URL::asset('assets/css/skins/aside/navy.css')}}" rel="stylesheet" type="text/css" />
          <link href="{{URL::asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
 <!-- <link href="{{URL::asset('assets/css/skins/aside/dashboard.css')}}" rel="stylesheet" type="text/css" /> -->
       
<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css">
        <link rel="shortcut icon" href="{{URL::asset('assets/media/logos/favicon.ico')}}" />
        @stack('head-script')
     </head>
    <!-- end::Head -->
    <!-- begin::Body -->
    <body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed kt-page--loading">
          <div class="spinner-border" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
    <!-- begin:: Header Mobile -->
        <div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
            <div class="kt-header-mobile__logo">
                <a href="index.html">
                    {{Html::image('assets/media/logos/logo.png')}}
                </a>
            </div>
            <div class="kt-header-mobile__toolbar">
                <button class="kt-header-mobile__toolbar-toggler kt-header-mobile__toolbar-toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
                <button class="kt-header-mobile__toolbar-toggler" id="kt_header_mobile_toggler"><span></span></button>
                <button class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
            </div>
        </div>
<div class="kt-grid kt-grid--hor kt-grid--root">

    <!-- begin:: Page -->
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

        @include('partials.keen._aside.base')
        <!-- begin:: Wrapper -->
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

            @include('partials.keen._header.base')
            <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

                     @yield('content') 
                     @yield('page-title')
                      <!-- end:: Header -->
                    <!-- begin:: Footer -->
                        @include('partials.keen._footer.base')
                      <!-- end:: Footer -->

                       <?php 
                       error_reporting(0);
                       if($event_id)
                       {
            $date_json_all= classesDate($event_id); 
          }else{
            $date_json_all=["1-1-1919"];
          }

            ?>
                </div>
             <!-- end:: Wrapper -->
            </div>
          <!-- end:: Page -->
        </div>
      <div id="kt_scrolltop" class="kt-scrolltop">
            <i class="fa fa-arrow-up"></i>
        </div>
     <script>
            var KTAppOptions = {
                "colors": {
                    "state": {
                        "brand": "#5d78ff",
                        "metal": "#c4c5d6",
                        "light": "#ffffff",
                        "accent": "#00c5dc",
                        "primary": "#5867dd",
                        "success": "#34bfa3",
                        "info": "#36a3f7",
                        "warning": "#ffb822",
                        "danger": "#fd3995",
                        "focus": "#9816f4"
                    },
                    "base": {
                        "label": [
                            "#c5cbe3",
                            "#a1a8c3",
                            "#3d4465",
                            "#3e4466"
                        ],
                        "shape": [
                            "#f0f3ff",
                            "#d9dffa",
                            "#afb4d4",
                            "#646c9a"
                        ]
                    }
                }
            };
        </script>
  <!-- end::Global Config -->
      <!--begin::Global Theme Bundle(used by all pages) -->

        <script src="{{URL::asset('assets/plugins/global/plugins.bundle.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('assets/js/scripts.bundle.js')}}" type="text/javascript"></script>
        <!--end::Global Theme Bundle -->
        <!--begin::Page Vendors(used by this page) -->
        <script src="{{URL::asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}" type="text/javascript"></script>
       <!--end::Page Vendors -->
       <!--begin::Page Scripts(used by this page) -->

    <!--begin::Page Vendors(used by this page) -->
    
    <script src="{{URL::asset('assets/plugins/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>

    <!--end::Page Vendors -->

    <!--begin::Page Scripts(used by this page) -->
    <script src="{{URL::asset('assets/js/pages/components/datatables/basic/basic.js')}}" type="text/javascript"></script>

    <!--end::Page Scripts -->


<script src='https://kit.fontawesome.com/a076d05399.js'></script>

<style type="text/css">
   td.highlight > a {
    background: #E50104!important;
    color: #fff!important;
}
</style>
<?php //echo $date_json_all; ?>
 <script type="text/javascript">
var highlight_dates = ['9-3-2020','11-3-2020'];
 
$(document).ready(function(){
 
    $( "#datepicker" ).datepicker( "option", "dateFormat", "yy-mm-dd");

    $("#trig").click(function(){ $("#datepicker").datepicker("show"); }); 
 // Initialize datepicker
 $('#datepicker').datepicker({
  beforeShowDay: function(date){
   var month = date.getMonth()+1;
   var year = date.getFullYear();
   var day = date.getDate();
 
   // Change format of date
   var newdate = day+"-"+month+'-'+year;

   // Set tooltip text when mouse over date
   var tooltip_text = "New event on " + newdate;

   // Check date in Array
   if(jQuery.inArray(newdate, highlight_dates) != -1){
    return [true, "highlight", tooltip_text ];
   }
   return [true];
  }
 });
});

$('#kt_datepicker_1').datepicker({
    format: 'mm/dd/yyyy',
    startDate: '-3d'
});
$('#kt_datepicker_2').datepicker({
    format: 'mm/dd/yyyy',
    startDate: '-3d'
});


$('#kt_datepicker_3').datepicker({
 // $("#kt_datepicker_3").datepicker("option", "defaultDate", new Date(2020,3,3));

    format: 'mm/dd/yyyy',
    startDate: '-3d'
});

/**************function for event****************************************/
function getEvent(id)
{
 if(id!='')  
 {  
var subject_id=$("#subject_id").val();
var teacher_id=$("#teacher_id").val();
//alert(subject_id)
if(subject_id=='')
{
 alert("Please select subject first") ;
 return false ; 
}else{
 $('#loading').show();
   $.ajax({
    url:'/admin/admin-event/get-event/'+id,
    type:'get',
    data: {
    'subject_id': subject_id,
    'teacher_id': teacher_id},
          success:function(response){
            //alert(response)
           $('#loading').hide();
            $('#event').html(response);

           },
           error:function(error){
              console.log(error)
           }
        });
}
}
}

/***************function for notes***************************/
function saveNotes(id)
{
var note_id=$("#note_id").val();
var notes_event_id=$("#notes_event_id").val();
//alert(note_id)

if(note_id=='')
{
 alert("Please enter notes") ;
 return false ; 
}else if(notes_event_id=='')
{
 alert("Please select event") ;
}else{
 $('#loading').show();
   $.ajax({
    url:'/admin/admin-event/notes/'+id,
    type:'get',
    data: {
    'note_id': note_id,
    'user_id': 1,
    'event_id': notes_event_id
  },
          success:function(response){
           // alert(response)
          $('#loading').hide();
          $('#all_notes').html(response);
           },
           error:function(error){
              console.log(error)
           }
        });
}

}
/**************end function notes************************************/


/***************function for notes***************************/
function saveMessage()
{
var message_id=$("#message_id").val();
var message_hidden_id=$("#message_hidden_id").val();
var teacher_id=$("#tead__hid_id").val();
//alert(message_id)
if(message_id=='')
{
 alert("Please enter mesaage") ;
 return false ; 
}else if(message_hidden_id=='')
{
 alert("Please select event") ;
}else{
 $('#loading').show();
  $.ajax({
    url:'/admin/admin-event/message/'+teacher_id,
    type:'get',
    data: {'note_id': message_id,'teacher_id': 1,'event_id': message_hidden_id},
          success:function(response){
          // alert(response)
          $('#loading').hide();
          $('#all_mesage_response').html(response);
           },
           error:function(error){
              console.log(error)
           }
        });
}

}
$('#example').DataTable( {
    paging: true,
    searching: false,
     bFilter: false,
    bInfo: false,
    bPaginate: false,

   //"scrollX": false,
   //"scrollY": false

} );
/**************end function message************************************/
 </script>
<!--end::Page Scripts -->
@stack('footer-script')

</body>
