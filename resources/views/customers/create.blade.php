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
            <div class="col-md-6 col-sm-12">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Add Customer</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="card-body">
                        <form id="add-customer-modal-form" action="{{ route('customers.store') }}" method="POST">
                            @csrf

                            <div class="form-group required">
                                <label for="name">Name</label>
                                <input id="name" name="name" type="text" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="phone_number">Phone Number</label>
                                <input id="phone_number" type="text" name="phone_number" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="company_name">Company Name</label>
                                <input id="company_name" type="text" name="company_name" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="email_address">Email Address</label>
                                <input id="email_address" type="text" name="email" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="memo">Memo</label>
                                <textarea name="memo" id="memo" cols="30" rows="2" class="form-control"></textarea>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Save Customer</button>
                            </div>


                        </form>

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
