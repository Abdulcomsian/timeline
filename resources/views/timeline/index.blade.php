@extends('layouts.app')
@section('css')

@endsection
@section('content')
    @php
        use Carbon\Carbon;
    @endphp
    <input type="hidden" name="timelineid" value="{{$encryptid}}" id="timelineid">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center timelineheader">
                <h1>{{$TimeLine->name ?? 'Test TimeLine'}}</h1>
                <p>{{isset($TimeLine->name) ? date('M d,Y - D',strtotime($TimeLine->start_date)) : '(Jan 1, 2022 - Monday) 1:00 PM'}}</p>
                <p>{{$TimeLine->description ?? 'Test Description'}}</p>
            </div>
        </div>
    </div>

    <div class="timeline-parent" id="timelineParent">
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
            <div class='date-time-divider'>
                <div class="timeline-divider">
                    <?php
                        $firstDate = $start_day_month;
                        $lastDate = $last_day_month;

                        $firstTime =  strtotime($firstDate);
                        $lastTime =  strtotime($lastDate);
                    ?>
                    @php
                        $j = 1;
                    @endphp
                    @for($i=$firstTime; $i<=$lastTime; $i+=86400)
                            <span class="date" date="{{date("d/m/Y" , $i)}}" pixel="{{$j*500}}" @if($j == 1) start_date = {{date("d-M-y" , $i)}} id = "start_date"  @endif style="left: {{$j*500}}px">{{date("M-d-Y" , $i)}}</span>
                        @php $j++  @endphp
{{--                            echo date("Y-m-d" , $i)."<br>";--}}
                    @endfor
                    {{--@php
                        $count=31;
                        $j=1;
                    @endphp
                    @for($i=0;$i<$count;$i++)
                        <span class="date" style="left: {{$i*500}}px">{{$j}}-Dec</span>
                        @php
                            $j++;
                        @endphp
                    @endfor--}}

                </div>
            </div>


            <!-- php dynamic code here -->
            @if(count($events)>0)
                @php
                    $total_span = count($events)*9.5;
                    $top = count($events)*145;
                    $array = [];
                    $count = 0;
                @endphp
{{--                @dd($total_span)--}}
{{--            @dd($events)--}}
                @foreach($events as $event)
{{--                    @dd(strtotime($event->event_date))--}}
                    @if(strtotime($event->event_date) >= $firstTime)
                    @php
                        if(in_array($event->event_date,$array)){
                        $count = array_count_values($array);
                        $count = $count[$event->event_date];
                        } else{
                            $count = 0;
                        }
                        array_push($array, $event->event_date);
                        $days_diff = Carbon::parse($firstDate)->diffInDays(Carbon::parse($event->event_date)) + 1;
                        /*$days_diff = $days_diff + 1;*/
                        $repeat_event = $count * 80;
                        $position_x = $days_diff*500-$repeat_event;
                   @endphp
{{--                    @dd($days_diff)--}}
                    {{-- @if($event->event_title=="Sub timeline")
                         <div class="event-add animate__bounceOut {{$event->class_name}}"  style="left:{{$event->postion_x}}px">
                             <div class='main-event sub-timeline-event '>
                                 <div class='main-parent {{!in_array($event->id,$ventids) ? "main-parent-add-child" :""}}' data-event-id="{{$event->id}}" parent-position="{{$event->postion_x}}">
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
                                                 @php
                                                  $assign=false;
                                                 if(in_array($event->id,$ventids))
                                                 {
                                                   $assign=true;
                                                 }
                                                 @endphp
                                                 @include('timeline.partials.childevent',['ch'=>$ch,'assign'=>$assign])
                                                 @php
                                                 $i++;
                                                 @endphp
                                             @endforeach
                                         @else
                                         <div class='add-more-event'>
                                             <div class='doted-line'><span></span><span></span><span></span><span></span>
                                                 <span></span><span></span>
                                             </div>
                                             <div class='sub-child-event-add flash' parent-position="{{$event->postion_x}}" data-event-id="{{$event->id}}">
                                                 <span><i class='fa-light fa-plus'></i></span>
                                             </div>
                                         </div>
                                         @endif


                             </div>
                         </div>
                     @else--}}
                    {{--                @dd($event)--}}
                    @if($event->position_x<0)
                        <div class='event-add animate__bounceOut {{$event->class_name}}' style='left:0px'>
                            <div class='main-event'>
                                <span style='background-color:{{$event->back_color}}'><img
                                        src="{{$event->icon}}"></span>
                                <span style='border-color:{{$event->back_color}}' class='functionality-div'></span>
                                <div class='horizontal-line-right'><span></span><span></span><span></span><span></span>
                                </div>
                                <div class='horizontal-line-left'><span></span><span></span><span></span><span></span>
                                </div>
                            </div>
                        </div>
                    @else
                       {{-- <div class="event-add animate__bounceOut {{$event->class_name}}"
                             style="left: {{$days_diff*500}}px">--}}
                            <div class="event-add animate__bounceOut {{$event->class_name}}" style="left: {{$position_x}}px">
                            <div class="main-event sub-timeline-event"><span class="left-parent-event"
                                                                             style="background-color: {{$event->back_color}}"></span>
                                <div class="main-parent" parent-date="{{$event->event_date}}"
                                     parent-position="{{$event->postion_x}}"
                                     data-event-id="{{$event->id}}">
                                    <span class="img-span" style="background-color: {{$event->back_color}}">
                                        <img src="{{$event->icon}}">
                                    </span>
                                    <span class="functionality-div">
                                        <span class="event-functionality" data-event-id="{{$event->id}}"
                                              style="background-color: {{$event->back_color}};border-color: {{$event->back_color}}; {{(count($event->child)) ? 'pointer-events:none' : ''}}">
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
                                                    <li data-event-id="{{$event->id}}" class="share-event">Share Event
                                                        <span>
                                                           <i class="fas fa-share"></i>
                                                        </span>
                                                    </li>

                                                </ul>
                                                <div class='edit-field editfield'>
                                                    <input class='form-control' id="inputeventid{{$event->id}}"
                                                           placeholder='Edit your Event Name'
                                                           value="{{$event->event_title_updated}}"/>
                                                    <button onClick="updateEvent({{$event->id}},event)"
                                                            style='background-color:{{$event->back_color}}'>Save</button>
                                                </div>
                                                <div class='edit-field sharefield-{{$event->id}}'>
                                                    <input class='form-control' id="inputshareeventid{{$event->id}}"
                                                           placeholder='Enter Email'/>
                                                    <button onClick="shareEvent({{$event->id}})"
                                                            style='background-color:{{$event->back_color}}'>Share Event</button>
                                                </div>
                                            </div>
                                        @endif
                                    </span>
                                    <div class="vertical-lines">
                                       {{-- <span style="background-color: {{$event->back_color}}; opacity: {{(count($event->child) > 0) ? '1' : 0}};"></span>
                                        <span style="background-color: {{$event->back_color}}; opacity: {{(count($event->child) > 0) ? '1' : 0}};"></span>
                                        <span style="background-color: {{$event->back_color}}; opacity: {{(count($event->child) > 0) ? '1' : 0}};"></span>
                                        <span style="background-color: {{$event->back_color}}; opacity: {{(count($event->child) > 0) ? '1' : 0}};"></span>
                                        <span style="background-color: {{$event->back_color}}; opacity: {{(count($event->child) > 0) ? '1' : 0}};"></span>--}}
                                        @if(count($event->child) != 0)
                                            @for($i=1; $i<=$total_span; $i++)
                                                <span style="background-color: {{$event->back_color}};" class="active"></span>
                                            @endfor
                                        @endif
                                    </div>
                                    @if(count($event->child))
                                        @foreach($event->child as $child_event)
{{--                                            @dd($event)--}}
                                        <div class='event-add child animate__bounceOut {{$child_event->class_name}}' child_parent_date="{{$event->event_date}}" data-child-event-id = "{{$child_event->id}}" style="top:{{$top}}px">
                                            <span style="background-color: {{$child_event->back_color}}; @if(in_array($event->id,$ventids)) pointer-events:none @endif" class='left-child-event' data-child-event-id = "{{$child_event->id}}">

                                            </span>
                                            <div class='main-event sub-timeline-event'>
                                                <span class='main-parent child-event' style="background-color: {{$child_event->back_color}}">
                                                     <img src="{{$child_event->icon}}">
                                                </span>
                                                <div style="width: {{$child_event->child_line}}px; background-color: {{$child_event->back_color}}" class="timeline-divider-child" data-child-event-id = "{{$child_event->id}}">
                                                    <div class='add-child-event-indicator animate__bounceOut' data-child-event-id="{{$child_event->id}}">
                                                        <span><i class='fa-light fa-plus' ></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <span style="background-color: {{$child_event->back_color}}"
                                                  class="right-child-event" data-child-event-id = "{{$child_event->id}}">
                                            </span>
{{--                                            @php $total_siblings = count($child_event->child) @endphp--}}
                                            @php $total_left = 0 @endphp
                                            @foreach($child_event->child as $sibling_event)
                                                @php $total_left = $total_left + 170; @endphp
                                                @include('timeline.siblings',['sibling_event' => $sibling_event, 'total_left' => $total_left])
                                            @endforeach
                                        </div>
                                        @endforeach
                                        {{--<div class="event-add child animate__bounceOut {{$event->class_name}}" child_parent_date="{{$event->event_date}}">
                                            <span style="background-color: {{$event->back_color}}" class="left-child-event">
                                            </span>
                                            <div class="main-event sub-timeline-event">
                                                <span class="main-parent child-event" style="background-color: {{$event->back_color}}">
                                                    <img src="{{$event->icon}}">
                                                </span>
                                                <div style="width: 14930px; background-color: {{$event->back_color}}" class="timeline-divider-child">
                                                </div>
                                            </div>
                                            <span style="background-color: {{$event->back_color}}"
                                                  class="right-child-event">
                                            </span>
                                        </div>--}}
                                    @endif
                                </div>
                            </div>
                            <span class="right-parent-event" style="background-color: {{$event->back_color}}"></span>
                        </div>
                        {{--<div class='event-add animate__bounceOut {{$event->class_name}}'
                             style='left:{{$event->postion_x}}px'>
                            <div class='main-event'>
                                <span class="left-parent-event" style="background-color: {{$event->back_color}}"></span>
                                <span class="img-span" style='background-color:{{$event->back_color}}'>
                                    <img src="{{$event->icon}}">
                                </span>
                                <span class='functionality-div'>
                                    <span class='event-functionality'
                                          style='background-color:{{$event->back_color}};border-color:{{$event->back_color}}'>

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
                                            <input class='form-control' id="inputeventid{{$event->id}}"
                                                   placeholder='Edit your Event Name'
                                                   value="{{$event->event_title_updated}}"/>
                                            <button onClick="updateEvent({{$event->id}},event)"
                                                    style='background-color:{{$event->back_color}}'>Save</button>
                                        </div>
                                        <div class='edit-field sharefield'>
                                            <input class='form-control' id="inputshareeventid{{$event->id}}"
                                                   placeholder='Enter Email'/>
                                            <button onClick="shareEvent({{$event->id}})"
                                                    style='background-color:{{$event->back_color}}'>Share Event</button>
                                        </div>
                                    </div>
                                    @endif
                                </span>
                                --}}{{--                                @if(count($event->Child)>0)--}}{{--
                                <div class="vertical-lines">
                                    <span style="background-color: {{$event->back_color}}; opacity: 0;"></span>
                                    <span style="background-color: {{$event->back_color}}; opacity: 0;"></span>
                                    <span style="background-color: {{$event->back_color}}; opacity: 0;"></span>
                                    <span style="background-color: {{$event->back_color}}; opacity: 0;"></span>
                                    <span style="background-color: {{$event->back_color}}; opacity: 0;"></span>
                                </div>
                                --}}{{--                                @endif--}}{{--
                            </div>
                        </div>--}}
                    @endif
                    {{--                    @endif--}}
                    @php
                        $total_span = $total_span - 9.5;
                        $top = $top - 145;
                    @endphp
                    @endif
                @endforeach

            @endif
        </div>

    </div>
    {{--<div class='scroll-zoom-effect'>
        <div class='parent'>
            <div class='scroll-line'></div>
            <div id="verticalIndicator" class='vertical-indicator'></div>
        </div>
        <div class='zooming-functionality'>
            <a id="reset" class='reset'>Reset</a>
            <a id="zoomIn" class='zoom-in'><i class="fa-solid fa-magnifying-glass-plus"></i></a>
            <a id="zoomOut" class='zoom-out'><i class="fa-solid fa-magnifying-glass-minus"></i></a>
        </div>
    </div>--}}


    <div class="modal date-modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Select Event End Date</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="date">
                    <span class='error'>Please select end date</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script type="text/javascript">
        function saveEvent(class_name, currentEventPosition, back_color, imgSrc, trimVal, eventDate) {
            //save event in database====
            isParent = 1;
            /*if (trimVal == "Sub timeline") {
                isParent = 1;
            }*/
            $.ajax({
                "type": "POST",
                "url": "{{url('/events-save')}}",
                "data": {
                    "_token": "{{ csrf_token() }}",
                    "postion": currentEventPosition,
                    "label": trimVal,
                    "icon": imgSrc,
                    "isParent": isParent,
                    "back_color": back_color,
                    "class_name": class_name,
                    "event_date": eventDate,
                    'time_line_id': $("#timelineid").val(),
                }, //Send to WebMethod
                'async': false,
            }).done(function (res) {
                console.log(res)
                //success
                toastr.success("Event saved successfully!");
                // if(trimVal=="Sub timeline"){

                /********** After Client Demo */

                //  $(".timeline-parent .timeline-functionality").append(
                //     "<div class='event-add animate__bounceOut "+class_name+"' style='left: " +
                //            currentEventPosition +
                //            "px'><div class='main-event sub-timeline-event'><div class='main-parent main-parent-add-child' parent-position="+currentEventPosition+" data-event-id="+res.id+"><span class='img-span' style='background-color: "+back_color+"'><img src="+imgSrc+"></span><span class='functionality-div'><span class='event-functionality' style='border-color: "+back_color+"'></span></span></div><div class='horizontal-line-right'><span></span><span></span><span></span><span></span></div><div class='main-parent-edit-field editmodal"+res.id+"'><input class='form-control' id='inputeventid"+res.id+"' placeholder='Edit your Event Name' value="+trimVal+"/><button onClick='updateEvent("+res.id+")' style='background-color: "+back_color+"'>Save</button></div><div class='main-parent-edit-field sharemodal"+res.id+"'><input class='form-control' id='inputshareeventid"+res.id+"' placeholder='Enter Email' /><button onClick='shareEvent("+res.id+")' style='background-color: "+back_color+"'>Share Event</button></div><div class='horizontal-line-left'><span></span><span></span><span></span><span></span></div></div></div>"
                //    );

                var markup = "<div class='edit-delete-event'><ul><li data-event-id="+ res.id + ">Edit Event<span><i class='fa-regular fa-pen-to-square'></i></span></li><li data-event-id="+ res.id +">Delete Event<span><i class='fa-regular fa-trash-can'></i></span></li><li data-event-id="+ res.id +" class='share-event'>Share Event<span><i class='fas fa-share'></i></span></li></ul><div class='edit-field editfield'><input class='form-control' id='inputeventid" + res.id + "' placeholder='Edit your Event Name' value='" +res.event_title_updated + "'/><button onClick='updateEvent(" + res.id +")' style='background-color:" + res.back_color + "'>Save</button></div><div class='edit-field sharefield-" + res.id +"'><input class='form-control' id='inputshareeventid"+ res.id +"' placeholder='Enter Email'/><button onClick='shareEvent("+ res.id +")' style='background-color:"+res.back_color+"'>Share Event</button></div></div>"
                $(".timeline-parent .timeline-functionality").append(
                    "<div class='event-add animate__bounceOut " + class_name + "' style='left: " +
                    currentEventPosition +
                    "px'><div class='main-event sub-timeline-event'><span class='left-parent-event' style='background-color: " + back_color + "'></span><div class='main-parent' parent-date=" + eventDate + " parent-position=" + currentEventPosition + " data-event-id=" + res.id + "><span class='img-span' style='background-color: " + back_color + "'><img src=" + imgSrc + "></span><span class='functionality-div'><span class='event-functionality' data-event-id=" + res.id + " style='background-color: " + back_color + ";border-color: " + back_color + "'></span>"+markup+"</span><div class='vertical-lines'><span style='background-color: " + back_color + "'></span><span style='background-color: " + back_color + "'></span><span style='background-color: " + back_color + "'></span><span style='background-color: " + back_color + "'></span><span style='background-color: " + back_color + "'></span></div></div></div><span class='right-parent-event' style='background-color: " + back_color + "'></span></div>"
                );


                // }
                // else
                // {
                //     if(currentEventPosition<0){
                //         $(".timeline-parent .timeline-functionality").append(
                //             "<div class='event-add animate__bounceOut "+class_name+"' style='left:0px'><div class='main-event'><span style='background-color: "+back_color+"'><img src="+imgSrc+"></span><span style='border-color: "+back_color+"' class='functionality-div'></span><div class='horizontal-line-right'><span></span><span></span><span></span><span></span></div><div class='horizontal-line-left'><span></span><span></span><span></span><span></span></div></div></div>"
                //         );
                //     } else{
                //         $(".timeline-parent .timeline-functionality").append(
                //             "<div class='event-add animate__bounceOut "+class_name+"' style='left: " +
                //                    currentEventPosition +
                //                    "px'><div class='main-event'><span style='background-color: "+back_color+"'><img src="+imgSrc+"></span><span class='functionality-div'><span class='event-functionality' style='border-color: "+back_color+"'></span><div class='edit-delete-event'><ul><li data-event-id="+res.id+">Edit Event <span><i class='fa-regular fa-pen-to-square'></i></span></li><li data-event-id="+res.id+">Delete Event <span><i class='fa-regular fa-trash-can'></i></span></li><li data-event-id="+res.id+">Share Event <span><i class='fas fa-share'></i></span></li></ul><div class='edit-field editfield'><input class='form-control' id='inputeventid"+res.id+"' placeholder='Edit your Event Name' value="+trimVal+"/><button onClick='updateEvent("+res.id+")' style='background-color: "+back_color+"'>Save</button></div><div class='edit-field sharefield'><input class='form-control' id='inputshareeventid"+res.id+"' placeholder='Enter Email' /><button onClick='shareEvent("+res.id+")' style='background-color: "+back_color+"'>Share Event</button></div></div></span></div></div>"
                //         );
                //     }
                // }
            });

        }

        // save sub child event
        // function saveChildEvent(class_name, back_color, imgSrc, trimVal, targetElem, eventId, sibling_child) {
        function saveChildEvent(class_name, parent_date, back_color, imgSrc, child_line, eventId, add_sibling_parent) {
            var pixelLeft = 190;
            /*isParent = 0;
            if (trimVal == "Sub timeline") {
                isParent = 1;
            }*/

            isParent = 1;
            // call ajax to save data in database
            $.ajax({
                "type": "POST",
                "url": "{{url('/child-events-save')}}",
                "data": {
                    "_token": "{{ csrf_token() }}",
                    "postion": "0",
                    "label": trimVal,
                    "event_date": parent_date,
                    "icon": imgSrc,
                    "child_line": child_line,
                    "class_name": class_name,
                    "back_color": back_color,
                    "isParent": 0,
                    "eventId": eventId,
                    "isParent": isParent,
                    'time_line_id': $("#timelineid").val(),
                }, //Send to WebMethod
                'async': false,
            }).done(function (res) {
                if (res.status == "Error") {
                    toastr.error(res.message);
                } else {
                    toastr.success("Event saved successfully!");
                    $(add_sibling_parent).append(
                        "<div class='event-add child animate__bounceOut " +
                        class_name +
                        "' child_parent_date=" +
                        parent_date +
                        " data-child-event-id = "+res.event.id+"><span style='background-color: " +
                        back_color +
                        "' class='left-child-event' data-child-event-id = "+res.event.id+"></span><div class='main-event sub-timeline-event'><span class='main-parent child-event' style='background-color: " +
                        back_color +
                        "'><img src=" +
                        imgSrc +
                        "></span><div style='width: " +
                        child_line +
                        "px; background-color: "+back_color+"' class='timeline-divider-child'><div class='add-child-event-indicator animate__bounceOut' data-child-event-id = "+res.event.id+"><span><i class='fa-light fa-plus' ></i></span></div></div></div><span style='background-color: " +
                        back_color +
                        "' class='right-child-event' data-child-event-id = "+res.event.id+"></span></div>"
                    );
                }

            });

        }

        function saveSiblingEvent(class_name, back_color, imgSrc, childEventId, position_x) {
            // var pixelLeft = 190;
            /*isParent = 0;
            if (trimVal == "Sub timeline") {
                isParent = 1;
            }*/

            // isParent = 1;
            // call ajax to save data in database
            $.ajax({
                "type": "POST",
                "url": "{{url('/sibling-events-save')}}",
                "data": {
                    "_token": "{{ csrf_token() }}",
                    "position_x": position_x,
                    "label": "Hello",
                    // "event_date": parent_date,
                    "icon": imgSrc,
                    // "child_line": child_line,
                    "class_name": class_name,
                    "back_color": back_color,
                    "isParent": 0,
                    "eventId": childEventId,
                    'time_line_id': $("#timelineid").val(),
                }, //Send to WebMethod
                'async': false,
            }).done(function (res) {
                if (res.status == "Error") {
                    toastr.error(res.message);
                } else {
                    toastr.success("Event saved successfully!");
                    /*if (total_child_sibling.length >= 1) {
                        $(child_sibling_parent).append(
                            "<div style='left: " +
                            (parseInt(total_child_sibling.length * 170) + 170) +
                            "px' class='event-add child-sibling animate__bounceOut" +
                            class_name +
                            "' child_parent_date=" +
                            parent_date +
                            "><span style='background-color: " +
                            back_color +
                            "' class='left-sibling-event'></span><div class='main-event sub-timeline-event'><span class='main-parent child-event' style='background-color: " +
                            back_color +
                            "'><img src=" +
                            imgSrc +
                            "></span></div><span style='background-color: " +
                            back_color +
                            "' class='right-sibling-event'></span></div>"
                        );
                        } else {
                        $(child_sibling_parent).append(
                            "<div style='left: 170px;' class='event-add child-sibling animate__bounceOut" +
                            class_name +
                            "' child_parent_date=" +
                            parent_date +
                            "><span style='background-color: " +
                            back_color +
                            "' class='left-sibling-event'></span><div class='main-event sub-timeline-event'><span class='main-parent child-event' style='background-color: " +
                            back_color +
                            "'><img src=" +
                            imgSrc +
                            "></span></div><span style='background-color: " +
                            back_color +
                            "' class='right-sibling-event'></span></div>"
                        );
                       }*/
                }

            });

        }

        function saveEndDate(eventId, eventEndDate) {
            // call ajax to save data in database
            $.ajax({
                "type": "POST",
                "url": "{{url('/save-end-date')}}",
                "data": {
                    "_token": "{{ csrf_token() }}",
                    "eventId": eventId,
                    "eventEndDate": eventEndDate,
                }, //Send to WebMethod
                'async': false,
            }).done(function (res) {
                if (res.status == "Error") {
                    toastr.error(res.message);
                } else {
                    toastr.success("Event saved successfully!");
                }
            });
        }


        //delete event
        function Eventdelete(deleteEvent) {
            $.ajax({
                "type": "POST",
                "url": "{{url('/events-delete')}}",
                "data": {
                    "_token": "{{ csrf_token() }}",
                    eventId,
                }, //Send to WebMethod
                'async': false,
            }).done(function (res) {
                if (res.status == "Success") {
                    toastr.success(res.message);
                    location.reload();
                } else {
                    toastr.error(res.message);
                }
            });

        }

        //updae event name
        function updateEvent(eventId, event = null) {
            event.stopPropagation();
            let inputvalue = $("#inputeventid" + eventId + "").val();
            $.ajax({
                "type": "POST",
                "url": "{{url('/events-update')}}",
                "data": {
                    "_token": "{{ csrf_token() }}",
                    eventId,
                    inputvalue,
                }, //Send to WebMethod
                'async': false,
            }).done(function (res) {
                if (res.status == "Success") {
                    $(".functionality-div .edit-delete-event .editfield").css('display', 'none');
                    toastr.success(res.message);
                } else {
                    $(".functionality-div .edit-delete-event .editfield").css('display', 'none');
                    toastr.error(res.message);
                }
            });
        }

        function shareEvent(eventId) {
            let inputvalue = $("#inputshareeventid" + eventId + "").val();
            $.ajax({
                "type": "POST",
                "url": "{{url('invite/event')}}",
                "data": {
                    "_token": "{{ csrf_token() }}",
                    eventId,
                    inputvalue,
                }, //Send to WebMethod
                'async': false,
            }).done(function (res) {
                if (res == "success") {
                    $(".functionality-div .edit-delete-event .sharefield").css('display', 'none');
                    toastr.success("Event Shared successfully!");
                } else {
                    $(".functionality-div .edit-delete-event .sharefield").css('display', 'none');
                    toastr.error("something went wrong");
                }
            });
        }

        function updateEventPositionX(eventId,child_line) {
            $.ajax({
                "type": "POST",
                "url": "{{url('update-event-position')}}",
                "data": {
                    "_token": "{{ csrf_token() }}",
                    "eventId": eventId,
                    "child_line": child_line,
                }, //Send to WebMethod
                'async': false,
            }).done(function (res) {
                if (res.status == "Success") {
                    toastr.success(res.message);
                } else {
                    toastr.error(res.message);
                }
            });
        }

        $("input").click(function (e) {
            e.stopPropagation();
        })
        $(".timeline-parent .timeline-divider").css('width', {{$j*500}})
    </script>
@endsection
