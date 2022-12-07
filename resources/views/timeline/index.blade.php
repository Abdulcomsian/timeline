@extends('layouts.app')
@section('css')

@endsection
@section('content')
 <input type="hidden" name="timelineid" value="{{$encryptid}}" id="timelineid">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1>{{$TimeLine->name ?? 'Test TimeLine'}}</h1>
                <p>{{isset($TimeLine->name) ? date('M d,Y - D',strtotime($TimeLine->start_date)) : '(Jan 1, 2022 - Monday) 1:00 PM'}}</p>
                <p>{{$TimeLine->description ?? 'Test Description'}}</p>
            </div>
        </div>
    </div>

    <div class="timeline-parent">
        <div class="timeline-functionality">
            <div class="add-event-indicator animate__bounceOut">
                <span><i class="fa-light fa-plus"></i></span>
            </div>
            <div class="event-list">
                <ul>
                    <li class="pink">
                        <div class="event-info">
                            <div class="img-div">
                                <img src="{{asset('img/bi_pin-angle-fill.svg')}}" alt="">
                            </div>
                            <div class="event-name">
                                <p>Location with text</p>
                            </div>
                        </div>
                    </li>
                    <li class="green">
                        <div class="event-info">
                            <div class="img-div">
                                <img src="{{asset('img/feelings.svg')}}" alt="">
                            </div>
                            <div class="event-name">
                                <p>Sentiment</p>
                            </div>
                        </div>
                    </li>
                    <li class="yellow">
                        <div class="event-info">
                            <div class="img-div">
                                <img src="{{asset('img/wpf_stack-of-photos.svg')}}" alt="">
                            </div>
                            <div class="event-name">
                                <p>Videos/photos (content)</p>
                            </div>
                        </div>
                    </li>
                    <li class="orange">
                        <div class="event-info">
                            <div class="img-div">
                                <img src="{{asset('img/Frame.svg')}}" alt="">
                            </div>
                            <div class="event-name">
                                <p>Group of sub timeline</p>
                            </div>
                        </div>
                    </li>
                    <li class="purple">
                        <div class="event-info">
                            <div class="img-div">
                                <img src="{{asset('img/timeline.svg')}}" alt="">
                            </div>
                            <div class="event-name">
                                <p>Sub timeline</p>
                            </div>
                        </div>
                    </li>
                    <li class="gray">
                        <div class="event-info">
                            <div class="img-div">
                                <img src="{{asset('img/document.svg')}}" alt="">
                            </div>
                            <div class="event-name">
                                <p>Document</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="event-list-subtime-line">
                <ul>
                    <li class="pink">
                        <div class="event-info">
                            <div class="img-div">
                                <img src="{{asset('img/bi_pin-angle')}}-fill.svg" alt="">
                            </div>
                            <div class="event-name">
                                <p>Location with text</p>
                            </div>
                        </div>
                    </li>
                    <li class="green">
                        <div class="event-info">
                            <div class="img-div">
                                <img src="{{asset('img/feelings.svg')}}" alt="">
                            </div>
                            <div class="event-name">
                                <p>Sentiment</p>
                            </div>
                        </div>
                    </li>
                    <li class="yellow">
                        <div class="event-info">
                            <div class="img-div">
                                <img src="{{asset('img/wpf_stack-of-photos.svg')}}" alt="">
                            </div>
                            <div class="event-name">
                                <p>Videos/photos (content)</p>
                            </div>
                        </div>
                    </li>
                    <li class="orange">
                        <div class="event-info">
                            <div class="img-div">
                                <img src="{{asset('img/Frame.svg')}}" alt="">
                            </div>
                            <div class="event-name">
                                <p>Group of sub timeline</p>
                            </div>
                        </div>
                    </li>
                    <li class="purple">
                        <div class="event-info">
                            <div class="img-div">
                                <img src="{{asset('img/timeline.svg')}}" alt="">
                            </div>
                            <div class="event-name">
                                <p>Sub timeline</p>
                            </div>
                        </div>
                    </li>
                    <li class="gray">
                        <div class="event-info">
                            <div class="img-div">
                                <img src="{{asset('img/document.svg')}}" alt="">
                            </div>
                            <div class="event-name">
                                <p>Document</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="timeline-divider"></div>

            <!-- php dynamic code here -->
            @if(count($events)>0)
                @foreach($events as $event)
                    @if($event->event_title=="Sub timeline")
                        <div class="event-add animate__bounceOut {{$event->class_name}}"  style="left:{{$event->postion_x}}px">
                            <div class='main-event sub-timeline-event '>
                                <div class='main-parent {{!in_array($event->id,$ventids) ? "main-parent-add-child" :""}}' data-event-id="{{$event->id}}">
                                    <span class='img-span' style='background-color:{{$event->back_color}}'>
                                        <img src="{{$event->icon}}">
                                    </span>
                                    <span class='functionality-div'>
                                        <span class='event-functionality' style='border-color:{{$event->back_color}}'></span>
                                        
                                    </span>
                                </div>
                                <div class='horizontal-line-right'>
                                    <span></span><span></span><span></span><span></span>
                                </div>
                                <div class='main-parent-edit-field editmodal{{$event->id}}'>
                                    <input class='form-control' id="inputeventid{{$event->id}}" placeholder='Edit your Event Name' value="{{$event->event_title_updated}}"/>
                                    <button onClick="updateEvent({{$event->id}},event)" style='background-color:{{$event->back_color}}'>Save</button>
                                </div>
                                <div class='main-parent-edit-field sharemodal{{$event->id}}'>
                                    <input class='form-control' id="inputshareeventid{{$event->id}}" placeholder='Enter Email'/>
                                    <button onClick="shareEvent({{$event->id}},event)" style='background-color:{{$event->back_color}}'>Share Event</button>
                                </div>
                                <div class='horizontal-line-left'><span></span><span></span><span></span><span></span>
                                </div>
                                
                                    <!-- if child is exist -->
                                     <!-- append child element -->
                                        @if(count($event->Child)>0)
                                            @php
                                            $i=1;
                                            @endphp
                                            @foreach($event->child as $ch)
                                                @include('timeline.partials.childevent',$ch)
                                                @php
                                                $i++;
                                                @endphp
                                            @endforeach
                                        @else
                                        <div class='add-more-event'>
                                            <div class='doted-line'><span></span><span></span><span></span><span></span>
                                                <span></span><span></span>
                                            </div>
                                            <div class='sub-child-event-add flash' data-event-id="{{$event->id}}">
                                                <span><i class='fa-light fa-plus'></i></span>
                                            </div>
                                        </div>
                                        @endif
                                   
                             
                            </div>
                        </div>
                    @else
                        @if($event->position_x<0)
                        <div class='event-add animate__bounceOut {{$event->class_name}}' style='left:0px'>
                            <div class='main-event'>
                                <span style='background-color:{{$event->back_color}}'><img src="{{$event->icon}}"></span>
                                <span style='border-color:{{$event->back_color}}' class='functionality-div'></span>
                                <div class='horizontal-line-right'><span></span><span></span><span></span><span></span></div>
                                <div class='horizontal-line-left'><span></span><span></span><span></span><span></span></div>
                            </div>
                        </div>
                        @else
                        <div class='event-add animate__bounceOut ' style='left:{{$event->postion_x}}px'>
                            <div class='main-event'>
                                <span style='background-color:{{$event->back_color}}'>
                                    <img src="{{$event->icon}}">
                                </span>
                                <span class='functionality-div'>
                                    <span class='event-functionality' style='border-color:{{$event->back_color}}'>
                                        
                                    </span>
                                    @if(!in_array($event->id,$ventids))
                                    <div class='edit-delete-event'>
                                        <ul>
                                            <li data-event-id="{{$event->id}}">Edit Event 
                                                <span>
                                                    <i class='fa-regular fa-pen-to-square'></i>
                                                </span>
                                            </li>
                                            <li data-event-id="{{$event->id}}">Delete Event 
                                                <span>
                                                    <i class='fa-regular fa-trash-can'></i>
                                                </span>
                                            </li>
                                            <li data-event-id="{{$event->id}}">Share Event 
                                                <span>
                                                   <i class="fas fa-share"></i>
                                                </span>
                                            </li>

                                        </ul>
                                        <div class='edit-field editfield'>
                                            <input class='form-control' id="inputeventid{{$event->id}}" placeholder='Edit your Event Name' value="{{$event->event_title_updated}}"/>
                                            <button  onClick="updateEvent({{$event->id}},event)" style='background-color:{{$event->back_color}}'>Save</button>
                                        </div>
                                        <div class='edit-field sharefield'>
                                            <input class='form-control' id="inputshareeventid{{$event->id}}" placeholder='Enter Email'/>
                                            <button  onClick="shareEvent({{$event->id}})" style='background-color:{{$event->back_color}}'>Share Event</button>
                                        </div>
                                    </div>
                                    @endif
                                </span>
                            </div>
                        </div>
                        @endif
                    @endif
                @endforeach

            @endif
            
        </div>
    </div>
    <div class="modal delete-modal" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Delete Event</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>Are you want to delete Event?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
              <button type="button" class="btn btn-primary">Yes</button>
            </div>
          </div>
        </div>
    </div>
    <div class="modal edit-sublime-modal" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content" style="width: 600px">
            <div class="modal-header">
              <h5 class="modal-title">Subtime Line Event</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <button>Add Child</button>
              <button>Edit Event</button>
              <button>Delete Event</button>
              <button>Share Event</button>
            </div>
          </div>
        </div>
    </div>
@endsection
@section('script')
<script type="text/javascript">
     function saveEvent(class_name,currentEventPosition,back_color,imgSrc,trimVal) {
         //save event in database====
            isParent = 0;
            if (trimVal == "Sub timeline") {
                isParent = 1;
            }
             $.ajax({
                "type": "POST",
                "url": "{{url('/events-save')}}",
                "data": {
                    "_token": "{{ csrf_token() }}",
                    "postion": currentEventPosition,
                    "label": trimVal,
                    "icon": imgSrc,
                    "isParent": isParent,
                    "back_color":back_color,
                    "class_name":class_name,
                    'time_line_id': $("#timelineid").val(),
                }, //Send to WebMethod
                'async': false,
            }).done(function(res) {
                //success
                    if(trimVal=="Sub timeline"){
                     $(".timeline-parent .timeline-functionality").append(
                        "<div class='event-add animate__bounceOut "+class_name+"' style='left: " +
                               currentEventPosition +
                               "px'><div class='main-event sub-timeline-event'><div class='main-parent main-parent-add-child' data-event-id="+res.id+"><span class='img-span' style='background-color: "+back_color+"'><img src="+imgSrc+"></span><span class='functionality-div'><span class='event-functionality' style='border-color: "+back_color+"'></span></span></div><div class='horizontal-line-right'><span></span><span></span><span></span><span></span></div><div class='main-parent-edit-field editmodal"+res.id+"'><input class='form-control' id='inputeventid"+res.id+"' placeholder='Edit your Event Name' value="+trimVal+"/><button onClick='updateEvent("+res.id+")' style='background-color: "+back_color+"'>Save</button></div><div class='main-parent-edit-field sharemodal"+res.id+"'><input class='form-control' id='inputshareeventid"+res.id+"' placeholder='Enter Email' /><button onClick='shareEvent("+res.id+")' style='background-color: "+back_color+"'>Share Event</button></div><div class='horizontal-line-left'><span></span><span></span><span></span><span></span></div><div class='add-more-event'><div class='doted-line'><span></span><span></span><span></span><span></span><span></span><span></span></div><div class='sub-child-event-add flash' data-event-id="+res.id+"><span><i class='fa-light fa-plus'></i></span></div></div></div></div>"
                       );
                    }
                    else
                    {
                        if(currentEventPosition<0){
                            $(".timeline-parent .timeline-functionality").append(
                                "<div class='event-add animate__bounceOut "+class_name+"' style='left:0px'><div class='main-event'><span style='background-color: "+back_color+"'><img src="+imgSrc+"></span><span style='border-color: "+back_color+"' class='functionality-div'></span><div class='horizontal-line-right'><span></span><span></span><span></span><span></span></div><div class='horizontal-line-left'><span></span><span></span><span></span><span></span></div></div></div>"
                            );
                        } else{
                            $(".timeline-parent .timeline-functionality").append(
                                "<div class='event-add animate__bounceOut "+class_name+"' style='left: " +
                                       currentEventPosition +
                                       "px'><div class='main-event'><span style='background-color: "+back_color+"'><img src="+imgSrc+"></span><span class='functionality-div'><span class='event-functionality' style='border-color: "+back_color+"'></span><div class='edit-delete-event'><ul><li data-event-id="+res.id+">Edit Event <span><i class='fa-regular fa-pen-to-square'></i></span></li><li data-event-id="+res.id+">Delete Event <span><i class='fa-regular fa-trash-can'></i></span></li><li data-event-id="+res.id+">Share Event <span><i class='fas fa-share'></i></span></li></ul><div class='edit-field editfield'><input class='form-control' id='inputeventid"+res.id+"' placeholder='Edit your Event Name' value="+trimVal+"/><button onClick='updateEvent("+res.id+")' style='background-color: "+back_color+"'>Save</button></div><div class='edit-field sharefield'><input class='form-control' id='inputshareeventid"+res.id+"' placeholder='Enter Email' /><button onClick='shareEvent("+res.id+")' style='background-color: "+back_color+"'>Share Event</button></div></div></span></div></div>"
                            );
                        }
                    }
            });
         
     }



     // save sub child event
     function saveChildEvent(class_name,back_color,imgSrc,trimVal,targetElem,eventId)
     {
        isParent = 0;
        if (trimVal == "Sub timeline") {
            isParent = 1;
        }
        // call ajax to save data in database
        $.ajax({
            "type": "POST",
            "url": "{{url('/child-events-save')}}",
            "data": {
                "_token": "{{ csrf_token() }}",
                "postion": "0",
                "label": trimVal,
                "icon": imgSrc,
                "class_name":class_name,
                "back_color":back_color,
                "isParent": 0,
                "eventId": eventId,
                "isParent":isParent,
                'time_line_id': $("#timelineid").val(),
            }, //Send to WebMethod
            'async': false,
        }).done(function(res) {
            if(res.status=="Error")
            {
                    toastr.error(res.message);
            }
            else{
                toastr.success("Event saved successfully!");
                if(trimVal == "Sub timeline")
                {
                     $(targetElem).replaceWith("<div class='event-add animate__bounceOut "+class_name+"' style='left: 0px'><div class='main-event sub-timeline-event'><span class='main-parent main-parent-add-child' data-event-id="+res.event.id+" style='background-color: "+back_color+"'><img src="+imgSrc+"></span><div class='horizontal-line-right'><span></span><span></span><span></span><span></span></div><div class='horizontal-line-left'><span></span><span></span><span></span><span></span></div><div class='add-more-event'><div class='doted-line'><span></span><span></span><span></span><span></span><span></span><span></span></div><div class='sub-child-event-add flash'  data-event-id="+res.event.id+"><span><i class='fa-light fa-plus'></i></span></div></div></div></div>");
                }
                else{
                     $(targetElem).replaceWith("<div class='new-child animate__bounceOut "+class_name+"'><span class='main-parent' style='background-color: "+back_color+"'><img src="+imgSrc+"></span><span class='functionality-div'><span class='event-functionality' style='border-color: "+back_color+"'></span><div class='edit-delete-event'><ul><li data-event-id="+res.event.id+">Edit Event <span><i class='fa-regular fa-pen-to-square'></i></span></li><li data-event-id="+res.event.id+">Delete Event <span><i class='fa-regular fa-trash-can'></i></span></li></ul><div class='edit-field'><input class='form-control' id='inputeventid"+res.event.id+"' placeholder='Edit your Event Name' value="+trimVal+"/><button onClick='updateEvent("+res.event.id+",event)' style='background-color: "+back_color+"'>Save</button></div></div></span></div>");
                }
            }
            
        });
        
     }


     //delete event
     function Eventdelete(deleteEvent)
     {
         $.ajax({
            "type": "POST",
            "url": "{{url('/events-delete')}}",
            "data": {
                "_token": "{{ csrf_token() }}",
                eventId,
            }, //Send to WebMethod
            'async': false,
        }).done(function(res) {
            console.log(res.status);
            if (res.status == "Success") {
                toastr.success(res.message);
                //deleteEvent.remove();
                location.reload();
            }
            else{
                toastr.error(res.message);
            }
        });
        
     }


     //updae event name
     function updateEvent(eventId,event=null)
     {
        event.stopPropagation();
        let inputvalue=$("#inputeventid"+eventId+"").val();
         $.ajax({
            "type": "POST",
            "url": "{{url('/events-update')}}",
            "data": {
                "_token": "{{ csrf_token() }}",
                eventId,
                inputvalue,
            }, //Send to WebMethod
            'async': false,
        }).done(function(res) {
            if (res.status == "Success") {
                $(".functionality-div .edit-delete-event .editfield").css('display','none');
                toastr.success(res.message);
            }
            else{
                $(".functionality-div .edit-delete-event .editfield").css('display','none');
                toastr.error(res.message);
            }
        });
     }


     function shareEvent(eventId)
     {
        let inputvalue=$("#inputshareeventid"+eventId+"").val();
         $.ajax({
            "type": "POST",
            "url": "{{url('invite/event')}}",
            "data": {
                "_token": "{{ csrf_token() }}",
                eventId,
                inputvalue,
            }, //Send to WebMethod
            'async': false,
        }).done(function(res) {
            if (res == "success") {
                $(".functionality-div .edit-delete-event .sharefield").css('display','none');
                toastr.success("Event Shared successfully!");
            }
            else{
                $(".functionality-div .edit-delete-event .sharefield").css('display','none');
                toastr.error("something went wrong");
            }
        });
     }
     

     $("input").click(function(e){
        e.stopPropagation();
     })
     
</script>
@endsection