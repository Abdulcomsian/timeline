<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\{Event,TimeLine};
use Auth;

class EventController extends Controller
{

    //get event
    public function getEvent($id)
    {
        $TimeLine=TimeLine::find($id);
        $events=Event::whereNull('parent_id')->where('time_line_id',$id)->get();

        $encryptid=crypt::encrypt($id);
        return view('timeline/index',compact('events','TimeLine','encryptid'));
    }

    //save event
    public function saveEvent(Request $request)
    {
         $timelineid=Crypt::decrypt($request->time_line_id);
        $event=Event::create([
            'event_title'=>$request->label,
            'postion_x'=>$request->postion,
            'icon'=>$request->icon,
            "isParent"=>$request->isParent,
            'user_id'=>Auth::user()->id,
            'time_line_id'=>$timelineid

        ]);

        return response()->json($event);
    }

    //save child event
    public function saveChildEvent(Request $request)
    {
        $timelineid=Crypt::decrypt($request->time_line_id);
        $event=Event::create([
            'event_title'=>$request->label,
            'postion_x'=>$request->postion,
            'icon'=>$request->icon,
            "isParent"=>$request->isParent,
            "parent_id"=>$request->eventId,
            'user_id'=>Auth::user()->id,
             'time_line_id'=>$timelineid
        ]);

        return response()->json($event);
    }

    //delte event
    public function deleteEvent(Request $request)
    {
        $eventDelete=Event::find($request->deleteEventId)->delete();
        if($eventDelete)
        {
            return response()->json("success");
        }
        else{
            return response()->json("Fail");
        }
    }
}
