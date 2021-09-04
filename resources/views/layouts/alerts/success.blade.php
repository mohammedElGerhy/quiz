@if(Session::has('success'))



    <div class="card-body">
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> success!</h5>
            {{Session::get('success')}}
        </div>
    </div>
@endif
