<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/magnific-popup/magnific-popup.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/plyr/plyr.css') }}">
<!-- owl.carousel css -->
<link rel="stylesheet" href="{{ URL::asset('assets/libs/owl.carousel/owl.carousel.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/page-lesson-show.css') }}?v={{ time() }}">
<div class="page-content">
    <div class="container-fluid">
        <!-- Error -->
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $error }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endforeach
        <!-- ./Error -->

        <!-- Ajax Page Main Content -->
        <div id="mainContent">
            <div class="s-lesson-div">
                <p class="ugro-path">
                    <a class="ugro-path-first" href="#lesson-overview-{{$lesson->getCategory->getPhase->id}}">{{$lesson->getCategory->getPhase->title}}</a>
                    <span class="ugro-path-second"> / {{$lesson->getCategory->title}} </span>
                </p>
                <h1 class="lesson-title">{{ $lesson->title }}</h1>
                <div class="row">
                    <div class="col-sm-8 s-lesson-content-left">
                        <div class="s-lesson-video">
                            <video id="mainLessonVideo" playsinline controls>
                                <source src="{{ route('lesson_video_stream', $lesson->id) }}" type="video/mp4" />
                            </video>
                        </div>
                        <div class="s-lesson-info p-4">
                            <div class="row">
                                <div class="col-sm-6 s_lesson_description_section">
                                    <div class="s-lesson-description-header">
                                        About This Lesson
                                    </div>
                                    <div class="s_lesson_description">
                                        {!! $lesson->description !!}
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs nav-tabs-custom nav-tabs-ugro nav-justified" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#keytakeaway" role="tab">
                                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                <span class="d-none d-sm-block">Key Takeaways</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#actionstep" role="tab">
                                                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                <span class="d-none d-sm-block">Action steps</span>
                                            </a>
                                        </li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content p-3 text-muted">
                                        <div class="tab-pane active" id="keytakeaway" role="tabpanel">
                                            <div>
                                                <p class="s-keytakeaway-item">
                                                    <i class="far fa-check-circle"></i>&nbsp;Scale all ads that convert
                                                    within your magic metric
                                                </p>
                                                <p class="s-keytakeaway-item">
                                                    <i class="far fa-check-circle"></i>&nbsp;Scale all ads that convert
                                                    within your magic metric
                                                </p>
                                                <p class="s-keytakeaway-item">
                                                    <i class="far fa-check-circle"></i>&nbsp;Scale all ads that convert
                                                    within your magic metric
                                                </p>
                                            </div>

                                        </div>
                                        <div class="tab-pane" id="actionstep" role="tabpanel">
                                            <p class="mb-0">
                                                {!! $lesson->action !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 s-lesson-content-right">
                        <!-- Description, Keytakeaway, ActionStep -->
                        <div class="card">
                            <div class="card-body">
                                <div>
                                    <p class="s-lesson-timestamp">Timestamps</p>
                                </div>
                                <hr class="mb-0 mt-0">
                                <div class="s-ugro-timeline-container s-nicescoll">
                                    <ul class="verti-timeline list-unstyled s-ugro-timeline">
                                        @foreach (json_decode($lesson->time_stamp) as $key => $each)
                                            <li class="event-list" onclick="jumpToSpecificTime({{ $each[0] }}, this)">
                                                <div class="event-timeline-dot">
                                                    <i class="fas fa-dot-circle"></i>
                                                </div>
                                                <div class="media">
                                                    <div class="mr-3">
                                                        <img class="rounded-circle"
                                                            src="{{ asset('assets/icons/upload.png') }}"
                                                            alt="Header Avatar" width="40">
                                                    </div>
                                                    <div class="media-body">
                                                        <div>
                                                            <h5 class="s-timeline-title">{{ $each[1] }}</h5>
                                                            <p class="text-muted s-timeline-timeinfo">At
                                                                <span class="s-timeline-time">{{ floor($each[0] / 60) }}
                                                                    minute {{ $each[0] % 60 }} second<span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- ./Description, Keytakeaway, ActionStep -->

                        <!-- Resource, Download -->
                        <div class="card">
                            <div class="card-body">
                                <div>
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs nav-tabs-custom nav-tabs-ugro nav-justified" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#download" role="tab">
                                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                <span class="d-none d-sm-block">Downloads</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#resource" role="tab">
                                                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                <span class="d-none d-sm-block">Resources</span>
                                            </a>
                                        </li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content p-3 text-muted">
                                        <div class="tab-pane active" id="download" role="tabpanel">
                                            <div class="s_lesson_download_section">
                                                @for ($i = 0; $i < count(json_decode($lesson->downloads)); $i++)
                                                    @if ($lesson->getDownLoadType($i) == 'image')
                                                        <a class="popup-form" href="#image_preview_popup"
                                                            onclick="javascript:openPreviewImagePopup('{{ $lesson->getDownLoadSrc($i) }}', '{{ $lesson->getDownLoadlink($i) }}')">
                                                            <div class="media mt-3 mb-3">
                                                                <img class="d-flex align-self-start rounded mr-3"
                                                                    src="{{ asset('assets/icons/jpg.png') }}"
                                                                    alt="Generic placeholder image" height="32">
                                                                <div class="media-body">
                                                                    <div class="s_lesson_download_title">
                                                                        {{ $lesson->getDownLoadTitle($i) }}
                                                                    </div>
                                                                    <div class="s_lesson_download_size">{{$lesson->getDownLoadSize($i)}}</div>
                                                                </div>
                                                                <img class="d-flex ml-3 rounded-circle"
                                                                    src="{{ asset('assets/icons/cloud-computing.png') }}"
                                                                    alt="Generic placeholder image" height="20">
                                                            </div>
                                                        </a>
                                                    @elseif ($lesson->getDownLoadType($i) == 'video')
                                                        <a class="popup-form" href="#video_preview_popup"
                                                            onclick="javascript:openPreviewVideoPopup('{{ route('lesson_down_stream', [$lesson->id, $i]) }}','{{ $lesson->getDownLoadlink($i) }}')">
                                                            <div class="media mt-3 mb-3">
                                                                <img class="d-flex align-self-start rounded mr-3"
                                                                    src="{{ asset('assets/icons/mp4.png') }}"
                                                                    alt="Generic placeholder image" height="32">
                                                                <div class="media-body">
                                                                    <div class="s_lesson_download_title">
                                                                        {{ $lesson->getDownLoadTitle($i) }}
                                                                    </div>
                                                                    <div class="s_lesson_download_size">{{$lesson->getDownLoadSize($i)}}</div>
                                                                </div>
                                                                <img class="d-flex ml-3 rounded-circle"
                                                                    src="{{ asset('assets/icons/cloud-computing.png') }}"
                                                                    alt="Generic placeholder image" height="20">
                                                            </div>
                                                        </a>
                                                    @elseif ($lesson->getDownLoadType($i) == 'other')
                                                        <a class="popup-form" href="#other_preview_popup"
                                                            onclick="javascript:openPreviewOtherPopup(' {{ $lesson->getDownLoadTitle($i) }}', '{{ $lesson->getDownLoadlink($i) }}')">
                                                            <div class="media mt-3 mb-3">
                                                                <img class="d-flex align-self-start rounded mr-3"
                                                                    src="{{ asset('assets/icons/file.png') }}"
                                                                    alt="Generic placeholder image" height="32">
                                                                <div class="media-body">
                                                                    <div class="s_lesson_download_title">
                                                                        {{ $lesson->getDownLoadTitle($i) }}
                                                                    </div>
                                                                    <div class="s_lesson_download_size">{{$lesson->getDownLoadSize($i)}}</div>
                                                                </div>
                                                                <img class="d-flex ml-3 rounded-circle"
                                                                    src="{{ asset('assets/icons/cloud-computing.png') }}"
                                                                    alt="Generic placeholder image" height="20">
                                                            </div>
                                                        </a>
                                                    @endif
                                                    <hr>
                                                @endfor
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="resource" role="tabpanel">
                                            @foreach (json_decode($lesson->resources) as $each)
                                                <a href="{{ $each[1] }}" target="_blank">
                                                    <h6><i class="fas fa-link color-lightgreen"></i> {{ $each[0] }}</h6>
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <a class="btn mr-2 s_lesson_button_prev"
                                    @if ($lesson->previous_lesson_id!=-1)
                                    href="#lesson-show-{{$lesson->previous_lesson_id}}"
                                    @endif
                                    >
                                        Previous Lesson</a>
                                    <a class="btn s_lesson_button_next" style="width: 45%"
                                    @if ($lesson->next_lesson_id!=-1)
                                    href="#lesson-show-{{$lesson->next_lesson_id}}"
                                    @endif
                                    >
                                        Next Lesson</a>
                                </div>
                            </div>
                        </div>
                        <!-- ./Resource, Download -->
                    </div>
                </div>
            </div>

            <!-- image Preview Popup -->
            <div class="mfp-hide mx-auto imgPreviewPopUp" id="image_preview_popup">
                <img id="previewImage" class="img-responsive" src="http://local.ugro/assets/images/small/img-1.jpg"
                    alt="NoImage" zoom="1" downlink="" />
                <div class="previewButtonGroup">
                    <div class="btn-group mt-4 mt-md-0 mx-auto" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-black" onclick="zoomout()">
                            <i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-black" onclick="zoomnormal()">
                            <i class="fas fa-search"></i></button>
                        <button type="button" class="btn btn-black" onclick="zoomin()">
                            <i class="fas fa-plus"></i></button>
                        <button type="button" class="btn btn-black" onclick="downloadImage()">
                            <i class="fas fa-download"></i></button>
                    </div>
                </div>
            </div>
            <!-- ./image Preview Popup -->

            <!-- video Preview Popup -->
            <div class="mfp-hide mx-auto videoPreviewPopUp" id="video_preview_popup">
                <video id="previewVideo" playsinline controls style="width:100%">
                    <source src="" type="video/mp4" />
                </video>
                <button class="btn btn-black downVideoButton" onclick="downloadVideo()">
                    <i class="fas fa-download"></i></button>
            </div>
            <!-- ./video Preview Popup -->

            <!-- other Preview Popup -->
            <div class=" card mfp-hide mx-auto otherPreviewPopUp" id="other_preview_popup">
                <div class="card-body" style="text-align: center">
                    <div style="display:none" id="otherDownLink"></div>
                    <h4 id="otherDownTitle" class="mb-3">XXX</h4>
                    <h6 class="mb-3">No preview Available</h6>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-text">
                                <button class="btn btn-gray" onclick="downloadOther()">
                                    <i class="fas fa-download"></i>&nbsp;&nbsp;Download
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- ./other Preview Popup -->
        </div>
        <!-- ./Ajax Page Main Content -->
    </div>
    <!-- container-fluid -->
</div>



<script src="{{ URL::asset('assets/libs/plyr/plyr.polyfilled.js') }}"></script>

<!-- Magnific Popup -->
<script src="{{ URL::asset('assets/libs/magnific-popup/magnific-popup.min.js') }}"></script>

<!-- Lightbox init js -->
<script src="{{ URL::asset('assets/js/pages/lightbox.init.js') }}"></script>
<!-- owl.carousel js -->
<script src="{{ URL::asset('assets/libs/owl.carousel/owl.carousel.min.js') }}"></script>
<script>
    var showplyroption = {
        seekTime: 15,
        settings: ['captions', 'quality', 'speed', 'loop'],
        controls: ['play-large', 'play', 'current-time', 'progress', 'mute', 'volume', /*  'settings', */
            'fullscreen'
        ],
        invertTime: false,
    };
    var player = new Plyr('#mainLessonVideo', showplyroption);
    var player2 = new Plyr('#previewVideo', showplyroption);

    function jumpToSpecificTime(seconds, li) {
        $(".s-ugro-timeline .event-list").removeClass('active');
        $(li).addClass('active');

        var mainLessonVideo = document.getElementById('mainLessonVideo');
        mainLessonVideo.currentTime = seconds;
        setTimeout(function() {
            mainLessonVideo.play();
        }, 150); //avoid error
    }


    //Preview Image Popup
    function openPreviewImagePopup(src, downlink) {
        $("#previewImage").attr('src', src);
        $("#previewImage").attr('downlink', downlink);
        zoomnormal();
    }


    function zoomin() {
        console.log("zoom in")
        var zoom = Number($("#previewImage").attr("zoom")) * 1.5;
        $("#previewImage").attr("zoom", zoom);
        $("#previewImage").css("transform", `scale(${zoom})`);
    }

    function zoomout() {
        console.log("zoom out");
        var zoom = Number($("#previewImage").attr("zoom")) / 1.5;
        $("#previewImage").attr("zoom", zoom);
        $("#previewImage").css("transform", `scale(${zoom})`);
    }

    function zoomnormal() {
        console.log("zoomnormal");
        var zoom = 1;
        $("#previewImage").attr("zoom", zoom);
        $("#previewImage").css("transform", `scale(${zoom})`);
    }

    function downloadImage() {
        console.log("download");
        window.location = $("#previewImage").attr("downlink")
    }


    // Preview Video Popup
    function openPreviewVideoPopup(src, downlink) {
        $("#previewVideo").attr('src', src);
        $("#previewVideo").attr('downlink', downlink);
    }


    function downloadVideo() {
        console.log("download");
        window.location = $("#previewVideo").attr("downlink")
    }

    // Preview Other Popup
    function openPreviewOtherPopup(title, downlink) {
        $("#otherDownTitle").text(title);
        $("#otherDownLink").text(downlink);
    }

    function downloadOther() {
        console.log("download");
        window.location = $("#otherDownLink").text()
    }

</script>
