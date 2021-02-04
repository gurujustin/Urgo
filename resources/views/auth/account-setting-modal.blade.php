<div id="account-setting-modal" class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-body p-0">
            <div class="top-area">
                
                <div class="position-relative">
                    <div class="profile-img position-absolute">
                        <img id="settingavatarimage" 
                            class="rounded-circle "  
                            src="{{ isset(Auth::user()->avatar) ? asset(Auth::user()->avatar) : asset('/assets/images/users/avatar-5.jpg') }}"
                            alt="User Avatar">
                        <div class="dark-opacity" onclick="chooseavatar()"></div>
                        <div class="position-absolute vip" >VIP</div>
                        <span class="camera" onclick="chooseavatar()">
                            <svg id="photo-camera-interface-symbol-for-button" xmlns="http://www.w3.org/2000/svg" width="33.046" height="26.907" viewBox="0 0 33.046 26.907">
                                <path id="Path_970" data-name="Path 970" d="M21.852,19.043a5.329,5.329,0,1,1-5.329-5.329A5.335,5.335,0,0,1,21.852,19.043Zm11.193-7.568V26.613a3.654,3.654,0,0,1-3.654,3.654H3.654A3.654,3.654,0,0,1,0,26.613V11.476A3.654,3.654,0,0,1,3.654,7.822H8.149V6.557a3.2,3.2,0,0,1,3.2-3.2H21.7a3.2,3.2,0,0,1,3.2,3.2V7.821h4.495A3.656,3.656,0,0,1,33.046,11.476Zm-8.453,7.568a8.07,8.07,0,1,0-8.07,8.07A8.079,8.079,0,0,0,24.593,19.043Z" transform="translate(0 -3.36)" fill="#fff"/>
                            </svg>
                        </span>
                    </div>
                    <input type="file" id="avatar_file" name="avatar" accept="image/*" style="display: none;"
                        onchange="previewAvatar(event)" />
                </div>
                
                <div class="text-center user-name">
                    <div>{{ucfirst(Auth::user()->first_name)}} {{ucfirst(Auth::user()->last_name)}}</div>
                    <span>VIP MEMBER</span>
                </div>
                
                <!-- Tab -->
                <ul class="nav nav-justified align-items-end" id="_tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="pill" href="#profile-home" role="tab" aria-controls="profile-home" aria-selected="false">Profile Settings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" id="account-tab" data-toggle="pill" href="#account-home" role="tab" aria-controls="account-home" aria-selected="true">Account Settings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="membership-tab" data-toggle="pill" href="#membership-home" role="tab" aria-controls="membership-home" aria-selected="false">Membership</a>
                    </li>
                </ul>
            </div>
            
            <!-- Tab Content -->
            <div class="tab-content my-5 px-3" id="pills-tabContent">
                <div class="tab-pane fade" id="profile-home" role="tabpanel" aria-labelledby="profile-tab">
                    <form action="{{route('user_updateprofile')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">First name</label>
                                    <input type="text" class="form-control" value="{{ucfirst(Auth::user()->first_name)}}"
                                        name="first_name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Last name</label>
                                    <input type="text" class="form-control" value="{{ucfirst(Auth::user()->last_name)}}"
                                        name="last_name">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="formrow-firstname-input">Email Address</label>
                            <input type="text" class="form-control" value="{{Auth::user()->email}}" name="email">
                        </div>
                        <div class="form-group position-relative">
                            <label for="formrow-firstname-input">Current Password</label>
                            <input type="password" class="form-control" name="current_password">
                            <i class="bx bx-hide position-absolute show-hide-pass"></i>
                        </div>
                        <div class="form-group position-relative">
                            <label for="formrow-firstname-input">New Password</label>
                            <input type="password" class="form-control" name="new_password">
                            <i class="bx bx-hide position-absolute show-hide-pass"></i>
                        </div>
                        <div class="text-center mt-5 mb-3">
                            <button type="submit" class="btn btn-rounded waves-effect waves-light btn-ugro-primary"
                                style="width:70%; font-size: 17px; padding:13px;">Update Settings &nbsp;&nbsp;<i
                                    class="fas fa-sliders-h  font-size-16 align-middle mr-1"></i></button>
                        </div>
                    </form>
                </div>
                
                <div class="tab-pane fade show active bg-white" id="account-home" role="tabpanel" aria-labelledby="account-tab">
                    <form id="account-settings-form" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">First name</label>
                                    <input type="text" class="form-control" value="{{ucfirst(Auth::user()->first_name)}}"
                                        name="first_name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Last name</label>
                                    <input type="text" class="form-control" value="{{ucfirst(Auth::user()->last_name)}}"
                                        name="last_name">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="formrow-firstname-input">Email Address</label>
                            <input type="text" class="form-control" value="{{Auth::user()->email}}" name="email">
                        </div>
                        <div class="form-group position-relative">
                            <label for="formrow-firstname-input">Current Password</label>
                            <input type="password" class="form-control" name="current_password" autocomplete="off">
                            <i class="bx bx-show position-absolute show-hide-pass"></i>
                        </div>
                        <div class="form-group position-relative">
                            <label for="formrow-firstname-input">New Password</label>
                            <input type="password" class="form-control" name="new_password">
                            <i class="bx bx-show position-absolute show-hide-pass"></i>
                        </div>
                        <div class="text-center mt-5 mb-3">
                            <button type="button" class="btn btn-rounded waves-effect waves-light update-settings">Update Settings
                                <svg xmlns="http://www.w3.org/2000/svg" width="32.567" height="22.205" viewBox="0 0 32.567 22.205">
                                      <g id="Group_292" data-name="Group 292" transform="translate(-1181.921 -834.656)">
                                        <path id="Path_80" data-name="Path 80" d="M1207.753,836.876a2.953,2.953,0,0,0-2.887-2.22,3.02,3.02,0,0,0-2.887,2.22h-20.058v1.48h20.058a2.955,2.955,0,0,0,2.887,2.221,3.018,3.018,0,0,0,2.887-2.221h6.735v-1.48Zm-2.887,2.221a1.48,1.48,0,1,1,1.481-1.481A1.485,1.485,0,0,1,1204.866,839.1Z" fill="#fff"/>
                                        <path id="Path_81" data-name="Path 81" d="M1204.866,850.939a3.021,3.021,0,0,0-2.887,2.221h-20.058v1.48h20.058a2.955,2.955,0,0,0,2.887,2.221,3.018,3.018,0,0,0,2.887-2.221h6.735v-1.48h-6.735A3.02,3.02,0,0,0,1204.866,850.939Zm0,4.441a1.48,1.48,0,1,1,1.481-1.48A1.484,1.484,0,0,1,1204.866,855.38Z" fill="#fff"/>
                                        <path id="Path_82" data-name="Path 82" d="M1191.543,842.8a3.021,3.021,0,0,0-2.887,2.221h-6.735v1.48h6.735a2.954,2.954,0,0,0,2.887,2.221,3.019,3.019,0,0,0,2.887-2.221h20.058v-1.48H1194.43A3.02,3.02,0,0,0,1191.543,842.8Zm0,4.442a1.48,1.48,0,1,1,1.48-1.481A1.485,1.485,0,0,1,1191.543,847.239Z" fill="#fff"/>
                                      </g>
                                    </svg>

                            </button>
                        </div>
                    </form>
                </div>
    
                <div class="tab-pane fade" id="membership-home" role="tabpanel" aria-labelledby="membership-tab">
                    <form action="{{route('user_updateprofile')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">First name</label>
                                    <input type="text" class="form-control" value="{{ucfirst(Auth::user()->first_name)}}"
                                        name="first_name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Last name</label>
                                    <input type="text" class="form-control" value="{{ucfirst(Auth::user()->last_name)}}"
                                        name="last_name">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="formrow-firstname-input">Email Address</label>
                            <input type="text" class="form-control" value="{{Auth::user()->email}}" name="email">
                        </div>
                        <div class="form-group position-relative">
                            <label for="formrow-firstname-input">Current Password</label>
                            <input type="password" class="form-control" name="current_password">
                            <i class="bx bx-hide position-absolute show-hide-pass"></i>
                        </div>
                        <div class="form-group position-relative">
                            <label for="formrow-firstname-input">New Password</label>
                            <input type="password" class="form-control" name="new_password">
                            <i class="bx bx-hide position-absolute show-hide-pass"></i>
                        </div>
                        <div class="text-center mt-5 mb-3">
                            <button type="submit" class="btn btn-rounded waves-effect waves-light btn-ugro-primary"
                                style="width:70%; font-size: 17px; padding:13px;">Update Settings &nbsp;&nbsp;<i
                                    class="fas fa-sliders-h  font-size-16 align-middle mr-1"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            
            
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->


<script>
    $(document).ready(function() {
        $('.show-hide-pass').click(function() {
            const classSet = $(this).attr('class');
            if(classSet.indexOf('bx-show') > -1) {
                const updatedClassSet = classSet.replace('bx-show', 'bx-hide');
                $(this).attr('class', updatedClassSet);
                $(this).closest('.form-group').find('input').attr('type', 'text');
            }else {
                const updatedClassSet = classSet.replace('bx-hide', 'bx-show');
                $(this).attr('class', updatedClassSet);
                $(this).closest('.form-group').find('input').attr('type', 'password');
            }
        });
        
        $('.update-settings').click(function(e) {
            e.preventDefault();
            
            
            
            $.ajax({
                url: '{{ url('update-account-settings')}}',
                type: 'POST',
                datatype: 'json',
                data: $("#account-settings-form").serialize(),
                cache: false,
                success: function(data) {
                    location.reload();
                }
            })
            
        })
    })
</script>