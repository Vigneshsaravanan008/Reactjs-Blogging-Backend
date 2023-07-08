@if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading"></h4>
        <div class="alert-body">
            {{ Session::get('success') }}
        </div>
    </div>
@endif
@if(session()->has('danger'))
    <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading"></h4>
        <div class="alert-body">
            {{ Session::get('danger') }}
        </div>
    </div>
@endif
@if(session()->has('warning'))
    <div class="alert alert-warning" role="alert">
        <h4 class="alert-heading"></h4>
        <div class="alert-body">
            {{ Session::get('warning') }}
        </div>
    </div>
@endif 
@if(session()->has('info'))
    <div class="alert alert-info" role="alert">
        <h4 class="alert-heading"></h4>
        <div class="alert-body">
        {{ Session::get('info') }}
        </div>
    </div>
@endif
