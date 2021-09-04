@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mb-30">
                    <div class="card card-statistics h-100">
                        @include('layouts.alerts.success')
                        @include('layouts.alerts.errors')
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="card-body">
                            <!--table-->
                            <div class="card">
                                <div class="card-header">
                                </div>
                                <!-- /.card-header -->
                                <form action="{{route('company.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="company_id"
                                                   class="mr-sm-2">Name
                                                :</label>
                                            <input type="text" class="form-control" name="Name" required>

                                        </div>
                                        <div class="col-12">
                                            <label for="Name_en"
                                                   class="mr-sm-2">email
                                                :</label>
                                            <input type="email" class="form-control" name="email" required>
                                        </div>

                                        <div class="col-12">
                                            <label for="Name"
                                                   class="mr-sm-2">logo
                                                :</label>
                                            <input  type="file" name="logo" class="form-control" required>

                                        </div>

                                        <div class="col-12">
                                            <br>
                                            <button type="submit" class="btn btn-primary form-control">save</button>
                                        </div>
                                    </div>
                            </form>
                                <!-- /.card-body -->
                            </div>
                            <!--table-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
