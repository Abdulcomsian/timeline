@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="https://unpkg.com/gojs@2.2.18/extensions/DataInspector.css">
@endsection
@section('content')
<div class="time-line-screen">
    <div class="container">
        <div class="row">
            <input type="hidden" name="timelineid" value="{{$encryptid}}" id="timelineid">
            <div class="col-12 text-center">
                <h1>{{$TimeLine->name ?? 'Test TimeLine'}}</h1>
                <p>{{isset($TimeLine->name) ? date('M d,Y - D',strtotime($TimeLine->start_date)) : '(Jan 1, 2022 - Monday) 1:00 PM'}}</p>
                <p>{{$TimeLine->description ?? 'Test Description'}}</p>
                <hr class="mt-5">
            </div>
            <div class="timeline-function-div d-flex justify-content-center align-items-center">
                <!-- <div style="width:10%;">{{date('M d,Y',strtotime($TimeLine->start_date)) }}</div> -->
                <div class="timeline-div position-relative w-100">
                    <!-- <div id="sample">
                        <div id="myDiagramDiv" style="background-color: rgb(52, 52, 60); border: 1px solid black; height: 570px; position: relative; -webkit-tap-highlight-color: rgba(255, 255, 255, 0); cursor: auto;"><canvas tabindex="0" width="1037" height="551" style="position: absolute; top: 0px; left: 0px; z-index: 2; user-select: none; touch-action: none; width: 1037px; height: 551px; cursor: auto;">This text is displayed if your browser does not support the Canvas HTML element.</canvas>
                            <div style="position: absolute; overflow: auto; width: 1037px; height: 568px; z-index: 1;">
                                <div style="position: absolute; width: 1748.83px; height: 1px;"></div>
                            </div>
                        </div>
                        <div>

                        </div>


                        <div>
                            <textarea id="mySavedModel" style="width:100%; height:270px;display:none">
                            { "class": "go.TreeModel",
                                "nodeDataArray": [
                                {"key":1, "name":"Stella Payne Diaz", "title":"CEO", "pic":"1.jpg"},
                                {"key":2, "name":"Luke Warm", "title":"VP Marketing/Sales", "pic":"2.jpg", "parent":1},
                                {"key":3, "name":"obaid", "title":"developer", "pic":"1.jpg"}

                                ]
                            }
                            </textarea>
                        </div>

                    </div> -->
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
                                                    <img src="{{asset('images/learning.png')}}" alt="" class="img-fluid">
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
                                                    <img src="{{asset('images/learning.png')}}" alt="" class="img-fluid">
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
                    @if(count($events)>0)
                    @foreach($events as $ev)
                    @if($ev->isParent)
                    <div class='newEventAdd' style="left:{{$ev->postion_x}}px">
                        <span class='functionality-span'>
                            <span class='setting'>
                                <i class='fas fa-cog'></i>
                                <div class='edit-delete'>
                                    <span class='edit-btn'>
                                        <i class='fas fa-edit'></i>
                                    </span>
                                    <span class='delete-btn' data-event-id="{{$ev->id}}">
                                        <i class='fas fa-trash'></i></span>
                                    <span class='addSubChild' data-event-id="{{$ev->id}}">
                                        <i class='fas fa-send'></i></span>
                                    <span class='inviteuser' data-event-id="{{$ev->id}}">
                                        <i class='fas fa-user-plus'></i></span>
                                </div>
                            </span>
                            <input class='event-type' value='{{$ev->event_title}}'>
                        </span>
                        <span class='ms-2 functionality-span'>
                            <img src="{{$ev->icon}}" class='img-fluid' />
                            <span class='subTimeLineChild parentSubTimeLine'>
                                <span class='vertical-line'></span>
                                <span class='addSubChildEvent functionality-span' data-event-id="{{$ev->id}}">
                                    <i class='fas fa-plus'></i>
                                </span>
                                <!-- append child element -->
                                @if(count($ev->Child)>0)
                                @php
                                $i=1;
                                @endphp
                                @foreach($ev->child as $ch)
                                @include('timeline.partials.childevent',$ch)
                                @php
                                $i=$i+2;
                                @endphp
                                @endforeach
                                @endif
                            </span>
                        </span>
                    </div>
                    @else

                    <div class='newEventAdd' style="left:{{$ev->postion_x}}px">
                        <span class='functionality-span'>
                            <span class='setting'>
                                <i class='fas fa-cog'></i>
                                <div class='edit-delete'>
                                    <span class='edit-btn'>
                                        <i class='fas fa-edit'></i>
                                    </span>
                                    <span class='delete-btn' data-event-id="{{$ev->id}}">
                                        <i class='fas fa-trash'></i>
                                    </span>
                                    <span class='inviteuser' data-event-id="{{$ev->id}}">
                                        <i class='fas fa-user-plus'></i></span>
                                </div>
                            </span>
                            <input class='event-type' value='{{$ev->event_title}}'>
                        </span>
                        <span class='ms-2 functionality-span'><img src="{{$ev->icon}}" class='img-fluid' />
                        </span>
                    </div>
                    @endif
                    @endforeach
                    @endif
                </div>
                <!-- <div style="padding-left:2px;width:10%;">{{date('M d,Y',strtotime($TimeLine->end_date))}}</div> -->
            </div>
            <div class="footer">
                <div class="col-12 text-right">
                    <div class="zoom-effect">
                        <span id="zoom-in"><img src="{{asset('images/zoom-in.svg')}}" alt=""></span>
                        <span id="zoom-out"><img src="{{asset('images/zoom-out.svg')}}" alt=""></span>
                    </div>
                    <div class="drop-box">
                        <span>
                            <img src="{{asset('images/menu-bars.svg')}}" alt="">
                        </span>
                        <p>Details</p>
                        <span class="icon-span"><i class="fas fa-chevron-up"></i></span>
                    </div>
                </div>
                <div class="menu-div">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Overview</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Members</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Chat</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Narrative</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quam a, metus elit dignissim sit feugiat egestas lectus ipsum. Integer lorem arcu praesent eget. Amet, in iaculis sit tincidunt. Morbi at purus ac id ultrices. Magna morbi et sed pellentesque habitasse ac vitae ultricies mus. Nunc odio ut bibendum cursus dictum fringilla massa lobortis.</p>
                            <p>Amet, in iaculis sit tincidunt. Morbi at purus ac id ultrices. Magna morbi et sed pellentesque habitasse ac vitae ultricies mus.</p>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="search-div d-flex align-items-center justify-content-between">
                                <div class="drop-down-input position-relative">
                                    <input type="text" placeholder="example@email.com" class="form-control">
                                    <select name="" id="" class="position-absolute">
                                        <option value="View">View</option>
                                        <option value="Edit">Edit</option>
                                    </select>
                                </div>
                                <button>Add</button>
                            </div>
                            <div class="list-div mt-3">
                                <ul>
                                    <li>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="user-name d-flex align-items-center">
                                                <span class="word-name d-flex align-items-center justify-content-center">JD</span>
                                                <span class="name ms-3">John Doe</span>
                                            </div>
                                            <span class="action-text">View</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="user-name d-flex align-items-center">
                                                <span class="word-name d-flex align-items-center justify-content-center">JD</span>
                                                <span class="name ms-3">John Doe</span>
                                            </div>
                                            <span class="action-text">Edit</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="user-name d-flex align-items-center">
                                                <span class="word-name d-flex align-items-center justify-content-center">JD</span>
                                                <span class="name ms-3">John Doe</span>
                                            </div>
                                            <span class="action-text">View</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal delete-modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you want to delete Event?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary delete-event">Yes</button>
            </div>
        </div>
    </div>
</div>
<div class="modal invite-modal" tabindex="-1">
    <form method="post" action="{{url('invite/event')}}">
        @csrf
        <input type="hidden" name="EventId" id="EventId" value="" />
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Invite User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you want to Invite Event?</p>
                    <div class="label-input mb-4">
                        <label class="mb-2" for="">Invite People</label>
                        <div class="multiple-people-invite">
                            <div class="add-invite-people position-relative">
                                <input type="email" class="form-control" name="invite_peoples" placeholder="test@gamil.com">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
@section('script')
<script src="https://unpkg.com/gojs@2.2.18/release/go.js"></script>
<script src="https://unpkg.com/gojs@2.2.18/extensions/DataInspector.js"></script>
<script id="code">
    function init() {

        // Since 2.2 you can also author concise templates with method chaining instead of GraphObject.make
        // For details, see https://gojs.net/latest/intro/buildingObjects.html
        const $ = go.GraphObject.make; // for conciseness in defining templates

        myDiagram =
            $(go.Diagram, "myDiagramDiv", // must be the ID or reference to div
                {
                    allowCopy: false,
                    allowDelete: false,
                    //initialAutoScale: go.Diagram.Uniform,
                    maxSelectionCount: 1, // users can select only one part at a time
                    validCycle: go.Diagram.CycleDestinationTree, // make sure users can only create trees
                    "clickCreatingTool.archetypeNodeData": { // allow double-click in background to create a new node
                        name: "(new person)",
                        title: "",
                        comments: ""
                    },
                    "clickCreatingTool.insertPart": function(loc) { // override to scroll to the new node
                        const node = go.ClickCreatingTool.prototype.insertPart.call(this, loc);
                        if (node !== null) {
                            this.diagram.select(node);
                            this.diagram.commandHandler.scrollToPart(node);
                            this.diagram.commandHandler.editTextBlock(node.findObject("NAMETB"));
                        }
                        return node;
                    },
                    layout: $(go.TreeLayout, {
                        treeStyle: go.TreeLayout.StyleLastParents,
                        arrangement: go.TreeLayout.ArrangementHorizontal,
                        // properties for most of the tree:
                        angle: 90,
                        layerSpacing: 35,
                        // properties for the "last parents":
                        alternateAngle: 90,
                        alternateLayerSpacing: 35,
                        alternateAlignment: go.TreeLayout.AlignmentBus,
                        alternateNodeSpacing: 20
                    }),
                    "undoManager.isEnabled": true // enable undo & redo
                });

        // when the document is modified, add a "*" to the title and enable the "Save" button
        myDiagram.addDiagramListener("Modified", e => {
            const button = document.getElementById("SaveButton");
            if (button) button.disabled = !myDiagram.isModified;
            const idx = document.title.indexOf("*");
            if (myDiagram.isModified) {
                if (idx < 0) document.title += "*";
            } else {
                if (idx >= 0) document.title = document.title.slice(0, idx);
            }
        });

        const levelColors = ["#AC193D", "#2672EC", "#8C0095", "#5133AB",
            "#008299", "#D24726", "#008A00", "#094AB2"
        ];

        // override TreeLayout.commitNodes to also modify the background brush based on the tree depth level
        myDiagram.layout.commitNodes = function() {
            go.TreeLayout.prototype.commitNodes.call(this); // do the standard behavior
            // then go through all of the vertexes and set their corresponding node's Shape.fill
            // to a brush dependent on the TreeVertex.level value
            myDiagram.layout.network.vertexes.each(v => {
                if (v.node) {
                    const level = v.level % (levelColors.length);
                    const color = levelColors[level];
                    const shape = v.node.findObject("SHAPE");
                    if (shape) shape.stroke = $(go.Brush, "Linear", {
                        0: color,
                        1: go.Brush.lightenBy(color, 0.05),
                        start: go.Spot.Left,
                        end: go.Spot.Right
                    });
                }
            });
        };

        // this is used to determine feedback during drags
        function mayWorkFor(node1, node2) {
            if (!(node1 instanceof go.Node)) return false; // must be a Node
            if (node1 === node2) return false; // cannot work for yourself
            if (node2.isInTreeOf(node1)) return false; // cannot work for someone who works for you
            return true;
        }

        // This function provides a common style for most of the TextBlocks.
        // Some of these values may be overridden in a particular TextBlock.
        function textStyle() {
            return {
                font: "9pt  Segoe UI,sans-serif",
                stroke: "white"
            };
        }

        // This converter is used by the Picture.
        function findHeadShot(pic) {
            if (!pic) return "images/HSnopic.png"; // There are only 16 images on the server
            return "images/HS" + pic;
        }

        // define the Node template
        myDiagram.nodeTemplate =
            $(go.Node, "Spot", {
                    selectionObjectName: "BODY",
                    mouseEnter: (e, node) => node.findObject("BUTTON").opacity = node.findObject("BUTTONX").opacity = 1,
                    mouseLeave: (e, node) => node.findObject("BUTTON").opacity = node.findObject("BUTTONX").opacity = 0,
                    // handle dragging a Node onto a Node to (maybe) change the reporting relationship
                    mouseDragEnter: (e, node, prev) => {
                        const diagram = node.diagram;
                        const selnode = diagram.selection.first();
                        if (!mayWorkFor(selnode, node)) return;
                        const shape = node.findObject("SHAPE");
                        if (shape) {
                            shape._prevFill = shape.fill; // remember the original brush
                            shape.fill = "darkred";
                        }
                    },
                    mouseDragLeave: (e, node, next) => {
                        const shape = node.findObject("SHAPE");
                        if (shape && shape._prevFill) {
                            shape.fill = shape._prevFill; // restore the original brush
                        }
                    },
                    mouseDrop: (e, node) => {
                        const diagram = node.diagram;
                        const selnode = diagram.selection.first(); // assume just one Node in selection
                        if (mayWorkFor(selnode, node)) {
                            // find any existing link into the selected node
                            const link = selnode.findTreeParentLink();
                            if (link !== null) { // reconnect any existing link
                                link.fromNode = node;
                            } else { // else create a new link
                                diagram.toolManager.linkingTool.insertLink(node, node.port, selnode, selnode.port);
                            }
                        }
                    }
                },
                // for sorting, have the Node.text be the data.name
                new go.Binding("text", "name"),
                // bind the Part.layerName to control the Node's layer depending on whether it isSelected
                new go.Binding("layerName", "isSelected", sel => sel ? "Foreground" : "").ofObject(),
                $(go.Panel, "Auto", {
                        name: "BODY"
                    },
                    // define the node's outer shape
                    $(go.Shape, "Rectangle", {
                        name: "SHAPE",
                        fill: "#333333",
                        stroke: 'white',
                        strokeWidth: 3.5,
                        portId: ""
                    }),
                    $(go.Panel, "Horizontal",
                        $(go.Picture, {
                                name: "Picture",
                                desiredSize: new go.Size(70, 70),
                                margin: 1.5,
                                source: "images/HSnopic.png" // the default image
                            },
                            new go.Binding("source", "pic", findHeadShot)),
                        // define the panel where the text will appear
                        $(go.Panel, "Table", {
                                minSize: new go.Size(130, NaN),
                                maxSize: new go.Size(150, NaN),
                                margin: new go.Margin(6, 10, 0, 6),
                                defaultAlignment: go.Spot.Left
                            },
                            $(go.RowColumnDefinition, {
                                column: 2,
                                width: 4
                            }),
                            $(go.TextBlock, textStyle(), // the name
                                {
                                    name: "NAMETB",
                                    row: 0,
                                    column: 0,
                                    columnSpan: 5,
                                    font: "12pt Segoe UI,sans-serif",
                                    editable: true,
                                    isMultiline: false,
                                    minSize: new go.Size(50, 16)
                                },
                                new go.Binding("text", "name").makeTwoWay()),
                            $(go.TextBlock, "Title: ", textStyle(), {
                                row: 1,
                                column: 0
                            }),
                            $(go.TextBlock, textStyle(), {
                                    row: 1,
                                    column: 1,
                                    columnSpan: 4,
                                    editable: true,
                                    isMultiline: false,
                                    minSize: new go.Size(50, 14),
                                    margin: new go.Margin(0, 0, 0, 3)
                                },
                                new go.Binding("text", "title").makeTwoWay()),
                            $(go.TextBlock, textStyle(), {
                                    row: 2,
                                    column: 0
                                },
                                new go.Binding("text", "key", v => "ID: " + v)),
                            $(go.TextBlock, textStyle(), // the comments
                                {
                                    row: 3,
                                    column: 0,
                                    columnSpan: 5,
                                    font: "italic 9pt sans-serif",
                                    wrap: go.TextBlock.WrapFit,
                                    editable: true, // by default newlines are allowed
                                    minSize: new go.Size(100, 14)
                                },
                                new go.Binding("text", "comments").makeTwoWay())
                        ) // end Table Panel
                    ) // end Horizontal Panel
                ), // end Auto Panel
                $("Button",
                    $(go.Shape, "PlusLine", {
                        width: 10,
                        height: 10
                    }), {
                        name: "BUTTON",
                        alignment: go.Spot.Right,
                        opacity: 0, // initially not visible
                        click: (e, button) => addEmployee(button.part)
                    },
                    // button is visible either when node is selected or on mouse-over
                    new go.Binding("opacity", "isSelected", s => s ? 1 : 0).ofObject()
                ),
                new go.Binding("isTreeExpanded").makeTwoWay(),
                $("TreeExpanderButton", {
                        name: "BUTTONX",
                        alignment: go.Spot.Bottom,
                        opacity: 0, // initially not visible
                        "_treeExpandedFigure": "TriangleUp",
                        "_treeCollapsedFigure": "TriangleDown"
                    },
                    // button is visible either when node is selected or on mouse-over
                    new go.Binding("opacity", "isSelected", s => s ? 1 : 0).ofObject()
                )
            ); // end Node, a Spot Panel

        function addEmployee(node) {
            if (!node) return;
            const thisemp = node.data;
            myDiagram.startTransaction("add employee");
            const newemp = {
                name: "(new person)",
                title: "(title)",
                comments: "",
                parent: thisemp.key
            };
            myDiagram.model.addNodeData(newemp);
            const newnode = myDiagram.findNodeForData(newemp);
            if (newnode) newnode.location = node.location;
            myDiagram.commitTransaction("add employee");
            myDiagram.commandHandler.scrollToPart(newnode);
        }

        // the context menu allows users to make a position vacant,
        // remove a role and reassign the subtree, or remove a department
        myDiagram.nodeTemplate.contextMenu =
            $("ContextMenu",
                $("ContextMenuButton",
                    $(go.TextBlock, "Add Employee"), {
                        click: (e, button) => addEmployee(button.part.adornedPart)
                    }
                ),
                $("ContextMenuButton",
                    $(go.TextBlock, "Vacate Position"), {
                        click: (e, button) => {
                            const node = button.part.adornedPart;
                            if (node !== null) {
                                const thisemp = node.data;
                                myDiagram.startTransaction("vacate");
                                // update the key, name, picture, and comments, but leave the title
                                myDiagram.model.setDataProperty(thisemp, "name", "(Vacant)");
                                myDiagram.model.setDataProperty(thisemp, "pic", "");
                                myDiagram.model.setDataProperty(thisemp, "comments", "");
                                myDiagram.commitTransaction("vacate");
                            }
                        }
                    }
                ),
                $("ContextMenuButton",
                    $(go.TextBlock, "Remove Role"), {
                        click: (e, button) => {
                            // reparent the subtree to this node's boss, then remove the node
                            const node = button.part.adornedPart;
                            if (node !== null) {
                                myDiagram.startTransaction("reparent remove");
                                const chl = node.findTreeChildrenNodes();
                                // iterate through the children and set their parent key to our selected node's parent key
                                while (chl.next()) {
                                    const emp = chl.value;
                                    myDiagram.model.setParentKeyForNodeData(emp.data, node.findTreeParentNode().data.key);
                                }
                                // and now remove the selected node itself
                                myDiagram.model.removeNodeData(node.data);
                                myDiagram.commitTransaction("reparent remove");
                            }
                        }
                    }
                ),
                $("ContextMenuButton",
                    $(go.TextBlock, "Remove Department"), {
                        click: (e, button) => {
                            // remove the whole subtree, including the node itself
                            const node = button.part.adornedPart;
                            if (node !== null) {
                                myDiagram.startTransaction("remove dept");
                                myDiagram.removeParts(node.findTreeParts());
                                myDiagram.commitTransaction("remove dept");
                            }
                        }
                    }
                )
            );

        // define the Link template
        myDiagram.linkTemplate =
            $(go.Link, go.Link.Orthogonal, {
                    layerName: "Background",
                    corner: 5
                },
                $(go.Shape, {
                    strokeWidth: 1.5,
                    stroke: "#F5F5F5"
                })); // the link shape

        // read in the JSON-format data from the "mySavedModel" element
        load();


        // support editing the properties of the selected person in HTML
        if (window.Inspector) myInspector = new Inspector("myInspector", myDiagram, {
            properties: {
                "key": {
                    readOnly: true
                },
                "comments": {}
            }
        });

        // Setup zoom to fit button
        document.getElementById('zoomToFit').addEventListener('click', () => myDiagram.commandHandler.zoomToFit());

        document.getElementById('centerRoot').addEventListener('click', () => {
            myDiagram.scale = 1;
            myDiagram.commandHandler.scrollToPart(myDiagram.findNodeForKey(1));
        });
    } // end init


    // Show the diagram's model in JSON format
    function save() {
        document.getElementById("mySavedModel").value = myDiagram.model.toJson();
        myDiagram.isModified = false;
    }

    function load() {
        myDiagram.model = go.Model.fromJson(document.getElementById("mySavedModel").value);
        // make sure new data keys are unique positive integers
        let lastkey = 1;
        myDiagram.model.makeUniqueKeyFunction = (model, data) => {
            let k = data.key || lastkey;
            while (model.findNodeDataForKey(k)) k++;
            data.key = lastkey = k;
            return k;
        };
    }

    window.addEventListener('DOMContentLoaded', init);
</script>
<script type="text/javascript">
    //save parent Event=========================================
    function saveEvent(mouseXPosition, val, imgSrc, selectListItem) {
        isParent = 0;
        if (val == " Sub timeline") {
            isParent = 1;
        }
        $.ajax({
            "type": "POST",
            "url": "{{url('/events-save')}}",
            "data": {
                "_token": "{{ csrf_token() }}",
                "postion": mouseXPosition,
                "label": selectListItem,
                "icon": imgSrc,
                "isParent": isParent,
                'time_line_id': $("#timelineid").val(),
            }, //Send to WebMethod
            'async': false,
        }).done(function(o) {
            // console.log(o);
            // if (val == " Sub timeline") {
            //     $(".timeline-div").append(
            //         "<div class='newEventAdd' style='left: " +
            //         mouseXPosition +
            //         "px'><span class='functionality-span'><span class='setting'><i class='fas fa-cog'></i><div class='edit-delete'><span class='edit-btn'><i class='fas fa-edit'></i></span><span class='delete-btn' data-event-id='" + o.id + "'><i class='fas fa-trash'></i></span></div></span><input class='event-type' value='" + val + "'></span><span class='ms-2 functionality-span'><img src=" +
            //         imgSrc +
            //         " class='img-fluid'/><span class='subTimeLineChild parentSubTimeLine'><span class='vertical-line'></span><span  class='addEvent addSubChildEvent functionality-span' data-event-id='" + o.id + "'><i class='fas fa-plus'></i></span></span></span></div>"
            //     );
            // } else {
            //     $(".timeline-div").append(
            //         "<div class='newEventAdd' style='left: " +
            //         mouseXPosition +
            //         "px'><span class='functionality-span'><span class='setting'><i class='fas fa-cog'></i><div class='edit-delete'><span class='edit-btn'><i class='fas fa-edit'></i></span><span class='delete-btn' data-event-id='" + o.id + "'><i class='fas fa-trash'></i></span></div></span><input class='event-type' value='" + selectListItem + "'></span><span class='ms-2 functionality-span'><img src=" +
            //         imgSrc +
            //         " class='img-fluid'/></span></div>"
            //     );
            // }
            toastr.success("Event saved successfully!");
            location.reload();

        });
    }

    //save childEvent===============================
    function saveChildEvent(targetElem, selectListItem, imgSrc, eventId, val) {
        $.ajax({
            "type": "POST",
            "url": "{{url('/child-events-save')}}",
            "data": {
                "_token": "{{ csrf_token() }}",
                "postion": "1",
                "label": selectListItem,
                "icon": imgSrc,
                "isParent": 0,
                "eventId": eventId,
                'time_line_id': $("#timelineid").val(),
            }, //Send to WebMethod
            'async': false,
        }).done(function(o) {
            location.reload();
            //$(".subTimeLine-List").css("display","block")
            // if (val[1].innerText == "Sub timeline") {
            //     $(targetElem[0].parentElement).append(
            //         "<div class='newChild' style='left:-43px'><span class='functionality-span'><span class='setting'><i class='fas fa-cog'></i><div class='edit-delete'><span class='edit-btn'><i class='fas fa-edit'></i></span><span class='delete-btn' data-event-id='" + o.id + "'><i class='fas fa-trash'></i></span></div></span><input class='event-type' value='" + selectListItem + "'></span><span class='ms-2 functionality-span'><img src=" +
            //         imgSrc +
            //         " class='img-fluid'/><span class='subTimeLineChild'><span class='vertical-line'></span><span class='addEvent addSubChildEvent functionality-span' data-event-id='" + o.event.id + "'><i class='fas fa-plus'></i></span></span></span></div>"
            //     );
            // } else {

            //     $(targetElem[0].parentElement).append(
            //         "<div class='newChild' style='left:-43px;top:" + 18 * o.count + "px'><span class='functionality-span'><span class='setting'><i class='fas fa-cog'></i><div class='edit-delete'><span class='edit-btn'><i class='fas fa-edit'></i></span><span class='delete-btn' data-event-id='" + o.id + "'><i class='fas fa-trash'></i></span></div></span><input class='event-type' value='" + selectListItem + "'></span><span class='ms-2 functionality-span'><img src=" +
            //         imgSrc +
            //         " class='img-fluid'/></span></div>"
            //     );
            // }
            toastr.success("Event saved successfully!");

        });
    }

    //Delete Event
    function delete_Event(deleteEvent, deleteEventId) {
        $.ajax({
            "type": "POST",
            "url": "{{url('/events-delete')}}",
            "data": {
                "_token": "{{ csrf_token() }}",
                deleteEventId,
            }, //Send to WebMethod
            'async': false,
        }).done(function(res) {
            if (res == "success") {
                // deleteEvent.remove();
                // $(".delete-modal").css("display", 'none');
                // $(".event-list").css("display", "none");
                // $(".timeline-div .event-list-sub-child").css("display", "none");
                toastr.success("Event Deleted successfully!");
                location.reload();
            }
        });
    }

    //add user to event
    let EventId;
    $(".inviteuser").click(function() {
        EventId = $(this).attr('data-event-id');
        $("#EventId").val(EventId);
        $(".invite-modal").modal('show');
    })
</script>
@endsection