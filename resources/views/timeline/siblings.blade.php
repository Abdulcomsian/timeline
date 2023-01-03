<div style="left: {{$sibling_event->postion_x}}px;@if(in_array($event->id,$ventids)) pointer-events:none @endif" class="event-add child-sibling animate__bounceOut {{$sibling_event->class_name}}" child_parent_date="{{$sibling_event->parent_date}}">
    <span style="background-color: {{$sibling_event->back_color}}" class='left-sibling-event'>

    </span>
    <div class='main-event sub-timeline-event'>
        <span class='main-parent child-event' style="background-color: {{$sibling_event->back_color}}">
            <img src="{{$sibling_event->icon}}">
        </span>
    </div>
    <span style="background-color: {{$sibling_event->back_color}}" class='right-sibling-event'>

    </span>
</div>
