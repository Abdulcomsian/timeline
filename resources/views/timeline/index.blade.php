@extends('layouts.app')
@section('content')
<div class="time-line-screen">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1>Timeline</h1>
                <p>(Jan 1, 2022 - Monday) 1:00 PM</p>
                <hr class="mt-5">
            </div>
            <div class="timeline-function-div d-flex justify-content-center align-items-center">
                <div class="timeline-div position-relative w-100">
                    <div class="position-relative">
                        <div class="functionaility-div d-flex position-absolute">
                            <span class="addEvent functionality-span"><i class="fas fa-plus"></i></span>
                        </div>
                        <div class="event-list">
                            <ul>
                                <li class="mb-2">
                                    <div class="list-icon-div">
                                        <span>
                                            <img src="{{asset('images/Vector.png')}}" alt="" class="img-fluid">
                                        </span>
                                        <span class="ms-2 list-item">Location with text</span>
                                    </div>
                                </li>
                                <li class="mb-2">
                                    <div class="list-icon-div">
                                        <span>
                                            <img src="{{asset('images/feelings.png')}}" alt="" class="img-fluid">
                                        </span>
                                        <span class="ms-2 list-item">Sentiment</span>
                                    </div>
                                </li>
                                <li class="mb-2">
                                    <div class="list-icon-div">
                                        <span>
                                            <img src="{{asset('images/video-photo.png')}}" alt="" class="img-fluid">
                                        </span>
                                        <span class="ms-2 list-item">Videos/photos (content)</span>
                                    </div>
                                </li>
                                <li class="mb-2">
                                    <div class="list-icon-div">
                                        <span>
                                            <img src="{{asset('images/group-timeline.png')}}" alt="" class="img-fluid">
                                        </span>
                                        <span class="ms-2 list-item">Group of sub timeline</span>
                                    </div>
                                </li>
                                <li class="mb-2">
                                    <div class="list-icon-div">
                                        <span>
                                            <img src="{{asset('images/timeline.png')}}" alt="" class="img-fluid">
                                        </span>
                                        <span class="ms-2 subTimeLine list-item">Sub timeline</span>
                                    </div>
                                    <ul class="mt-2 subTimeLine-List">
                                        <li class="mb-2">
                                            <div class="list-icon-div">
                                                <span>
                                                    <img src="{{asset('images/learning.png')}}" alt=""
                                                        class="img-fluid">
                                                </span>
                                                <span class="ms-4 list-item">Learning</span>
                                            </div>
                                        </li>
                                        <li class="mb-2">
                                            <div class="list-icon-div">
                                                <span>
                                                    <img src="{{asset('images/insight.png')}}" alt="" class="img-fluid">
                                                </span>
                                                <span class="ms-4 list-item">Insight</span>
                                            </div>
                                        </li>
                                        <li class="mb-2">
                                            <div class="list-icon-div">
                                                <span>
                                                    <img src="{{asset('images/meeting.png')}}" alt="" class="img-fluid">
                                                </span>
                                                <span class="ms-4 list-item">Meeting</span>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li class="mb-2">
                                    <div class="list-icon-div">
                                        <span>
                                            <img src="{{asset('images/document.png')}}" alt="" class="img-fluid">
                                        </span>
                                        <span class="ms-2 list-item">Document</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="event-list-sub-child">
                            <ul>
                                <li class="mb-2">
                                    <div class="list-icon-div">
                                        <span>
                                            <img src="{{asset('images/Vector.png')}}" alt="" class="img-fluid">
                                        </span>
                                        <span class="ms-2">Location with text</span>
                                    </div>
                                </li>
                                <li class="mb-2">
                                    <div class="list-icon-div">
                                        <span>
                                            <img src="{{asset('images/feelings.png')}}" alt="" class="img-fluid">
                                        </span>
                                        <span class="ms-2">Sentiment</span>
                                    </div>
                                </li>
                                <li class="mb-2">
                                    <div class="list-icon-div">
                                        <span>
                                            <img src="{{asset('images/video-photo.png')}}" alt="" class="img-fluid">
                                        </span>
                                        <span class="ms-2">Videos/photos (content)</span>
                                    </div>
                                </li>
                                <li class="mb-2">
                                    <div class="list-icon-div">
                                        <span>
                                            <img src="{{asset('images/group-timeline.png')}}" alt="" class="img-fluid">
                                        </span>
                                        <span class="ms-2">Group of sub timeline</span>
                                    </div>
                                </li>
                                <li class="mb-2">
                                    <div class="list-icon-div">
                                        <span>
                                            <img src="{{asset('images/timeline.png')}}" alt="" class="img-fluid">
                                        </span>
                                        <span class="ms-2 subTimeLine">Sub timeline</span>
                                    </div>
                                    <ul class="mt-2 subTimeLine-List">
                                        <li class="mb-2">
                                            <div class="list-icon-div">
                                                <span>
                                                    <img src="{{asset('images/learning.png')}}" alt=""
                                                        class="img-fluid">
                                                </span>
                                                <span class="ms-4">Learning</span>
                                            </div>
                                        </li>
                                        <li class="mb-2">
                                            <div class="list-icon-div">
                                                <span>
                                                    <img src="{{asset('images/insight.png')}}" alt="" class="img-fluid">
                                                </span>
                                                <span class="ms-4">Insight</span>
                                            </div>
                                        </li>
                                        <li class="mb-2">
                                            <div class="list-icon-div">
                                                <span>
                                                    <img src="{{asset('images/meeting.png')}}" alt="" class="img-fluid">
                                                </span>
                                                <span class="ms-4">Meeting</span>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li class="mb-2">
                                    <div class="list-icon-div">
                                        <span>
                                            <img src="{{asset('images/document.png')}}" alt="" class="img-fluid">
                                        </span>
                                        <span class="ms-2">Document</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="line"></div>
                </div>
            </div>
            <div class="footer">
                <div class="col-12 text-right">
                    <div class="zoom-effect">
                        <span><img src="{{asset('images/zoom-in.svg')}}" alt=""></span>
                        <span><img src="{{asset('images/zoom-out.svg')}}" alt=""></span>
                    </div>
                    <div class="drop-box">
                        <span>
                            <img src="{{asset('images/menu-bars.svg')}}" alt="">
                        </span>
                        <p>Details</p>
                        <span><i class="fas fa-chevron-up"></i></span>
                    </div>
                </div>
                <div class="menu-div">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                aria-selected="true">Overview</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                                aria-selected="false">Members</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                                aria-selected="false">Chat</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                                aria-selected="false">Narrative</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quam a, metus elit dignissim sit feugiat egestas lectus ipsum. Integer lorem arcu praesent eget. Amet, in iaculis sit tincidunt. Morbi at purus ac id ultrices. Magna morbi et sed pellentesque habitasse ac vitae ultricies mus. Nunc odio ut bibendum cursus dictum fringilla massa lobortis.</p><p>Amet, in iaculis sit tincidunt. Morbi at purus ac id ultrices. Magna morbi et sed pellentesque habitasse ac vitae ultricies mus.</p></div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                            aria-labelledby="pills-profile-tab">...</div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                            aria-labelledby="pills-contact-tab">...</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
