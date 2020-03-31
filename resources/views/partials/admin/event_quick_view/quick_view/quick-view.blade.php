<div class="batchViewBlock2Sec1">
    <ul class="clearfix">
        <li>
            <i class="flaticon-calendar-2"></i>
            12-Feb-2020
        </li>
        <li>
            <i class="flaticon-clock-1"></i>
            07 PM
        </li>
        <li>
            <i class="flaticon2-favourite"></i>
            Arizona
        </li>
        <li>
            <i class="flaticon2-laptop"></i>
            Lesson 1/42
        </li>
        <li>
            <i class="flaticon-edit-1"></i>
            <a href="#">SAT-STD-LI</a>
        </li>
    </ul>
</div>

<div class="batchViewBlock2Sec2">
    <div class="kt-section__content">
        <table class="table table-head-noborder">
           
            <thead>
                <tr>
                    <th>Student</th>
                    <th>Homework</th>
                    <th>Test</th>
                    <th>Scores</th>
                    <th>Message</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                 @forelse($all_student as $students_value)
                <tr>
                    <td data-field="ShipName" data-autohide-disabled="false" class="kt-datatable__cell">
                        <span style="width: 252px;">
                            <div class="kt-user-card-v2">    <div class="kt-user-card-v2__pic">
                                    {{Html::image('assets/media/users/default.jpg')}}

                                </div>
                                <div class="kt-user-card-v2__details">
                                    <a class="kt-user-card-v2__name" href="#">

                                        {{$students_value->first_name}} 

                                        {{$students_value->last_name}} 
                                    </a>
                                    <span class="kt-user-card-v2__email"></span>
                                </div>                
                            </div>
                        </span>
                    </td>
                    <td>
                        <span style="width: 80px;" class="text-center batchViewBlock2Sec2Prgrs">
                            <h4>75%</h4>
                            <div class="progress" style="height: 4px;">
                                <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </span>
                    </td>
                    <td>
                        <span style="width: 80px;" class="text-center batchViewBlock2Sec2Prgrs">
                            <h4>75%</h4>
                            <div class="progress" style="height: 4px;">
                                <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </span>
                    </td>
                    <td>
                        <span style="width: 80px;" class="text-center batchViewBlock2Sec2Prgrs">
                            <h4>75%</h4>
                            <div class="progress" style="height: 4px;">
                                <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </span>
                    </td>
                    <td>
                        <span class="batchViewBlock2Sec2Ml" data-toggle="modal" data-target="#myModal-message">
                            <a href="#">
                                <i class="flaticon-email"></i>
                            </a>
                        </span>
                    </td>

                </tr>

                @empty
                <tr>
                    <td colspan="5">No Record Fond!
                    </td>

                </tr>

                @endforelse

                <tr>
                    <td colspan="5">{{--$students_data->links()--}}
                    </td>
                </tr>



        </table>
    </div>
</div>
<!-- Teacger / Teacger Admin Notes -->
  @include('partials.admin.event_quick_view.quick_view.quick-notes')
