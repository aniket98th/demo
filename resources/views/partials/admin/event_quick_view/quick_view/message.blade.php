<div class="batchViewBlock2Sec3">

    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">Message</h3>
        </div>
    </div>
<br>
<div class="row">
<div class="col-sm-6">{!! Form::textarea('message',null,['class'=>'form-control','rows'=>'5','id'=>"message_id"]) !!}
{!! Form::hidden('message_hidden_id',$event_id,['class'=>'form-control','rows'=>'5','id'=>"message_hidden_id"]) !!}
{!! Form::hidden('tead__hid_id',$teacher_id,['class'=>'form-control','rows'=>'5','id'=>"tead__hid_id"]) !!}
         </div>
        <br>
     <div class="col-sm-12"><br>
                    <input type="submit" name="submit" class="btn btn-primary" value="Save" onclick="saveMessage()">
    </div>
  </div>
 <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">All Message</h3>
        </div>
    </div>
@php
$all_message=eventAdminMesaage($event_id,$teacher_id);
//print_r($all_message);
 @endphp
 <div class="kt-timeline scroll_height" id="all_mesage_response">
@php $i=1;  @endphp
@forelse($all_message as $all_message_values)
<div class="kt-timeline__item kt-timeline__item--success">
            <div class="kt-timeline__item-section">
                <div class="kt-timeline__item-section-border">
                    @if($i%2==0)
                    <div class="kt-timeline__item-section-icon">
                        <i class="flaticon-chat-1  kt-font-success"></i>
                    </div>
                    @else
                    <div class="kt-timeline__item-section-icon">
                        <i class="flaticon-chat-1 kt-font-primary"></i>
                    </div>
                    @endif
                 </div>
                <span class="kt-timeline__item-datetime">{{{$all_message_values->first_name}}} {{{$all_message_values->last_name}}} | {{{date('m-d-Y', strtotime($all_message_values->dt))}}}

                </span>
            </div>
            <span  class="kt-timeline__item-text">
                {{{$all_message_values->note}}}
            </span>
        </div>
         @php $i++;  @endphp
@empty

No Record found

@endforelse
    </div>
</div>