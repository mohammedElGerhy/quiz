@if(Session::has('error'))

    <div class="card-body">
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-ban"></i> error!</h5>
            {{Session::get('error')}}
        </div>
    </div>
@endif

@if ($errors->any())
    <div class="card-body">
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-ban"></i> error!</h5>
                {{$error}}
            </div>
        @endforeach
    </div>
@endif
