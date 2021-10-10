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
                        <h5 class="breadcrumbs-title mt-0 mb-0"><span>Dashboard</span></h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12">
            <div class="container">
                <div class="row">
                    <a href="{{ url('sales') }}">
                        <div class="col s12 m6 l6 xl4">
                            <div class="card gradient-45deg-light-blue-cyan gradient-shadow min-height-100 white-text animate fadeLeft">
                                <div class="padding-4">
                                    <div class="row">
                                        <div class="col s12">
                                            <h6 class="mb-0 white-text">Sales</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ url('prediction') }}">
                        <div class="col s12 m6 l6 xl4">
                            <div class="card gradient-45deg-red-pink gradient-shadow min-height-100 white-text animate fadeLeft">
                                <div class="padding-4">
                                    <div class="row">
                                        <div class="col s12">
                                            <h6 class="mb-0 white-text">Weight Moving Average</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ url('profile') }}">
                        <div class="col s12 m6 l6 xl4">
                            <div class="card gradient-45deg-amber-amber gradient-shadow min-height-100 white-text animate fadeRight">
                                <div class="padding-4">
                                    <div class="row">
                                        <div class="col s12">
                                            <h6 class="mb-0 white-text">About Researcher</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="content-overlay"></div>
        </div>
    </div>
</div>
<!-- END: Page Main-->
@endsection