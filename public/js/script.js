/******************* Add-Event-Indicator - Scrolling */
var mouseXPosition = 0,mouseXChildPosition = 0;
var currentEventPosition = 0,currentEventChildPosition = 0, subtimeline_child_parent_position=0;
var oldScrollTop = $(window).scrollTop();
var oldScrollLeft = $(window).scrollLeft();
var scrollPostion = 0;
var eventId, parentposition, class_name, trimVal, imgSrc, back_color, childEventId, start_date;
let eventDate,
    add_sibling = false,
    add_sibling_parent,
    parent_date,
    child_sibling = false,
    child_sibling_parent,
    eventEndDate = null,
    start_child_date,
    sibling_left_event = false,
    main_child,indicator_move=false,
    total_mouse_move=0,scroll_left=false;

var mouseWheelEvt = function (event) {
    if (document.body.doScroll){
        document.body.doScroll(event.wheelDelta>0?"left":"right");
    }
    else if ((event.wheelDelta || event.detail) > 0){
        // document.body.scrollLeft -= 10;
        total_right=parseInt($(".timeline-parent").css("right").split('px')[0])
        if(total_right<0 || total_right==-100 || total_right==0){
            $(".timeline-parent").css("right",'0px')
        } else{
            $(".timeline-parent").css("right",total_right-100+'px');
            scroll_left=true;
        }

    }

    return false;
    }
document.body.addEventListener("mousewheel", mouseWheelEvt);
$(".timeline-parent").scroll(function () {
    if (oldScrollTop == $(window).scrollTop()) {
        scrollPostion = $(".timeline-parent").scrollLeft();
        $(".timeline-parent .timeline-divider").css("left", scrollPostion);
        $(".timeline-parent .timeline-parent").css("left", scrollPostion);
    } else {
        alert("vertical");
    }
    oldScrollTop = $(window).scrollTop();
    oldScrollLeft = $(window).scrollLeft();
});

$(".timeline-parent .timeline-divider").mousemove(function (e) {
    mouseXPosition = e.pageX + scrollPostion;
    currentEventPosition = mouseXPosition - 68;
    // console.log("xys", currentEventPosition)
    if(indicator_move){
        if(scroll_left){
            if (total_right < 0) {
                $(".add-event-indicator").css("left", 0);
                $(".event-list").css("left", 0);
            } else {
                $(".add-event-indicator").css("left", total_right+currentEventPosition-100+'px');
                $(".event-list").css("left", total_right+currentEventPosition-100+'px');
            }
        } else{
            if(total_mouse_move<0){
                $(".add-event-indicator").css("left", parseInt(currentEventPosition));
                $(".event-list").css("left", parseInt(currentEventPosition));
            }
            else{
                if(parseInt(currentEventPosition)+parseInt(total_mouse_move)-parseInt(305)<0){
                    $(".add-event-indicator").css("left", parseInt(currentEventPosition)+parseInt(total_mouse_move));
                    $(".event-list").css("left", parseInt(currentEventPosition)+parseInt(total_mouse_move));
                } else{
                    $(".add-event-indicator").css("left", parseInt(currentEventPosition)+parseInt(total_mouse_move)-parseInt(305));
                    $(".event-list").css("left", parseInt(currentEventPosition)+parseInt(total_mouse_move)-parseInt(305));
                }
            }
        }
    } else{
        if (currentEventPosition < 0) {
            $(".add-event-indicator").css("left", 0);
            $(".event-list").css("left", 0);
        } else {
            $(".add-event-indicator").css("left", currentEventPosition);
            $(".event-list").css("left", currentEventPosition);
        }
    }

});
$(document).on("mousemove", ".timeline-divider-child", function (e) {
    subtimeline_child_parent_position=$(this).parent().parent().parent().attr("parent-position");
    main_child=$(this).parent().parent();
    mouseXChildPosition = e.pageX + scrollPostion;
    currentEventChildPosition=mouseXChildPosition - subtimeline_child_parent_position - 135;
    if(indicator_move){
        if(scroll_left){
            if (total_right < 0) {
                $(this).children().css("left", 0);
                $(".event-list").css("left", 0);
            } else {
                $(this).children().css("left", total_right+currentEventChildPosition-100+'px');
                $(".event-list").css("left", total_right+currentEventChildPosition-100+'px');
            }
        } else{
            if(total_mouse_move<0){
                $(this).children().css("left", parseInt(currentEventChildPosition));
                $(".event-list").css("left", parseInt(subtimeline_child_parent_position)+parseInt(currentEventChildPosition)+68+'px');
            }
            else{
                if(parseInt(currentEventChildPosition)+parseInt(total_mouse_move)-parseInt(305)<0){
                    $(this).children().css("left", parseInt(currentEventChildPosition)+parseInt(total_mouse_move));
                    $(".event-list").css("left", parseInt(subtimeline_child_parent_position)+parseInt(currentEventChildPosition)+68+parseInt(total_mouse_move)+'px');
                } else{
                    $(this).children().css("left", parseInt(currentEventChildPosition)+parseInt(total_mouse_move)-parseInt(305));
                    $(".event-list").css("left", parseInt(subtimeline_child_parent_position)+parseInt(currentEventChildPosition)+68+parseInt(total_mouse_move)-parseInt(305)+'px');
                }
            }
        }
    } else{
        if (currentEventChildPosition < 0) {
            $(this).children().css("left", 0);
            $(".event-list").css("left", 0);
        } else {
            $(this).children().css("left", currentEventChildPosition);
            $(".event-list").css("left", parseInt(subtimeline_child_parent_position)+parseInt(currentEventChildPosition)+68+'px');
        }
    }

})
/******************* Add Child Event Indicator - Click */
$(document).on("click", ".add-child-event-indicator ", function (e) {
    $(".event-list").css("display", "block");
    child_sibling=true;
    childEventId = $(this).attr('data-child-event-id');
})
/******************* Add-Event-Indicator - Click */
$(".add-event-indicator").click(function () {
    if ($(".event-list-subtime-line").css("display") == "block") {
        $(".event-list-subtime-line").css("display", "none");
    }
    $(".event-list").css("display", "block");
});

/******************* Event-List-Item - Click */
$(".event-list li").click(function (e) {
    var val = $(this).text();
    class_name = $(this)[0].classList;
    trimVal = val.trim();
    imgSrc = $(this).find("img").attr("src");
    back_color = $(this).find(".img-div").css("border-color");
    var count_child = document.querySelectorAll(".child");
    console.log("current position:", currentEventPosition)
   /* var current_day = currentEventPosition / 500;
    Date.prototype.addDays = function (days) {
        var date = new Date(this.valueOf());
        date.setDate(date.getDate() + days);
        return date;
    };*/
    /* start_date = $('#start_date').attr('start_date');
    var date = new Date(start_date);
    var eventDate = date.addDays(current_day).toLocaleDateString();*/
    var rounded = roundToNextMultipleOf500(currentEventPosition);
    var eventDate = $('.date').filter('[pixel=' + rounded + ']').attr('date');
    console.log(rounded); // Output: 500
    console.log("Old Event Date:", eventDate)
    if (add_sibling) {
        timeline_divider = $(".timeline-divider").css("width").split("px")[0];
        child_line = parseInt(timeline_divider - parentposition);
        child_line = parseInt(child_line - 69);
        for (let i = 0; i < count_child.length; i++) {
            previousElement = count_child[i].previousElementSibling;
            currentTop = count_child.length - (i - 1);
            newTop = currentTop * 145 + "px";
            count_child[i].style.top = newTop;
            for (let j = 0; j < 10; j++) {
                previousElement.insertAdjacentHTML(
                    "beforeend",
                    "<span style='background-color:" +
                        previousElement.children[0].style.backgroundColor +
                        "' class='active'></span>"
                );
            }
        }
        var childrenLine = $(add_sibling_parent).children()[2].children;
        for (let i = 0; i < childrenLine.length; i++) {
            childrenLine[i].style.opacity = 1;
            childrenLine[i].classList.add("active");
        }
        /*$(add_sibling_parent).append(
            "<div class='event-add child animate__bounceOut dddd " +
                class_name +
                "' child_parent_date=" +
                parent_date +
                " ><span style='background-color: " +
                back_color +
                "' class='left-child-event'></span><div class='main-event sub-timeline-event'><span class='main-parent child-event' style='background-color: " +
                back_color +
                "'><img src=" +
                imgSrc +
                "></span><div style='width: " +
                child_line +
                "px; background-color: "+back_color+"' class='timeline-divider-child'></div></div><span style='background-color: " +
                back_color +
                "' class='right-child-event'></span></div>"
        );*/
        add_sibling = false;
        saveChildEvent(class_name[0], parent_date, back_color, imgSrc, child_line, eventId, add_sibling_parent)
    } else if (child_sibling) {
        var current_child_day = parseInt(parseInt(subtimeline_child_parent_position)+parseInt(currentEventChildPosition)) / 500;
        var eventChildDate = date.addDays(current_child_day).toLocaleDateString();
        childDate = new Date(eventChildDate);
        eventChildDay = childDate.getDate();
        eventChildMonth = childDate.getMonth() + 1;
        eventChildYear = childDate.getFullYear();
        childDate = eventChildYear + "-" + eventChildDay + "-" + eventChildMonth;
        // sibling_child_parent_width = $(child_sibling_parent)
        //     .find(".timeline-divider-child")
        //     .css("width");
        // new_sibling_width = parseInt(
        //     sibling_child_parent_width.split("px")[0] - 170
        // );
        // var total_child_sibling =
        //     $(child_sibling_parent).find(".child-sibling");
        // if (total_child_sibling.length >= 1) {
        //     $(child_sibling_parent).append(
        //         "<div style='left: " +
        //             (parseInt(total_child_sibling.length * 170) + 170) +
        //             "px' class='event-add child-sibling animate__bounceOut ssss" +
        //             class_name +
        //             "' child_parent_date=" +
        //             parent_date +
        //             "><span style='background-color: " +
        //             back_color +
        //             "' class='left-sibling-event'></span><div class='main-event sub-timeline-event'><span class='main-parent child-event' style='background-color: " +
        //             back_color +
        //             "'><img src=" +
        //             imgSrc +
        //             "></span></div><span style='background-color: " +
        //             back_color +
        //             "' class='right-sibling-event'></span></div>"
        //     );
        //     saveSiblingEvent(class_name[0], parent_date, back_color, imgSrc, childEventId, total_child_sibling, child_sibling_parent);
        // } else {
        //     $(child_sibling_parent).append(
        //         "<div style='left: 170px;' class='event-add child-sibling animate__bounceOut aaaa " +
        //             class_name +
        //             "' child_parent_date=" +
        //             parent_date +
        //             "><span style='background-color: " +
        //             back_color +
        //             "' class='left-sibling-event'></span><div class='main-event sub-timeline-event'><span class='main-parent child-event' style='background-color: " +
        //             back_color +
        //             "'><img src=" +
        //             imgSrc +
        //             "></span></div><span style='background-color: " +
        //             back_color +
        //             "' class='right-sibling-event'></span></div>"
        //     );
        //     saveSiblingEvent(class_name[0], parent_date, back_color, imgSrc, childEventId, total_child_sibling, child_sibling_parent);
        // }

        $(main_child).append(
            "<div style='left: "+parseInt(parseInt(currentEventChildPosition)+parseInt(68))+"px;' class='event-add child-sibling animate__bounceOut" +
                class_name +
                "' child_parent_date=" +
                parent_date +
                " sibling_date="+childDate+"><span style='background-color: " +
                back_color +
                "' class='left-sibling-event'></span><div class='main-event sub-timeline-event'><span class='main-parent child-event' style='background-color: " +
                back_color +
                "'><img src=" +
                imgSrc +
                "></span></div><span style='background-color: " +
                back_color +
                "' class='right-sibling-event'></span></div>"
        );
        // childEventId = $(this).attr('data-child-event-id');
        position_x=parseInt(parseInt(currentEventChildPosition)+parseInt(68));
        saveSiblingEvent(class_name[0], back_color, imgSrc, childEventId, position_x);
        child_sibling = false;
    } else {
        eventDay=eventDate.toString().split("/")[0];
        eventMonth=eventDate.toString().split("/")[1];
        eventYear=eventDate.toString().split("/")[2];
        eventDate = eventYear + "-" + eventMonth + "-" + eventDay;
        saveEvent(
            class_name[0],
            currentEventPosition,
            back_color,
            imgSrc,
            trimVal,
            eventDate
        );
    }
    let total_event_add = document.querySelectorAll(".event-add");
    let current_event_add = total_event_add[total_event_add.length - 1];
    $(current_event_add);
    $(".event-list").css("display", "none");
});
/******************* Functionality - Div - Click */
$(document).on("click", ".event-functionality", function () {
    if ($(".event-list-subtime-line").css("display") == "block") {
        $(".event-list-subtime-line").css("display", "none");
    }
    parentposition = $(this).parent().parent().attr("parent-position");
    parent_date = $(this).parent().parent().attr("parent-date");
    $(".event-list").css("display", "block");
    $(".event-list").css("left", parentposition + "px");
    add_sibling = true;
    add_sibling_parent = $(this).parent().parent();
    eventId = $(this).attr('data-event-id');
});

$(document).on("mouseover", ".event-functionality", function () {
    var childrenLine = $(this).parent().next().children();
    for (let i = 0; i < childrenLine.length; i++) {
        childrenLine[i].style.opacity = 1;
    }
});
$(document).on("mouseout", ".event-functionality", function () {
    $(".vertical-lines span").css("opacity", 0);
});
/******************* Child - Right - Event - Click */
/*$(document).on("click", ".child .right-child-event", function () {
    var list_position = $(this).parent().parent().attr("parent-position");
    parent_date = $(this).parent().parent().attr('parent-date')
    $(".event-list").css("display", "block");
    $(".event-list").css("left", list_position + "px");
    child_sibling = true;
    child_sibling_parent = $(this).parent();
    childEventId = $(this).attr('data-child-event-id');
});*/

/******************* Child - Left - Event - Click */
$(document).on("click", ".child .left-child-event", function () {
    childEventId = $(this).attr("data-child-event-id")
    $(".date-modal").css("display", "block");
    start_child_date = $(this).parent().parent().attr("parent-date");
    child_sibling_parent = $(this).parent();
    eventId = $(this).attr('data-child-event-id')
});

/******************* Parent - Left - Event - Click */
$(document).on("click", ".left-parent-event", function () {
    if($(this).parent().children('.main-parent').children('.functionality-div').children('.edit-delete-event').css('display')=='block'){

        $(this).parent().children('.main-parent').children('.functionality-div').children('.edit-delete-event').css('display','none');
    } else{
        $('.edit-delete-event').css('display','none')
        $(this).parent().children('.main-parent').children('.functionality-div').children('.edit-delete-event').css('display','block');
    }

        eventId = $(this).attr('data-child-event-id')
        //left_parent=$(this).parent().children('.main-parent').children('.functionality-div').children('.edit-delete-event').css('display','block');
});

$(document).on("click", ".share-event", function () {
    var id = $(this).attr('data-event-id');
    console.log('.sharefield-'+id)
    $('.sharefield-'+id).css('display','block')
    console.log($('.sharefield-'+id).css('display','block'))
});
/******************* Sibling - Child - Left - Event - Click */
$(document).on("click", ".child .left-sibling-event", function () {
    $(".date-modal").css("display", "block");
    start_sibiling_child_date = $(this).attr("sibling_date");
    sibling_current_position=$(this).parent().css("left").split('px')[0];
    child_sibling_parent_position = $(this).parent().parent().parent().attr("parent-position");
    sibling_left_event = true;
    current_sibling=$(this).parent();
});
/******************* Modal - Footer - Click */
$(".date-modal .modal-footer button").on("click", function () {
    btnText = $(this).text();
    if (btnText == "Save") {

        eventEndDate = new Date($(".date-modal .modal-body input").val());
        eventEndDay = eventEndDate.getDate();
        eventEndMonth = eventEndDate.getMonth() + 1;
        eventEndYear = eventEndDate.getFullYear();
        eventEndDate = eventEndYear + "-" + eventEndMonth + "-" + eventEndDay;
        if (eventEndDate == "") {
            $(".date-modal .modal-body span.error").css("display", "block");
        } else {
            if (sibling_left_event) {
                $(".date-modal").css("display", "none");
                const startDate = new Date(eventEndDate).getDate();
                totalDay=parseInt(startDate*500);
                new_starting_date=parseInt(totalDay)-parseInt(child_sibling_parent_position);
                // total_sibling_move=parseInt(child_sibling_parent_position)+parseInt(sibling_current_position);
                new_sibling_starting_position=parseInt(parseInt(new_starting_date)-parseInt(500));
                // sibling_child_parent_position=$(child_sibling_parent).parent().parent().attr('parent-position');
                // new_sibling_starting_point=parseInt(startDate*500);
                // new_sibling_starting_point=parseInt(new_sibling_starting_point-sibling_child_parent_position);
                // new_sibling_starting_point=parseInt(new_sibling_starting_point-500);
                // new_sibling_parent_timeline_width=parseInt(parseInt(startDate*500)-sibling_child_parent_position);
                // new_sibling_parent_timeline_width=parseInt(new_sibling_parent_timeline_width-450)
                // $(child_sibling_parent).parent().find('.timeline-divider-child')[0].style.width=new_sibling_parent_timeline_width+'px';
                // $(child_sibling_parent).css('left',new_sibling_starting_point+'px');
                $(current_sibling).css('left',new_sibling_starting_position+'px')
                sibling_left_event=false;
            } else {
                $(".date-modal").css("display", "none");
                const firstDate = new Date(start_child_date).getTime();
                const secondDate = new Date(eventEndDate).getTime();
                let difference = secondDate - firstDate;
                let TotalDays = Math.ceil(difference / (1000 * 3600 * 24));
                days_width = TotalDays * 500;

                child_move_position = $(child_sibling_parent)
                    .parent()
                    .attr("parent-position");
                child_move_left=parseInt(child_move_position)/500;
                split_with_decimal=child_move_left.toString().split(".")[1];
                total_decimal_part=("0." + split_with_decimal);
                total_move_pixel = 500-(total_decimal_part*500);

                // new_child_width = parseInt(parseInt(days_width)-parseInt(child_move_position)) - 69;
                new_child_width = parseInt(parseInt(days_width))+total_move_pixel - 45;

                    $(child_sibling_parent)
                        .find(".timeline-divider-child")
                        .css("width", new_child_width + "px");
                    }

                updateEventPositionX(childEventId, new_child_width)

             }
    } else {
        $(".date-modal").css("display", "none");
    }
});



/***************** Zoom - In - Out - Functionality */
$('.zoom-in').click(function() {
    updateZoom(0.1);
 });

 $('.zoom-out').click(function() {
    updateZoom(-0.1);
 });
 $('.reset').click(function() {
    $('body').css({ zoom: 1, '-moz-transform': 'scale(' + 1 + ')' });
 });


 zoomLevel = 1;
 var updateZoom = function(zoom) {
    zoomLevel += zoom;
    $('body').css({ zoom: zoomLevel, '-moz-transform': 'scale(' + zoomLevel + ')' });
 }


 /***************** Vertical - Indicator - Functionality */
 const slider = document.querySelector('.vertical-indicator');

let isDown = false;
let startX;
let scrollLeft;

var pin = document.getElementById("verticalIndicator");
var mouseStartPosition = {x: 0, y: 0};
var pinStartPosition = {x: 0, y: 0};
var targetPosition = {x: 0, y: 0};
var pinPosition = {x: 0, y: 0};
var velocityX = 0;

pin.addEventListener("mousedown", mousedown);

function mousedown(e) {
  mouseStartPosition.x = e.pageX;
  mouseStartPosition.y = e.pageY;
  pinStartPosition.x = targetPosition.x;
  pinStartPosition.y = targetPosition.y;
  window.addEventListener("mousemove", mousemove);
  window.addEventListener("mouseup", mouseup);
}

function mousemove(e) {
    indicator_move=true;
  velocityX = pinStartPosition.x + e.pageX - mouseStartPosition.x - targetPosition.x;
  if (velocityX < -25) velocityX = -25;
  if (velocityX > 25) velocityX = 25;
  targetPosition.x = pinStartPosition.x + e.pageX - mouseStartPosition.x;
  targetPosition.y = pinStartPosition.y + e.pageY - mouseStartPosition.y;
  pinPosition.x += (targetPosition.x - pinPosition.x)*0.2;
  pinPosition.y += (targetPosition.y - pinPosition.y)*0.2;
  screen_width= parseInt($(window).width()-50)
  current_pixel=parseInt(parseInt(80*screen_width)/100);
  time_line_Divider_width=parseInt($(".timeline-divider").css("width").split('px')[0]);
  time_line_Divider_width=time_line_Divider_width-500;
  new_pixel=parseInt(time_line_Divider_width/current_pixel);
  add_event_indicator_current_left=$(".add-event-indicator").css("left").split("px")[0];
  if(pinPosition.x<=current_pixel){
    if(parseInt(pinPosition.x*new_pixel)-parseInt(305)<0){
        $(".timeline-parent").css("right",'0px');
    } else{
        $(".timeline-parent").css("right",parseInt(pinPosition.x*new_pixel)-parseInt(305)+'px');
    }
    total_mouse_move=parseInt(pinPosition.x*new_pixel);
  }
  if(pinPosition.x<0){
    pinPosition.x=0;
  } else if(pinPosition.x>current_pixel){
    pinPosition.x=current_pixel;
  }
  var pos = pinPosition.x + "px,0px, 0px";
  pin.style.transform =  "translate3d("+pos+") rotateZ("+-velocityX+"deg)";

}

function mouseup(e) {
  velocityX = 0;
  targetPosition.x = pinStartPosition.x + e.pageX - mouseStartPosition.x;
  targetPosition.y = pinStartPosition.y + e.pageY - mouseStartPosition.y;
  window.removeEventListener("mousemove", mousemove);
  window.removeEventListener("mouseup", mouseup);
}

function roundToNextMultipleOf500(num) {
    return Math.ceil(num / 500) * 500;
}
