@extends('layouts.master')


@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Center
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <a class="float-right btn btn-primary btn-sm" href="{{ route('partners.create') }}">
                            <i class="fa fa-plus"></i>
                            Add Vendor
                        </a>
                        <h3 class="card-title">Vendors List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="card-body">

                        <div class="row" style="margin-top: 15px; margin-bottom: 30px;">
                            <div class="col-sm-4">
                                <input type="text" class="form-control" placeholder="Search Partner's Name">
                            </div>
                            <div class="col-sm-2">
                                <button class="btn btn-primary">Search</button>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-responsive">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Telephone</th>
                                    <th>Email</th>
                                    <th>Type</th>
                                    <th>Memo</th>
                                    <th> Actions </th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($partners) && $partners->isNotEmpty())
                                    @foreach($partners as $partner)
                                        <tr>
                                            <td>{{ $partner->name }} </td>
                                            <td>
                                                {{ $partner->telephone }}
                                            </td>
                                            <td>{{ $partner->email }} </td>
                                            <td>{{ $partner->type }} </td>
                                            <td>{{ ($partner->memo) ? \Illuminate\Support\Str::limit($partner->memo, 15, "...") : '--' }}</td>
                                            <td>
                                                <a href="{{ route('partners.edit', $partner->id) }}"> Edit </a>
                                                <a class="text-danger" href="#"
                                                   onclick="event.preventDefault();
                                                       if (confirm('Are you sure you want to delete this record ? This Operation is irreversible')) {
                                                       document.getElementById('{{ $partner->id }}').submit();
                                                       }"
                                                > Delete </a>
                                                <form id="{{ $partner->id }}" style="display: none" action="{{ route('partners.delete', $partner->id) }}" method="POST">
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

                        {{ $partners->links() }}
                    </div>
                </div>
                <!-- /.box -->

            </div>
        </div>

    </section>
    <!-- /.content -->
@endsection
