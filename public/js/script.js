function addMoreInviatation(e) {
    e.classList.add("d-none");
    $(".multiple-people-invite").prepend(
        "<div class='add-invite-people position-relative mb-4'><input type='text' class='form-control' placeholder='Add people'><span onclick='addMoreInviatation(this)' class='d-flex justify-content-center align-items-center position-absolute add-invite-btn'> <i class='fas fa-plus'></i></span></div>"
    );
}
$(document).click(function(e){
    if($(e.target).closest(".timeline-div ").length === 0){
        $(".timeline-div .event-list").css("display", "none"); 
        $(".timeline-div .event-list-sub-child").css("display", "none"); 
    }
});
var mouseXPosition = 0;
var subTimeLinePosition = 0;
$(".timeline-div .line").mousemove(function (e) {
    var y = e.pageY;
    mouseXPosition = e.pageX;
    console.log(mouseXPosition)
    $(".functionaility-div").css("left", mouseXPosition - 165 );
    $(".event-list").css("left", mouseXPosition - 165);
});
$(".addEvent").click(function () {
    $(".timeline-div .event-list").css("display", "block");
});
$(".timeline-div .event-list li .subTimeLine-List li").click(function () {
    console.log($(this))
})
$(".timeline-div .event-list li").click(function (e) {
    if($(".subTimeLine-List").css("display")=="block"){
        $(".subTimeLine-List").css("display","none")
    }
    $(".event-list-sub-child").css("display", "0");
    var val = $(this)[0].children[0].innerText;
    var selectListItem= $(this)[0].lastElementChild.lastElementChild.innerText;
    console.log(selectListItem)
    var imgSrc = $(this).find("img").attr("src");
    if (val== " Sub timeline") {
        $(".subTimeLine-List").css("display","block")
        if (mouseXPosition == 0) {
            console.log("x 1")
            mouseXPosition = mouseXPosition - 33;
        } else {
            console.log("x 2")
            mouseXPosition = mouseXPosition - 200;
        }
        subTimeLinePosition = mouseXPosition;
        $(".timeline-div").append(
            "<div class='newEventAdd' style='left: " +
                mouseXPosition +
                "px'><span class='functionality-span'><span class='setting'><i class='fas fa-cog'></i><div class='edit-delete'><span class='edit-btn'><i class='fas fa-edit'></i></span><span class='delete-btn'><i class='fas fa-trash'></i></span></div></span><input class='event-type' value='"+val+"'></span><span class='ms-2 functionality-span'><img src=" +
                imgSrc +
                " class='img-fluid'/><span class='subTimeLineChild parentSubTimeLine'><span class='vertical-line'></span><span  class='addEvent addSubChildEvent functionality-span'><i class='fas fa-plus'></i></span></span></span></div>"
        );
    } else {
        if (mouseXPosition == 0) {
            console.log("x 3")
            mouseXPosition = mouseXPosition - 30;
        } else {
            console.log("x 4")
            mouseXPosition = mouseXPosition - 200;
        }
        $(".timeline-div").append(
            "<div class='newEventAdd' style='left: " +
                mouseXPosition +
                "px'><span class='functionality-span'><span class='setting'><i class='fas fa-cog'></i><div class='edit-delete'><span class='edit-btn'><i class='fas fa-edit'></i></span><span class='delete-btn'><i class='fas fa-trash'></i></span></div></span><input class='event-type' value='"+selectListItem+"'></span><span class='ms-2 functionality-span'><img src=" +
                imgSrc +
                " class='img-fluid'/></span></div>"
        );
    }
    mouseXPosition = mouseXPosition + 130;
    $(".timeline-div .event-list").css("display", "none");
    e.stopPropagation();
});
var targetElem,deleteEvent;
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
    $(".event-list-sub-child").css("display", "block");
    targetElem=$(this);
    console.log($(this).style)
})
$(document).on('mouseover','.setting',function(){
    $(this).children()[1].style.opacity="1"
})
$(document).on('mouseout','.setting',function(){
    $(this).children()[1].style.opacity="0";
})
$(document).on('click','.edit-btn',function(){
    console.log($(this).parent().parent().next().css('opacity',1))
})
$(document).on('click','.delete-btn',function(){
    if($(".subTimeLine-List").css("display")=="block"){
        $(".subTimeLine-List").css("display","none")
    }
    console.log($(this))
    deleteEvent=$(this).parent().parent().parent().parent();
   
    $(".delete-modal").css("display",'block');
})
$(".delete-event").click(function(){
    deleteEvent.remove();
    $(".delete-modal").css("display",'none');
    $(".event-list").css("display", "none");
    $(".timeline-div .event-list-sub-child").css("display", "none");
})
$(".timeline-div .event-list-sub-child li").click(function (e) {
    console.log($(this)[0].parentElement.classList[1])
    $(".event-list").css("display", "none");
    console.log("listPosition :",listPosition)
    // console.log(targetElem[0].parentElement);
    // targetElem[0].style.display='none';
    var val = $(this).find("span");
    var selectListItem= $(this)[0].lastElementChild.lastElementChild.innerText;
    console.log(val[1].innerText, subTimeLinePosition);
    var imgSrc = $(this).find("img").attr("src");
    if (val[1].innerText == "Sub timeline") {
        $(".subTimeLine-List").css("display","block")
        $(targetElem[0].parentElement).append(
            "<div class='newChild' style='left:-43px'><span class='functionality-span'><span class='setting'><i class='fas fa-cog'></i><div class='edit-delete'><span class='edit-btn'><i class='fas fa-edit'></i></span><span class='delete-btn'><i class='fas fa-trash'></i></span></div></span><input class='event-type' value='"+selectListItem+"'></span><span class='ms-2 functionality-span'><img src=" +
                imgSrc +
                " class='img-fluid'/><span class='subTimeLineChild'><span class='vertical-line'></span><span class='addEvent addSubChildEvent functionality-span'><i class='fas fa-plus'></i></span></span></span></div>"
        );
        count++;
    } else{
        $(targetElem[0].parentElement).append(
            "<div class='newChild' style='left:-43px'><span class='functionality-span'><span class='setting'><i class='fas fa-cog'></i><div class='edit-delete'><span class='edit-btn'><i class='fas fa-edit'></i></span><span class='delete-btn'><i class='fas fa-trash'></i></span></div></span><input class='event-type' value='"+selectListItem+"'></span><span class='ms-2 functionality-span'><img src=" +
                imgSrc +
                " class='img-fluid'/></span></div>"
        );
    }
    $(".timeline-div .event-list-sub-child").css("opacity", "0");
    e.stopPropagation();
    $(".subTimeLine-List").css("display","none")
});
$(".icon-span").click(function(){
    if($(".menu-div").hasClass("active")){
        $(".menu-div").removeClass("active")
        $(".timeline-function-div").css("z-index","99")
    } else
    {
        $(".menu-div").addClass("active")
        $(".timeline-function-div").css("z-index","-1")
    }
})

