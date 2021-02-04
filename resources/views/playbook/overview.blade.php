<!-- Bootstrap Rating css -->
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/bootstrap-rating/bootstrap-rating.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/page-playbook-overview.css') }}">
<div class="page-content playbook-overview-page-content">
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
                <div class="col-md-6">
                    <div class="embed-responsive embed-responsive-16by9">
                        <video id="overviewvideo" width="400" controls>
                            <source src="{{ asset('/assets/videos/hover.mp4') }}" type="video/mp4">                          
                        </video>
                    </div>
                </div>
                <div class="col-md-6">
                    <h1>The Playbook</h1>
                    <p>
                        Some quick example text to build on the card title and make up the bulk of the card's content.
                    </p>
                </div>
            </div>
            {{-- Nav pills --}}
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

            
            {{-- Tab content --}}
            <div class="tab-content" style="padding:0 8%">               
                @foreach ($categories as $index=> $category)
                    <div class="tab-pane @if ($index==0) active @endif" id="category{{ $category->id }}" role="tabpanel">
                        <div class="row">
                            @foreach ($playbooks as $playbook)
                                @if ($playbook->category == $category->id)
                                    <div class="col-md-2 col-xl-2">
                                        <div class="card s-playbook-card  @if ($playbook->isNew()) s-new-playbook @endif" onclick="goToShowpage('{{$playbook->id}}')">                                        
                                            <div class="aspect-ratio-box">
                                                <img src="{{ $playbook->caseimage }}" alt=""/>
                                            </div>
                                            <div class="s-playbook-title">
                                                <i class="fas fa-file-pdf"></i> {{$playbook->title}}
                                            </div>  
                                            <span class="badge badge-primary s-new-badge">New</span>
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



<script>
    $(document).ready(function() {       
    });

    function goToShowpage(id) { 
        location.hash="#playbook-show-"+id;           
    }
</script>
