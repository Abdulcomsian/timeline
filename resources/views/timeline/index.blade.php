@extends('layouts.app')
@section('content')
<div class="time-line-screen">
    <div class="container">
        <div class="row">
            <input type="hidden" name="timelineid" value="{{$encryptid}}" id="timelineid">
            <div class="col-12 text-center">
                <h1>{{$TimeLine->name ?? 'Test TimeLine'}}</h1>
                <p>{{isset($TimeLine->name) ? date('M d,Y - D',strtotime($TimeLine->start_date)) : '(Jan 1, 2022 - Monday) 1:00 PM'}}</p>
                <p>{{$TimeLine->description ?? 'Test Description'}}</p>
                <hr class="mt-5">
            </div>
            <div class="timeline-function-div d-flex justify-content-center align-items-center">
                <div class="timeline-div position-relative w-100">
                    <div class="position-relative">
                        <div class="functionaility-div d-flex position-absolute">
                            <span class="addEvent functionality-span"><i class="fas fa-plus"></i></span>
                        </div>
                        <div class="event-list">
                            <ul>
                                <li class="mb-2">
                                    <div class="list-icon-div">
                                        <span>
                                            <img src="{{asset('images/Vector.png')}}" alt="" class="img-fluid">
                                        </span>
                                        <span class="ms-2 list-item">Location with text</span>
                                    </div>
                                </li>
                                <li class="mb-2">
                                    <div class="list-icon-div">
                                        <span>
                                            <img src="{{asset('images/feelings.png')}}" alt="" class="img-fluid">
                                        </span>
                                        <span class="ms-2 list-item">Sentiment</span>
                                    </div>
                                </li>
                                <li class="mb-2">
                                    <div class="list-icon-div">
                                        <span>
                                            <img src="{{asset('images/video-photo.png')}}" alt="" class="img-fluid">
                                        </span>
                                        <span class="ms-2 list-item">Videos/photos (content)</span>
                                    </div>
                                </li>
                                <li class="mb-2">
                                    <div class="list-icon-div">
                                        <span>
                                            <img src="{{asset('images/group-timeline.png')}}" alt="" class="img-fluid">
                                        </span>
                                        <span class="ms-2 list-item">Group of sub timeline</span>
                                    </div>
                                </li>
                                <li class="mb-2">
                                    <div class="list-icon-div">
                                        <span>
                                            <img src="{{asset('images/timeline.png')}}" alt="" class="img-fluid">
                                        </span>
                                        <span class="ms-2 subTimeLine list-item">Sub timeline</span>
                                    </div>
                                    <ul class="mt-2 subTimeLine-List">
                                        <li class="mb-2">
                                            <div class="list-icon-div">
                                                <span>
                                                    <img src="{{asset('images/learning.png')}}" alt=""
                                                        class="img-fluid">
                                                </span>
                                                <span class="ms-4 list-item">Learning</span>
                                            </div>
                                        </li>
                                        <li class="mb-2">
                                            <div class="list-icon-div">
                                                <span>
                                                    <img src="{{asset('images/insight.png')}}" alt="" class="img-fluid">
                                                </span>
                                                <span class="ms-4 list-item">Insight</span>
                                            </div>
                                        </li>
                                        <li class="mb-2">
                                            <div class="list-icon-div">
                                                <span>
                                                    <img src="{{asset('images/meeting.png')}}" alt="" class="img-fluid">
                                                </span>
                                                <span class="ms-4 list-item">Meeting</span>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li class="mb-2">
                                    <div class="list-icon-div">
                                        <span>
                                            <img src="{{asset('images/document.png')}}" alt="" class="img-fluid">
                                        </span>
                                        <span class="ms-2 list-item">Document</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="event-list-sub-child">
                            <ul>
                                <li class="mb-2">
                                    <div class="list-icon-div">
                                        <span>
                                            <img src="{{asset('images/Vector.png')}}" alt="" class="img-fluid">
                                        </span>
                                        <span class="ms-2">Location with text</span>
                                    </div>
                                </li>
                                <li class="mb-2">
                                    <div class="list-icon-div">
                                        <span>
                                            <img src="{{asset('images/feelings.png')}}" alt="" class="img-fluid">
                                        </span>
                                        <span class="ms-2">Sentiment</span>
                                    </div>
                                </li>
                                <li class="mb-2">
                                    <div class="list-icon-div">
                                        <span>
                                            <img src="{{asset('images/video-photo.png')}}" alt="" class="img-fluid">
                                        </span>
                                        <span class="ms-2">Videos/photos (content)</span>
                                    </div>
                                </li>
                                <li class="mb-2">
                                    <div class="list-icon-div">
                                        <span>
                                            <img src="{{asset('images/group-timeline.png')}}" alt="" class="img-fluid">
                                        </span>
                                        <span class="ms-2">Group of sub timeline</span>
                                    </div>
                                </li>
                                <li class="mb-2">
                                    <div class="list-icon-div">
                                        <span>
                                            <img src="{{asset('images/timeline.png')}}" alt="" class="img-fluid">
                                        </span>
                                        <span class="ms-2 subTimeLine">Sub timeline</span>
                                    </div>
                                    <ul class="mt-2 subTimeLine-List">
                                        <li class="mb-2">
                                            <div class="list-icon-div">
                                                <span>
                                                    <img src="{{asset('images/learning.png')}}" alt=""
                                                        class="img-fluid">
                                                </span>
                                                <span class="ms-4">Learning</span>
                                            </div>
                                        </li>
                                        <li class="mb-2">
                                            <div class="list-icon-div">
                                                <span>
                                                    <img src="{{asset('images/insight.png')}}" alt="" class="img-fluid">
                                                </span>
                                                <span class="ms-4">Insight</span>
                                            </div>
                                        </li>
                                        <li class="mb-2">
                                            <div class="list-icon-div">
                                                <span>
                                                    <img src="{{asset('images/meeting.png')}}" alt="" class="img-fluid">
                                                </span>
                                                <span class="ms-4">Meeting</span>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li class="mb-2">
                                    <div class="list-icon-div">
                                        <span>
                                            <img src="{{asset('images/document.png')}}" alt="" class="img-fluid">
                                        </span>
                                        <span class="ms-2">Document</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="line"></div>
                    @if(count($events)>0)
                     @foreach($events as $ev)
                        @if($ev->isParent)
                         <div class='newEventAdd' style="left:{{$ev->postion_x}}px">
                            <span class='functionality-span'>
                                <span class='setting'>
                                    <i class='fas fa-cog'></i>
                                    <div class='edit-delete'>
                                        <span class='edit-btn'>
                                            <i class='fas fa-edit'></i>
                                        </span>
                                        <span class='delete-btn' data-event-id="{{$ev->id}}">
                                            <i class='fas fa-trash'></i></span>
                                    </div>
                                </span>
                                <input class='event-type' value='{{$ev->event_title}}'>
                            </span>
                            <span class='ms-2 functionality-span'>
                                <img src="{{$ev->icon}}" class='img-fluid'/>
                                <span class='subTimeLineChild parentSubTimeLine'>
                                    <span class='vertical-line'></span>
                                    <span  class='addSubChildEvent functionality-span' data-event-id="{{$ev->id}}">
                                        <i class='fas fa-plus'></i>
                                    </span>
                                    <!-- append child element -->
                                    @if(count($ev->Child)>0)
                                      @foreach($ev->child as $ch)
                                       @include('timeline.partials.childevent',$ch)
                                      @endforeach
                                    @endif
                                </span>
                            </span>
                         </div>
                        @else
                        <div class='newEventAdd' style="left:{{$ev->postion_x}}px">
                            <span class='functionality-span'>
                                <span class='setting'>
                                    <i class='fas fa-cog'></i>
                                     <div class='edit-delete'>
                                        <span class='edit-btn'>
                                            <i class='fas fa-edit'></i>
                                        </span>
                                        <span class='delete-btn' data-event-id="{{$ev->id}}">
                                            <i class='fas fa-trash'></i>
                                        </span>
                                    </div>
                                </span>
                                <input class='event-type' value='{{$ev->event_title}}'>
                            </span>
                            <span class='ms-2 functionality-span'><img src="{{$ev->icon}}" class='img-fluid'/>
                            </span>
                        </div>
                        @endif
                     @endforeach
                    @endif
                </div>
            </div>
            <div class="footer">
                <div class="col-12 text-right">
                    <div class="zoom-effect">
                        <span><img src="{{asset('images/zoom-in.svg')}}" alt=""></span>
                        <span><img src="{{asset('images/zoom-out.svg')}}" alt=""></span>
                    </div>
                    <div class="drop-box">
                        <span>
                            <img src="{{asset('images/menu-bars.svg')}}" alt="">
                        </span>
                        <p>Details</p>
                        <span class="icon-span"><i class="fas fa-chevron-up"></i></span>
                    </div>
                </div>
                <div class="menu-div">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                aria-selected="true">Overview</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                                aria-selected="false">Members</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                                aria-selected="false">Chat</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                                aria-selected="false">Narrative</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quam a, metus elit dignissim sit feugiat egestas lectus ipsum. Integer lorem arcu praesent eget. Amet, in iaculis sit tincidunt. Morbi at purus ac id ultrices. Magna morbi et sed pellentesque habitasse ac vitae ultricies mus. Nunc odio ut bibendum cursus dictum fringilla massa lobortis.</p><p>Amet, in iaculis sit tincidunt. Morbi at purus ac id ultrices. Magna morbi et sed pellentesque habitasse ac vitae ultricies mus.</p></div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="search-div d-flex align-items-center justify-content-between">
                                <div class="drop-down-input position-relative">
                                    <input type="text" placeholder="example@email.com" class="form-control">
                                    <select name="" id="" class="position-absolute">
                                        <option value="View">View</option>
                                        <option value="Edit">Edit</option>
                                    </select>
                                </div>
                                <button>Add</button>
                            </div>
                            <div class="list-div mt-3">
                                <ul>
                                    <li>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="user-name d-flex align-items-center">
                                                <span class="word-name d-flex align-items-center justify-content-center">JD</span>
                                                <span class="name ms-3">John Doe</span>
                                            </div>
                                            <span class="action-text">View</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="user-name d-flex align-items-center">
                                                <span class="word-name d-flex align-items-center justify-content-center">JD</span>
                                                <span class="name ms-3">John Doe</span>
                                            </div>
                                            <span class="action-text">Edit</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="user-name d-flex align-items-center">
                                                <span class="word-name d-flex align-items-center justify-content-center">JD</span>
                                                <span class="name ms-3">John Doe</span>
                                            </div>
                                            <span class="action-text">View</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                            aria-labelledby="pills-contact-tab">...</div>
                    </div>
                </div>
            </div>
        </div>
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
        <button type="button" class="btn btn-primary delete-event">Yes</button>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
//save parent Event=========================================
function saveEvent(mouseXPosition,val,imgSrc,selectListItem)
{
    isParent=0;
    if(val==" Sub timeline")
    {
        isParent=1;
    }
    $.ajax({
        "type": "POST",
        "url": "{{url('/events-save')}}",
        "data": {
            "_token": "{{ csrf_token() }}",
            "postion":mouseXPosition,
            "label":selectListItem,
            "icon":imgSrc,
            "isParent":isParent,
            'time_line_id':$("#timelineid").val(),
        },//Send to WebMethod
        'async':false,
    }).done(function (o) {
        console.log(o);
        if(val==" Sub timeline")
        {
             $(".timeline-div").append(
                "<div class='newEventAdd' style='left: " +
                mouseXPosition +
                "px'><span class='functionality-span'><span class='setting'><i class='fas fa-cog'></i><div class='edit-delete'><span class='edit-btn'><i class='fas fa-edit'></i></span><span class='delete-btn' data-event-id='"+o.id+"'><i class='fas fa-trash'></i></span></div></span><input class='event-type' value='"+val+"'></span><span class='ms-2 functionality-span'><img src=" +
                imgSrc +
                " class='img-fluid'/><span class='subTimeLineChild parentSubTimeLine'><span class='vertical-line'></span><span  class='addEvent addSubChildEvent functionality-span' data-event-id='"+o.id+"'><i class='fas fa-plus'></i></span></span></span></div>"
            );
        }else{
           $(".timeline-div").append(
           "<div class='newEventAdd' style='left: " +
            mouseXPosition +
            "px'><span class='functionality-span'><span class='setting'><i class='fas fa-cog'></i><div class='edit-delete'><span class='edit-btn'><i class='fas fa-edit'></i></span><span class='delete-btn' data-event-id='"+o.id+"'><i class='fas fa-trash'></i></span></div></span><input class='event-type' value='"+selectListItem+"'></span><span class='ms-2 functionality-span'><img src=" +
            imgSrc +
            " class='img-fluid'/></span></div>"
           ); 
        }
        toastr.success("Event saved successfully!");
          
    });
}

//save childEvent===============================
function saveChildEvent(targetElem,selectListItem,imgSrc,eventId,val)
{
    $.ajax({
        "type": "POST",
        "url": "{{url('/child-events-save')}}",
        "data": {
            "_token": "{{ csrf_token() }}",
            "postion":"1",
            "label":selectListItem,
            "icon":imgSrc,
            "isParent":0,
            "eventId":eventId,
             'time_line_id':$("#timelineid").val(),
        },//Send to WebMethod
        'async':false,
    }).done(function (o) {
        //$(".subTimeLine-List").css("display","block")
         if (val[1].innerText == "Sub timeline") {
                $(targetElem[0].parentElement).append(
                    "<div class='newChild' style='left:-43px'><span class='functionality-span'><span class='setting'><i class='fas fa-cog'></i><div class='edit-delete'><span class='edit-btn'><i class='fas fa-edit'></i></span><span class='delete-btn' data-event-id='"+o.id+"'><i class='fas fa-trash'></i></span></div></span><input class='event-type' value='"+selectListItem+"'></span><span class='ms-2 functionality-span'><img src=" +
                        imgSrc +
                        " class='img-fluid'/><span class='subTimeLineChild'><span class='vertical-line'></span><span class='addEvent addSubChildEvent functionality-span' data-event-id='"+o.id+"'><i class='fas fa-plus'></i></span></span></span></div>"
                );
            }
            else{
                 $(targetElem[0].parentElement).append(
                    "<div class='newChild' style='left:-43px'><span class='functionality-span'><span class='setting'><i class='fas fa-cog'></i><div class='edit-delete'><span class='edit-btn'><i class='fas fa-edit'></i></span><span class='delete-btn' data-event-id='"+o.id+"'><i class='fas fa-trash'></i></span></div></span><input class='event-type' value='"+selectListItem+"'></span><span class='ms-2 functionality-span'><img src=" +
                        imgSrc +
                        " class='img-fluid'/></span></div>"
                );
            }
            toastr.success("Event saved successfully!");
        
    });
}

//Delete Event
function delete_Event(deleteEvent,deleteEventId)
{
     $.ajax({
        "type": "POST",
        "url": "{{url('/events-delete')}}",
        "data": {
            "_token": "{{ csrf_token() }}",
            deleteEventId,
        },//Send to WebMethod
        'async':false,
    }).done(function (res) {
        if(res=="success")
        {
            deleteEvent.remove();
            $(".delete-modal").css("display",'none');
            $(".event-list").css("display", "none");
            $(".timeline-div .event-list-sub-child").css("display", "none");
            toastr.success("Event Deleted successfully!");
        }
    });
}
</script>
@endsection
