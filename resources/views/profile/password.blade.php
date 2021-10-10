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
                        <h5 class="breadcrumbs-title mt-0 mb-0"><span>My Profile</span></h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Password
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12">
            <div class="container">
                <div class="row">
                    <div class="col s12">
                        <div id="input-fields" class="card card-tabs">
                            <div class="card-content">
                                <div id="view-input-fields">
                                    @include('components.flash')
                                    <div class="row">
                                        <div class="col s12">
                                            <form method="post" action="{{ url('profile/update_password', $profile->id) }}" class="row">
                                                @csrf
                                                <div class="col s12">
                                                    <div class="input-field col s12">
                                                        <input id="password" name="password" type="password" class="validate">
                                                        <label for="password">Password</label>
                                                    </div>
                                                </div>
                                                <div class="col s12">
                                                    <div class="input-field col s12">
                                                        <input id="password" name="password_confirm" type="password" class="validate">
                                                        <label for="password">Password</label>
                                                    </div>
                                                </div>
                                                <div class="col s12">
                                                    <div class="input-field col s3">
                                                        <button type="submit" class="btn waves-effect waves-light border-round gradient-45deg-purple-deesp-orange col s12">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div id="html-input-fields">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="content-overlay"></div>
        </div>
    </div>
</div>
<!-- END: Page Main-->

    @endsection