  @if($ch->event_title=="Sub timeline")                            
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
            <img src="{{$ch->icon}}" class='img-fluid'/>
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
        <img src="{{$ch->icon}}" class='img-fluid'/>
    </span>
    </div>
 @endif