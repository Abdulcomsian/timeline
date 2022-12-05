<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;
use App\Mail\InvitePeopleMail;
use App\Models\{Event, TimeLine, EventInvited};
use Auth;
use Mail;


class EventController extends Controller
{

    //get event
    public function getEvent($id)
    {
        $TimeLine = TimeLine::find($id);
        if ($TimeLine) {
            if (Auth::user()->hasRole('admin')) {
                $events = Event::whereNull('parent_id')->where(['time_line_id' => $id])->get();
            } else {
                $ventids = EventInvited::select('event_id')->where('user_id', Auth::user()->id)->pluck('event_id');
                $events = Event::whereNull('parent_id')->where(['time_line_id' => $id, 'user_id' => Auth::user()->id])->orWhereIn('id', $ventids)->get();
            }
            $encryptid = crypt::encrypt($id);
            return view('timeline/index', compact('events', 'TimeLine', 'encryptid'));
        } else {
            toastr()->error('No Timeline Created');
            return Redirect::back();
        }
    }

    //save event
    public function saveEvent(Request $request)
    {
        $timelineid = Crypt::decrypt($request->time_line_id);
        $event = Event::create([
            'event_title' => $request->label,
            'event_title_updated' => $request->label,
            'postion_x' => $request->postion,
            'icon' => $request->icon,
            'back_color'=>$request->back_color,
            'class_name'=>$request->class_name,
            "isParent" => $request->isParent,
            'user_id' => Auth::user()->id,
            'time_line_id' => $timelineid

        ]);

        return response()->json($event);
    }

    //save child event
    public function saveChildEvent(Request $request)
    {
        $timelineid = Crypt::decrypt($request->time_line_id);
        $event = Event::create([
            'event_title' => $request->label,
            'event_title_updated' => $request->label,
            'postion_x' => $request->postion,
            'icon' => $request->icon,
            'back_color'=>$request->back_color,
            'class_name'=>$request->class_name,
            "isParent" => $request->isParent,
            "parent_id" => $request->eventId,
            'user_id' => Auth::user()->id,
            'time_line_id' => $timelineid
        ]);

        $childeventCount = Event::where('parent_id', $request->eventId)->count();

        return response()->json(['event' => $event, 'count' => $childeventCount]);
    }

    //delte event
    public function deleteEvent(Request $request)
    {
        $eventDelete = Event::find($request->eventId)->delete();
        if ($eventDelete) {
            $events = Event::where('parent_id', $request->eventId)->get();
            foreach ($events as $ev) {
                $ev->child()->delete();
                $ev->delete();
            }
            return response()->json("success");
        } else {
            return response()->json("Fail");
        }
    }

    //update event
    public function updateEvent(Request $request)
    {
        $eventId=$request->eventId;
        $res=Event::find($eventId)->update(['event_title_updated'=>$request->inputvalue]);
        if($res)
        {
             return response()->json("success");
        } else {
            return response()->json("Fail");
        }
    }

    //Invite Event to user
    public function InviteEvent(Request $request)
    {
        $EventId = $request->EventId;
        $code = random_int(100000, 999999);
        $model = new EventInvited();
        $model->code = $code;
        $model->event_id =  $EventId;
        if ($model->save()) {
            $type = "Event";
            Mail::to('admin@gmail.com')->send(new InvitePeopleMail($EventId, $code, $type));
            toastr()->success('Event Invited Successfully');
            return Redirect::back();
        }
    }


    public function JoinEvent(Request $request)
    {
        $key = $request->id;
        $code = $request->code;
        if (Auth::check()) {
            EventInvited::where(['event_id' => $key, 'code' => $code])->update(['user_id' => Auth::user()->id]);
            toastr()->success('You have successfully joind Event!', 'Congrats');
            return redirect('/');
        } else {
            if (isset($request->id) && !empty($request->id)) {
                return view('auth.login', compact('key', 'code'));
            }
        }
    }
}
