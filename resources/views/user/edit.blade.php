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
                        <h5 class="breadcrumbs-title mt-0 mb-0"><span>Edit User</span></h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Edit User
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
                                            <form method="post" action="{{ url('user/update', $user->id) }}" class="row">
                                                @csrf
                                                <div class="col s12">
                                                    <div class="input-field col s12">
                                                        <input placeholder="Enter your name" value="{{ $user->name }}" id="first_name1" name="name" type="text" class="validate">
                                                        <label for="first_name1">Name</label>
                                                    </div>
                                                </div>
                                                <div class="col s12">
                                                    <div class="input-field col s12">
                                                        <input disabled placeholder="Enter your email" value="{{ $user->email }}" name="email" id="disabled" type="text" class="validate">
                                                        <label for="disabled">Email</label>
                                                    </div>
                                                </div>
                                                <div class="col s12">
                                                    <div class="input-field col s12">
                                                        <input placeholder="Enter Password" name="password" type="password" id="disabled" type="text" class="validate">
                                                        <label for="disabled">Password</label>
                                                    </div>
                                                </div>
                                                <div class="col s12">
                                                    <div class="input-field col s12">
                                                        <input placeholder="Enter Password Confirm" name="password_confirm" type="password" id="disabled" type="text" class="validate">
                                                        <label for="disabled">Password Confirm</label>
                                                    </div>
                                                </div>
                                                <div class="col s12" style="margin-top: 30px;">
                                                    <div class="col s12">
                                                        <button class="waves-effect waves-light cyan btn modal-trigger">Submit</button>
                                                        <a href="{{ url('user') }}">
                                                            <button type="button" class="waves-effect waves-light  btn">Cancel</button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
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