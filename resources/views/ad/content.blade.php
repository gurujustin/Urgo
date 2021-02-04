@extends('layouts.master')

@section('title') Test @endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                {{-- {!!$data!!} --}}
                <iframe src="{{$url}}" title="W3Schools Free Online Web Tutorials" width="100%" height="500px"></iframe>
            </div>
        </div>
    </div> <!-- end col -->
</div>
<!-- end row -->

@endsection
