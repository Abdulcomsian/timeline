function addMoreInviatation(e) {
    e.classList.add("d-none");
    $(".multiple-people-invite").prepend(
        "<div class='add-invite-people position-relative mb-4'><input type='text' class='form-control' name='invite_peoples[]' placeholder='Add people'><span onclick='addMoreInviatation(this)' class='d-flex justify-content-center align-items-center position-absolute add-invite-btn'> <i class='fas fa-plus'></i></span></div>"
    );
}
$(document).click(function (e) {
    if ($(e.target).closest(".timeline-div ").length === 0) {
        $(".timeline-div .event-list").css("display", "none");
        $(".timeline-div .event-list-sub-child").css("display", "none");
    }
});
var mouseXPosition = 0;
var subTimeLinePosition = 0;

//mouse move on timeline dev==============================================
$(".timeline-div .line").mousemove(function (e) {
    var y = e.pageY;
    mouseXPosition = e.pageX;
    console.log("move position " + mouseXPosition);
    //commetn -165
    $(".functionaility-div").css("left", mouseXPosition - 100);
    $(".event-list").css("left", mouseXPosition - 100);
});
//==============================End======================================

//=================start=================================================
$(".addEvent").click(function () {
    $(".timeline-div .event-list").css("display", "block");
});
$(".timeline-div .event-list li .subTimeLine-List li").click(function () {
    console.log($(this));
});
//==================end==================================================

//cleck on parent event and save in database=============================
$(".timeline-div .event-list li").click(function (e) {
    if ($(".subTimeLine-List").css("display") == "block") {
        $(".subTimeLine-List").css("display", "none");
    }
    $(".event-list-sub-child").css("display", "0");
    var val = $(this)[0].children[0].innerText;
    var selectListItem = $(this)[0].lastElementChild.lastElementChild.innerText;
    var imgSrc = $(this).find("img").attr("src");
    if (val == " Sub timeline") {
        $(".subTimeLine-List").css("display", "block");
        if (mouseXPosition == 0) {
            console.log("x 1");
            mouseXPosition = mouseXPosition - 33;
        } else {
            console.log("x 2");
            //mouseXPosition = mouseXPosition - 200;
            mouseXPosition = mouseXPosition - 100;
        }
        subTimeLinePosition = mouseXPosition;
        saveEvent(mouseXPosition, val, imgSrc, val);
    } else {
        if (mouseXPosition == 0) {
            //console.log("x 3")
            mouseXPosition = mouseXPosition - 30;
        } else {
            console.log("x 4");
            //mouseXPosition = mouseXPosition - 200;
            mouseXPosition = mouseXPosition - 100;
        }
        saveEvent(mouseXPosition, val, imgSrc, selectListItem);
    }
    mouseXPosition = mouseXPosition + 130;
    $(".timeline-div .event-list").css("display", "none");
    e.stopPropagation();
});
//=============================END========================================

var targetElem, deleteEvent, deleteEventId, eventId;
var count = 0;
var topPosition = 20;
var val, imgSrc, listPosition;
$(document).on("click", ".addSubChild", function () {
    var par = $(this).closest(".newEventAdd");
    listPosition = par[0].style.left;
    if (listPosition) {
        $(".event-list-sub-child").css("left", listPosition);
    } else {
        $(".event-list-sub-child").css("left", subTimeLinePosition + 30);
    }
    $(".event-list-sub-child").css("opacity", "1");
    $(".event-list-sub-child").css("display", "block");
    targetElem = $(this);
    eventId = $(this).attr("data-event-id");
});
$(document).on("click", ".addSubChildEvent", function () {
    var par = $(this).closest(".newEventAdd");
    listPosition = par[0].style.left;
    if (listPosition) {
        $(".event-list-sub-child").css("left", listPosition);
    } else {
        $(".event-list-sub-child").css("left", subTimeLinePosition + 30);
    }
    $(".event-list-sub-child").css("opacity", "1");
    $(".event-list-sub-child").css("display", "block");
    targetElem = $(this);
    eventId = $(this).attr("data-event-id");
    //console.log($(this).style)
});
$(document).on("mouseover", ".setting", function () {
    $(this).children()[1].style.opacity = "1";
});
$(document).on("mouseout", ".setting", function () {
    $(this).children()[1].style.opacity = "0";
});
$(document).on("click", ".edit-btn", function () {
    console.log($(this).parent().parent().next().css("opacity", 1));
});

//delete event click function =====================================
$(document).on("click", ".delete-btn", function () {
    if ($(".subTimeLine-List").css("display") == "block") {
        $(".subTimeLine-List").css("display", "none");
    }
    console.log($(this));
    deleteEvent = $(this).parent().parent().parent().parent();
    deleteEventId = $(this).attr("data-event-id");
    $(".delete-modal").css("display", "block");
});
$(".delete-event").click(function () {
    delete_Event(deleteEvent, deleteEventId);
});
//end of event

//SUB CHILD EVNET============START===============================================
$(".timeline-div .event-list-sub-child li").click(function (e) {
    //console.log($(this)[0].parentElement.classList[1])
    $(".event-list").css("display", "none");
    //console.log("listPosition :",listPosition)
    // console.log(targetElem[0].parentElement);
    // targetElem[0].style.display='none';
    var val = $(this).find("span");
    var selectListItem = $(this)[0].lastElementChild.lastElementChild.innerText;
    //console.log(selectListItem);
    //console.log(val[1].innerText, subTimeLinePosition);
    var imgSrc = $(this).find("img").attr("src");
    //console.log("target element is "+targetElem[0].parentElement);
    if (val[1].innerText == "Sub timeline") {
        saveChildEvent(targetElem, val[1].innerText, imgSrc, eventId, val);
        count++;
    } else {
        saveChildEvent(targetElem, selectListItem, imgSrc, eventId, val);
    }
    $(".timeline-div .event-list-sub-child").css("opacity", "0");
    e.stopPropagation();
    // $(".subTimeLine-List").css("display","none")
});
//=============================END==========================================================

//========================START=============================
$(".icon-span").click(function () {
    if ($(".menu-div").hasClass("active")) {
        $(".menu-div").removeClass("active");
        $(".timeline-function-div").css("z-index", "99");
    } else {
        $(".menu-div").addClass("active");
        $(".timeline-function-div").css("z-index", "-1");
    }
});
//=========================END===============================
$("#zoom-in").click(function () {
    updateZoom(0.1);
});

$("#zoom-out").click(function () {
    updateZoom(-0.1);
});

zoomLevel = 1;

var updateZoom = function (zoom) {
    zoomLevel += zoom;
    $("body").css({
        zoom: zoomLevel,
        "-moz-transform": "scale(" + zoomLevel + ")",
    });
};
