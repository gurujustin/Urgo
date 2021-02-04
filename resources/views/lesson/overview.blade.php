<!-- Bootstrap Rating css -->
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/bootstrap-rating/bootstrap-rating.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/page-lesson-overview.css') }}">
<div class="page-content lesson-overview-page-content">
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
            <div class="row" style="padding:0 13%;">
                <div class="col-6">
                    <div class="embed-responsive embed-responsive-16by9">
                        <video id="overviewvideo" width="400" controls>
                            <source src="{{ asset('/assets/videos/hover.mp4') }}" type="video/mp4">
                            <source src="mov_bbb.ogg" type="video/ogg">
                            Your browser does not support HTML video.
                        </video>
                    </div>
                </div>
                <div class="col-4">
                    <h1>Not finished Design</h1>
                    <p>
                        Some quick example text to build on the card title and make up the bulk of the card's content.
                    </p>
                </div>
            </div>

            <div class="ml-5 mt-5 mb-5" style="padding:0 10%">
                <ul class="nav nav-pills ugro-nav-pills" role="tablist">
                    @foreach ($categories as $index=>$category)
                        <li class="nav-item waves-effect waves-light btn-rounded mr-2 mb-2 @if($category->hasNewLesson()) has-new @endif">
                            <a class="nav-link @if($index==0) active @endif"
                                data-toggle="tab" href="#category{{ $category->id }}" role="tab">
                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                <span class="d-none d-sm-block">
                                    <i class="fas fa-file-invoice"></i>  {{ $category->title }}
                                </span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="tab-content" style="padding:0 8%">
                @foreach ($categories as $index=> $category)
                    <div class="tab-pane @if ($index==0) active @endif" id="category{{ $category->id }}" role="tabpanel">
                        <div class="row">
                            @foreach ($lessons as $lesson)
                                @if ($lesson->category == $category->id)
                                    <div class="col-sm-6 col-md-4 col-lg-4 col-xl-3">
                                        <div class="card ugro-video-tile" >
                                            <div style="position: relative" class="videocontainer">
                                                <div class="embed-responsive embed-responsive-4by3 ">
                                                    <video class="previewVideo" muted="muted" loop
                                                        poster="{{ asset(Config::get('constants.publicdirs.lesson') . $lesson->tile_image) }}"
                                                        style=" object-fit: cover;"  onclick="goToShowpage({{ $lesson->id }})">
                                                        <source
                                                            src="{{ asset(Config::get('constants.publicdirs.lesson') . $lesson->tile_video) }}"
                                                            type="video/mp4">
                                                        <source src="mov_bbb.ogg" type="video/ogg">
                                                        Your browser does not support HTML video.
                                                    </video>
                                                </div>
                                                @if ($lesson->isNew())
                                                    <span class="badge badge-primary"
                                                        style="position: absolute; top:10px; right:10px; font-size: 15px;">New</span>
                                                @endif
                                            </div>

                                            <div class="card-body">
                                                <div class="row mb-2" style="height: 40px;overflow: hidden">
                                                    <div class="col-10"  onclick="goToShowpage({{ $lesson->id }})">
                                                        <h5>{{ $lesson->tile_title }}</h5>
                                                    </div>
                                                    <div class="col-2">
                                                        <h3 class="text-danger favoriteMark"
                                                            lessonid="{{ $lesson->id }}"
                                                            favorite="{{ $lesson->getFavorite() }}">
                                                            @if ($lesson->getFavorite() == 1)
                                                                <i class="fas fa-bookmark"></i>
                                                            @else
                                                                <i class="far fa-bookmark "></i>
                                                            @endif
                                                        </h3>
                                                    </div>
                                                </div>
                                                <p class="card-text" style="height: 60px;overflow: hidden;"  onclick="goToShowpage({{ $lesson->id }})">
                                                    {{ $lesson->tile_description }}
                                                </p>
                                                <div class="row">
                                                    <div class="col-md-8 col-sm-6">
                                                        <input type="hidden" class="rating-tooltip ratingbar"
                                                            data-filled="mdi mdi-star text-warning"
                                                            data-empty="mdi mdi-star-outline text-muted"
                                                            lessonid="{{ $lesson->id }}"
                                                            value="{{ $lesson->getRating() }}"/>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6 pt-2">
                                                        <span class="badge badge-pill badge-soft-success">
                                                            <i class="far fa-clock "></i>
                                                            {{ $lesson->getDurationHour() }}:{{ $lesson->getDurationMinute() }}
                                                            hr</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- ./Ajax Page Main Content -->
    </div>
    <!-- container-fluid -->
</div>


<!-- Bootstrap rating js -->
<script src="{{ URL::asset('assets/libs/bootstrap-rating/bootstrap-rating.min.js') }}"></script>

<!-- Range slider init js -->
<script src="{{ URL::asset('assets/js/pages/rating.init.js') }}"></script>

<script>
    $(document).ready(function() {
        $(".videocontainer").mouseenter(function() {
            var previewVideo = $(this).parent(".card").find(".previewVideo");
            previewVideo.trigger('play');
        })

        $(".videocontainer").mouseleave(function(event) {
            var previewVideo = $(this).parent(".card").find(".previewVideo");
            previewVideo.trigger('load');
        })

        $(".favoriteMark").click(function() {
            var favoriteMark = $(this);
            var lessonid = $(this).attr('lessonid');
            var favorite = $(this).attr('favorite');

            $.ajax({
                url: '/lesson_favorite',
                data: {
                    lessonid: lessonid,
                    favorite: favorite,
                },
                success: function(response) {
                    console.log("favorite", response)
                    favoriteMark.attr('favorite', response)
                    if (response == '0') {
                        favoriteMark.find("i").attr("class", "far fa-bookmark")
                    } else if (response == '1') {
                        favoriteMark.find("i").attr("class", "fas fa-bookmark")
                    }
                }
            })
        })

        $(".ratingbar").change(function() {
            var lessonid = $(this).attr('lessonid');
            var rating = $(this).val();

            $.ajax({
                url: '/lesson_rating',
                data: {
                    lessonid: lessonid,
                    rating: rating,
                },
                success: function(response) {
                    console.log("rating", response)
                }
            })
        })

    });

    function goToShowpage(id) {
        location.hash="#lesson-show-"+id;       
    }

</script>
