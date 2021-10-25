@extends('layouts.app')

@section('content')

@include('components.header')

@include('components.sidebar')

<!-- BEGIN: Page Main-->
<div id="main">
    <div class="row">
        <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
            <!-- Search for small screen-->
            <div class="container">
                <div class="row">
                    <div class="col s10 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0"><span>User Lists</span></h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">User Lists
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12">
            <div class="container">
                <div class="section section-data-tables">
                   {{-- <div class="card">
                        <div class="card-content">
                            <a href="{{ url('user/create') }}">
                                <button class="waves-effect waves-light cyan btn modal-trigger">Add New</button>
                            </a>
                        </div>
                    </div> --}}
                    <!-- Page Length Options -->
                    <div class="row">
                        <div class="col s12">
                            <div class="card">
                                <div class="card-content">
                                    <h4 class="card-title">User Lists</h4>
                                    <div class="row">
                                        <div class="col s12">
                                            <table id="page-length-option" class="display">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        {{-- <th>Actions</th> --}}
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 0;
                                                    foreach ($users as $key => $value) {
                                                        $no++
                                                    ?>
                                                        <tr>
                                                            <td>{{ $no }}</td>
                                                            <td>{{ $value->name }}</td>
                                                            <td>{{ $value->email }}</td>
                                                           {{-- <td>
                                                                <a href="{{ url('user/edit', $value->id) }}">
                                                                    <i class="material-icons delete-mails">mode_edit</i>
                                                                </a>
                                                                <a class="modal-trigger mb-2 mr-1" href="#modal1{{ $value->id }}">
                                                                    <i class="material-icons delete-mails">delete</i>
                                                                </a>
                                                            </td> --}}
                                                        </tr>

                                                        <!-- Modal Trigger -->
                                                        <!-- Modal Structure -->
                                                        <div id="modal1{{ $value->id }}" class="modal">
                                                            <div class="modal-content">
                                                                <h6>Delete Confirm</h6>
                                                                <p>Are you sure want to delete this data?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a href="void::" class="modal-action modal-close waves-effect waves-green">
                                                                    <button class="waves-effect waves-light cyan btn modal-trigger">Cancel</button>
                                                                </a>
                                                                <a href="{{ url('user/destroy', $value->id) }}">
                                                                    <button class="waves-effect waves-light red btn modal-trigger">Delete Data</button>
                                                                </a>
                                                            </div>
                                                        </div>

                                                    <?php } ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div><!-- START RIGHT SIDEBAR NAV -->
            </div>
            <div class="content-overlay"></div>
        </div>
    </div>
</div>
<!-- END: Page Main-->
@endsection