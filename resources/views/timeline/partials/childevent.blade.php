  
 <!-- new work here -->
@if($ch->event_title == "Sub timeline")
      @if($i==1)
      <div class='add-more-event'>
        <div class='doted-line'><span></span><span></span><span></span><span></span>
            <span></span><span></span>
        </div>
      @elseif($i%2==0)
         @php 
            $totalLeft= $i/2;
            $totalLeft=$totalLeft-1;
            $pixel=120+($totalLeft*120);
        @endphp
      <div style="position: absolute; left: {{$pixel}}px; top: 68px;" class="add-more-event">
            <div class="horizontal-right-child-line">
                <span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
            </div>
            <div class="doted-line">
                <span></span><span></span><span></span><span></span><span></span><span></span>
            </div>
      @else
      @php 
         $totalRight=floor($i/2);
         $pixel=($totalRight*120);
        @endphp
        <div style="position: absolute; right: {{$pixel}}px; top: 68px;" class="add-more-event">
            <div class="horizontal-left-child-line">
                <span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
            </div>
            <div class="doted-line">
                <span></span><span></span><span></span><span></span><span></span><span></span>
            </div>
      @endif

        <div class='event-add animate__bounceOut {{$ch->class_name}}' style='left: 0px'>
            <div class='main-event sub-timeline-event'>
                <span class='main-parent {{ $assign == true ? "" :"main-parent-add-child"}}'  style='background-color:{{$ch->back_color}}' data-event-id="{{$ch->id}}">
                    <img src="{{$ch->icon}}"> 
                </span>
                <span class="functionality-div">
                        <span class="event-functionality" style="border-color:{{$ch->back_color}}"></span>
                       <!--  <div class='edit-delete-event'>
                        <ul>
                            <li data-event-id="{{$ch->id}}">Edit Event <span><i class='fa-regular fa-pen-to-square'></i></span></li>
                            <li data-event-id="{{$ch->id}}">Delete Event <span><i class='fa-regular fa-trash-can'></i></span></li>
                            <li data-event-id="{{$ch->id}}">Share Event <span><i class="fas fa-share"></i></span></li>
                        </ul>
                        <div class='edit-field editfield'>
                            <input class='form-control' id="inputeventid{{$ch->id}}" placeholder='Edit your Event Name' value="{{$ch->event_title_updated}}"/>
                            <button onClick="updateEvent({{$ch->id}},event)" style='background-color: {{$ch->back_color}}'>Save</button>
                        </div>
                        <div class='edit-field sharefield'>
                            <input class='form-control' id="inputshareeventid{{$ch->id}}" placeholder='Enter Email'/>
                            <button  onClick="shareEvent({{$ch->id}})" style='background-color:{{$ch->back_color}}'>Share Event</button>
                        </div>
                    </div> -->
                </span>
                <div class='horizontal-line-right'>
                    <span></span><span></span><span></span><span></span>
                </div>
                <div class='horizontal-line-left'>
                    <span></span><span></span><span></span><span></span>
                </div>
                <div class='main-parent-edit-field editmodal{{$ch->id}}'>
                    <input class='form-control' id="inputeventid{{$ch->id}}" placeholder='Edit your Event Name' value="{{$ch->event_title_updated}}"/>
                    <button onClick="updateEvent({{$ch->id}},event)" style='background-color:{{$event->back_color}}'>Save</button>
                </div>
                <div class='main-parent-edit-field sharemodal{{$ch->id}}'>
                    <input class='form-control' id="inputshareeventid{{$ch->id}}" placeholder='Enter Email'/>
                    <button onClick="shareEvent({{$ch->id}},event)" style='background-color:{{$event->back_color}}'>Share Event</button>
                </div>
                    @if(count($ch->Child)>0)
                      @php $i=1;@endphp
                      @foreach($ch->child as $ch)
                      @include('timeline.partials.childevent',$ch)
                      @php $i++;@endphp
                      @endforeach
                    @else
                    <div class='add-more-event'>
                    <div class='doted-line'>
                        <span></span><span></span><span></span><span></span><span></span><span></span>
                    </div>
                    <div class='sub-child-event-add flash' data-event-id="{{$ch->id}}"><span><i class='fa-light fa-plus'></i></span>
                    </div>
                    </div>
                    @endif
            </div>
        </div>
    </div>
    
@else
     @if($i==1)
     <div class='add-more-event'>
            <div class='doted-line'><span></span><span></span><span></span><span></span>
                <span></span><span></span>
            </div>
              <div class='new-child animate__bounceOut {{$ch->class_name}}'>
                <span class='main-parent' style='background-color:{{$ch->back_color}}'>
                    <img src="{{$ch->icon}}">

                </span>
                <span class='functionality-div'>
                    <span class='event-functionality' style='border-color:{{$ch->back_color}} '></span>
                    @if($assign==false)
                    <div class='edit-delete-event'>
                        <ul>
                            <li data-event-id="{{$ch->id}}">Edit Event <span><i class='fa-regular fa-pen-to-square'></i></span></li>
                            <li data-event-id="{{$ch->id}}">Delete Event <span><i class='fa-regular fa-trash-can'></i></span></li>
                            <li data-event-id="{{$ch->id}}">Share Event <span><i class="fas fa-share"></i></span></li>
                        </ul>
                        <div class='edit-field editfield'>
                            <input class='form-control' id="inputeventid{{$ch->id}}" placeholder='Edit your Event Name' value="{{$ch->event_title_updated}}"/>
                            <button onClick="updateEvent({{$ch->id}},event)" style='background-color: {{$ch->back_color}}'>Save</button>
                        </div>
                        <div class='edit-field sharefield'>
                            <input class='form-control' id="inputshareeventid{{$ch->id}}" placeholder='Enter Email'/>
                            <button  onClick="shareEvent({{$ch->id}})" style='background-color:{{$ch->back_color}}'>Share Event</button>
                        </div>
                    </div>
                    @endif
                </span>
            </div>
    </div>
     @elseif($i%2==0)
        @php 

            $totalLeft= $i/2;
            $totalLeft=$totalLeft-1;
            $pixel=120+($totalLeft*120);
        @endphp
        <div style="position: absolute; left: {{$pixel}}px; top: 68px;" class="add-more-event">
            <div class="horizontal-right-child-line">
                <span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
            </div>
            <div class="doted-line">
                <span></span><span></span><span></span><span></span><span></span><span></span>
            </div>
            <div class="event-add animate__bounceOut purple" style="left: 0px">
                <div class="main-event sub-timeline-event">
                        <span class="main-parent "  style="background-color: {{$ch->back_color}}">
                            <img src="{{$ch->icon}}">
                        </span>
                        <span class='functionality-div'>
                    <span class='event-functionality' style='border-color:{{$ch->back_color}} '></span>
                    @if($assign==false)
                    <div class='edit-delete-event'>
                        <ul>
                            <li data-event-id="{{$ch->id}}">Edit Event <span><i class='fa-regular fa-pen-to-square'></i></span></li>
                            <li data-event-id="{{$ch->id}}">Delete Event <span><i class='fa-regular fa-trash-can'></i></span></li>
                        </ul>
                        <div class='edit-field'>
                            <input class='form-control' id="inputeventid{{$ch->id}}" placeholder='Edit your Event Name' value="{{$ch->event_title_updated}}"/>
                            <button onClick="updateEvent({{$ch->id}})" style='background-color: {{$ch->back_color}}'>Save</button>
                        </div>
                    </div>
                    @endif
                </span>
                        <div class="horizontal-line-right">
                            <span></span><span></span><span></span><span></span>
                        </div>
                        <div class="horizontal-line-left">
                            <span></span><span></span><span></span><span></span>
                        </div>
                </div>
            </div>
        </div>  
     @else
        @php 
         $totalRight=floor($i/2);
         $pixel=($totalRight*120);
        @endphp
        <div style="position: absolute; right: {{$pixel}}px; top: 68px;" class="add-more-event">
            <div class="horizontal-left-child-line">
                <span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
            </div>
            <div class="doted-line">
                <span></span><span></span><span></span><span></span><span></span><span></span>
            </div>
            <div class="event-add animate__bounceOut purple" style="left: 0px">
                <div class="main-event sub-timeline-event">
                        <span class="main-parent"  style="background-color: {{$ch->back_color}}">
                            <img src="{{$ch->icon}}">
                        </span>
                        <span class='functionality-div'>
                            <span class='event-functionality' style='border-color:{{$ch->back_color}} '></span>
                            @if($assign==false)
                            <div class='edit-delete-event'>
                                <ul>
                                    <li data-event-id="{{$ch->id}}">Edit Event <span><i class='fa-regular fa-pen-to-square'></i></span></li>
                                    <li data-event-id="{{$ch->id}}">Delete Event <span><i class='fa-regular fa-trash-can'></i></span></li>
                                </ul>
                                <div class='edit-field'>
                                    <input class='form-control'  id="inputeventid{{$ch->id}}" placeholder='Edit your Event Name' value="{{$ch->event_title_updated}}"/>
                                    <button onClick="updateEvent({{$ch->id}},event)" style='background-color:{{$ch->back_color}}'>Save</button>
                                </div>
                            </div>
                            @endif
                        </span>
                        <div class="horizontal-line-right">
                            <span></span><span></span><span></span><span></span>
                        </div>
                        <div class="horizontal-line-left">
                            <span></span><span></span><span></span><span></span>
                        </div>
                </div>
            </div>
        </div> 
     @endif
   
@endif



  <!-- old work  -->
  {{-- @if($ch->event_title=="Sub timeline")
   <div class='newChild' style='left:-43px'>
      <span class='functionality-span'>
          <span class='setting'>
              <i class='fas fa-cog'></i>
              <div class='edit-delete'>
                  <span class='edit-btn'>
                      <i class='fas fa-edit'></i>
                  </span>
                  <span class='delete-btn' data-event-id="{{$ch->id}}">
                      <i class='fas fa-trash'></i>
                  </span>
              </div>
          </span>
          <input class='event-type' value='{{$ch->event_title}}'>
      </span>
      <span class='ms-2 functionality-span'>
          <img src="{{$ch->icon}}" class='img-fluid' />
          <span class='subTimeLineChild'>
              <span class='vertical-line'></span>
              <span class='addSubChildEvent functionality-span' data-event-id="{{$ch->id}}">
                  <i class='fas fa-plus'></i>
              </span>
              @if(count($ch->Child)>0)
              @foreach($ch->child as $ch)
              @include('timeline.partials.childevent',$ch)
              @endforeach
              @endif

          </span>
      </span>
  </div>
  @else

  <div class='newChild' style='left:-43px;top:{{18*$i}}px'>
      <span class='functionality-span'>
          <span class='setting'>
              <i class='fas fa-cog'></i>
              <div class='edit-delete'>
                  <span class='edit-btn'>
                      <i class='fas fa-edit'></i>
                  </span>
                  <span class='delete-btn' data-event-id="{{$ch->id}}">
                      <i class='fas fa-trash'></i>
                  </span>
              </div>
          </span>
          <input class='event-type' value='{{$ch->event_title}}'>
      </span>
      <span class='ms-2 functionality-span'>
          <img src="{{$ch->icon}}" class='img-fluid' />
      </span>
  </div>
  @endif --}}