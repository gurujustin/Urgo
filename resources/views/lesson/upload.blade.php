<!DOCTYPE html>
<html>

<head>
    <title>Laravel 7 Ajax File Upload with Progress Bar Example</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
    <style>
        .progress {
            position: relative;
            width: 100%;
        }

        .bar {
            background-color: #00ff00;
            width: 0%;
            height: 20px;
        }

        .percent {
            position: absolute;
            display: inline-block;
            left: 50%;
            color: #040608;
        }
    </style>
</head>

<body class="bg-dark">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Lesson Video File Upload</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('lesson_saveuploadfile') }}" enctype="multipart/form-data">
                            @csrf
                            <input hidden name="id" value="{{$lesson->id}}" />
                            <div class="form-group">
                                <p>Lesson Phase: Phase {{@$lesson->getCategory->phase}}</p>
                                <p>Lesson Category: {{@$lesson->getCategory->title}}</p>
                                <p>Lesson Title: {{@$lesson->title}}</p>
                                <p style="color:red">Please choose file and upload to server. Please wait until the
                                    progress is 100% and you can see success alert!</p>
                            </div>
                            <div class="form-group">
                                <input name="bigfile" type="file" class="form-control"><br />
                                <div class="progress">
                                    <div class="bar"></div>
                                    <div class="percent">0%</div>
                                </div>

                                <br>
                                <input type="submit" value="Upload To Server" class="btn btn-primary">
                            </div>
                        </form>
                        <a class="btn btn-info" href="{{route('lesson_index')}}">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var SITEURL = "{{URL('/')}}";
        $(function() {
            $(document).ready(function()
            {
                var bar = $('.bar');
                var percent = $('.percent');
                $('form').ajaxForm({
                    beforeSend: function() {
                        var percentVal = '0%';
                        bar.width(percentVal)
                        percent.html(percentVal);
                    },
                    uploadProgress: function(event, position, total, percentComplete) {
                        var percentVal = percentComplete + '%';
                        bar.width(percentVal)
                        percent.html(percentVal);
                    },
                    complete: function(xhr) {
                        console.log(xhr)
                        if(xhr.status==200){
                            alert('File Has Been Uploaded Successfully');
                        }else if(xhr.status==413){
                            alert('Error!! File Too Large, Failed');
                        }else{
                            alert('Error!! Failed');
                        }                
                        window.location.href = '{{route('lesson_index')}}';
                    }
                });
            }); 
        });
    </script>
</body>

</html>