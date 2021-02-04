@extends('layouts.master')

@section('title') @lang('translation.Kanban_Board') @endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/dragula/dragula.min.css') }}">
@endsection

@section('content')

    @component('common-components.breadcrumb')
        @slot('title') Kanban Board @endslot
        @slot('li_1') Tasks @endslot
        @slot('li_2') Kanban Board @endslot
    @endcomponent


    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="dropdown float-right">
                        <a href="#" class="dropdown-toggle arrow-none" data-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">Edit</a>
                            <a class="dropdown-item" href="#">Delete</a>
                        </div>
                    </div> <!-- end dropdown -->

                    <h4 class="card-title mb-4">Upcoming</h4>
                    <div id="task-1">
                        <div id="upcoming-task" class="pb-1 task-list">
                            <div class="card task-box" id="upcard-1">
                                <div class="card-body">
                                    <div class="dropdown float-right">
                                        <a href="#" class="dropdown-toggle arrow-none" data-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#" id="cardedit" data-toggle="modal"
                                                data-target=".bs-example-modal-center"
                                                onclick="editcarddeatil('#upcard-1')">Edit</a>
                                            <a class="dropdown-item" href="#" onclick="detelecard('#upcard-1')">Delete</a>
                                        </div>
                                    </div> <!-- end dropdown -->
                                    <div class="float-right ml-2">
                                        <span class="badge badge-pill badge-soft-secondary font-size-12"
                                            id="cd-status">Waiting</span>
                                    </div>
                                    <div>

                                        <h5 class="font-size-15"><a href="javascript: void(0);" class="text-dark"
                                                id="cd-name">Topnav layout design</a></h5>
                                        <p class="text-muted mb-4">14 Oct, 2019</p>
                                    </div>

                                    <div class="team float-left cd-assigne">
                                        <a href="javascript: void(0);" class="team-member d-inline-block" value="member-4">
                                            <img src="assets/images/users/avatar-4.jpg" class="rounded-circle avatar-xs m-1"
                                                alt="">
                                        </a>

                                        <a href="javascript: void(0);" class="team-member d-inline-block" value="member-5">
                                            <img src="assets/images/users/avatar-5.jpg" class="rounded-circle avatar-xs m-1"
                                                alt="">
                                        </a>

                                    </div>

                                    <div class="text-right">
                                        <h5 class="font-size-15 mb-1" id="cd-budget">$ 145</h5>
                                        <p class="mb-0 text-muted">Budget</p>
                                    </div>
                                </div>

                            </div>
                            <!-- end task card -->

                            <div class="card task-box" id="upcard-2">
                                <div class="card-body">
                                    <div class="dropdown float-right">
                                        <a href="#" class="dropdown-toggle arrow-none" data-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#" id="cardedit" data-toggle="modal"
                                                data-target=".bs-example-modal-center"
                                                onclick="editcarddeatil('#upcard-2')">Edit</a>
                                            <a class="dropdown-item" href="#" onclick="detelecard('#upcard-2')">Delete</a>
                                        </div>
                                    </div> <!-- end dropdown -->
                                    <div class="float-right ml-2">
                                        <span class="badge badge-pill badge-soft-primary font-size-12"
                                            id="cd-status">Approved</span>
                                    </div>
                                    <div>
                                        <h5 class="font-size-15"><a href="javascript: void(0);" class="text-dark"
                                                id="cd-name">Create a New Landing UI</a></h5>
                                        <p class="text-muted" id="cd-date">15 Oct, 2019</p>
                                    </div>

                                    <ul class="pl-3 mb-4 text-muted" id="cd-desc">
                                        <li class="py-1">Separate existence is a myth.</li>
                                        <li class="py-1">For music, sport, etc</li>
                                    </ul>

                                    <div class="team float-left cd-assigne">
                                        <a href="javascript: void(0);" class="team-member d-inline-block" value="member-6">
                                            <img src="assets/images/users/avatar-6.jpg" class="rounded-circle avatar-xs m-1"
                                                alt="" id="team-member-1">
                                        </a>

                                        <a href="javascript: void(0);" class="team-member d-inline-block" value="member-7">
                                            <img src="assets/images/users/avatar-7.jpg" class="rounded-circle avatar-xs m-1"
                                                alt="">
                                        </a>

                                    </div>

                                    <div class="text-right">
                                        <h5 class="font-size-15 mb-1" id="cd-budget">112</h5>
                                        <p class="mb-0 text-muted">Budget</p>
                                    </div>
                                </div>

                            </div>
                            <!-- end task card -->

                            <div class="card task-box" id="upcard-3">
                                <div class="card-body">
                                    <div class="dropdown float-right">
                                        <a href="#" class="dropdown-toggle arrow-none" data-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#" id="cardedit" data-toggle="modal"
                                                data-target=".bs-example-modal-center"
                                                onclick="editcarddeatil('#upcard-3')">Edit</a>
                                            <a class="dropdown-item" href="#" onclick="detelecard('#upcard-3')">Delete</a>
                                        </div>
                                    </div> <!-- end dropdown -->
                                    <div class="float-right ml-2">
                                        <span class="badge badge-pill badge-soft-secondary font-size-12"
                                            id="cd-status">Waiting</span>
                                    </div>
                                    <div>
                                        <h5 class="font-size-15"><a href="javascript: void(0);" class="text-dark"
                                                id="cd-name">Create a Skote Logo</a></h5>
                                        <p class="text-muted mb-4">15 Oct, 2019</p>
                                    </div>

                                    <div class="team float-left cd-assigne">
                                        <a href="javascript: void(0);" class="team-member d-inline-block" value="member-5">
                                            <img src="assets/images/users/avatar-5.jpg" class="rounded-circle avatar-xs m-1"
                                                alt="">
                                        </a>
                                    </div>

                                    <div class="text-right">
                                        <h5 class="font-size-15 mb-1" id="cd-budget">$ 86</h5>
                                        <p class="mb-0 text-muted">Budget</p>
                                    </div>
                                </div>

                            </div>
                            <!-- end task card -->

                        </div>

                        <div class="text-center" id="addbutton">
                            <a href="javascript: void(0);" class="btn btn-primary btn-block waves-effect waves-light"
                                data-toggle="modal" data-target=".bs-example-modal-center"
                                onclick="Addnewcard('#upcoming-task')"><i class="mdi mdi-plus mr-1"></i> Add New</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->

        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="dropdown float-right">
                        <a href="#" class="dropdown-toggle arrow-none" data-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">Edit</a>
                            <a class="dropdown-item" href="#">Delete</a>
                        </div>
                    </div> <!-- end dropdown -->

                    <h4 class="card-title mb-4">In Progress</h4>
                    <div id="task-2">
                        <div id="inprogress-task" class="pb-1 task-list">

                            <div class="card task-box" id="incard-1">
                                <div class="card-body">
                                    <div class="dropdown float-right">
                                        <a href="#" class="dropdown-toggle arrow-none" data-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#" id="cardedit" data-toggle="modal"
                                                data-target=".bs-example-modal-center"
                                                onclick="editcarddeatil('#incard-1')">Edit</a>
                                            <a class="dropdown-item" href="#" onclick="detelecard('#incard-1')">Delete</a>
                                        </div>
                                    </div> <!-- end dropdown -->
                                    <div class="float-right ml-2">
                                        <span class="badge badge-pill badge-soft-success font-size-12"
                                            id="cd-status">Complete</span>
                                    </div>
                                    <div>
                                        <h5 class="font-size-15"><a href="javascript: void(0);" class="text-dark"
                                                id="cd-name">Brand logo design</a></h5>
                                        <p class="text-muted">12 Oct, 2019</p>
                                    </div>

                                    <ul class="list-inine pl-0 mb-4">
                                        <li class="list-inline-item">
                                            <a href="#">
                                                <div class="border rounded avatar-sm">
                                                    <span class="avatar-title bg-transparent">
                                                        <img src="assets/images/companies/img-1.png" alt=""
                                                            class="avatar-xs">
                                                    </span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#">
                                                <div class="border rounded avatar-sm">
                                                    <span class="avatar-title bg-transparent">
                                                        <img src="assets/images/companies/img-2.png" alt=""
                                                            class="avatar-xs">
                                                    </span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#">
                                                <div class="border rounded avatar-sm">
                                                    <span class="avatar-title bg-transparent">
                                                        <img src="assets/images/companies/img-3.png" alt=""
                                                            class="avatar-xs">
                                                    </span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>

                                    <div class="team float-left cd-assigne">
                                        <a href="javascript: void(0);" class="team-member d-inline-block" value="member-5">
                                            <img src="assets/images/users/avatar-5.jpg" class="rounded-circle avatar-xs m-1"
                                                alt="">
                                        </a>
                                        <a href="javascript: void(0);" class="team-member d-inline-block" value="member-3">
                                            <img src="assets/images/users/avatar-3.jpg" class="rounded-circle avatar-xs m-1"
                                                alt="">
                                        </a>
                                    </div>

                                    <div class="text-right">
                                        <h5 class="font-size-15 mb-1" id="cd-budget">$ 132</h5>
                                        <p class="mb-0 text-muted">Budget</p>
                                    </div>
                                </div>

                            </div>
                            <!-- end task card -->

                            <div class="card task-box" id="incard-2">
                                <div class="card-body">
                                    <div class="dropdown float-right">
                                        <a href="#" class="dropdown-toggle arrow-none" data-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#" id="cardedit" data-toggle="modal"
                                                data-target=".bs-example-modal-center"
                                                onclick="editcarddeatil('#incard-2')">Edit</a>
                                            <a class="dropdown-item" href="#" onclick="detelecard('#incard-2')">Delete</a>
                                        </div>
                                    </div> <!-- end dropdown -->
                                    <div class="float-right ml-2">
                                        <span class="badge badge-pill badge-soft-warning font-size-12"
                                            id="cd-status">Pending</span>
                                    </div>
                                    <div>
                                        <h5 class="font-size-15"><a href="javascript: void(0);" class="text-dark"
                                                id="cd-name">Create a Blog Template UI</a></h5>
                                        <p class="text-muted mb-4">13 Oct, 2019</p>
                                    </div>

                                    <div class="team float-left cd-assigne">
                                        <a href="javascript: void(0);" class="team-member d-inline-block" value="member-8">
                                            <img src="assets/images/users/avatar-8.jpg" class="rounded-circle avatar-xs m-1"
                                                alt="">
                                        </a>
                                        <a href="javascript: void(0);" class="team-member d-inline-block" value="member-5">
                                            <img src="assets/images/users/avatar-5.jpg" class="rounded-circle avatar-xs m-1"
                                                alt="">
                                        </a>
                                        <a href="javascript: void(0);" class="team-member d-inline-block" value="member-1">
                                            <img src="assets/images/users/avatar-1.jpg" class="rounded-circle avatar-xs m-1"
                                                alt="">
                                        </a>

                                    </div>

                                    <div class="text-right">
                                        <h5 class="font-size-15 mb-1" id="cd-budget">$ 103</h5>
                                        <p class="mb-0 text-muted">Budget</p>
                                    </div>
                                </div>

                            </div>
                            <!-- end task card -->

                            <div class="card task-box" id="incard-3">
                                <div class="card-body">
                                    <div class="dropdown float-right">
                                        <a href="#" class="dropdown-toggle arrow-none" data-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#" id="cardedit" data-toggle="modal"
                                                data-target=".bs-example-modal-center"
                                                onclick="editcarddeatil('#incard-3')">Edit</a>
                                            <a class="dropdown-item" href="#" onclick="detelecard('#incard-3')">Delete</a>
                                        </div>
                                    </div> <!-- end dropdown -->
                                    <div class="float-right ml-2">
                                        <span class="badge badge-pill badge-soft-success font-size-12"
                                            id="cd-status">Complete</span>
                                    </div>
                                    <div>
                                        <h5 class="font-size-15"><a href="javascript: void(0);" class="text-dark"
                                                id="cd-name">Skote Dashboard UI</a></h5>
                                        <p class="text-muted mb-4">13 Oct, 2019</p>
                                    </div>

                                    <div class="team float-left cd-assigne">
                                        <a href="javascript: void(0);" class="team-member d-inline-block" value="member-2">
                                            <img src="assets/images/users/avatar-2.jpg" class="rounded-circle avatar-xs m-1"
                                                alt="">
                                        </a>

                                    </div>

                                    <div class="text-right">
                                        <h5 class="font-size-15 mb-1" id="cd-budget">$ 94</h5>
                                        <p class="mb-0 text-muted">Budget</p>
                                    </div>
                                </div>

                            </div>
                            <!-- end task card -->
                        </div>

                        <div class="text-center">
                            <a href="javascript: void(0);" class="btn btn-primary btn-block waves-effect waves-light"
                                data-toggle="modal" data-target=".bs-example-modal-center"
                                onclick="Addnewcard('#inprogress-task')"><i class="mdi mdi-plus mr-1"></i> Add New</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->

        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="dropdown float-right">
                        <a href="#" class="dropdown-toggle arrow-none" data-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">Edit</a>
                            <a class="dropdown-item" href="#">Delete</a>
                        </div>
                    </div> <!-- end dropdown -->

                    <h4 class="card-title mb-4">Completed</h4>
                    <div id="task-3">
                        <div id="complete-task" class="pb-1 task-list">

                            <div class="card task-box" id="cmpcard-1">
                                <div class="card-body">
                                    <div class="dropdown float-right">
                                        <a href="#" class="dropdown-toggle arrow-none" data-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#" id="cardedit" data-toggle="modal"
                                                data-target=".bs-example-modal-center"
                                                onclick="editcarddeatil('#cmpcard-1')">Edit</a>
                                            <a class="dropdown-item" href="#" onclick="detelecard('#cmpcard-1')">Delete</a>
                                        </div>
                                    </div> <!-- end dropdown -->
                                    <div class="float-right ml-2">
                                        <span class="badge badge-pill badge-soft-success font-size-12"
                                            id="cd-status">Complete</span>
                                    </div>
                                    <div>
                                        <h5 class="font-size-15"><a href="javascript: void(0);" class="text-dark"
                                                id="cd-name">Redesign - Landing page</a></h5>
                                        <p class="text-muted mb-4">10 Oct, 2019</p>
                                    </div>

                                    <div class="team float-left cd-assigne">
                                        <a href="javascript: void(0);" class="team-member d-inline-block" value="member-4">
                                            <img src="assets/images/users/avatar-4.jpg" class="rounded-circle avatar-xs m-1"
                                                alt="">
                                        </a>

                                        <a href="javascript: void(0);" class="team-member d-inline-block" value="member-6">
                                            <img src="assets/images/users/avatar-6.jpg" class="rounded-circle avatar-xs m-1"
                                                alt="">
                                        </a>
                                    </div>

                                    <div class="text-right">
                                        <h5 class="font-size-15 mb-1" id="cd-budget">$ 145</h5>
                                        <p class="mb-0 text-muted">Budget</p>
                                    </div>
                                </div>

                            </div>
                            <!-- end task card -->

                            <div class="card task-box" id="cmpcard-2">
                                <div class="card-body">
                                    <div class="dropdown float-right">
                                        <a href="#" class="dropdown-toggle arrow-none" data-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#" id="cardedit" data-toggle="modal"
                                                data-target=".bs-example-modal-center"
                                                onclick="editcarddeatil('#cmpcard-2')">Edit</a>
                                            <a class="dropdown-item" href="#" onclick="detelecard('#cmpcard-2')">Delete</a>
                                        </div>
                                    </div> <!-- end dropdown -->
                                    <div class="float-right ml-2">
                                        <span class="badge badge-pill badge-soft-success font-size-12"
                                            id="cd-status">Complete</span>
                                    </div>
                                    <div>
                                        <h5 class="font-size-15"><a href="javascript: void(0);" class="text-dark"
                                                id="cd-name">Multipurpose Landing</a></h5>
                                        <p class="text-muted">09 Oct, 2019</p>
                                    </div>

                                    <ul class="list-inline mb-4">
                                        <li class="list-inline-item">
                                            <a href="#">
                                                <div>
                                                    <img src="assets/images/small/img-1.jpg" class="rounded" alt=""
                                                        height="48">
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#">
                                                <div>
                                                    <img src="assets/images/small/img-2.jpg" class="rounded" alt=""
                                                        height="48">
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#">
                                                <div>
                                                    <img src="assets/images/small/img-3.jpg" class="rounded" alt=""
                                                        height="48">
                                                </div>
                                            </a>
                                        </li>
                                    </ul>

                                    <div class="team float-left cd-assigne">
                                        <a href="javascript: void(0);" class="team-member d-inline-block" value="member-6">
                                            <img src="assets/images/users/avatar-6.jpg" class="rounded-circle avatar-xs m-1"
                                                alt="">
                                        </a>

                                        <a href="javascript: void(0);" class="team-member d-inline-block" value="member-7">
                                            <img src="assets/images/users/avatar-7.jpg" class="rounded-circle avatar-xs m-1"
                                                alt="">
                                        </a>
                                    </div>
                                    <div class="text-right">
                                        <h5 class="font-size-15 mb-1" id="cd-budget">$ 92</h5>
                                        <p class="mb-0 text-muted">Budget</p>
                                    </div>
                                </div>

                            </div>
                            <!-- end task card -->

                            <div class="card task-box" id="cmpcard-3">
                                <div class="card-body">
                                    <div class="dropdown float-right">
                                        <a href="#" class="dropdown-toggle arrow-none" data-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#" id="cardedit" data-toggle="modal"
                                                data-target=".bs-example-modal-center"
                                                onclick="editcarddeatil('#cmpcard-3')">Edit</a>
                                            <a class="dropdown-item" href="#" onclick="detelecard('#cmpcard-3')">Delete</a>
                                        </div>
                                    </div> <!-- end dropdown -->
                                    <div class="float-right ml-2">
                                        <span class="badge badge-pill badge-soft-secondary font-size-12"
                                            id="cd-status">Waiting</span>
                                    </div>
                                    <div>
                                        <h5 class="font-size-15"><a href="javascript: void(0);" class="text-dark"
                                                id="cd-name">Skote landing Psd</a></h5>
                                        <p class="text-muted mb-4">15 Oct, 2019</p>
                                    </div>

                                    <div class="team float-left cd-assigne">
                                        <a href="javascript: void(0);" class="team-member d-inline-block" value="member-5">
                                            <img src="assets/images/users/avatar-5.jpg" class="rounded-circle avatar-xs m-1"
                                                alt="">
                                        </a>
                                    </div>

                                    <div class="text-right">
                                        <h5 class="font-size-15 mb-1" id="cd-budget">$ 86</h5>
                                        <p class="mb-0 text-muted">Budget</p>
                                    </div>
                                </div>

                            </div>
                            <!-- end task card -->
                        </div>

                        <div class="text-center">
                            <a href="javascript: void(0);" class="btn btn-primary btn-block waves-effect waves-light"
                                data-toggle="modal" data-target=".bs-example-modal-center"
                                onclick="Addnewcard('#complete-task')"><i class="mdi mdi-plus mr-1"></i> Add New</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
    <div id="modalForm" class="modal fade bs-example-modal-center" tabindex="-1" role="dialog"
        aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0 add-card-title">Add Card</h5>
                    <h5 class="modal-title mt-0 update-card-title" style="display: none;">Update Card</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" id="NewcardForm">
                    <div class="modal-body">
                        <div class="md-form mb-3">
                            <label data-error="wrong" data-success="right" for="cd-cardname">Card Name<span
                                    class="text-danger">*</span></label>
                            <input type="text" id="cd-cardname" class="form-control validate" required>
                        </div>

                        <div class="md-form mb-3">
                            <label data-error="wrong" data-success="right" for="cd-carddesc">Description</label>
                            <textarea id="cd-carddesc" class="form-control"></textarea>
                        </div>

                        <div class="md-form mb-3">
                            <label data-error="wrong" data-success="right" for="cd-cardassignee">Assignee<span
                                    class="text-danger">*</span></label>
                            <ul class="list-unstyled user-list" id="cd-cardassignee">
                                <li class="mb-1">
                                    <div class="custom-control custom-checkbox d-flex align-items-center">
                                        <input type="checkbox" class="custom-control-input member-check" id="member-1">
                                        <label class="custom-control-label" for="member-1">Albert Rodarte</label>
                                        <img src="assets/images/users/avatar-1.jpg" class="rounded-circle avatar-xs m-1"
                                            alt="">
                                    </div>
                                </li>
                                <li class="mb-1">
                                    <div class="custom-control custom-checkbox d-flex align-items-center">
                                        <input type="checkbox" class="custom-control-input member-check" id="member-2">
                                        <label class="custom-control-label" for="member-2">Albert Rodarte</label>
                                        <img src="assets/images/users/avatar-2.jpg" class="rounded-circle avatar-xs m-1"
                                            alt="">
                                    </div>
                                </li>
                                <li class="mb-1">
                                    <div class="custom-control custom-checkbox d-flex align-items-center">
                                        <input type="checkbox" class="custom-control-input member-check" id="member-3">
                                        <label class="custom-control-label" for="member-3">Albert Rodarte</label>
                                        <img src="assets/images/users/avatar-3.jpg" class="rounded-circle avatar-xs m-1"
                                            alt="">
                                    </div>
                                </li>
                                <li class="mb-1">
                                    <div class="custom-control custom-checkbox d-flex align-items-center">
                                        <input type="checkbox" class="custom-control-input member-check" id="member-4">
                                        <label class="custom-control-label" for="member-4">Albert Rodarte</label>
                                        <img src="assets/images/users/avatar-4.jpg" class="rounded-circle avatar-xs m-1"
                                            alt="">
                                    </div>
                                </li>
                                <li class="mb-1">
                                    <div class="custom-control custom-checkbox d-flex align-items-center">
                                        <input type="checkbox" class="custom-control-input member-check" id="member-5">
                                        <label class="custom-control-label" for="member-5">Albert Rodarte</label>
                                        <img src="assets/images/users/avatar-5.jpg" class="rounded-circle avatar-xs m-1"
                                            alt="">
                                    </div>
                                </li>
                                <li class="mb-1">
                                    <div class="custom-control custom-checkbox d-flex align-items-center">
                                        <input type="checkbox" class="custom-control-input member-check" id="member-6">
                                        <label class="custom-control-label" for="member-6">Albert Rodarte</label>
                                        <img src="assets/images/users/avatar-6.jpg" class="rounded-circle avatar-xs m-1"
                                            alt="">
                                    </div>
                                </li>
                                <li class="mb-1">
                                    <div class="custom-control custom-checkbox d-flex align-items-center">
                                        <input type="checkbox" class="custom-control-input member-check" id="member-7">
                                        <label class="custom-control-label" for="member-7">Albert Rodarte</label>
                                        <img src="assets/images/users/avatar-7.jpg" class="rounded-circle avatar-xs m-1"
                                            alt="">
                                    </div>
                                </li>
                                <li class="mb-1">
                                    <div class="custom-control custom-checkbox d-flex align-items-center">
                                        <input type="checkbox" class="custom-control-input member-check" id="member-8">
                                        <label class="custom-control-label" for="member-8">Albert Rodarte</label>
                                        <img src="assets/images/users/avatar-8.jpg" class="rounded-circle avatar-xs m-1"
                                            alt="">
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="md-form mb-3">
                            <label data-error="wrong" data-success="right" for="StatusSelect">Status<span
                                    class="text-danger">*</span></label>
                            <select class="custom-select validate" id="StatusSelect" required>

                                <option value="Waiting">Waiting</option>
                                <option value="Approved">Approved</option>
                                <option value="Complete">Complete</option>
                                <option value="Pending" selected>Pending</option>
                            </select>
                        </div>

                        <div class="md-form mb-3">
                            <label data-error="wrong" data-success="right" for="cd-cardbudget">Budget<span
                                    class="text-danger">*</span></label>
                            <input type="number" id="cd-cardbudget" class="form-control validate" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="addcard">Save</button>
                        <button type="button" class="btn btn-primary" id="updatecarddetail" data-dismiss="modal"
                            style="display: none;">Update</button>
                        <button type="button" class="btn btn-secondary" id="btnCloseIt" data-dismiss="modal">Close</button>
                    </div>
                </form>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@endsection

@section('script')

    <!-- Plugins js -->
    <script src="{{ URL::asset('assets/libs/dragula/dragula.min.js') }}"></script>

    <!-- Init js-->
    <script src="{{ URL::asset('assets/js/pages/task-kanban.init.js') }}"></script>

    <!-- Custom js-->
    <script src="{{ URL::asset('assets/js/custom.min.js') }}"></script>

@endsection
