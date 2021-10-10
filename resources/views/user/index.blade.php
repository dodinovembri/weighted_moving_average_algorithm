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
                                                        <th>Actions</th>
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
                                                            <td></td>
                                                        </tr>
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