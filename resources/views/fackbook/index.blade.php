@extends('layouts.master')

@section('title') Playbook Management @endsection

@section('css')
    {{--
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/summernote/summernote.min.css') }}">
    --}}
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('title') Playbook List @endslot
        @slot('li_1') Playbook @endslot
        @slot('li_2') List @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-success" href="#playbook-create">Add
                        Playbook</a>
                    <div class="table-responsive mt-3">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Category</th>
                                    <th>Title</th>
                                    <th>CaseImage</th>
                                    <th>Order</th>
                                    <th>Show</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div>

@endsection
@section('script')
    {{-- <script src="{{ URL::asset('assets/libs/summernote/summernote.min.js') }}"></script>
    --}}

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
@endsection
