@extends('layouts.master')

@section('title') Lesson List @endsection

@section('css')
<!-- Summernote css -->
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/summernote/summernote.min.css') }}">
@endsection

@section('content')
@component('common-components.breadcrumb')
@slot('title') Lessons List @endslot
@slot('li_1') Lesson @endslot
@slot('li_2') List @endslot
@endcomponent

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a class="btn btn-success" href="{{route('lesson_create')}}">Add Lesson</a>
                <div class="table-responsive mt-3">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Phase</th>
                                <th>Category</th>
                                <th>Order</th>
                                <th>Title</th>
                                <th>Show</th>
                                <th>Upload Video</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lessons as $key=>$lesson)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>Phase {{@$lesson->getCategory->phase}}</td>
                                <td>{{@$lesson->getCategory->title}}</td>
                                <td>{{$lesson->order}}</td>
                                <td>{{$lesson->title}}</td>
                                <td> <a class="btn btn-success" href="#lesson-show-{{$lesson->id}}">Show</button>
                                </td>
                                <td> <a class="btn btn-primary"
                                        href="{{route('lesson_lessonupload', $lesson->id)}}">Upload</a></td>
                                <td> <a class="btn btn-primary" href="{{route('lesson_edit', $lesson->id)}}">Edit</a>
                                </td>
                                <td> <a class="btn btn-danger dellessonlink"
                                        href="{{route('lesson_destroy', $lesson->id)}}">Delete</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div>
<!-- end row -->


@endsection
@section('script')

<!-- form mask -->
<script src="{{ URL::asset('assets/libs/jquery-repeater/jquery-repeater.min.js') }}"></script>

<!--tinymce js-->
<script src="{{ URL::asset('assets/libs/tinymce/tinymce.min.js') }}"></script>

<!-- Summernote js -->
<script src="{{ URL::asset('assets/libs/summernote/summernote.min.js') }}"></script>

<script>
    $(document).ready(function () {
            $('.dellessonlink').click(function(e){
                e.preventDefault();
                var href = this.href;

                if(confirm('Do you want to delete it?'))
                    location.href = href;
            });
        });
      
</script>

@endsection