@extends('layouts.master')

@section('title') @lang('translation.Dashboard') @endsection

@section('content')


@endsection

@section('script')
    <!-- plugin js -->
    <script src="{{ URL::asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- Calendar init -->
    <script src="{{ URL::asset('assets/js/pages/dashboard.init.js') }}"></script>
@endsection
