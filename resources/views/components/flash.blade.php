@if(session()->has('message'))
<div class="card-content">
    <div class="row">
        <!--SIMPLE-->
        <div class="col s12 m4 l4">
            <div class="card-alert card purple lighten-5">
                <div class="card-content purple-text">
                    <p>{{ session()->get('message') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endif