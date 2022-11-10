<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Utils\Validations;
use App\Mail\InvitePeopleMail;
use Mail;
use App\Models\{TimeLine,TimeLineInvitePeople};
use Auth;
use Artisan;

class TimeLineController extends Controller
{
    //index
    public function index()
    {
        if (auth()->user()->hasRole([['admin']])) {
            $timeline=TimeLine::get();
         }
         else{
            $timeline=TimeLineInvitePeople::with('timeline')->get();
         }
        return view('home',compact('timeline'));
    }

    //create
    public function create()
    {
        if (!auth()->user()->hasRole([['admin']])) {
            toastr()->error('Only admin can create timeline!!');
            return Redirect::back();
        }
        return view('timeline.create');
    }

    //save timeline
    public function saveTimeLine(Request $request)
    {
        //dd($request->all());
        Validations::storeTimeLine($request);
        $all_inputs=$request->except('_token','invite_peoples');
        $all_inputs['user_id']=Auth::user()->id;
        try {
            $timeline=TimeLine::create($all_inputs);
            if($timeline)
            {
                if(count($request->invite_peoples)>0)
                {
                    foreach($request->invite_peoples as $people)
                    {
                        $code=random_int(100000, 999999);
                        $model=new TimeLineInvitePeople();
                        $model->code=$code;
                        $model->time_line_id=$timeline->id; 
                        $model->save();
                       \Mail::to('admin@gmail.com')->send(new InvitePeopleMail($timeline->id,$code));
                    }
                    
                }
                
                //\Artisan::call('queue:work');
                //dispatch(new InviteTimeLineJob($request->invite_peoples,$timeline->id));
                toastr()->success('Data has been saved successfully!', 'Congrats');
                return redirect('/');
            }
        } catch (\Exception $exception) {
            dd($exception);
            toastr()->error('Something went wrong, try again!');
            return Redirect::back();
        }
    }
    //join time line
    public function joinTimeLine(Request $request)
    {

        $key = $request->id;
        $code=$request->code;
        if (Auth::check()){
            TimeLineInvitePeople::where(['time_line_id'=>$key,'code'=> $code])->update(['user_id'=>Auth::user()->id]);
            toastr()->success('You have successfully joind time line!', 'Congrats');
            return redirect('/');
        } else {
            if (isset($request->id) && !empty($request->id)) {
                return view('auth.login', compact('key','code'));  
            } 
            
        }
    }

    
}
