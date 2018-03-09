@if(Session::has('alert-danger'))
<div class="alert alert-danger fade show zzz" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <div class="row">
        <div class="col-auto">
            <i class="fas fa-exclamation-triangle alert-icon"></i>
        </div>
        <div class="col mt-auto">
            {{ Session::get('alert-danger') }}
        </div>
    </div>
</div>
@endif
@if(Session::has('alert-success'))
<div class="alert alert-success fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <div class="row">
        <div class="col-auto">
            <i class="fas fa-check alert-icon"></i>
        </div>
        <div class="col mt-auto">
            {{ Session::get('alert-success') }}
        </div>
    </div>
</div>
@endif