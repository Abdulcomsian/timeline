/******************* Add-Event-Indicator - Scrolling */
var mouseXPosition = 0;
var subTimeLinePosition = 0;
var currentEventPosition=0;
var targetElem,subTimeLineLeft,deleteEvent,subtimelineThis;

var oldScrollTop = $(window).scrollTop();
var oldScrollLeft = $(window).scrollLeft();
var scrollPostion=0;
var eventId,parentposition,class_name,trimVal,imgSrc,back_color;
let eventDate,sibling_child;

$('.timeline-parent').scroll(function () { 
    if(oldScrollTop == $(window).scrollTop()) {
        scrollPostion = $('.timeline-parent').scrollLeft();
        $('.timeline-parent .timeline-divider').css('left',scrollPostion)
        $('.timeline-parent .timeline-parent').css('left',scrollPostion);
    }
    else {
        alert('vertical')
    }
    oldScrollTop = $(window).scrollTop();
    oldScrollLeft = $(window).scrollLeft();
});

$(".timeline-parent .timeline-divider").click(function (e) {
    console.log(e.screenX+scrollPostion)
})

$(".timeline-parent .timeline-divider").mousemove(function (e) {
    var y = e.pageY;
    mouseXPosition = e.pageX+scrollPostion;
    console.log(mouseXPosition)
    currentEventPosition=mouseXPosition-68;
    if(currentEventPosition<0){
        $(".add-event-indicator").css("left", 0);
        $(".event-list").css("left", 0);
    } else{
        $(".add-event-indicator").css("left", currentEventPosition);
        $(".event-list").css("left", currentEventPosition);
    }
});
/******************* Add-Event-Indicator - Click */
$(".add-event-indicator").click(function () {
    if($(".event-list-subtime-line").css("display")=='block'){
        $('.event-list-subtime-line').css('display','none')
    }
    $(".event-list").css("display", "block");
});

/******************* Event-List-Item - Click */
$(".event-list li").click(function (e) {
    var val = $(this).text();
    class_name=$(this)[0].classList;
    trimVal=val.trim();
    imgSrc = $(this).find("img").attr("src");
    back_color =$(this).find(".img-div").css("border-color");
    // if(trimVal=="Sub timeline"){
    //     saveEvent(class_name[0],currentEventPosition,back_color,imgSrc,trimVal);
    //    subTimeLineLeft=currentEventPosition;
    // } 
    // else{
    //     saveEvent(class_name[0],currentEventPosition,back_color,imgSrc,trimVal);  
    // }
    
    saveEvent(class_name[0],currentEventPosition,back_color,imgSrc,trimVal);  
    let total_event_add=document.querySelectorAll(".event-add");
    let current_event_add=total_event_add[total_event_add.length-1];
    $(current_event_add);
    $(".event-list").css("display", "none");
});
/******************* Subtime - Line - Event - Add - More Child - Click */
$(document).on('click','.main-parent-add-child',function(){
    $(this).removeClass('main-parent-add-child')
    $(".edit-sublime-modal").css("display",'block');
    $(".sub-timeline-event .main-parent-edit-field ").css('display','none');
    subtimelineThis=$(this);
    eventId=$(this).attr('data-event-id');
    parentposition=$(this).attr('parent-position');
    console.log("here",parentposition)
});
$('.edit-sublime-modal button').click(function(){
    $(".edit-sublime-modal").css("display",'none');

    let btnVal= $(this).text();
    let hasChild;
    if(btnVal=="Add Child"){
        hasChild=$(subtimelineThis).hasClass("child-event");
        if(hasChild){
            $(subtimelineThis).parent().append("<div style='position: absolute; left: 210px; top: 0px !important;' class='add-more-event'><div class='horizontal-child-line'><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span></div><div class='sub-child-event-add flash' parent-position="+parentposition+" data-event-id="+eventId+"><span><i class='fa-light fa-plus'></i></span></div></div>")
        } else{
            let total_child=$(subtimelineThis).parent().children('.add-more-event');
            if(total_child.length%2==0){
                let totalLeft= total_child.length/2;
                totalLeft=totalLeft-1;
                let pixel=120+(totalLeft*120);
                $(subtimelineThis).parent().append("<div style='position: absolute; right: "+pixel+"px; top: 68px;' class='add-more-event'><div class='doted-line'><span></span><span></span><span></span><span></span><span></span><span></span></div><div class='sub-child-event-add flash' parent-position="+parentposition+" data-event-id="+eventId+"><span><i class='fa-light fa-plus'></i></span></div></div>")
            } else{
                let totalRight=Math.floor(total_child.length/2);
                let pixel=120+(totalRight*120); 
                $(subtimelineThis).parent().append("<div style='position: absolute; left: "+pixel+"px; top: 68px;' class='add-more-event'><div class='horizontal-right-child-line'><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span></div><div class='doted-line'><span></span><span></span><span></span><span></span><span></span><span></span></div><div class='sub-child-event-add flash' parent-position="+parentposition+" data-event-id="+eventId+"><span><i class='fa-light fa-plus'></i></span></div></div>")
            }
        }
        
    }
    else if(btnVal=="Edit Event"){
        $(".editmodal"+eventId+"").css('display','block');
        // $(".sub-timeline-event .main-parent-edit-field ").css('display','block');
    } else if(btnVal=="Delete Event"){
        deleteEvent=$(subtimelineThis).parent().parent();
        Eventdelete(deleteEvent,eventId);
    }
    else if(btnVal=="Share Event")
    {
        $(".sharemodal"+eventId+"").css('display','block');
    }
})
$(document).on('click',".main-parent-edit-field button",function(){
    $(".sub-timeline-event .main-parent-edit-field").css('display','none');
});

$(document).on('click',".functionality-div .edit-delete-event button",function(){
    $(".functionality-div .edit-delete-event .edit-field").css('display','none');
});

/******************* Child - Add - More - Event - Click */
$(document).on('click','.sub-child-event-add',function(){
    console.log("Psotion",parentposition)
    sibling_child=$(this).parent().find('.sibling-child');
    parentposition=$(this).attr('parent-position')
    // subTimeLineLeft=$(this).parent().find(".event-add")[0].style.left;
    $(".event-list").css("display", "none");
    $(".event-list-subtime-line").css("display", "block");
    $(".event-list-subtime-line").css("left", parentposition+"px");
    targetElem=$(this);
    eventId=$(this).attr('data-event-id');
});

/******************* Sub - Timeline - List - Click */
$(".event-list-subtime-line li").click(function (e) {

    var val = $(this).text();
    var class_name=$(this)[0].classList;
    var trimVal=val.trim();
    var imgSrc = $(this).find("img").attr("src");
    var back_color =$(this).find(".img-div").css("border-color");
    console.log(val,class_name,imgSrc,back_color)
    console.log($(targetElem))
    // if(trimVal=="Sub timeline"){
         saveChildEvent(class_name[0],back_color,imgSrc,trimVal,targetElem,eventId,sibling_child);
        //$(targetElem).replaceWith("<div class='event-add animate__bounceOut "+class_name[0]+"' style='left: 0px'><div class='main-event sub-timeline-event'><span class='main-parent' style='background-color: "+back_color+"'><img src="+imgSrc+"></span><div class='horizontal-line-right'><span></span><span></span><span></span><span></span></div><div class='horizontal-line-left'><span></span><span></span><span></span><span></span></div><div class='add-more-event'><div class='doted-line'><span></span><span></span><span></span><span></span><span></span><span></span></div><div class='sub-child-event-add flash'><span><i class='fa-light fa-plus'></i></span></div></div></div></div>")
    // }
    // else{
    //      saveChildEvent();
    //     $(targetElem).replaceWith("<div class='new-child animate__bounceOut "+class_name[0]+"'><span class='main-parent' style='background-color: "+back_color+"'><img src="+imgSrc+"></span><span class='functionality-div'><span class='event-functionality' style='border-color: "+back_color+"'></span><div class='edit-delete-event'><ul><li>Edit Event <span><i class='fa-regular fa-pen-to-square'></i></span></li><li>Delete Event <span><i class='fa-regular fa-trash-can'></i></span></li></ul><div class='edit-field'><input class='form-control' placeholder='Edit your Event Name' value="+trimVal+"/><button style='background-color: "+back_color+"'>Save</button></div></div></span></div>")
    // }
    $(".event-list-subtime-line").css("display", "none");
});


/******************* Functionality - Div - Click */
$(document).on('click','.functionality-div .event-functionality',function(e){
    e.stopPropagation();
    if($(this).next().css('display')=='block'){
        $(this).next().css('display','none')
    } else{
        $(".functionality-div .edit-delete-event").css('display','none')
        $(this).next().css('display','block')
    }
})

/******************* Functionality - Div - List - Item - Click */
$(document).on('click','.edit-delete-event ul li',function(e){
    e.stopPropagation();

    let val = $(this).text().trim();
    console.log(val);
    eventId=$(this).attr('data-event-id');
    if(val=="Edit Event"){
        $(".functionality-div .edit-delete-event .editfield").css('display','block');
        $(".functionality-div .edit-delete-event .sharefield").css('display','none');
    }else if(val=="Share Event")
    {
         $(".functionality-div .edit-delete-event .sharefield").css('display','block');
         $(".functionality-div .edit-delete-event .editfield").css('display','none');
    }
    else{

        deleteEvent=$(this).parent().parent().parent().parent().parent();
        $(".functionality-div .edit-delete-event .edit-field").css('display','none');
        $(".delete-modal").css("display",'block');
    }
})
/******************* Delete - Event - Modal - Button - Click */
$('.modal-footer button').click(function(){
    if($(this).text()=='Yes'){
        Eventdelete(deleteEvent,eventId);
        // deleteEvent.remove();
        $(".delete-modal").css("display",'none');
    } else{
        $(".delete-modal").css("display",'none');
    }
})

/******************* Event - Date - Get - Click */
$('.event-date-btn').click(function(){
    eventDate= $('#event-date').val()
    if(eventDate!==null){
        // let startDate='2022-12-01';
        // var start = new Date("2022-12-01"),
        // end   = new Date(eventDate),
        // diff  = new Date(end - start),
        // days  = diff/1000/60/60/24; 
        // console.log(startDate,eventDate,days);
        // currentEventPosition=days*500;
        saveEvent(class_name[0],currentEventPosition,back_color,imgSrc,trimVal); 
        $('.event-date-modal').css('display','none');
    } 
})