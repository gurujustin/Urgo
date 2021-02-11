@extends('layouts.master')

@section('title') @lang('translation.Data_Tables') @endsection

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/datatables/datatables.min.css') }}">
@endsection

@section('content')

    @component('common-components.breadcrumb')
        @slot('title') User Tables @endslot
        @slot('li_1') Admin @endslot
        @slot('li_2') User Tables @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">User table</h4>
                    <p class="card-title-desc">Shows all users
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>SignUp Date</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($users)
                                @foreach ($users as $user)

                                    <tr>
                                        <td>{{ $user->first_name }}</td>
                                        <td>{{ $user->last_name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td class="text-center" style="width:100px;">
                                            <form action="{{ route('user-delete', ['id' => $user->id]) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger waves-effect waves-light">
                                                    <i class="bx bx-x font-size-16 align-middle mr-2"></i> Delete User
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            @endisset

                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->


@endsection

@section('script')

    <!-- Plugins js -->
    <script src="{{ URL::asset('assets/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/pdfmake/pdfmake.min.js') }}"></script>

    <!-- Init js-->
    <script src="{{ URL::asset('assets/js/pages/datatables.init.js') }}"></script>

@endsection
