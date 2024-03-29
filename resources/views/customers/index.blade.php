@extends('layouts.master')


@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Customers
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <a class="float-right btn btn-primary btn-sm" href="{{ route('customers.create') }}">Add New Customer</a>
                        <h6 class="card-title">Customers Table</h6>
                    </div>
                    <!-- /.box-header -->
                    <div class="card-body">
                        <div class="row m-15-30">
                            <div class="col-sm-5 col-xs-8">
                                <input type="text" class="form-control" placeholder="Search Name">
                            </div>
                            <div class="col-sm-2 col-xs-4">
                                <button class="btn btn-primary">Search</button>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th> Actions </th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($customers) && $customers->isNotEmpty())
                                    @foreach($customers as $customer)
                                        <tr>
                                            <td>{{ $customer->name }} </td>
                                            <td>{{ $customer->email }} </td>
                                            <td>{{ $customer->phone_number }} </td>
                                            <td>
                                                <a href="{{ route('customers.view', $customer->id) }}"> View </a>
                                                <a href="{{ route('customers.edit', $customer->id) }}"> Edit </a>
                                                <a class="text-danger" href="#"
                                                   onclick="event.preventDefault();
                                                       if (confirm('Are you sure you want to delete this record ? This Operation is irreversible')) {
                                                       alert('Do nothing!');
                                                       document.getElementById('{{ $customer->id }}').submit();
                                                       }"
                                                > Delete </a>
                                                <form id="{{ $customer->id }}" style="display: none" action="{{ route('customers.delete', $customer->id) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">


                    </div>
                </div>
                <!-- /.box -->

            </div>
        </div>

    </section>
    <!-- /.content -->
@endsection
