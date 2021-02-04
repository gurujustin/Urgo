@extends('layouts.master')

@section('title') Lesson @endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('title') @endslot
        @slot('li_1') @endslot
    @endcomponent
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/plyr/plyr.css') }}">

    <div style="padding: 0px 5%">
        <h1>{{ $lesson->title }}</h1>
        <div class="row mb-5">
            <div class="col-8">
                <style>
                    :root {
                        --plyr-video-controls-background: linear-gradient(rgba(59, 144, 241, 0.842), rgba(59, 144, 241, 0.842)) !important;
                        --plyr-range-fill-background: white !important;

                        --plyr-control-icon-size: 15px !important;
                        --plyr-control-spacing: 2px !important;
                        /* --plyr-control-radius:1px!important; */
                        /* --plyr-control-padding: 12px!important; */
                        /* --plyr-font-size-base:50px!important; */
                        /* --plyr-progress-loading-background:rgba(35, 40, 47, 0.6)!important; */
                    }

                    button.plyr__control.plyr__control--overlaid {
                        padding: 15px !important;
                        border-radius: 0% !important;
                    }

                    button.plyr__control.plyr__control--overlaid svg {
                        width: 99px !important;
                        height: 45px !important;
                    }

                </style>


                <video id="myvideo" playsinline controls {{--
                    data-poster="assets/images/small/img-1.jpg" --}}>
                    <source src="{{ route('lesson_video_stream', $lesson->id) }}" type="video/mp4" />
                    <source src="/path/to/video.webm" type="video/webm" />

                </video>

            </div>
            <div class="col-4">
                <div class="card" style="height:100%;">
                    <div class="card-body" style=" position: relative;">
                        <div class="text-center mt-3">
                            <h5 class="mb-4">Time Stamps</h5>
                        </div>
                        <div class="pl-3">
                            @foreach (json_decode($lesson->time_stamp) as $each)
                                <a href="javascript:jumpToSpecificTime({{ $each[0] }})">
                                    <h6 class="mb-3"><i class="fas fa-play" style="color: #34c38f"></i> {{ $each[1] }}</h6>
                                </a>
                            @endforeach
                        </div>
                        <div class="mt-3" style="position: absolute; bottom: 20px; left:3%; width:100%">
                            <button class="btn btn-light waves-effect waves-light mr-2" style="width: 45%">Previous
                                Lesson</button>
                            <button class="btn btn-success waves-effect waves-light" style="width: 45%">Next Lesson</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-8">
                <div class="card mb-0">
                    <div class="card-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-pills    " role="tablist">
                            <li class="nav-item waves-effect waves-light btn-rounded">
                                <a class="nav-link active" data-toggle="tab" href="#home-1" role="tab">
                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                    <span class="d-none d-sm-block"><i class="fas fa-file-invoice"></i> About This
                                        Lesson</span>
                                </a>
                            </li>
                            <li class="nav-item waves-effect waves-light btn-rounded">
                                <a class="nav-link" data-toggle="tab" href="#profile-1" role="tab">
                                    <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                    <span class="d-none d-sm-block"><i class="fas fa-key"></i> Key Takeaways</span>
                                </a>
                            </li>
                            <li class="nav-item waves-effect waves-light btn-rounded">
                                <a class="nav-link" data-toggle="tab" href="#messages-1" role="tab">
                                    <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                    <span class="d-none d-sm-block"><i class="fas fa-key"></i> Action Steps</span>
                                </a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content p-3 text-muted">
                            <div class="tab-pane active" id="home-1" role="tabpanel">
                                <p class="mb-0">
                                    {!! $lesson->description !!}
                                </p>
                            </div>
                            <div class="tab-pane" id="profile-1" role="tabpanel">
                                <p class="mb-0">
                                    {!! $lesson->keytakeaway !!}
                                </p>
                            </div>
                            <div class="tab-pane" id="messages-1" role="tabpanel">
                                <p class="mb-0">
                                    {!! $lesson->action !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card" style="height:100%">
                    <div class="card-body">
                        <div class="text-center mt-3">
                            <div>
                                <h5 class="mb-3">Resources</h5>
                                @foreach (json_decode($lesson->resources) as $each)
                                    <a href="{{ $each[1] }}" target="_blank">
                                        <h6><i class="fas fa-link" style="color: #34c38f"></i> {{ $each[0] }}</h6>
                                    </a>
                                @endforeach

                            </div>
                            <div class="mt-4">
                                <h5 class="mb-3">Downloads</h5>
                                @foreach (json_decode($lesson->downloads) as $each)
                                    <div class="mb-2" style="font-size: 12px">
                                        {{-- <a href="#" target="popup"
                                            onclick="window.open('https://docs.google.com/gview?url=http://ugro.uk/uploads/lesson/1.docx&embedded=true','popup','width=600,height=600'); return false;">
                                            Open Link in Popup
                                        </a> --}}
                                        <a href="javascript:openPreviewModal('{{ asset(Config::get('constants.publicdirs.lesson') . $each[2]) }}', '{{ $each[0] }}','{{ $each[1] }}')"
                                            style="color:  #495057">
                                            <i class="far fa-file-alt" style="color:  #34c38f"></i> {{ $each[0] }}
                                        </a>
                                        <a class="ml-1" href="{{ route('lesson_download', [$each[2], $each[1]]) }}"
                                            style="color: #323538">
                                            <i class="fas fa-download"></i>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

    <!--  Modal content for the above example -->
    <div id="filePreviewModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myExtraLargeModalLabel"><span id="previewTitle"></span>(<span
                            id="previewFilename"></span>)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe id="previewIframe" src="" frameborder='0' style="width: 100%; height:600px"></iframe>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@endsection
@section('script')

    <!-- form mask -->
    <script src="{{ URL::asset('assets/libs/jquery-repeater/jquery-repeater.min.js') }}"></script>

    <!-- form mask init -->
    <script src="{{ URL::asset('assets/js/pages/form-repeater.int.js') }}"></script>

    <script src="{{ URL::asset('assets/libs/plyr/plyr.polyfilled.js') }}"></script>

    <script>
        var iframeTimer;

        $("#previewIframe").on("load", function() {
            console.log('iframe success')
            $("#filePreviewModal").modal('show');
            clearInterval(iframeTimer);
        })

        function openPreviewModal(src, title, filename) {
            var fileExtension = filename.substr((filename.lastIndexOf('.') + 1));
            var imageextarr = ['jpg', 'JPG', 'png', 'PNG', 'jpeg', 'JPEG','mp3','mp4'];
            console.log(fileExtension)
            if (imageextarr.includes(fileExtension)) {
                var previewURL = src;
            } else {
                var previewURL = "https://docs.google.com/gview?embedded=true&url=";
                previewURL += src;
                previewURL += "&uid=" + Math.floor((Math.random() * 1000000) + 1);
            }
            console.log(previewURL);

            $("#previewTitle").text(title);
            $("#previewFilename").text(filename);

            iframeTimer = setInterval(function() {
                console.log('try to load')
                document.getElementById('previewIframe').src = previewURL
            }, 1000);
        }

        const player = new Plyr('#myvideo', {
            seekTime: 15,
            settings: ['captions', 'quality', 'speed', 'loop'],
            controls: ['play-large', 'play', 'current-time', 'progress', 'mute', 'volume', /*  'settings', */
                'fullscreen'
            ],
            invertTime: false,
        });

        function jumpToSpecificTime(seconds) {
            var myvideo = document.getElementById('myvideo');
            myvideo.currentTime = seconds;
            setTimeout(function() {
                myvideo.play();
            }, 150); //avoid error
        }

    </script>

@endsection
