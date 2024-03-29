@extends('layouts.master')


@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Inventory
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Items Stock In</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="card-body">
                        <stock-items-container></stock-items-container>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
        </div>

    </section>
    <!-- /.content -->
@endsection
