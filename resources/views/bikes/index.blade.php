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
                <div class="card">
                    <div class="card-header with-border">
                        <a class="float-right btn btn-primary btn-sm" href="{{ route('bikes.create') }}">
                            <i class="fa fa-plus"></i>
                            Add New Bike
                        </a>
                        <h3 class="card-title">Bikes List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="card-body">

                        <div class="row" style="margin-top: 15px; margin-bottom: 30px;">
                            <div class="col-sm-4">
                                <input type="text" class="form-control" placeholder="Search License Number">
                            </div>
                            <div class="col-sm-2">
                                <button class="btn btn-primary">Search</button>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>License Number</th>
                                    <th>Make</th>
                                    <th>Model</th>
                                    <th>Customer</th>
                                    <th>Memo</th>
                                    <th> Actions </th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($bikes) && $bikes->isNotEmpty())
                                    @foreach($bikes as $bike)
                                        <tr>
                                            <td>{{ $bike->license_number }} </td>
                                            <td>{{ $bike->make }} </td>
                                            <td>{{ $bike->model }}</td>
                                            <td>{{ $bike->customer->name }}</td>
                                            <td>{{ ($bike->memo) ? \Illuminate\Support\Str::limit($bike->memo, 20, '...') : '' }}</td>
                                            <td>
                                                <a href="{{ route('bikes.edit', $bike->id) }}"> Edit </a>
                                                <a href="#"> View </a>
                                                <a class="text-danger" href="#"
                                                   onclick="event.preventDefault();
                                                       if (confirm('Are you sure you want to delete this record ? This Operation is irreversible')) {
                                                       document.getElementById('{{ $bike->id }}').submit();
                                                       }"
                                                > Delete </a>
                                                <form id="{{ $bike->id }}" style="display: none" action="{{ route('bikes.delete', $bike->id) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                <tr>
                                    <td colspan="6">No Bikes Found!</td>
                                </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>

                        {{ $bikes->links() }}
                    </div>
                </div>
                <!-- /.box -->

            </div>
        </div>

    </section>
    <!-- /.content -->
@endsection
