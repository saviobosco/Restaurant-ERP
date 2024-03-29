@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Add Work Order
                    </div>

                    <div class="card-body">
                        {!! Form::open(['route' => 'work_orders.store']) !!}


                        <div class="form-group">
                            {!! Form::label('customer_id', 'Customer *') !!}
                            {!! Form::select('customer_id', $customers + ['add-customer'=>'+Add Customer'],
                            null,
                            ['class' => 'form-control',
                            'id' => 'add-customer-form-selector']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('customer_vehicle_id', 'Motorcycle Detail *') !!}
                            {!! Form::select('customer_vehicle_id',
                             ['' => 'Select Motorcycle','add-motorcycle'=>'+Add Motorcycle'], null,
                             ['class' => 'form-control',
                             'id' => 'add-motorcycle-form-selector']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('mileage', 'Mileage') !!}
                            {!! Form::text('mileage', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('description', 'Description (Tasks Performed) *') !!}
                            {!! Form::textarea('comment', null, ['class' => 'form-control', 'rows' => 8]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('service_date', 'Service Date *') !!}
                            {!! Form::date('service_date', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('time_spent', 'Time Spent') !!}
                            {!! Form::text('time_spent', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('price_charge', 'Price Charge *') !!}
                            {!! Form::text('price_charge', null, ['class' => 'form-control']) !!}
                        </div>


                        <div class="form-group mt-4">
                            <button class="btn btn-primary">
                                Save
                            </button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal" id="add-customer-modal">
        <div class="modal-dialog modal-lg">
            <form id="add-customer-modal-form" action="{{ route('customers.store') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Customer</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="make_name">First Name *</label>
                                <input id="make_name" name="first_name" type="text" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <label for="make_name">Last Name *</label>
                                <input id="make_name" name="last_name" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="company_name">Company Name</label>
                            <input id="company_name" type="text" name="company_name" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="email_address">Email Address *</label>
                            <input id="email_address" type="text" name="email" class="form-control">
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="mobile_phone_number">Mobile Phone Number *</label>
                                    <input id="mobile_phone_number" type="text" name="mobile_phone_number" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="work_phone_number">Work Phone Number</label>
                                    <input id="work_phone_number" type="text" name="work_phone_number" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="home_phone_number">Home Phone Number</label>
                                    <input id="home_phone_number" type="text" name="home_phone_number" class="form-control">
                                </div>
                            </div>
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



    <!-- Add vehicle model modal -->
    <div class="modal" id="add-motorcycle-modal">
        <div class="modal-dialog modal-lg">
            <form id="add-motorcycle-form" action="{{ route('customer_vehicles.store') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Motorcycle</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">

                        <div class="form-group">
                            <label for="name">Name (Make/Model)</label>
                            <input id="name" name="name" type="text" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="license_plate_number">License plate Number</label>
                            <input id="license_plate_number" name="license_plate_number" type="text" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="vin">Motorcycle Identification Number</label>
                            <input id="vin" name="vin" type="text" class="form-control">
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

            $('#add-customer-form-selector').change(function(event){
                let vehicleMake = event.target.value;
                vehicleMake = (vehicleMake !== undefined && vehicleMake.trim().length > 0) ? vehicleMake : false;
                if (vehicleMake) {
                    if (vehicleMake === "add-customer") {
                        //add vehicle make modal
                        $('#add-customer-modal').modal({backdrop: 'static', keyboard: true});
                        event.target.value = "";
                    } else {
                        loadCustomerVehicles(event.target.value);
                    }
                }
            });


            $('#add-motorcycle-form-selector').change(function(event){

                let vehicleMake = $("#add-customer-form-selector").val();
                vehicleMake = (vehicleMake !== undefined && vehicleMake.trim().length > 0) ? vehicleMake : false;
                if (vehicleMake) {
                    let vehicleModel = event.target.value;
                    if (vehicleModel === "add-motorcycle") {
                        //add vehicle model
                        // check if the make is selected
                        $('#add-motorcycle-modal').modal({backdrop: 'static', keyboard: true});
                        event.target.value = "";
                    }
                } else {
                    event.target.value = "";
                    alert("Select a customer first");
                }
            });


            // add the vehicle make modal form
            $('#add-customer-modal-form').submit(function(event) {
                event.preventDefault();
                //validate all inputs
                let formData = $(this).serialize();
                $.post(this.action, formData, function(response) {
                    console.log(response);
                    if (response !==undefined && response.hasOwnProperty('type')) {
                        if (response.type === "customer") {
                            let vehicleMakeOption = document.createElement("OPTION");
                            vehicleMakeOption.setAttribute("value", response.data.id);
                            let vehicleMakeName = document.createTextNode(response.data.first_name + ' '+ response.data.last_name);
                            vehicleMakeOption.appendChild(vehicleMakeName);
                            $("option[value='add-customer']").before(vehicleMakeOption);
                            vehicleMakeOption.selected = true;
                            // trigger any changes
                            $('#add-customer-modal').modal('hide');
                        }
                    }
                });
            });




            // add the vehicle model form
            $('#add-motorcycle-form').submit(function(event) {
                event.preventDefault();

                let formData = $(this).serialize() + '&customer_id=' + $("#add-customer-form-selector").val();

                $.post(this.action, formData, function(response) {
                    if (response !==undefined && response.hasOwnProperty('type')) {
                        if (response.type === "customer_vehicle") {
                            let vehicleMakeOption = document.createElement("OPTION");
                            vehicleMakeOption.setAttribute("value", response.data.id);
                            let vehicleMakeName = document.createTextNode(response.data.name +' -- ' + response.data.license_plate_number);
                            vehicleMakeOption.appendChild(vehicleMakeName);
                            $("option[value='add-motorcycle']").before(vehicleMakeOption);
                            vehicleMakeOption.selected = true;
                            // trigger any changes

                            event.target.reset();
                            $('#add-motorcycle-modal').modal('hide');
                        }
                    }
                });
            })

        }


        function loadCustomerVehicles(customer_id)
        {
            // clear previous options
            var model_options = $("#add-motorcycle-form-selector option").toArray();
            model_options.forEach(function(option){
                option = $(option);
                if (option.val() !== "" && option.val() !== "add-motorcycle") {
                    option.remove();
                }
            });

            $.get(window.origin + "/customer-vehicles/get-by-customer-id/"+ customer_id, function(response) {
                // return all models
                if (response !== undefined && response.hasOwnProperty('type') && response.type === "customer_vehicles") {
                    if (response.data.length > 0) {
                        for (i in response.data) {
                            let customerVehicle = document.createElement("OPTION");
                            customerVehicle.setAttribute("value", response.data[i].id);
                            let optionName = document.createTextNode(response.data[i].name +' -- ' + response.data[i].license_plate_number);
                            customerVehicle.appendChild(optionName);
                            $("option[value='add-motorcycle']").before(customerVehicle);
                        }
                    }
                }
            });
        }


    </script>
@endsection
