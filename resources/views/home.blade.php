@extends('layouts.app')
@section('content')
<div class="create-timeline-div">
    <div class="container">
        <div class="card">
            <div class="card-header d-flex">
                @if(Auth::user()->hasRole('admin'))
                <h5 class="card-title"><a href="{{url('create')}}" class="btn btn-primary">Create LifeTime TimeLine <i class="fas fa-plus"></i></a></h5>
                @elseif(count($timeline)<=0)
                <h5 class="card-title"><a href="{{url('create')}}" class="btn btn-primary">Create LifeTime TimeLine <i class="fas fa-plus"></i></a></h5>
                @endif
            </div>
             <div class="card-body">
               
                <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#NO</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($timeline)>0)
                        @foreach($timeline as $time)
                        <tr>
                           
                            @if(auth()->user()->hasRole('admin'))
                            <td>{{$loop->index+1}}</td>
                            <td>{{$time->name}}</td>
                            <td>{{$time->description}}</td>
                            <td>{{$time->start_date}}</td>
                            <td>-</td>
                            <td>
                                <a href="{{url('timeline/view',$time->id)}}"><i class="fas fa-eye"></i></a>
                            </td>
                            @else
                            <td>{{$loop->index+1}}</td>
                            <td>{{$time->timeline->name}}</td>
                            <td>{{$time->timeline->description}}</td>
                            <td>{{$time->timeline->start_date}}</td>
                            <td>-</td>
                            <td>
                                <a href="{{url('timeline/view',$time->timeline->id)}}"><i class="fas fa-eye"></i></a>
                            </td>
                            @endif

                        </tr>

                        @endforeach
                        @else
                        <tr>
                            <td colspan="6">No Time Line</td>
                        </tr>
                        @endif

                </tbody>
            </table>
        </div> 
    </div>



</div>
<!--  <div class="row">
            <div class="col-12">
                <h1 class="title">Create Timeline</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cum blandit arcu nulla tristique etiam
                    tristique consequat magna ut.</p>
                <hr>
            </div>
            <div class="col-12">
                <div class="form-div">
                    <form action="{{url('timeline-save')}}" method="post">
                        @csrf
                        <div class="label-input mb-4">
                            <label class="mb-2" for="">Name <span>*</span></label>
                            <input type="text" class="form-control" name="name" placeholder="Enter Full Name" required>
                        </div>
                        <div class="label-input mb-4">
                            <label class="mb-2" for="">Discription <span>*</span></label>
                            <input type="text" class="form-control" name="description" placeholder="Write short discription" required>
                        </div>
                        <div class="label-input mb-4">
                            <label class="mb-2" for="">Start Date <span>*</span></label>
                            <input type="date" class="form-control" name="start_date" placeholder="DD/MM/YYYY" required>
                        </div>
                        <div class="label-input mb-4">
                            <label class="mb-2" for="">End Date (Optional)</label>
                            <input type="date" class="form-control" name="end_date" placeholder="DD/MM/YYYY">
                        </div>
                        <div class="label-input mb-4">
                            <label class="mb-2" for="">Invite People</label>
                            <div class="multiple-people-invite">
                                <div class="add-invite-people position-relative">
                                    <input type="text" class="form-control" name="invite_peoples[]" placeholder="Add people">
                                    <span onclick="addMoreInviatation(this)"
                                        class="d-flex justify-content-center align-items-center position-absolute add-invite-btn">
                                        <i class="fas fa-plus"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <button  type="submit" class="w-100 d-flex align-items-center justify-content-center border-0">Create
                            Timeline</button>
                    </form>
                </div>
            </div>
        </div> -->
</div>
</div>
@endsection