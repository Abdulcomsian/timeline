function addMoreInviatation(e) {
    e.classList.add("d-none");
    $(".multiple-people-invite").prepend(
        "<div class='add-invite-people position-relative mb-4'><input type='text' class='form-control' placeholder='Add people'><span onclick='addMoreInviatation(this)' class='d-flex justify-content-center align-items-center position-absolute add-invite-btn'> <i class='fas fa-plus'></i></span></div>"
    );
}
var mouseXPosition = 0;
var subTimeLinePosition = 0;
$(".timeline-div .line").mousemove(function (e) {
    var y = e.pageY;
    mouseXPosition = e.pageX;
    $(".functionaility-div").css("left", mouseXPosition - 100);
    $(".event-list").css("left", mouseXPosition - 100);
});
$(".addEvent").click(function () {
    $(".timeline-div .event-list").css("opacity", "1");
});
$(".timeline-div .event-list li .subTimeLine-List li").click(function () {
    console.log($(this))
})
$(".timeline-div .event-list li").click(function (e) {
    $(".event-list-sub-child").css("opacity", "0");
    var val = $(this)[0].children[0].innerText;
    var imgSrc = $(this).find("img").attr("src");
    if (val== " Sub timeline") {
        $(".subTimeLine-List").css("display","block")
        if (mouseXPosition == 0) {
            mouseXPosition = mouseXPosition - 33;
        } else {
            mouseXPosition = mouseXPosition - 130;
        }
        subTimeLinePosition = mouseXPosition;
        $(".timeline-div").append(
            "<div class='newEventAdd' style='left: " +
                mouseXPosition +
                "px'><span class='functionality-span'><i class='fas fa-cog'></i></span><span class='ms-2 functionality-span'><img src=" +
                imgSrc +
                " class='img-fluid'/><span class='subTimeLineChild parentSubTimeLine'><span class='vertical-line'></span><span  class='addEvent addSubChildEvent functionality-span'><i class='fas fa-plus'></i></span></span></span></div>"
        );
    } else {
        if (mouseXPosition == 0) {
            mouseXPosition = mouseXPosition - 30;
        } else {
            mouseXPosition = mouseXPosition - 130;
        }
        $(".timeline-div").append(
            "<div class='newEventAdd' style='left: " +
                mouseXPosition +
                "px'><span class='functionality-span'><i class='fas fa-cog'></i></span><span class='ms-2 functionality-span'><img src=" +
                imgSrc +
                " class='img-fluid'/></span></div>"
        );
    }
    mouseXPosition = mouseXPosition + 130;
    $(".timeline-div .event-list").css("opacity", "0");
    e.stopPropagation();
});
var targetElem;
var count = 0;
var topPosition = 20;
var val,imgSrc,listPosition;
$(document).on('click','.addSubChildEvent',function(){
    var par = $(this).closest('.newEventAdd');        
    listPosition=par[0].style.left
    if(listPosition){
        $(".event-list-sub-child").css("left", listPosition);
    } else{
        $(".event-list-sub-child").css("left", subTimeLinePosition + 30);
    }
    $(".event-list-sub-child").css("opacity", "1");
    targetElem=$(this);
    console.log($(this).style)
})
$(".timeline-div .event-list-sub-child li").click(function (e) {
    $(".event-list").css("opacity", "0");
    console.log("listPosition :",listPosition)
    console.log(targetElem[0].parentElement);
    targetElem[0].style.display='none';
    var val = $(this).find("span");
    console.log(val[1].innerText, subTimeLinePosition);
    var imgSrc = $(this).find("img").attr("src");
    if (val[1].innerText == "Sub timeline") {
        $(".subTimeLine-List").css("display","block")
        $(targetElem[0].parentElement).append(
            "<div class='newChild' style='left:-43px'><span class='functionality-span'><i class='fas fa-cog'></i></span><span class='ms-2 functionality-span'><img src=" +
                imgSrc +
                " class='img-fluid'/><span class='subTimeLineChild'><span class='vertical-line'></span><span class='addEvent addSubChildEvent functionality-span'><i class='fas fa-plus'></i></span></span></span></div>"
        );
        count++;
    } else{
        $(targetElem[0].parentElement).append(
            "<div class='newChild' style='left:-43px'><span class='functionality-span'><i class='fas fa-cog'></i></span><span class='ms-2 functionality-span'><img src=" +
                imgSrc +
                " class='img-fluid'/></span></div>"
        );
    }
    $(".timeline-div .event-list-sub-child").css("opacity", "0");
    e.stopPropagation();
    $(".subTimeLine-List").css("display","none")
});

