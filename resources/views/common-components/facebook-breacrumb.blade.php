 <!-- start page title -->
 <div class="row">
     <div class="col-12">
         <div class="page-title-box d-flex align-items-center justify-content-between">
         
             <h2 class="mb-0 font-size-18">{{ $title }}</h2>

             <div class="page-title-right">
                 <ol class="breadcrumb m-0">
                     <li class="breadcrumb-item" style="cursor:point">
                        <button type="button" class="btn btn-outling-dark waves-effect waves-light" data-toggle="modal">
                            <i class="mdi mdi-head-question-outline"></i>
                        </button>
                     </li>
                     @if(isset($li_2))
                     <li class="breadcrumb-item" style="cursor:point">
                        <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                                    data-target="#myModal">
                            Add New
                        </button>
                     </li>
                     @endif
                 </ol>
             </div>
             <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" style="display:block !important">
                            <div style="display:flex;justify-content:center">
                                <img class="rounded-circle header-profile-user"
                                src="{{ isset(Auth::user()->avatar) ? asset(Auth::user()->avatar) : asset('/assets/users-7@2x.png') }}"
                                alt="Header Avatar" style="width:100px;height:100px;align-item:center;border:1px solid #0058ff;">
                            </div>
                            <br />
                            <div style="display:flex;justify-content:center">
                                <h3 class="modal-title mt-0" id="myModalLabel">Add a new facebook ad</h3>
                            </div>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('fbad.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="fb-title" class="col-md-12 col-form-label">Facebook Ad Title</label>
                                    <div class="col-md-12">
                                        <input name="title" class="form-control" type="text" placeholder="Give you ad a name here" id="fb-title">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="fb-group" class="col-md-12 col-form-label">Facebook Ad Group</label>
                                    <div class="col-md-12">
                                        <input name="group" class="form-control" type="text" placeholder="Enter your ad group name here" id="fb-group">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="fb-url" class="col-md-12 col-form-label">Facebook Ad Post Url</label>
                                    <div class="col-md-12">
                                        <input name="url" class="form-control" type="text" placeholder="Enter the facebook post URL here" id="fb-url">
                                    </div>
                                </div>
                                {{-- <div class="form-group">
                                    <input name="title"  type="text" class="form-control" placeholder="Facebook Ad title">
                                </div>
                                <div class="form-group">
                                    <input name="group" type="text" class="form-control" placeholder="Facebook Ad Group">
                                </div>
                                <div class="form-group">
                                    <input name="url" type="text" class="form-control" placeholder="Facebook Ad Post Url">
                                </div> --}}
                                <button type="button" class="btn btn-primary waves-effect waves-light form-control" id="download_facebook_ads">
                                    Add</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            
                            <button type="button" class="btn btn-outling-dark waves-effect form-control"
                                data-dismiss="modal">Cancel</button>
                            <div class="col-12" id="download-progress-bar" style="display:block">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated" id="progress-bar" role="progressbar"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>

         </div>
     </div>
 </div>
 <!-- end page title -->