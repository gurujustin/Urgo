@extends('layouts.master')

@section('title') Playbook Management @endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/custom-style.css')}}">
@endsection

@section('content')
    @component('common-components.facebook-breacrumb')
        @slot('title') The Facebook Ad Library @endslot
        @slot('li_1') ADLibrary @endslot
        @slot('li_2') List @endslot
    @endcomponent

    
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <div class="col-8">
                <ul class="nav nav-pills ugro-nav-pills" role="tablist">
                    <li class="nav-item waves-effect waves-light btn-rounded">
                        <a class="nav-link active"
                            data-toggle="tab" href="#proven-winner" role="tab">
                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                            <span class="d-none d-sm-block">
                                <i class="far fa-gem"></i> Proven_Winners
                            </span>
                        </a>
                    </li>
                    <li class="nav-item waves-effect waves-light btn-rounded">
                        <a class="nav-link "
                            data-toggle="tab" href="#my-favourite" role="tab">
                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                            <span class="d-none d-sm-block">
                                <i class="dripicons-star"></i> My Favourites
                            </span>
                        </a>
                    </li>  
                    <li class="nav-item waves-effect waves-light btn-rounded">
                        <a class="nav-link "
                            data-toggle="tab" href="#my-ad-library" role="tab">
                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                            <span class="d-none d-sm-block">
                                <i class="dripicons-folder"></i> My Ad Library
                            </span>
                        </a>
                    </li>  
                    <li class="nav-item waves-effect waves-light btn-rounded">
                        <a class="nav-link "
                            data-toggle="tab" href="#my-ads" role="tab">
                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                            <span class="d-none d-sm-block">
                                <i class="ffab fa-rocketchat"></i> My Ads
                            </span>
                        </a>
                    </li>  
                    <li class="nav-item waves-effect waves-light btn-rounded">
                        <a class="nav-link "
                            data-toggle="tab" href="#thumbnail-vault" role="tab">
                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                            <span class="d-none d-sm-block">
                                <i class="fas fa-file-invoice"></i> Thumbnail vault
                            </span>
                        </a>
                    </li>  
                </ul>
            </div>
            <div class="col-4">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                        <form class="app-search d-none d-lg-block" style="margin-left:15px; padding:0 0 !important">
                            <div class="position-relative">
                                <input type="text" id="edit_search" onkeyup="find_ads()" class="form-control" placeholder="@lang('translation.Ad_Library')">
                                <span class="bx bx-search-alt"></span>
                            </div>
                        </form>
                    </li>
                    <li class="breadcrumb-item active">
                        <div class="dropdown">
                            <button class="btn btn-outline-dark waves-effect waves-light" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-sort-variant"></i> Sort Groups <i class="mdi mdi-chevron-down"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item alphabetically" href="#">Alphabetically</a>
                                <a class="dropdown-item lastmodified" href="#">Last modified</a>
                            </div>
                        </div>
                    </li>
                    <li class="breadcrumb-item">
                        <div class="dropdown">
                            <button class="btn btn-outline-dark waves-effect waves-light" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-auto-upload"></i> Sort ADs <i class="mdi mdi-chevron-down"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item sort-ads" href="#">Most Like ADs</a>
                                <a class="dropdown-item sort-viewed" href="#">Most Viewed Ads</a>
                                <a class="dropdown-item sort-commended" href="#">Most Commended Ads</a>
                                <a class="dropdown-item sort-shared" href="#">Most shared Ads</a>
                                <a class="dropdown-item sort-highlight" href="#">Highlight Video View</a>
                            </div>
                        </div>
                    </li>
                </ol>
            </div>
        </div>
        <div class="col-12">
            <div class="tab-content" style="padding:0 8%">
                <div class="tab-pane active" id="proven-winner" role="tabpanel">
                    <div class="row ads" >
                        @foreach ($fbLib as $item)
                        <div id={{"product_".($item->id)}} class="card ugro-video-tile col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 name">
                            <div class="card-body row">
                                <div class="col-3">
                                    <img src={{$item->logo_img_url."/".$item->id.".png"}} alt="" style="border-radius:50%;">
                                </div>
                                <div class="col-7">
                                    <a href={{$item->url}} target="_blank" class="card-title mt-0">{{$item->title}}</a>
                                    <pre>{{$item->publish_time}}</pre>
                                </div>
                                <div class="col-2">
                                    <i class="{{$item->star==1?"mdi mdi-star":"mdi mdi-star-outline"}}" id="favourite-star"></i>
                                </div>
                            </div>
                            <div class="row" style="padding:0 10px">
                                <p class="poster-description">{{$item->description}}</p>
                            </div>
                            <div style="position: relative" class="videocontainer">
                                <div class="embed-responsive embed-responsive-4by3 ">
                                    <video class="previewVideo" muted="muted" loop
                                        poster={{"/uploads/main/".$item->id.".jpg"}}
                                        style="object-fit: cover;"  onclick="">
                                        <source
                                            src="uploads/lesson/1609786968fZX.mp4"
                                            type="video/mp4">
                                        <source src="" type="video/ogg">
                                        Your browser does not support HTML video.
                                    </video>
                                </div>
                            </div>
                            <div class=" card-body row">
                                <div class="col-6">
                                    <p class="fb-views">{{(($item->views)/1000)."K Likes"}}</p>
                                </div>
                                <div class="col-6">
                                    <p class="fb-comments">{{(($item->comments)/1000)."K Comments"}}</p>
                                    {{-- <p>{{Math.ra}}</p> --}}
                                </div>
                            </div>
                        </div>    
                        @endforeach
                        
                    </div>
                </div>
                <div class="tab-pane" id="my-favourite" role="tabpanel">
                    <h3>There is no downloaded video souce</h3>
                </div>
                <div class="tab-pane " id="my-ad-library" role="tabpanel">
                    <h3>There is no downloaded video souce</h3>
                </div>
                <div class="tab-pane " id="my-ads" role="tabpanel">
                    h3>There is no downloaded video souce</h3>
                </div>
                <div class="tab-pane " id="thumbnail-vault" role="tabpanel">
                    <h3>There is no downloaded video souce</h3>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <!-- Custom javascript-->
    <script src="{{ URL::asset('assets/js/custom-js.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.dellessonlink').click(function(e) {
                e.preventDefault();
                var href = this.href;

                if (confirm('Do you want to delete it?'))
                    location.href = href;
            });
        });

    </script>

    <script>
        $(document).ready(function(){
            $('.ugro-video-tile').each(function(){
                var dataViews = $(this).find('.fb-views').text();
                $(this).attr('fb-views',dataViews);
                var data = $(this).find('h5').text();
                $(this).attr('data-name',data);
                var data = $(this).find('h5').text();
                $(this).attr('data-name',data);
                var fbComment = $(this).find('.fb-comments').text();
                $(this).attr('fb-comments',fbComment);
            });
            $('.alphabetically').click(function(){
                var $wrap = $('.ads');
                $wrap.find('.ugro-video-tile').sort(function(x,y){
                    return x.getAttribute("data-name") > y.getAttribute("data-name")? 1 : -1;
                }).appendTo($wrap);
            });
            $('.sort-ads').click(function(){
                var $wrap = $('.ads');
                $wrap.find('.ugro-video-tile').sort(function(x,y){
                    return x.getAttribute("fb-views") > y.getAttribute("fb-views")? -1 : 1;
                }).appendTo($wrap);
            });
            $('.sort-viewed').click(function(){
                var $wrap = $('.ads');
                $wrap.find('.ugro-video-tile').sort(function(x,y){
                    return x.getAttribute("fb-views") > y.getAttribute("fb-views")? -1 : 1;
                }).appendTo($wrap);
            });
            $('.sort-commended').click(function(){
                var $wrap = $('.ads');
                $wrap.find('.ugro-video-tile').sort(function(x,y){
                    return x.getAttribute("fb-comments") > y.getAttribute("fb-comments")? -1 : 1;
                }).appendTo($wrap);
            })
        });
        function get_id(a_id){
            return document.getElementById(a_id);
        }
        function close_all() {
            for (i = 0; i < 999; i++) {
                var o = get_id("product_" + i);
                if (o) {
                    o.style.display = "none";
                }
            }
                
        }

        function find_ads(){
            close_all();
            var o_edit = get_id("edit_search");
            var str_needle = edit_search.value;
            str_needle = str_needle.toUpperCase();
            var searchStrings = str_needle.split(/\W/);
            
            // I moved this loop outside
            var nameDivs = document.getElementsByClassName("name");
            for (var j = 0, divsLen = nameDivs.length; j < divsLen; j++) {

                // set a counter to zero
                var num = 0;

                // I moved this loop inside
                for (var i = 0, len = searchStrings.length; i < len; i++) {
                    var currentSearch = searchStrings[i].toUpperCase();
                    // only run the search if the text input is not empty (to avoid a blank)
                    if (str_needle !== "") {
                        // if the term is found, add 1 to the counter
                        if (nameDivs[j].textContent.toUpperCase().indexOf(currentSearch) !== -1) {
                            num++;
                        }
                        // display only if all the terms where found
                        if (num == searchStrings.length) {
                            nameDivs[j].style.display = "block";
                        }
                        
                    }else{
                        location.reload();
                    }
                }
            }
        }
        document.querySelector('#download_facebook_ads').onclick = () => {   
            let fb_ad_title = $('input[name$="title"]');
            let fb_ad_group = $('input[name$="group"]');
            let fb_ad_url = $('input[name$="url"]');
            var today = new Date();
            var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
            $.ajax({
                    'url': '{{ route('fbad.store') }}',
                    'type': 'POST',
                    'data': {
                        _token:'{{csrf_token()}}',
                        title : fb_ad_title.val(),
                        group : fb_ad_group.val(), 
                        url : fb_ad_url.val(),
                        logo_img_url : "uploads/avatar",
                        publish_time : date,
                        description : "...........................",
                        main_img_or_video : "/uploads/lesson/1609850236k5W.mp4",
                        emoji : "joke",
                        views : Math.floor(Math.random() * 1140),
                        comments : Math.floor(Math.random() * 2345),
                        share : Math.floor(Math.random() * 9876),
                        ratio : Math.floor(Math.random() * 4567),
                        star : 1,
                    },
                    success: function(response){if(response){console.log(response)}},
                    error: function(response){alert('Error'+response)}
                });
            var current_progress = 0;
            var interval = setInterval(() => {
                current_progress += 5;
                $('#progress-bar')
                .css("width", current_progress + "%")
                .attr("aria-valuenow", current_progress);
                if(current_progress >= 100){
                    clearInterval(interval);
                }
            }, 500);
        }
    </script>
@endsection
