 @extends('layouts.app')
@section('title', 'Quick')

@push('head-script')
<link href="{{URL::asset('assets/css/module-certificate.css')}}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
    <!-- begin:: Subheader -->
 <div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">Teacher Module Certificate </h3>      
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
                        <div class="select-group-wrapper">
                            <div class="row">
                                <div class="col-lg-3">
                                    <select class="form-control" id="exampleSelect1">
                                        <option>Tasneem Oz</option>
                                        <option value="1">Tasneem Oz</option>
                                        <option value="1">Tasneem Oz</option>
                                        <option value="1">Tasneem Oz</option>
                                        <option value="1">Tasneem Oz</option>
                                    </select>
                                </div>
                                <div class="col-lg-3"></div>
                                <div class="col-lg-3"></div>
                                <div class="col-lg-3"></div>
                            </div>
                        </div>
                        <div class="accourdian-group-wrapper">
                            <div class="accordion accordion-outline" id="accordionExample3">
                                <div class="card">
                                    <div class="card-header" id="headingOne3">
                                        <div class="card-title" data-toggle="collapse" data-target="#collapseOne3" aria-expanded="true" aria-controls="collapseOne3">
                                            <ul>
                                               <li><strong>Math</strong></li> 
                                               <li>
                                                   <div class="selection-choice">
                                                       Grade 2<span class="choice-remove" role="presentation">×</span>
                                                   </div>
                                               </li>  
                                               <li>
                                                   <div class="selection-choice">
                                                       Grade 3<span class="choice-remove" role="presentation">×</span>
                                                   </div>
                                               </li>  
                                               <li>
                                                   <div class="selection-choice">
                                                       Grade 4<span class="choice-remove" role="presentation">×</span>
                                                   </div>
                                               </li>  
                                               <li>
                                                   <div class="selection-choice">
                                                       Grade 5<span class="choice-remove" role="presentation">×</span>
                                                   </div>
                                               </li>    
                                            </ul>
                                        </div>
                                    </div>
                                    <div id="collapseOne3" class="card-body-wrapper collapse show" aria-labelledby="headingOne3" data-parent="#accordionExample3">
                                        <div class="multiselect-body-wrapper card-body">
                                            <select name="" id="math_subject_module" class="Module_Subject m-b-10 kt-select2" multiple="multiple">
                                                <option value=""> Module</option>
                                                <option value="CODING"  >CODING</option>
                                                <option value="ELA"  >ELA</option>
                                                <option value="MATH"  >MATH</option>
                                                <option value="PSAT-SAT"  >PSAT-SAT</option>
                                            </select>
                                            <button type="button" class="btn btn-brand">Add</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo3">
                                        <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseTwo3" aria-expanded="false" aria-controls="collapseTwo3">
                                            <ul>
                                               <li><strong>Eng</strong></li> 
                                               <li>
                                                   <div class="selection-choice">
                                                       Grade 4<span class="choice-remove" role="presentation">×</span>
                                                   </div>
                                               </li>  
                                               <li>
                                                   <div class="selection-choice">
                                                       Grade 5<span class="choice-remove" role="presentation">×</span>
                                                   </div>
                                               </li>    
                                            </ul>
                                        </div>
                                    </div>
                                    <div id="collapseTwo3" class="card-body-wrapper collapse" aria-labelledby="headingTwo2" data-parent="#accordionExample3">
                                        <div class="multiselect-body-wrapper card-body">
                                            <select name="" id="ela_subject_module" class="Module_Subject m-b-10 kt-select2" multiple="multiple">
                                                <option value=""> Module</option>
                                                <option value="CODING"  >CODING</option>
                                                <option value="ELA"  >ELA</option>
                                                <option value="MATH"  >MATH</option>
                                                <option value="PSAT-SAT"  >PSAT-SAT</option>
                                            </select>
                                            <button type="button" class="btn btn-brand">Add</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="footer-wrapper">
                            <div class="footer-block">  
                                <div class="btnRow text-right">
                                    <button type="button" class="btn btn-secondary btn-wide">Reset</button>
                                    <button type="reset" class="btn btn-brand">Submit</button>
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
    <!-- end:: Content -->
</div>
@endsection

@push('footer-script')
<script type="text/javascript">

   var SubjectModule = {
        init: function() {
            $("#math_subject_module").select2(),
            $("#ela_subject_module").select2()
        }
    };
   jQuery(document).ready(function() {
      SubjectModule.init();
   });
</script>
@endpush

