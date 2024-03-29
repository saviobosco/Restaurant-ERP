@extends('layouts.master')


@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Purchases & Sales
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <a class="pull-right btn btn-primary" href="#">Add New Purchase</a>
                        <h3 class="box-title">Purchases List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row" style="margin-top: 15px; margin-bottom: 30px;">
                            <div class="col-sm-5 col-xs-8">
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                            <div class="col-sm-2 col-xs-4">
                                <button class="btn btn-primary">Search</button>
                            </div>
                        </div>

                        <table class="table table-hover table-responsive">
                            <thead>
                            <tr>
                                <th>Supplier</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
        </div>

    </section>
    <!-- /.content -->
@endsection
