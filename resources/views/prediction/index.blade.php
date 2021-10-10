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
                        <h5 class="breadcrumbs-title mt-0 mb-0"><span>Prediction</span></h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Prediction
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

                            <div class="row">
                                <form method="POST" action="{{ url('prediction/filter') }}" class="col s12">
                                @csrf
                                    <div class="row">
                                        <div class="input-field col s3">
                                            <input id="icon_prefix" type="date" name="from_date" class="validate">
                                            <label for="icon_prefix">From Date</label>
                                        </div>
                                        <div class="input-field col s3">
                                            <input id="icon_prefix" type="date" name="to_date" class="validate">
                                            <label for="icon_prefix">To Date</label>
                                        </div>
                                        <div class="input-field col s2" style="margin-top: 25px;">
                                            <i class="material-icons prefix">phone</i>
                                            <button type="submit" class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12">Submit</button>
                                        </div>
                                    </div>
                                </form>
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