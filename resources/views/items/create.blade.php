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
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="card card-default">
                        <div class="card-header">
                            <h6 class="box-title">Add Item</h6>
                        </div>
                        <!-- /.box-header -->
                        <div class="card-body">
                            {!! Form::open(['route' => 'items.store', 'enctype' => 'multipart/form-data']) !!}

<!--                            <div class="row">
                                <div class="col-sm-9">

                                    <div class="form-group">
                                        {!! Form::label('barcode', 'Barcode') !!}
                                        <barcode-input></barcode-input>
                                    </div>


                                </div>
                                <div class="col-sm-3 text-center">
                                    <image-input></image-input>
                                </div>
                            </div>-->

                            <div class="form-group required">
                                {!! Form::label('name', 'Name') !!}
                                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group required">
                                {!! Form::label('cost_price', 'Cost Price') !!}
                                {!! Form::text('cost_price', null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group required">
                                {!! Form::label('sell_Price', 'Sell Price') !!}
                                {!! Form::text('sell_price', null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('quantity', 'Initial Quantity') !!}
                                {!! Form::text('quantity', null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('sku', 'SKU') !!}
                                {!! Form::text('sku', null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('category_id', 'Category') !!}
                                {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
                            </div>

{{--                            <p class="float-right">--}}
{{--                                <a href="{{ route('item_categories.index') }}">Edit Item Attributes</a>--}}
{{--                            </p>--}}
{{--                            <h4>Item Attributes</h4>--}}
{{--                            <hr>--}}
{{--                            @if (isset($item_categories) && $item_categories->isNotEmpty())--}}
{{--                                @foreach($item_categories as $item_category)--}}
{{--                                    <div class="form-group">--}}
{{--                                        {!! Form::label($item_category->id, $item_category->name) !!}--}}
{{--                                        @if ($item_category->type ==="text")--}}
{{--                                            <auto-complete-text-input input-name="{{ $item_category->id }}" fetch-url="{{ route('item_categories.fetch_option_values', $item_category->id) }}"></auto-complete-text-input>--}}
{{--                                        @elseif ($item_category->type === "number")--}}
{{--                                            {!! Form::number($item_category->id, null, ['class' => 'form-control']) !!}--}}
{{--                                        @elseif ($item_category->type === "date")--}}
{{--                                            {!! Form::date($item_category->id, null, ['class' => 'form-control']) !!}--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                @endforeach--}}
{{--                            @endif--}}

                            <hr>
                            <div class="form-group">
                                <button class="btn btn-primary">
                                    Save Item
                                </button>
                            </div>
                            {!! Form::close() !!}

                        </div>
                        <!-- /.box-body -->

                    </div>
                    <!-- /.box -->

                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
@endsection

