@extends('layouts.app')
@section('title', 'Quick')
@section('content')
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
    <!-- begin:: Subheader -->
     <!--start loader-->
     <div id="loading">
                <div id="loading_sub">
                    <div class="spinner-border" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </div>
    <!--end loader-->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <!-- start search section-->
        <div class="row" style="margin-left:32px;">
            @php
            $event_id = Session::get('event_id');
            $subject_id = Session::get('subject_id');
            $teacher_id = Session::get('teacher_id');
            $all_student = Session::get('all_student');
           $data_ev = eventData($event_id);
            @endphp
             {!! Form::open([
            'route' => 'admin.admin-event.store',
            'files'=>true,
            'enctype' => 'multipart/form-data',
            'class'=>'form-horizontal'
            ]) !!}

  <div class="row">
  <div class="custom-box-1">
        <i class="fa fa-group"></i> Public</div>
 <div class="custom-box-1">
        12-12-2018
               </div>
   <div class="custom-box-1">
        12-12-2018
               </div>
                <div class="custom-box-3">
                    {!!Form::select('subject_id',$subjects, isset($subject_id)?$subject_id:null, ["class"=>"form-control","id"=>"subject_id",'required','placeholder'=>'Select Subject'])!!}
                </div>
                <div class="col-sm-2">

                    {!!Form::select('teacher_id',$teachers,isset($teacher_id)?$teacher_id:null, ["class"=>"form-control",'required',"id"=>"teacher_id",'placeholder'=>'Select Teacher','onchange'=>'getEvent(this.value)'])!!}
                </div>
                <div class="col-sm-2" id="event">
                    {!!Form::select('event_id',$data_ev, isset($event_id)?$event_id:null, ["class"=>"form-control",'required','placeholder'=>'Select Event'])!!}
                    {{csrf_field()}}
                </div>

   
    <div class="custom-box-4">
    <div class="input-group date" id="trig">
    <input type="hidden" class="form-control " readonly="" value="" id="datepicker" placeholder="Date">
                                 <i class="fas fa-calendar-alt" style="font-size:30px;"></i>
                                                        
    </div>

    </div>
                <div class="custom-box-2">
                    <input type="submit" name="submit" class="btn btn-primary pull-right" value="Go">
                </div>
</div>
{!! Form::close() !!}
</div>
<!--end contaner-->
    </div>

    <!-- end:: Subheader -->
    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="batchViewBlock1">
                   </div>
        <div class="batchViewBlock2">
            <div class="kt-portlet">
                <ul class="nav nav-tabs nav-fill" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#kt_tabs_4_1">Quick View</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#kt_tabs_4_2">Class Update</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#kt_tabs_4_3">Homework</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#kt_tabs_4_4">Performance</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#kt_tabs_4_5">Lesson Plan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#kt_tabs_4_6">Group Message</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <!--tab1 quick-view-->
                    <div class="tab-pane active" id="kt_tabs_4_1" role="tabpanel">
                        @include('partials.admin.event_quick_view.quick_view.quick-view')
                    </div>
                    <!--tab2 class-update-->

                    <div class="tab-pane" id="kt_tabs_4_2" role="tabpanel">
                    @include('partials.admin.event_quick_view.class_update.class-update')
                    </div>
<!--tab3 class-homwork-->
                    <div class="tab-pane" id="kt_tabs_4_3" role="tabpanel">
                        @include('partials.admin.event_quick_view.homework.homework')
                    </div>
                    <!--tab4 performane-->
                    <div class="tab-pane" id="kt_tabs_4_4" role="tabpanel">
                        <h1>Performence</h1>
                    </div>
                     <!--tab5 lession plan-->
                    <div class="tab-pane" id="kt_tabs_4_5" role="tabpanel">
                         @include('partials.admin.event_quick_view.lession_plan.lession-plan')
                    </div>
                    <!--tab 6 message-->
                    <div class="tab-pane" id="kt_tabs_4_6" role="tabpanel">
                    @include('partials.admin.event_quick_view.quick_view.message')
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
    <!-- end:: Content -->
</div>
@endsection


