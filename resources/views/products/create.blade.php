@extends('layouts.master')


@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="card card-default">
                        <div class="card-header">
                            <h6 class="box-title">Add Product</h6>
                        </div>
                        <!-- /.box-header -->
                        <div class="card-body">

                            {{ html()->form('POST')->route('products.store')->open() }}


                            <div class="form-group">
                                {{ html()->label('Name', 'name') }}
                                {{ html()->text('name')->placeholder('Enter Name')->class('form-control') }}
                            </div>

                            <div class="form-group">
                                {{ html()->label('Price', 'price') }}
                                {{ html()->text('price')->placeholder('Enter Price')->class('form-control') }}
                            </div>

                            <div class="form-group">
{{--<!--                                {!! Form::label('code', 'Code') !!}--}}
{{--                                {!! Form::text('code', null, [--}}
{{--                                'class' => 'form-control',--}}
{{--                                'placeholder'=> 'Product Code (Optional)',--}}
{{--                                'rows' => 5]) !!}-->--}}

                                {{ html()->label('Code', 'code') }}
                                {{ html()->text('code')->placeholder('Product Code (Optional)')
                                    ->class('form-control') }}

                            </div>

                            <div class="form-group">
                                {{--{!! Form::label('category_id', 'Category') !!}
                                {!! Form::select('category_id',["" => "--"] + $categories + [
                                "add-category" => "+ Add Category"], null,
                                ['class' => 'form-control', 'id' => 'product-category-id']) !!}--}}
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary">
                                    Save Product
                                </button>
                            </div>
                            {{ html()->form()->close() }}

                        </div>
                        <!-- /.box-body -->

                    </div>
                    <!-- /.box -->

                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->



    <!-- Add Product Category -->
    <div class="modal" id="add-product-category">
        <div class="modal-dialog modal-sm">
            <form id="add-product-category-form" action="#" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Category</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="category_name">Name</label>
                            <input id="category_name" name="name" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-sm">Save</button>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>



@endsection


@section('footer-script')
    <script>


        window.onload = function() {


            $('#product-category-id').change(function(event){
                let productCategory = event.target.value;
                productCategory = (productCategory !== undefined && productCategory.trim().length > 0) ? productCategory : false;
                if (productCategory) {
                    if (productCategory === "add-category") {
                        $('#add-product-category').modal({backdrop: 'static', keyboard: true});
                        event.target.value = "";
                    }
                }
            });

            // add the vehicle make modal form
            // $('#add-vehicle-make-form').submit(function(event) {
            //     event.preventDefault();
            //     let make_name = $("#make_name").val();
            //     make_name = (make_name !== undefined && make_name.trim().length > 0) ? make_name : false;
            //     if (make_name) {
            //         $.post(this.action, $(this).serialize(), function(response) {
            //             console.log(response);
            //
            //             if (response !==undefined && response.hasOwnProperty('type')) {
            //                 if (response.type === "vehicle_make") {
            //                     let vehicleMakeOption = document.createElement("OPTION");
            //                     vehicleMakeOption.setAttribute("value", response.data.id);
            //                     let vehicleMakeName = document.createTextNode(response.data.name);
            //                     vehicleMakeOption.appendChild(vehicleMakeName);
            //                     $("option[value='add-make']").before(vehicleMakeOption);
            //                     vehicleMakeOption.selected = true;
            //                     // trigger any changes
            //                     $("#make_name").val("");
            //                     $('#add-vehicle-make').modal('hide');
            //                 }
            //             }
            //         });
            //     }
            // });
            //
            //
            // // add the vehicle model form
            // $('#add-vehicle-model-form').submit(function(event) {
            //     event.preventDefault();
            //
            //     let model_name = $("#model_name").val();
            //     model_name = (model_name !== undefined && model_name.trim().length > 0) ? model_name : false;
            //     if (model_name) {
            //         let formData = $(this).serialize() + '&vehicle_make_id=' + $("#main-vehicle-make-selector").val();
            //
            //         $.post(this.action, formData, function(response) {
            //             if (response !==undefined && response.hasOwnProperty('type')) {
            //                 if (response.type === "vehicle_model") {
            //                     let vehicleMakeOption = document.createElement("OPTION");
            //                     vehicleMakeOption.setAttribute("value", response.data.id);
            //                     let vehicleMakeName = document.createTextNode(response.data.name);
            //                     vehicleMakeOption.appendChild(vehicleMakeName);
            //                     $("option[value='add-model']").before(vehicleMakeOption);
            //                     vehicleMakeOption.selected = true;
            //                     // trigger any changes
            //                     $("#model_name").val("");
            //                     $('#add-vehicle-model').modal('hide');
            //                 }
            //             }
            //         });
            //     }
            // })
            //
            // $('#add-vehicle-year-form').submit(function(event) {
            //     event.preventDefault();
            //
            //     let model_name = $("#model_year").val();
            //     model_name = (model_name !== undefined && model_name.trim().length > 0) ? model_name : false;
            //     if (model_name) {
            //         let formData = $(this).serialize();
            //         $.post(this.action, formData, function(response) {
            //             if (response !==undefined && response.hasOwnProperty('type')) {
            //                 if (response.type === "vehicle_year") {
            //                     let vehicleMakeOption = document.createElement("OPTION");
            //                     vehicleMakeOption.setAttribute("value", response.data.id);
            //                     let vehicleMakeName = document.createTextNode(response.data.model_year);
            //                     vehicleMakeOption.appendChild(vehicleMakeName);
            //                     $("option[value='add-year']").before(vehicleMakeOption);
            //                     vehicleMakeOption.selected = true;
            //                     // trigger any changes
            //                     $("#model_year").val("");
            //                     $('#add-vehicle-year').modal('hide');
            //                 }
            //             }
            //         });
            //     }
            // })


            // Add Category Modal Form Handler
            $('#add-product-category-form').submit(function(event) {
                event.preventDefault();

                let category_name = $("#category_name").val();
                category_name = (category_name !== undefined && category_name.trim().length > 0) ? category_name : false;
                if (category_name) {
                    $.post(this.action, $(this).serialize(), function(response) {
                        if (response !==undefined && response.hasOwnProperty('type')) {
                            if (response.type === "product_category") {
                                let productCategoryOption = document.createElement("OPTION");
                                productCategoryOption.setAttribute("value", response.data.id);
                                let productCategoryName = document.createTextNode(response.data.name);
                                productCategoryOption.appendChild(productCategoryName);
                                $("option[value='add-category']").before(productCategoryOption);
                                productCategoryOption.selected = true;
                                // trigger any changes
                                $("#category_name").val("");
                                $('#add-product-category').modal('hide');
                            }
                        }
                    });
                }
            });
        }


        {{--function loadVehicleMakes() {--}}
        {{--    // get all vehicle makes into the select option--}}
        {{--    $.get("{{route('vehicle_makes.index')}}", function (response){--}}
        {{--        if (response !== undefined && response.hasOwnProperty('type')) {--}}
        {{--            if (response.type === "vehicle_makes") {--}}
        {{--                if (Array.isArray(response.data)) {--}}
        {{--                    for (i in response.data) {--}}
        {{--                        let vehicleMakeOption = document.createElement("OPTION");--}}
        {{--                        vehicleMakeOption.setAttribute("value", response.data[i].id);--}}
        {{--                        let vehicleMakeName = document.createTextNode(response.data[i].name);--}}
        {{--                        vehicleMakeOption.appendChild(vehicleMakeName);--}}
        {{--                        $("option[value='add-make']").before(vehicleMakeOption);--}}
        {{--                        //console.log(response.data[i].name);--}}
        {{--                    }--}}
        {{--                }--}}
        {{--            }--}}
        {{--        }--}}
        {{--    });--}}
        {{--}--}}

        {{--function fetchVehicleMakeModels(make)--}}
        {{--{--}}
        {{--    $.get(window.origin + "/vehicle-models/get-by-make/"+make, function(response) {--}}
        {{--        // return all models--}}
        {{--        if (response !== undefined && response.hasOwnProperty('type') && response.type === "vehicle_models") {--}}
        {{--            console.log(response);--}}
        {{--            //return response.data;--}}
        {{--        }--}}
        {{--    });--}}
        {{--    return [];--}}
        {{--}--}}

        {{--function loadVehicleModelOptions(make)--}}
        {{--{--}}
        {{--    // clear previous options--}}
        {{--    var model_options = $("#main-vehicle-model-selector option").toArray();--}}
        {{--    model_options.forEach(function(option){--}}
        {{--        option = $(option);--}}
        {{--        if (option.val() !== "0" && option.val() !== "add-model") {--}}
        {{--            option.remove();--}}
        {{--        }--}}
        {{--    });--}}

        {{--    $.get(window.origin + "/vehicle-models/get-by-make/"+make, function(response) {--}}
        {{--        // return all models--}}
        {{--        if (response !== undefined && response.hasOwnProperty('type') && response.type === "vehicle_models") {--}}
        {{--            if (response.data.length > 0) {--}}
        {{--                for (i in response.data) {--}}
        {{--                    let vehicleMakeOption = document.createElement("OPTION");--}}
        {{--                    vehicleMakeOption.setAttribute("value", response.data[i].id);--}}
        {{--                    let vehicleMakeName = document.createTextNode(response.data[i].name);--}}
        {{--                    vehicleMakeOption.appendChild(vehicleMakeName);--}}
        {{--                    $("option[value='add-model']").before(vehicleMakeOption);--}}
        {{--                    //console.log(response.data[i].name);--}}
        {{--                }--}}
        {{--            }--}}
        {{--        }--}}
        {{--    });--}}

        {{--}--}}

    </script>
@endsection
