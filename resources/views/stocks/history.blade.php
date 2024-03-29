@extends('layouts.master')


@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Stocks Histories <i class="fa fa-arrow-up"></i>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <!-- /.box-header -->
                    <div class="card-body">
                        <div class="row" style="margin-top: 15px; margin-bottom: 30px;">
                            <div class="col-sm-4">
                                <input type="text" class="form-control" placeholder="Search item name, category">
                            </div>
                            <div class="col-sm-2">
                                <button class="btn btn-primary">Search</button>
                            </div>
                        </div>

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Stock Type</th>
                                <th>Total Items</th>
                                <th>Performed By</th>
                                <th>Date</th>
                                <th> Actions </th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($stocks) && $stocks->isNotEmpty())
                                @foreach($stocks as $stock)
                                    <tr>
                                        <td>{{ $stock->type }} </td>
                                        <td>
                                            {{ $stock->total_items }}
                                        </td>
                                        <td></td>
                                        <td> {{ $stock->created_at->format('d-m-Y H:i:s A') }} </td>
                                        <td>
                                            <a href="{{ route('stocks.view', $stock->id) }}"> View </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
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
