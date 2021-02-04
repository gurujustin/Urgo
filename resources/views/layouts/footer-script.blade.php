        <!-- JAVASCRIPT -->
        <script src="{{ URL::asset('assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ URL::asset('assets/libs/bootstrap/bootstrap.min.js') }}"></script>
        <script src="{{ URL::asset('assets/libs/metismenu/metismenu.min.js') }}"></script>
        <script src="{{ URL::asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ URL::asset('assets/libs/node-waves/node-waves.min.js') }}"></script>
        <script src="{{ URL::asset('assets/js/pages/boxicons.init.js') }}"></script>

        @yield('script')

        <!-- App js -->
        <script src="{{ URL::asset('assets/js/app.min.js') }}"></script>
        <script>
            
            $(window).on('hashchange', function (e) {
                refreshContent()
            });
            
            if (window.location.hash) {
                $(window).trigger('hashchange')
            }
            
            function refreshContent() {
                var hash = window.location.hash.substring(1);
                console.log('hash',hash);
                var url="{{ url('')}}"+'/'+hash;
                console.log('targetPage: ', url);    
                ajaxLoadPage(url);           
            }

            function ajaxLoadPage(url) {
                $.ajax({
                    url: url,
                    beforeSend: function() {
                        $(".main-content").hide();
                        $(".ajax-loader").show();
                    },
                    success: function(content) {
                        wWidth = $(window).outerWidth();
                        // screen is lg
                        if(wWidth <= 992) {
                            $('#status2').css('left', '50%');
                        }else {
                            $('#status2').css('left', 'calc(50% + 125px)');
                        }
                        $(".main-content").html(content);
                        $(".ajax-loader").hide();
                        $(".main-content").show();
                    }
                })
            }
            
            function loadAccountSettingModal(){       
                $.ajax({
                    url: '{{route('user_settingmodal')}}',
                    success:function(content){
                        $("#accountsettingModal").html(content);
                        $("#accountsettingModal").modal('show');
                    }
                })
            }
            
            function chooseavatar(){
                $("#avatar_file").click();
            }
            
            function previewAvatar(event) {
                var output = document.getElementById('settingavatarimage');
                output.src = URL.createObjectURL(event.target.files[0]);
                output.onload = function() {
                    URL.revokeObjectURL(output.src) // free memory
                }
                
                const fd = new FormData();
                fd.append('avatar', event.target.files[0]);
                fd.append('user', 'userid');
                $.ajax({
                    url: '{{route('upload_img')}}',
                    type: 'POST',
                    data: fd,
                    cache:false,
                    contentType: false,
                    processData: false,
                    success: function() {
                        
                    }
                })
            }
            
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                
                
                $('#sidebar-menu #side-menu a.ajax-menu').click(function(e) {                  
                    $('#sidebar-menu  #side-menu li').removeClass('mm-active');
                    $(this).parent('li').addClass('mm-active');

                    $('#sidebar-menu  #side-menu li a').removeClass('active');
                    $(this).addClass('active');
                });
            })
            
            
            $('body').attr('data-sidebar', 'light');
        </script>
        @yield('script-bottom')
