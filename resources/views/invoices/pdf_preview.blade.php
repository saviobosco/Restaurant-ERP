<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <style>
        .row {
            display: block;
            margin-right: -7.5px;
            margin-left: -7.5px;
        }
        .col-sm-6 {
            display: block;
            float: left;
            width: 50%;
        }
        .col-sm-4 {
            width: 33.333333%;
            float: left;
        }
        .clearfix::after {
            display: block;
            clear: both;
            content: "";
        }

        .text-center{
            text-align: center;
        }
        .mt-40 {
            margin-top: 30px;
        }


        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            background-color: transparent;
        }

        .table th,
        .table td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }

        .table tbody + tbody {
            border-top: 2px solid #dee2e6;
        }


        .table-bordered {
            border: 1px solid #dee2e6;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #dee2e6;
        }

        .table-bordered thead th,
        .table-bordered thead td {
            border-bottom-width: 2px;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.05);
        }

        .table-hover tbody tr:hover {
            color: #212529;
            background-color: rgba(0, 0, 0, 0.075);
        }

        .table-primary,
        .table-primary > th,
        .table-primary > td {
            background-color: #b8daff;
        }

        .table-primary th,
        .table-primary td,
        .table-primary thead th,
        .table-primary tbody + tbody {
            border-color: #7abaff;
        }

        .table-hover .table-primary:hover {
            background-color: #9fcdff;
        }

        .table-hover .table-primary:hover > td,
        .table-hover .table-primary:hover > th {
            background-color: #9fcdff;
        }


        .table-success,
        .table-success > th,
        .table-success > td {
            background-color: #c3e6cb;
        }




        .table-active,
        .table-active > th,
        .table-active > td {
            background-color: rgba(0, 0, 0, 0.075);
        }

        .table-hover .table-active:hover {
            background-color: rgba(0, 0, 0, 0.075);
        }

        .table-hover .table-active:hover > td,
        .table-hover .table-active:hover > th {
            background-color: rgba(0, 0, 0, 0.075);
        }



    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<!-- Content Wrapper. Contains page content -->
    <div class="">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- Main content -->
                        <div class="invoice p-3 mb-3">
                            <!-- title row -->
                            <div class="row">
                                <div class="col-12">
                                    <h2 class="text-center mb-3">
                                        Keng Hong Motors
                                    </h2>
                                    <hr>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- info row -->
                            <div class="row invoice-info clearfix">
                                <!-- /.col -->
                                <div class="col-sm-6 invoice-col">
                                    To
                                    <address>
                                        <strong>{{ ($invoice->customer) ? $invoice->customer->name : 'N/A' }}</strong><br>
                                        License: {{ $invoice->license_number }}<br>
                                        Telephone: {{ ($invoice->customer) ? $invoice->customer->phone_number : 'N/A' }}<br>
                                        Email: {{ ($invoice->customer) ? $invoice->customer->email : '' }}
                                    </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-6 invoice-col">
                                    <b>Invoice# {{ $invoice->id }}</b><br>
                                    <p><b>Date:</b> Date: {{ $invoice->created_at->format('d M Y H:m A') }} </p>
                                    <br>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- Table row -->
                            <div class="row ">
                                <div class="col-xs-12">
                                    <table class="table table-striped table-bordered mt-40">
                                        <thead>
                                        <tr class="table-success">
                                            <th>Qty</th>
                                            <th>Product</th>
                                            <th>Unit Price</th>
                                            <th>Subtotal</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($invoice->invoice_items as $item)
                                            <tr>
                                                <td>{{ $item->quantity }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>${{ $item->price }}</td>
                                                <td>${{ $item->total }}</td>
                                            </tr>

                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <div class="row clearfix mt-40">
                                <!-- accepted payments column -->
                                <div class="col-sm-6">
                                    <p class="lead">Payment Methods:</p>
                                    <p>Cash, PayNow</p>

                                </div>
                                <!-- /.col -->
                                <div class="col-sm-6">
                                    <div>
                                        <table class="table table-bordered">
                                            <tr>
                                                <th style="width:50%">Subtotal:</th>
                                                <td>${{ $invoice->sub_total }}</td>
                                            </tr>
                                            <tr>
                                                <th>Tax:</th>
                                                <td>${{ $invoice->tax }}</td>
                                            </tr>
                                            <tr>
                                                <th>Discount:</th>
                                                <td>${{ $invoice->discount }}</td>
                                            </tr>
                                            <tr>
                                                <th>Total:</th>
                                                <td>${{ $invoice->total }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                            <p class="text-center">
                                <small><i>Thank you. powered by Griffon Technologies Nig.</i></small>
                            </p>
                        </div>
                        <!-- /.invoice -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
</div>
<!-- ./wrapper -->
</body>



</html>
