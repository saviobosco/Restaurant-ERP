@extends('layouts.master')


@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Administrations
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a class="float-right btn btn-primary btn-sm" href="{{ route('users.create') }}">New User</a>

                        <h5 class="card-title">Users List</h5>
                    </div>
                    <!-- /.box-header -->
                    <div class="card-body">

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Role</th>
                                <th> Actions </th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($users) && !empty($users))
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->name }} </td>
                                        <td>{{ $user->email }} </td>
                                        <td>{{ $user->phone_number }} </td>
                                        <td>{{ $user->role }}</td>
                                        <td>
                                            <a href="{{ route('users.edit', $user->id) }}"> Edit </a>
                                            <a class="text-danger" href="#"
                                               onclick="event.preventDefault();
                                                   if (confirm('Are you sure you want to delete this user ? This Operation is irreversible')) {
                                                   document.getElementById('{{ $user->id }}').submit();
                                                   }"
                                            > Delete </a>
                                            <form id="{{ $user->id }}" style="display: none"
                                                  action="{{ route('users.delete', $user->id) }}"
                                                  method="POST">
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
