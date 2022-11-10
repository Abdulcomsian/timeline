@extends('layouts.app')
@section('content')
<div class="create-timeline-div">
    <div class="container">
        <div class="row">
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
                        <button  type="submit" class="w-100 d-flex align-items-center justify-content-center border-0">Create Timeline</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection