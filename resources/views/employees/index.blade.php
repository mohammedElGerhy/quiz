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

                                    <a href="{{route('employee.create')}}" class="btn btn-primary">create Employees</a>

                                </div>
                                <!-- /.card-header -->
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>First name</th>
                                        <th>last name</th>
                                        <th>email</th>
                                        <th>phone</th>
                                        <th>company</th>
                                        <th>controller</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($employees as $employee)
                                        <tr>
                                            <td>{{$employee->first_name	}}</td>
                                            <td>
                                                {{$employee->last_name}}
                                            </td>
                                            <td>{{$employee->email}}</td>
                                            <td>
                                                {{$employee->phone}}
                                            </td>
                                            <td>
                                                {{$employee->company->Name}}
                                            </td>
                                            <td>
                                                <a href="{{route('employee.edit', $employee->id)}}" class="btn btn-info">Edit</a>
                                                <a href="{{route('employee.destroy', $employee->id)}}" class="btn btn-danger">Delete</a>

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
