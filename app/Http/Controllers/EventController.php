<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;
use App\Mail\InvitePeopleMail;
use App\Models\{Event, TimeLine, EventInvited,User};
use Auth;
use Mail;


class EventController extends Controller
{

    //get event
    public function getEvent($id)
    {
        $TimeLine = TimeLine::find($id);
        if ($TimeLine) {
            // if (Auth::user()->hasRole('admin')) {
            //     $events = Event::whereNull('parent_id')->where(['time_line_id' => $id])->get();
            //     $ventids=[];
            // } else {
                $ventids = EventInvited::select('event_id')->where('user_id', Auth::user()->id)->pluck('event_id');
                $events = Event::whereNull('parent_id')->where(['time_line_id' => $id, 'user_id' => Auth::user()->id])->orWhereIn('id', $ventids)->get();
                $ventids=$ventids->toArray();
            //}
            $encryptid = crypt::encrypt($id);
            return view('timeline/index', compact('events', 'TimeLine', 'encryptid','ventids'));
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
            'time_line_id' => $timelineid,
            'event_date' => $request->event_date
        ]);

        return response()->json($event);
    }

    //save child event
    public function saveChildEvent(Request $request)
    {
        //get parent x position
        try {
            $event=Event::find($request->eventId);
            $timelineid = Crypt::decrypt($request->time_line_id);
            $event = Event::create([
                'event_title' => $request->label,
                'event_title_updated' => $request->label,
                'postion_x' => $event->postion_x,
                'icon' => $request->icon,
                'back_color'=>$request->back_color,
                'class_name'=>$request->class_name,
                "isParent" => $request->isParent,
                "parent_id" => $request->eventId,
                'user_id' => Auth::user()->id,
                'time_line_id' => $timelineid,
                'event_date' => $request->event_date,
                'child_line' => $request->child_line,
            ]);

            $childeventCount = Event::where('parent_id', $request->eventId)->count();
            return response()->json([
                    'status' => 'Success',
                    'message' => 'Event saved successfully',
                    'event' =>$event,
                    'count'=>$childeventCount,
                 ]);

        } catch (\Exception $exception) {
             return response()->json([
                    'status' => 'Error',
                    'message' => 'Something Went Wrong!',
                 ]);
        }
    }

    //save child event
    public function saveSiblingEvent(Request $request)
    {
        //get parent x position
        try {
            $event=Event::find($request->eventId);
            $timelineid = Crypt::decrypt($request->time_line_id);
            $event = Event::create([
                'event_title' => $request->label,
                'event_title_updated' => $request->label,
                'postion_x' => $request->position_x,
                'icon' => $request->icon,
                'back_color'=>$request->back_color,
                'class_name'=>$request->class_name,
                "isParent" => $request->isParent,
                "parent_id" => $request->eventId,
                'user_id' => Auth::user()->id,
                'time_line_id' => $timelineid,
                'event_date' => $request->event_date,
//                'child_line' => $request->child_line,
            ]);

            $childeventCount = Event::where('parent_id', $request->eventId)->count();
            return response()->json([
                'status' => 'Success',
                'message' => 'Event saved successfully',
                'event' =>$event,
                'count'=>$childeventCount,
            ]);

        } catch (\Exception $exception) {
            dd($exception->getMessage());
            return response()->json([
                'status' => 'Error',
                'message' => 'Something Went Wrong!',
            ]);
        }
    }

    //save child event
    public function saveEndDate(Request $request)
    {
        //get parent x position
        try {
            $event=Event::find($request->eventId);
            return response()->json([
                'status' => 'Success',
                'message' => 'Event saved successfully',
                'event' =>$event,
            ]);

        } catch (\Exception $exception) {
            return response()->json([
                'status' => 'Error',
                'message' => 'Something Went Wrong!',
            ]);
        }
    }

    //delte event
    public function deleteEvent(Request $request)
    {
        $res=Event::where(['id'=>$request->eventId,'user_id'=>Auth::user()->id])->first();
        if($res)
        {
            $eventDelete = Event::find($request->eventId)->delete();
            if ($eventDelete)
            {
                $events = Event::where('parent_id', $request->eventId)->get();
                foreach ($events as $ev) {
                    $ev->child()->delete();
                    $ev->delete();
                }
                return response()->json([
                    'status' => 'Success',
                    'message' => 'Event deleted successfully',
                    'data' => null,
                 ]);
            } else {
                return response()->json([
                    'status' => 'Error',
                    'message' => 'Something Went Wrong',
                    'data' => null,
                 ]);
            }
        }
        else{
            return response()->json([
            'status' => 'Error',
            'message' => 'You are not allowed to do it',
            'data' => null,
             ]);
        }
    }

    //update event
    public function updateEvent(Request $request)
    {
        try {
            $eventId=$request->eventId;
            $res=Event::where(['id'=>$request->eventId,'user_id'=>Auth::user()->id])->first();
            if($res)
            {
                Event::find($eventId)->update(['event_title_updated'=>$request->inputvalue]);
                 return response()->json([
                    'status' => 'Success',
                    'message' => 'Event updated successfully',
                    'data' => null,
                 ]);
            }
            else{
                return response()->json([
                'status' => 'Error',
                'message' => 'You are not allowed to do it',
                'data' => null,
                 ]);
            }


        } catch (\Exception $exception) {
            return response()->json([
                    'status' => 'Error',
                    'message' => 'Something Went Wrong',
                    'data' => null,
                 ]);
        }
    }

    //update event
    public function updateEventPositionX(Request $request)
    {
        try {
            $eventId=$request->eventId;
            $res=Event::where(['id'=>$request->eventId,'user_id'=>Auth::user()->id])->first();
            if($res)
            {
                Event::find($eventId)->update(['child_line'=>$request->child_line]);
                return response()->json([
                    'status' => 'Success',
                    'message' => 'Event updated successfully',
                    'data' => null,
                ]);
            }
            else{
                return response()->json([
                    'status' => 'Error',
                    'message' => 'You are not allowed to do it',
                    'data' => null,
                ]);
            }


        } catch (\Exception $exception) {
            return response()->json([
                'status' => 'Error',
                'message' => $exception->getMessage(),
                'data' => null,
            ]);
        }
    }

    //Invite Event to user
    public function InviteEvent(Request $request)
    {
        try {
            //check if user exist or not
            $user=User::where(['email'=>$request->inputvalue])->first();
            $user_id=NULL;
            if($user)
            {
                $user_id=$user->id;
            }
            $EventId = $request->eventId;
            //check event if event is parent delete all child event id from link table
            $event=Event::find($EventId);
            if($event->isParent)
            {
                $eventAllChild=Event::select('id')->where(['parent_id'=>$EventId])->pluck('id');
                foreach($eventAllChild  as $child)
                {
                    EventInvited::where(['event_id'=>$child,'user_id'=>$user_id])->delete();
                }
            }
            $code = random_int(100000, 999999);
            $model = new EventInvited();
            $model->code = $code;
            $model->event_id =  $EventId;
            $model->user_id=$user_id;
            if ($model->save()) {
                $type = "Event";
                Mail::to($request->inputvalue)->send(new InvitePeopleMail($EventId, $code, $type));
                return response()->json("success");
            }
        } catch (\Exception $exception) {
             return response()->json("error");
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
