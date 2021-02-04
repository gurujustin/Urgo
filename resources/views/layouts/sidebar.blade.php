
<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu border-right sidebar-collapsed">

    <div data-simplebar class="h-100">
        
        <!-- LOGO -->
        <div class="position-relative border-0" >
            
            <a href="javascript:loadAccountSettingModal()">
                <div class="d-flex flex-column justify-content-center align-items-center bg-white" style="width:100%; left:0; margin-top:44px;">
                
                    <div class="position-relative rounded-circle" style="width: 104px; height:104px; background: #0B81FC; margin-left: -16.5px;">
                        <div class="position-absolute bg-white rounded-circle" style="width:102px; height:102px; left: 1px; top: 1px;"></div>
                        <img id="sidebar-avatar" class="position-absolute rounded-circle avatar-xl" 
                              alt="98x98" 
                              src="{{ isset(Auth::user()->avatar) ? asset(Auth::user()->avatar) : asset('/assets/images/users/avatar-5.jpg') }}" data-holder-rendered="true" 
                              style="width:98px; height:98px; top: 3px; left:3px;">
                        
                        <div class="position-absolute d-flex justify-content-center align-items-center" style="width:35px; height:17px; border-radius:15px; text-align:center; font-size:10px; letter-spacing:0.142em; font-weight: 400;  top:11px; right:-3px;  color:white; background: rgb(120,192,255); background: linear-gradient(90deg, rgba(120,192,255,1) 3%, rgba(162,161,224,1) 63%); " >
                            <span>VIP</span>
                        </div>
                    </div>
                    
                    <div class="dropdown" style="margin-top:14px;">
                    <!-- 6px text space -->
                        <span class="dropdown-toggle text-dark my-2" id="dropdownMenuButton" data-toggle="dropdown2" aria-haspopup="true" aria-expanded="false"><span style="font-size:20px; font-family: 'Poppins', sans-serif; font-weight: 500; letter-spacing:0.125em"> 
                            {{ ucfirst(Auth::user()->first_name) }} {{ ucfirst(Auth::user()->last_name) }} </span>
                        <span>
                            <svg style="margin-top:-6px;" xmlns="http://www.w3.org/2000/svg" width="11.173" height="6.443" viewBox="0 0 11.173 6.443">
                                <path id="Path_902" data-name="Path 902" d="M2027.456,247.626l-3.927,3.927a.348.348,0,0,1-.492,0q-1.959-1.964-3.926-3.925" transform="translate(-2017.697 -246.212)" fill="none" stroke="#a5a9b7" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2"/>
                                </svg>
                            </span>
                        </span>
                        <div class="" style="font-size:14px; letter-spacing:0.142em; color:#1B87FC; margin-top:5px;font-family:'Poppins', sans-serif; font-weight:400 ;text-align: center;">
                            <span href="javascript::void()" class="text-uppercase">edit profile</span>
                        </div>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        
        <!-- Get Support btn -->
        <div id="get-support" class="position-fixed">
            <a href="">
                <svg id="Iconly_Light_Profile" data-name="Iconly/Light/Profile" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22">
                  <g id="Profile" transform="translate(3.667 2.292)">
                    <circle id="Ellipse_736" cx="4.38" cy="4.38" r="4.38" transform="translate(2.568 0)" fill="none" stroke="#087cfc" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                    <path id="Path_33945" d="M0,2.765a2.031,2.031,0,0,1,.2-.889A3.705,3.705,0,0,1,2.786.39a15.388,15.388,0,0,1,2.148-.3,22.965,22.965,0,0,1,4.019,0A15.564,15.564,0,0,1,11.1.39a3.565,3.565,0,0,1,2.584,1.485,2.081,2.081,0,0,1,0,1.787A3.53,3.53,0,0,1,11.1,5.139a14.407,14.407,0,0,1-2.148.31A23.67,23.67,0,0,1,5.68,5.5a3.727,3.727,0,0,1-.747-.05,14.138,14.138,0,0,1-2.14-.31A3.547,3.547,0,0,1,.2,3.662,2.089,2.089,0,0,1,0,2.765Z" transform="translate(0 12.087)" fill="none" stroke="#087cfc" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                  </g>
                </svg>
                <span>Get Support</span> 
            </a>
        </div>
        
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <!-- This project Menu Start -->
                <li>
                    <a href="/" class=" waves-effect">
                            <svg id="Iconly_Light_Home" data-name="Iconly/Light/Home" xmlns="http://www.w3.org/2000/svg" width="17.552" height="17.552" viewBox="0 0 17.552 17.552">
                              <g id="Home" transform="translate(1.828 1.463)">
                                <path id="Home-2" data-name="Home" d="M4.869,13.728V11.486A1.043,1.043,0,0,1,5.91,10.448H8.021a1.043,1.043,0,0,1,1.048,1.038h0v2.25a.9.9,0,0,0,.879.892h1.407a2.527,2.527,0,0,0,2.54-2.514h0V5.732a1.784,1.784,0,0,0-.7-1.393L8.38.5A2.326,2.326,0,0,0,5.495.5L.7,4.346A1.77,1.77,0,0,0,0,5.739v6.373a2.527,2.527,0,0,0,2.54,2.514H3.947a.9.9,0,0,0,.908-.9h0" transform="translate(0 0)" fill="none" stroke="#775cdc" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                              </g>
                            </svg>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="menu-title" style="margin-top:7px;">training</li>

                <li style="margin-top:-5px;">
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <svg id="Iconly_Light_Play" data-name="Iconly/Light/Play" xmlns="http://www.w3.org/2000/svg" width="17.552" height="17.552" viewBox="0 0 17.552 17.552">
                          <g id="Play" transform="translate(1.463 1.463)">
                            <path id="Stroke_1" data-name="Stroke 1" d="M7.313,0A7.313,7.313,0,1,1,0,7.313,7.313,7.313,0,0,1,7.313,0Z" fill="none" stroke="#775cdc" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                            <path id="Stroke_3" data-name="Stroke 3" d="M3.774,2.9a10.908,10.908,0,0,1-2.726,1.86,2.913,2.913,0,0,1-.486.157.369.369,0,0,1-.336-.2,3.832,3.832,0,0,1-.121-.5A12.144,12.144,0,0,1,0,2.46,11.427,11.427,0,0,1,.116.643C.136.529.2.266.214.224A.364.364,0,0,1,.379.044.362.362,0,0,1,.562,0,2.552,2.552,0,0,1,.982.13,10.811,10.811,0,0,1,3.766,2.008c.05.053.186.2.209.226a.367.367,0,0,1,.008.44C3.96,2.708,3.82,2.854,3.774,2.9Z" transform="translate(5.77 4.752)" fill="none" stroke="#775cdc" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                          </g>
                        </svg>

                        <span>Training System</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">The Gameplan</a></li>
                        <li style="margin-top:-1px"><a class="ajax-menu" href="#lesson-overview-1">Phase 1: Product Selection</a>
                        </li>
                        <li  style="margin-top:-2px"><a class="ajax-menu" href="#lesson-overview-2">Phase 2: Store Creation</a>
                        </li>
                        <li  style="margin-top:-2px"><a class="ajax-menu" href="#lesson-overview-3">Phase 3: Facebook Ads</a></li>
                        <li><a class="ajax-menu" href="#lesson-overview-4">Phase 4: Scaling</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#playbook-overview" class=" waves-effect ajax-menu">
                        <svg id="Iconly_Light_Activity" data-name="Iconly/Light/Activity" xmlns="http://www.w3.org/2000/svg" width="17.659" height="17.659" viewBox="0 0 17.659 17.659">
                          <g id="Activity" transform="translate(2.044 1.676)">
                            <path id="Path_33966" d="M0,3.671,2.2.808,4.714,2.782,6.87,0" transform="translate(3.287 5.529)" fill="none" stroke="#775cdc" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                            <circle id="Ellipse_741" cx="1.414" cy="1.414" r="1.414" transform="translate(11.254 0)" fill="none" stroke="#775cdc" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                            <path id="Path" d="M8.937,0H3.59A3.483,3.483,0,0,0,0,3.785V9.732A3.463,3.463,0,0,0,3.59,13.51H9.92a3.477,3.477,0,0,0,3.59-3.778V4.553" transform="translate(0 0.62)" fill="none" stroke="#775cdc" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                          </g>
                        </svg>

                        <span>The Playbook</span>
                    </a>
                </li>

                <li style="margin-top:-5px;">
                    <a href="javascript: void(0);" class=" waves-effect">
                        <svg id="Iconly_Light_Video" data-name="Iconly/Light/Video" xmlns="http://www.w3.org/2000/svg" width="17.552" height="17.552" viewBox="0 0 17.552 17.552">
                          <g id="Video" transform="translate(1.865 3.84)">
                            <path id="Stroke_1" data-name="Stroke 1" d="M9.7,7.584A2.393,2.393,0,0,1,7.12,10.071H2.574A2.388,2.388,0,0,1,0,7.584V2.494A2.4,2.4,0,0,1,2.582,0H7.12A2.4,2.4,0,0,1,9.7,2.494Z" fill="none" stroke="#775cdc" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                            <path id="Stroke_3" data-name="Stroke 3" d="M0,2.62,3,.167a.734.734,0,0,1,1.2.568V5.761A.734.734,0,0,1,3,6.329L0,3.876" transform="translate(9.702 1.787)" fill="none" stroke="#775cdc" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                          </g>
                        </svg>

                        <span>Coaching Calls</span>
                    </a>
                </li>

                <li class="menu-title" style="margin-top: 12px;">products</li>

                <li style="margin-top:-8px;">
                    <a href="/ad-input" class="waves-effect">
                        <svg id="Iconly_Light_Bag_2" data-name="Iconly/Light/Bag 2" xmlns="http://www.w3.org/2000/svg" width="17.552" height="17.552" viewBox="0 0 17.552 17.552">
                          <g id="Bag_2" data-name="Bag 2" transform="translate(2.194 1.828)">
                            <path id="Stroke_1" data-name="Stroke 1" d="M5.53,4.977V2.759A2.765,2.765,0,0,0,0,2.747v2.23" transform="translate(3.811)" fill="none" stroke="#775cdc" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                            <path id="Stroke_3" data-name="Stroke 3" d="M10.05,10.258H3.114A3.113,3.113,0,0,1,0,7.146V3.112A3.113,3.113,0,0,1,3.114,0H10.05a3.113,3.113,0,0,1,3.114,3.112V7.146A3.113,3.113,0,0,1,10.05,10.258Z" transform="translate(0 3.272)" fill="none" stroke="#775cdc" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                          </g>
                        </svg>

                        <span>Potential Products</span>
                    </a>
                </li>

                <li style="margin-top:-7px;">
                    <a href="#" class=" waves-effect">
                        <svg id="Iconly_Light_Star" data-name="Iconly/Light/Star" xmlns="http://www.w3.org/2000/svg" width="17.552" height="17.552" viewBox="0 0 17.552 17.552">
                          <g id="Star" transform="translate(1.828 2.194)">
                            <path id="Star-2" data-name="Star" d="M7.47.322,9.164,3.73a.584.584,0,0,0,.439.32l3.792.548a.583.583,0,0,1,.386.224.563.563,0,0,1-.062.755L10.97,8.233a.557.557,0,0,0-.165.513l.658,3.75a.576.576,0,0,1-.477.652.635.635,0,0,1-.377-.059L7.232,11.32a.567.567,0,0,0-.543,0l-3.4,1.78a.594.594,0,0,1-.788-.241.582.582,0,0,1-.059-.366L3.1,8.742a.576.576,0,0,0-.165-.512L.17,5.573a.574.574,0,0,1,0-.813l0,0A.665.665,0,0,1,.5,4.595l3.793-.548a.594.594,0,0,0,.439-.32L6.424.322A.575.575,0,0,1,6.759.03a.584.584,0,0,1,.446.032A.6.6,0,0,1,7.47.322Z" transform="translate(0)" fill="none" stroke="#775cdc" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                          </g>
                        </svg>
                        <span>My Products</span>
                    </a>
                </li>

                <li class="menu-title" style="margin-top:5px">tools</li>

                <li style="margin-top: -8px;">
                    <a href="#" class=" waves-effect">
                        <svg id="Iconly_Light_Buy" data-name="Iconly/Light/Buy" xmlns="http://www.w3.org/2000/svg" width="17.659" height="17.659" viewBox="0 0 17.659 17.659">
                          <g id="Buy" transform="translate(2.023 2.391)">
                            <path id="Stroke_1" data-name="Stroke 1" d="M.562,0A.563.563,0,1,1,0,.563.563.563,0,0,1,.562,0Z" transform="translate(2.876 12.192)" fill="none" stroke="#775cdc" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                            <path id="Stroke_3" data-name="Stroke 3" d="M.563,0A.563.563,0,1,1,0,.563.563.563,0,0,1,.563,0Z" transform="translate(11.154 12.192)" fill="none" stroke="#775cdc" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                            <path id="Stroke_5" data-name="Stroke 5" d="M0,0,1.53.265l.709,8.442A1.326,1.326,0,0,0,3.561,9.923H11.59A1.327,1.327,0,0,0,12.9,8.785l.7-4.825a.986.986,0,0,0-.976-1.128H1.776" transform="translate(0)" fill="none" stroke="#775cdc" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                            <path id="Stroke_7" data-name="Stroke 7" d="M0,.5H2.04" transform="translate(8.37 5.051)" fill="none" stroke="#775cdc" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                          </g>
                        </svg>
                        <span>Elite Theme</span>
                    </a>
                </li>

                <li style="margin-top: -4px;">
                    <a href="{{ route('playbook_index') }}" class=" waves-effect">
                        <svg id="Iconly_Light_Document" data-name="Iconly/Light/Document" xmlns="http://www.w3.org/2000/svg" width="17.659" height="17.659" viewBox="0 0 17.659 17.659">
                          <g id="Document" transform="translate(2.76 2.023)">
                            <path id="Stroke_1" data-name="Stroke 1" d="M5.312.5H0" transform="translate(3.492 9.414)" fill="none" stroke="#775cdc" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                            <path id="Stroke_2" data-name="Stroke 2" d="M5.312.5H0" transform="translate(3.492 6.333)" fill="none" stroke="#775cdc" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                            <path id="Stroke_3" data-name="Stroke 3" d="M2.027.5H0" transform="translate(3.492 3.26)" fill="none" stroke="#775cdc" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                            <path id="Stroke_4" data-name="Stroke 4" d="M8.946,0,3.288,0A3.127,3.127,0,0,0,0,3.39v6.766a3.13,3.13,0,0,0,3.315,3.39l5.657,0a3.129,3.129,0,0,0,3.289-3.388V3.39A3.131,3.131,0,0,0,8.946,0Z" transform="translate(0 0)" fill="none" stroke="#775cdc" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                          </g>
                        </svg>
                        <span>Ad Library</span>
                    </a>
                </li>

                <li style="margin-top: -4px;">
                    <a href="#" class=" waves-effect">
                        <svg id="Iconly_Light_Discovery" data-name="Iconly/Light/Discovery" xmlns="http://www.w3.org/2000/svg" width="17.659" height="17.659" viewBox="0 0 17.659 17.659">
                          <g id="Discovery" transform="translate(1.472 1.472)">
                            <path id="Path_33947" d="M0,4.916,1.172,1.172,4.916,0,3.745,3.745Z" transform="translate(4.613 4.613)" fill="none" stroke="#775cdc" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                            <circle id="Ellipse_738" cx="7.072" cy="7.072" r="7.072" transform="translate(0 0)" fill="none" stroke="#775cdc" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                          </g>
                        </svg>
                        <span>Store Library</span>
                    </a>
                </li>

                <li style="margin-top: -4px;">
                    <a href="#" class=" waves-effect">
                        <svg id="Iconly_Light_Category" data-name="Iconly/Light/Category" xmlns="http://www.w3.org/2000/svg" width="17.659" height="17.659" viewBox="0 0 17.659 17.659">
                          <g id="Category" transform="translate(1.472 1.472)">
                            <path id="Stroke_1" data-name="Stroke 1" d="M1.8,0h2.4a1.81,1.81,0,0,1,1.8,1.818V4.241a1.81,1.81,0,0,1-1.8,1.818H1.8A1.81,1.81,0,0,1,0,4.241V1.818A1.81,1.81,0,0,1,1.8,0Z" transform="translate(8.709 0)" fill="none" stroke="#775cdc" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                            <path id="Stroke_3" data-name="Stroke 3" d="M1.8,0H4.2a1.81,1.81,0,0,1,1.8,1.818V4.241A1.81,1.81,0,0,1,4.2,6.059H1.8A1.81,1.81,0,0,1,0,4.241V1.818A1.81,1.81,0,0,1,1.8,0Z" transform="translate(0 0)" fill="none" stroke="#775cdc" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                            <path id="Stroke_5" data-name="Stroke 5" d="M1.8,0H4.2a1.81,1.81,0,0,1,1.8,1.818V4.241A1.81,1.81,0,0,1,4.2,6.059H1.8A1.81,1.81,0,0,1,0,4.241V1.818A1.81,1.81,0,0,1,1.8,0Z" transform="translate(0 8.657)" fill="none" stroke="#775cdc" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                            <path id="Stroke_7" data-name="Stroke 7" d="M1.8,0h2.4a1.81,1.81,0,0,1,1.8,1.818V4.241a1.81,1.81,0,0,1-1.8,1.818H1.8A1.81,1.81,0,0,1,0,4.241V1.818A1.81,1.81,0,0,1,1.8,0Z" transform="translate(8.709 8.657)" fill="none" stroke="#775cdc" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                          </g>
                        </svg>
                        <span>Creative Assets</span>
                    </a>
                </li>

                <li class="menu-title"></li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->


<!-- sample modal content -->
<div id="accountsettingModal" class="modal fade bs-example-modal-center" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true">

</div><!-- /.modal -->



