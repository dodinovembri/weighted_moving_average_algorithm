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
                        <h5 class="breadcrumbs-title mt-0 mb-0"><span>Sales</span></h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Sales
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12">
            <div class="container">
                <div class="section section-data-tables">
                    <div class="card">
                        <div class="card-content">
                            <a class="waves-effect waves-light cyan btn modal-trigger" href="#modal2">Add New</a>
                            <a class="waves-effect waves-light cyan btn modal-trigger" href="#modal1">Import</a>
                            <div id="modal1" class="modal">
                                <form method="POST" action="{{ url('sales/import') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-content">
                                        <h6>Import Data</h6>
                                        <hr><br>
                                        <input id="icon_prefix" type="file" name="file" class="validate">
                                    </div>
                                    <div class="modal-footer" style="margin-top: -20px;">
                                        <div class="input-field col s3">
                                            <button type="submit" class="btn waves-effect waves-light border-round gradient-45deg-purple-deesp-orange col s12">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div id="modal2" class="modal">
                                <form method="POST" action="{{ url('sales/store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-content">
                                        <h6>Add New Data</h6>
                                        <hr><br>
                                        <input id="icon_prefix" type="date" name="date" class="validate">
                                        <input id="icon_prefix" type="number" min="0" name="total" class="validate" placeholder="Total sales">
                                    </div>
                                    <div class="modal-footer" style="margin-top: -20px;">
                                        <div class="input-field col s3">
                                            <button type="submit" class="btn waves-effect waves-light border-round gradient-45deg-purple-deesp-orange col s12">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <a class="waves-effect waves-light btn" href="{{ url('sales/export') }}">Export</a>
                        </div>
                    </div>

                    <!-- Page Length Options -->
                    <div class="row">
                        <div class="col s12">
                            <div class="card">
                                <div class="card-content">
                                    <h4 class="card-title">Page Length Options</h4>
                                    <div class="row">
                                        <div class="col s12">
                                            <table id="page-length-option" class="display">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 10%;">No</th>
                                                        <th>Date</th>
                                                        <th>Total</th>
                                                        <th style="width: 20%;">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 0;
                                                    foreach ($sales as $key => $value) {
                                                        $no++;
                                                    ?>
                                                        <tr>
                                                            <td>{{ $no }}</td>
                                                            <td>{{ $value->date }}</td>
                                                            <td>{{ $value->total }}</td>
                                                            <td>
                                                                <a class="modal-trigger" href="#modal3{{ $value->id }}"><i class="material-icons">edit</i></a>
                                                                <a class="modal-trigger" href="#modal4{{ $value->id }}"><i class="material-icons">delete</i></a>
                                                            </td>
                                                        </tr>
                                                        <div id="modal3{{ $value->id }}" class="modal">
                                                            <form method="POST" action="{{ url('sales/update', $value->id) }}" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="modal-content">
                                                                    <h6>Update Data</h6>
                                                                    <hr><br>
                                                                    <input id="icon_prefix" type="date" name="date" value="{{ $value->date }}" class="validate">
                                                                    <input id="icon_prefix" type="number" min="0" name="total" value="{{ $value->total }}" class="validate" placeholder="Total sales">
                                                                </div>
                                                                <div class="modal-footer" style="margin-top: -20px;">
                                                                    <div class="input-field col s3">
                                                                        <button type="submit" class="btn waves-effect waves-light border-round gradient-45deg-purple-deesp-orange col s12">Submit</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div id="modal4{{ $value->id }}" class="modal">
                                                                <div class="modal-content">
                                                                    <h6>Delete Data</h6>
                                                                    <hr><br>
                                                                    <p>Are you sure to delete this data? </p>
                                                                </div>
                                                                <div class="modal-footer" style="margin-top: -20px;">
                                                                    <div class="input-field col s3">
                                                                        <a href="{{ url('sales/destroy', $value->id) }}"><button type="submit" class="btn waves-effect waves-light border-round gradient-45deg-purple-deesp-orange col s12">Delete</button></a>
                                                                    </div>
                                                                </div>
                                                            </form>
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
        </div>
    </div>
</div>
<!-- END: Page Main-->
@endsection