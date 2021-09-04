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

                                    <a href="{{route('company.create')}}" class="btn btn-primary">create company</a>

                                </div>
                                <!-- /.card-header -->
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>name</th>
                                        <th>email</th>
                                        <th>logo</th>
                                        <th>controller</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($companies as $company)
                                        <tr>
                                            <td>{{$company->Name}}</td>
                                            <td>
                                                {{$company->email}}
                                            </td>
                                            <td>
                                                <img src="{{asset('/storage/companies/'.$company->logo)}}" style="height: 50px; width: 50px;">

                                            </td>
                                            <td>
                                                <a href="{{route('company.edit', $company->id)}}" class="btn btn-info">Edit</a>
                                                <a href="{{route('company.destroy', $company->id)}}" class="btn btn-danger">Delete</a>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
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
