/******************* Add-Event-Indicator - Scrolling */
var mouseXPosition = 0;
var subTimeLinePosition = 0;
var currentEventPosition = 0;
var targetElem, subTimeLineLeft, deleteEvent, subtimelineThis;

var oldScrollTop = $(window).scrollTop();
var oldScrollLeft = $(window).scrollLeft();
var scrollPostion = 0;
var eventId, parentposition, class_name, trimVal, imgSrc, back_color, childEventId;
let eventDate,
    sibling_child,
    add_sibling = false,
    add_sibling_parent,
    parent_date,
    child_sibling = false,
    child_sibling_parent,
    eventEndDate = null,
    start_child_date,
    sibling_left_event = false;

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
    var y = e.pageY;
    mouseXPosition = e.pageX + scrollPostion;
    currentEventPosition = mouseXPosition - 68;
    if (currentEventPosition < 0) {
        $(".add-event-indicator").css("left", 0);
        $(".event-list").css("left", 0);
    } else {
        $(".add-event-indicator").css("left", currentEventPosition);
        $(".event-list").css("left", currentEventPosition);
    }
});
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
    var current_day = currentEventPosition / 500;
    Date.prototype.addDays = function (days) {
        var date = new Date(this.valueOf());
        date.setDate(date.getDate() + days);
        return date;
    };
    var date = new Date("1-December-2022");
    var eventDate = date.addDays(current_day).toLocaleDateString();
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
        $(add_sibling_parent).append(
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
        );
        add_sibling = false;
        saveChildEvent(class_name[0], parent_date, back_color, imgSrc, child_line, eventId)
    } else if (child_sibling) {
        sibling_child_parent_width = $(child_sibling_parent)
            .find(".timeline-divider-child")
            .css("width");
        new_sibling_width = parseInt(
            sibling_child_parent_width.split("px")[0] - 170
        );
        var total_child_sibling =
            $(child_sibling_parent).find(".child-sibling");
        if (total_child_sibling.length >= 1) {
            $(child_sibling_parent).append(
                "<div style='left: " +
                    (parseInt(total_child_sibling.length * 170) + 170) +
                    "px' class='event-add child-sibling animate__bounceOut ssss" +
                    class_name +
                    "' child_parent_date=" +
                    parent_date +
                    "><span style='background-color: " +
                    back_color +
                    "' class='left-sibling-event'></span><div class='main-event sub-timeline-event'><span class='main-parent child-event' style='background-color: " +
                    back_color +
                    "'><img src=" +
                    imgSrc +
                    "></span></div></div><span style='background-color: " +
                    back_color +
                    "' class='right-sibling-event'></span></div>"
            );
            saveSiblingEvent(class_name[0], parent_date, back_color, imgSrc, childEventId);
        } else {
            $(child_sibling_parent).append(
                "<div style='left: 170px;' class='event-add child-sibling animate__bounceOut aaaa " +
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
            saveSiblingEvent(class_name[0], parent_date, back_color, imgSrc, childEventId);
        }
        child_sibling = false;
    } else {
        eventDate = new Date(eventDate);
        eventDay = eventDate.getDate();
        eventMonth = eventDate.getMonth() + 1;
        eventYear = eventDate.getFullYear();
        eventDate = eventYear + "-" + eventDay + "-" + eventMonth;
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
    console.log("date", parent_date)
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
$(document).on("click", ".child .right-child-event", function () {
    var list_position = $(this).parent().parent().attr("parent-position");
    parent_date = $(this).parent().parent().attr('parent-date')
    $(".event-list").css("display", "block");
    $(".event-list").css("left", list_position + "px");
    child_sibling = true;
    child_sibling_parent = $(this).parent();
    childEventId = $(this).attr('data-child-event-id');
});

/******************* Child - Left - Event - Click */
$(document).on("click", ".child .left-child-event", function () {
    $(".date-modal").css("display", "block");
    start_child_date = $(this).parent().parent().attr("parent-date");
    child_sibling_parent = $(this).parent();
});
/******************* Sibling - Child - Left - Event - Click */
$(document).on("click", ".child .left-sibling-event", function () {
    $(".date-modal").css("display", "block");
    start_sibiling_child_date = $(this).parent().attr("child_parent_date");
    child_sibling_parent = $(this).parent();
    sibling_left_event = true;
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
                sibling_child_parent_position=$(child_sibling_parent).parent().parent().attr('parent-position');
                new_sibling_starting_point=parseInt(startDate*500);
                new_sibling_starting_point=parseInt(new_sibling_starting_point-sibling_child_parent_position);
                new_sibling_starting_point=parseInt(new_sibling_starting_point-500);
                new_sibling_parent_timeline_width=parseInt(parseInt(startDate*500)-sibling_child_parent_position);
                new_sibling_parent_timeline_width=parseInt(new_sibling_parent_timeline_width-450)
                $(child_sibling_parent).parent().find('.timeline-divider-child')[0].style.width=new_sibling_parent_timeline_width+'px';
                $(child_sibling_parent).css('left',new_sibling_starting_point+'px');
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
                new_child_width = parseInt(
                    days_width - child_move_position - 69
                );
                $(child_sibling_parent)
                    .find(".timeline-divider-child")
                    .css("width", new_child_width + "px");
                // if($(child_sibling_parent).find('.child-sibling').length>=1){
                //     for (let i = 0; i < $(child_sibling_parent).find('.child-sibling').length; i++) {
                //         sibling_position_left=parseInt($(child_sibling_parent).find('.child-sibling')[i].style.left.split('px')[0]);
                //         sibling_timeline_width=$(child_sibling_parent).find('.child-sibling')[i].children[1].children[1].style.width;
                //         sibling_timeline_width=parseInt(sibling_timeline_width.split('px')[0]-sibling_position_left);
                //         $(child_sibling_parent).find('.child-sibling')[i].children[1].children[1].style.width=sibling_timeline_width+'px';
                //     }
                // }
            }
        }
    } else {
        $(".date-modal").css("display", "none");
    }
});


