<x-auth-validation-errors class="mb-4" style="color:red" :errors="$errors" />
<div class="alert alert-danger" id="error" style="display: none;">
    <span>Wellness center is closed on this time or day.</span>
</div>
<div class="card-toolbar">
    <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
        <button type="button" class="btn btn-primary" onclick="addClient()">
            <span class="svg-icon svg-icon-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                    <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
                </svg>
            </span>Add Client
        </button>
    </div>
</div>

<form id="" class="form" method="POST" action="{{ route('appointment.store') }}">
    <!--begin::Scroll-->
    @csrf
    <input type="hidden" id="appointment_end" name="appointment_end" />
    <input type="hidden" id="appointment_id" value="" />
    <div class="d-flex flex-column scroll-y me-n7 pe-7" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
        <div class="row mb-7">
            <div class="col-lg-6">
                <label class="required fw-bold fs-6 mb-2">Client</label>
                <select name="client_id" class="form-control form-control-solid mb-3 mb-lg-0" onchange="getClientInfo(this.value)" required>
                    <option value="">-- Select Client --</option>
                    @for ($i = 0; $i < count($client); $i++) <option value="{{ $client[$i]->id }}">{{ ucwords($client[$i]->first_name) }}
                        {{ ucwords($client[$i]->last_name) }}</option>
                        @endfor
                </select>
            </div>
            <div class="col-lg-6">
                <label class="required fw-bold fs-6 mb-2">Email Address</label>
                <input disabled type="email" id='email' name="email" class="form-control form-control-solid mb-3 mb-lg-0" value="" />
            </div>
        </div>
        <div class="row mb-7">
            <div class="col-lg-6">
                <label class="required fw-bold fs-6 mb-2">Phone Number</label>
                <input disabled type="text" id='phone_number' name="phone_number" class="form-control form-control-solid mb-3 mb-lg-0" value="" />
            </div>
            <div class="col-lg-6">
                <label class="required fw-bold fs-6 mb-2">Appointment Date</label>
                <input class="form-control form-control-solid kt_datepicker_3" value="{{ date('Y-m-d H:i') }}" onchange="getRoomPractitioner(this.value)" id="appointment_start" name="appointment_start" placeholder="Pick Appointment Date & Time" required />
            </div>
        </div>

        <div class="separator separator-dashed my-10"></div>

        <div class="row mb-7">
            <div class="col-lg-6">
                <label class="required fw-bold fs-6 mb-2">Room</label>
                <select name="room_id" id='room' class="form-control form-control-solid mb-3 mb-lg-0" required>
                    <option value="">-- Select Room --</option>

                </select>
            </div>
            <div class="col-lg-6">
                <label class="required fw-bold fs-6 mb-2">Practitionner</label>
                <select name="practitionner_id" id='practitionner' class="form-control form-control-solid mb-3 mb-lg-0" required>
                    <option value="">-- Select Practitionner --</option>

                </select>
            </div>
        </div>

        <div class="separator separator-dashed my-10"></div>
        <div class="row mb-7">
            <div class="col-lg-6">
                <label class="required fw-bold fs-6 mb-2">Type</label>
                <select id="type" name="type" class="form-control form-control-solid mb-3 mb-lg-0" onchange="selectType()" required>
                    <option value="service">Service</option>
                    <option value="pack">Pack</option>

                </select>
            </div>
        </div>
        <div class="row mb-7" id='pack' style="display: none;">
            <div class="col-lg-6">
                <label class="required fw-bold fs-6 mb-2">Pack</label>
                <select id="pack_id" name="pack_id" class="form-control form-control-solid mb-3 mb-lg-0" onchange="getHandServiceSetting()">
                    <option value="">-- Select Pack --</option>
                    @for ($i = 0; $i < count($pack); $i++) <option value="{{ $pack[$i]->id }}">{{ ucwords($pack[$i]->pack_name) }} </option>
                        @endfor

                </select>
            </div>
        </div>
        <div class="row mb-7" id='service'>
            <div class="col-lg-6">
                <label class="required fw-bold fs-6 mb-2">Machine</label>
                <select id="machine" name="machine_id" class="form-control form-control-solid mb-3 mb-lg-0" onchange="getMachineHand(this.value)">
                    <option value="">-- Select Machine --</option>
                    @for ($i = 0; $i < count($machine); $i++) <option value="{{ $machine[$i]->id }}">{{ ucwords($machine[$i]->name) }} </option>
                        @endfor
                </select>
            </div>
            <div class="col-lg-6">
                <label class="required fw-bold fs-6 mb-2">Hand</label>
                <select name="hand_id" id='hand' class="form-control form-control-solid mb-3 mb-lg-0" onchange="getHandServiceSetting()">
                    <option value="">-- Select Hand --</option>

                </select>
            </div>
        </div>
        <div class="row mb-7">
            <div class="col-lg-6">
                <label class="required fw-bold fs-6 mb-2">Service</label>
                <select name="service_id" id='service_id' class="form-control form-control-solid mb-3 mb-lg-0" required onchange="getZone()">
                    <option value="">-- Select Service --</option>

                </select>
            </div>
            <div class="col-lg-6">
                <label class="required fw-bold fs-6 mb-2">Zone</label>
                <select name="zone[]" id='zone' class="form-select form-select-solid js-example-basic-single" data-control="select2" data-placeholder="Select an option" data-allow-clear="true" multiple="multiple" required onchange="checkAppointment()">
                    <option value="">-- Select Zone --</option>
                </select>
            </div>
        </div>
        <div class="row mb-7">
            <div class="col-lg-6">
                <label class="required fw-bold fs-6 mb-2">Sessions</label>
                <input type="number" min="0" name="session" id="sessions" class="form-control form-control-solid mb-3 mb-lg-0" onkeyup="serviceAmount()" placeholder="Please Enter your Sessions here." required readonly />
            </div>
            <div class="col-lg-6" id='setting'>
                <label class="required fw-bold fs-6 mb-2">Settings / min / max / start</label>
                <select name="setting_id" id='settings' class="form-control form-control-solid mb-3 mb-lg-0">
                    <option value="">-- Select Settings --</option>

                </select>
            </div>
        </div>
        <div class="row mb-7">
            <div class="col-lg-6">
                <label class="fw-bold fs-6 mb-2">Session Price</label>
                <input readonly type="number" name="session_price" id='session_price' class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter your Session Price here." required />
            </div>
        </div>
        <div class="row mb-7">
            <div class="col-lg-6">
                <label class="fw-bold fs-6 mb-2">Promotion(%)</label>
                <input type="number" id="promotion" name="promotion" value="0" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter your Promotion(%) here." onkeyup="totalServiceAmount()" />
            </div>
            <div class="col-lg-6">
                <label class="fw-bold fs-6 mb-2">Total Service Amount</label>
                <div class="input-group mb-5">
                    <span class="input-group-text">$</span>
                    <input type="hidden" class="form-control mb-3 mb-lg-0" id='total_amount' />
                    <input type="text" readonly class="form-control mb-3 mb-lg-0" id='total_service_amount' name="total_service_amount" placeholder="0" required />
                </div>
            </div>
        </div>

        <div class="separator separator-dashed my-10"></div>

        <div class="row mb-7">
            <div class="col-lg-6">
                <label class="required fw-bold fs-6 mb-2">Room Time</label>
                <input readonly class="form-control form-control-solid kt_datepicker_8" id="room_time" name="room_time" value="0 min" />
            </div>
        </div>
        <div class="row mb-7">
            <div class="col-lg-6">
                <label class="required fw-bold fs-6 mb-2">Start Time(Check-In)</label>
                <input readonly class="form-control form-control-solid " id="check_in" name="check_in" value="00:00" />
            </div>
            <div class="col-lg-6">
                <label class="required fw-bold fs-6 mb-2">Finish Time (Check-Out)</label>
                <input readonly class="form-control form-control-solid " id="check_out" name="check_out" value="00:00" />
            </div>
        </div>
        <div class="row mb-7">
            <div class="col-lg-6">
                <label class="required fw-bold fs-6 mb-2">Appointment Status</label>
                <select name="status" class="form-control form-control-solid mb-3 mb-lg-0" required>
                    <option value="">-- Select Status --</option>
                    <option value="taken">Taken</option>
                    <option value="confirmed">Confirmed</option>
                    <option value="checkin">Check-in</option>
                    <option value="cancelled">Cancelled</option>
                </select>
            </div>
        </div>
        <div class="row mb-7">
            <div class="col-lg-12">
                <label class="required fw-bold fs-6 mb-2">Notes</label>
                <textarea name="note" class="form-control form-control-solid mb-3 mb-lg-0" cols="30" rows="5" required></textarea>
            </div>
        </div>
        <!-- Pricing Box Start -->
        <div class="separator separator-dashed my-10"></div>
        <div class="row mb-7 justify-content-end text-end">
            <div class="col-lg-6">
                <label class="fw-bold fs-6 mb-2">Total Service Amount</label>
                <h3 class="fw-bolder m-0 text-primary amount_to_show">$0</h3>
            </div>
        </div>
        <div class="row mb-7 justify-content-end text-end">
            <div class="col-lg-6">
                <label class="fw-bold fs-6 mb-2">Paid</label>
                <h3 class="fw-bolder m-0 text-success">$0</h3>
            </div>
        </div>
        <div class="row mb-7 justify-content-end text-end">
            <div class="col-lg-6">
                <label class="fw-bold fs-6 mb-2">Un-Paid</label>
                <h3 class="fw-bolder m-0 text-danger amount_to_show">$0</h3>
            </div>
        </div>
        <!-- Pricing Box End -->
    </div>
    <!--end::Scroll-->
    <div class="text-center pt-15">
        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" aria-label="Close">Discard</button>
        <button type="submit" id="ajaxSubmit" class="btn btn-primary">Submit</button>
    </div>
</form>

<script>
    function selectType() {
        type = $('#type').val();
        if (type == 'service') {
            $("#pack").hide();
            $("#service").show();
            $("#setting").show();

        } else if (type == 'pack') {
            $("#service").hide();
            $("#setting").hide();
            $("#pack").show();
        }
        $("#zone").empty();
        document.getElementById('hand').innerHTML =
            '<option value="">-- Select Hand --</option>';
        document.getElementById('settings').innerHTML =
            '<option value="">-- Select Settings --</option>';
        document.getElementById('service_id').innerHTML =
            '<option value="">-- Select Settings --</option>';
        document.getElementById('sessions').value = '';
        document.getElementById('session_price').value = '';
        document.getElementById('total_service_amount').value = '';
        document.getElementById('promotion').value = '0';
        document.getElementById('room_time').value = '';
        document.getElementById('check_out').value = '';
        document.getElementsByClassName('amount_to_show')[0].textContent = '$ ' + 0;
        document.getElementsByClassName('amount_to_show')[1].textContent = '$ ' + 0;

    }
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });

    function addClient() {
        $.ajax({
            type: 'GET',
            url: "{{ route('client.create') }}",
            success: function(result) {
                $('#myModalLg').modal('toggle');
                var drawerElement = document.querySelector("#kt_activities");
                var drawer = KTDrawer.getInstance(drawerElement);
                $('#right_activities_heading').html('Add Client');
                $('#right_activities_body').html(result);
                drawer.toggle();
                // $('#rightModal').modal('show');
            }
        });
    }
    // check appointment b/w services time and get session and zone 
    // var ia = 0;
    function getZone() {
        // ia++;practitionner

        var serviceId = $('#service_id').val();
        let value = {
            serviceId: serviceId,
        };
        $.ajax({
            type: 'GET',
            url: "{{ route('get_zone') }}",
            data: value,
            success: function(result) {
                document.getElementById('zone').innerHTML =
                    '<option value="">-- Select Zone --</option>';
                for (var i = 0; i < result.length; i++) {
                    var opt = document.createElement('option');
                    opt.value = result[i].id;
                    opt.innerHTML = result[i].zone;
                    document.getElementById('zone').appendChild(opt);
                }

            }
        });
    }

    function checkAppointment() {
        // ia++;practitionner
        // console.log($('#zone').val())
        types = $('#type').val();
        var practitionner = $('#practitionner').val();
        if (practitionner == '') {
            alert("Please select practitionner");
            getHandServiceSetting();
            return true;
        }
        var appointmentId = $('#appointment_id').val();
        var zoneId = $('#zone').val();
        var appointmentStart = $('#appointment_start').val();
        let value = {
            zoneId: zoneId,
            appointmentStart: appointmentStart,
            practitionnerId: practitionner,
            appointmentId: appointmentId,
        };
        $.ajax({
            type: 'GET',
            url: "{{ route('check_appointment') }}",
            data: value,
            success: function(result) {
                if (result.hasAppointment == 'yes') {
                    alert("There is appointment");
                    getHandServiceSetting();

                    return true;
                }
                if (result != "") {
                    //  document.getElementById('zone').value = result.service[0].zone;
                    if (types == "pack") {
                        document.getElementById('room_time').value = result.service[0].time_limit + "min";
                        document.getElementById('appointment_end').value = result.appointmentEndTime;
                        document.getElementById('check_in').value = result.checkIn;
                        document.getElementById('check_out').value = result.checkOut;
                    }
                    if (types == "service") {
                        document.getElementById('sessions').value = result.service[0].session;
                        document.getElementById('session_price').value = result.service[0].price;
                        document.getElementById('total_service_amount').value = result.service[0].price;
                        document.getElementById('total_amount').value = result.service[0].price;
                        document.getElementById('room_time').value = result.service[0].time_limit + "min";
                        document.getElementById('appointment_end').value = result.appointmentEndTime;
                        document.getElementById('check_in').value = result.checkIn;
                        document.getElementById('check_out').value = result.checkOut;
                        // document.getElementsByClassName('amount_to_show')[0].textContent = '$ ' + result.service[0].price;
                        //document.getElementsByClassName('amount_to_show')[1].textContent = '$ ' + result.service[0].price;
                        document.getElementsByClassName('amount_to_show')[0].textContent = '$ ' + result
                            .service[0].price;
                        document.getElementsByClassName('amount_to_show')[1].textContent = '$ ' + result
                            .service[0].price;

                    }


                } else {
                    console.log('here');
                    $("#zone").empty();
                    document.getElementById('sessions').value = "";
                    document.getElementById('session_price').value = "";
                    document.getElementById('total_service_amount').value = "";
                    document.getElementById('total_amount').value = "";
                    document.getElementById('room_time').value = "0 min";
                    document.getElementById('appointment_end').value = "";
                    document.getElementById('check_in').value = "";
                    document.getElementById('check_out').value = "";
                    document.getElementsByClassName('amount_to_show')[0].textContent = '$ 0';
                    document.getElementsByClassName('amount_to_show')[1].textContent = '$ 0';
                }

            }
        });
    }

    function getHandServiceSetting() {
        $("#zone").empty();
        types = $('#type').val();
        packId = $('#pack_id').val();
        var machineId = $('#machine').val();
        var hand = $('#hand').val();
        let value = {
            handId: hand,
            machineId: machineId,
            types: types,
            packId: packId,
        };
        $.ajax({
            type: 'GET',
            url: "{{ route('hand_service_setting') }}",
            data: value,
            success: function(result) {
                console.log(result);
                document.getElementById('service_id').innerHTML =
                    '<option value="">-- Select Service --</option>';
                for (var i = 0; i < result.service.length; i++) {
                    var opt = document.createElement('option');
                    opt.value = result.service[i].id;
                    opt.innerHTML = result.service[i].service_name;
                    document.getElementById('service_id').appendChild(opt);
                }
                document.getElementById('settings').innerHTML =
                    '<option value="">-- Select Settings --</option>';
                for (var i = 0; i < result.handSetting.length; i++) {
                    var opt = document.createElement('option');
                    opt.value = result.handSetting[i].id;
                    opt.innerHTML = result.handSetting[i].setting_name + " / " + result.handSetting[i].min + " / " + result.handSetting[i].max + " / " + result.handSetting[i].start;
                    document.getElementById('settings').appendChild(opt);
                }
                if (types == 'pack') {
                    let totalPrice = result.packData.session * result.packData.pack_price;
                    document.getElementById('sessions').readOnly = false;
                    document.getElementById('sessions').value = result.packData.session;
                    document.getElementById('session_price').value = result.packData.pack_price;
                    document.getElementById('total_service_amount').value = totalPrice;
                    document.getElementById('total_amount').value = totalPrice;
                    document.getElementsByClassName('amount_to_show')[0].textContent = '$ ' + totalPrice;
                    document.getElementsByClassName('amount_to_show')[1].textContent = '$ ' + totalPrice;
                } else {
                    document.getElementById('sessions').readOnly = true;

                }

            }
        });
    }

    function getMachineHand(val) {
        let value = {
            machineId: val,
        };
        $.ajax({
            type: 'GET',
            url: "{{ route('machine_hand') }}",
            data: value,
            success: function(result) {
                document.getElementById('hand').innerHTML =
                    '<option value="">-- Select Hand --</option>';
                for (var i = 0; i < result.length; i++) {
                    var opt = document.createElement('option');
                    opt.value = result[i].id;
                    opt.innerHTML = result[i].name;
                    document.getElementById('hand').appendChild(opt);
                }

            }
        });
    }

    function getRoomPractitioner(val) {
        var appointmentId = $('#appointment_id').val();
        let value = {
            appointmentStart: val,
            appointmentId: appointmentId,
        };
        $.ajax({
            type: 'GET',
            url: "{{ route('room_practitioner') }}",
            data: value,
            success: function(result) {
                if (result == 'closed') {
                    console.log('closed');
                    document.getElementById('error').style.display = "block";
                } else {
                    console.log('open');
                    document.getElementById('error').style.display = "none";
                    document.getElementById('room').innerHTML =
                        '<option value="">-- Select Room --</option>';
                    for (var i = 0; i < result.room.length; i++) {
                        var opt = document.createElement('option');
                        opt.value = result.room[i].id;
                        opt.innerHTML = result.room[i].name;
                        document.getElementById('room').appendChild(opt);
                    }
                    document.getElementById('practitionner').innerHTML =
                        '<option value="">-- Select Practitionner --</option>';
                    for (var i = 0; i < result.practitioners.length; i++) {
                        var opt = document.createElement('option');
                        opt.value = result.practitioners[i].id;
                        opt.innerHTML = result.practitioners[i].first_name;
                        document.getElementById('practitionner').appendChild(opt);
                    }
                }
                // if (ia > 0) {

                //     checkAppointment();
                // }
            }
        });

    }

    function getClientInfo(val) {
        let value = {
            clientId: val,
        };
        $.ajax({
            type: 'GET',
            url: "{{ route('client_info') }}",
            data: value,
            success: function(result) {
                if (result == "") {
                    document.getElementById('email').value = "";
                    document.getElementById('phone_number').value = "";
                } else {
                    document.getElementById('email').value = result[0].email;
                    document.getElementById('phone_number').value = result[0].phone_number;
                }
            }
        });
    }

    function totalServiceAmount() {
        let val = $("#promotion").val();
        let percent = val / 100;
        let amount = $('#total_amount').val();
        let min = percent * amount;
        amounts = amount - min;
        $('#total_service_amount').val(amounts);
        document.getElementsByClassName('amount_to_show')[0].textContent = '$ ' + amounts;
        document.getElementsByClassName('amount_to_show')[1].textContent = '$ ' + amounts;
    }

    function serviceAmount() {
        let numberOfSession = $("#sessions").val();
        let price = $("#session_price").val();
        let totalAmount = numberOfSession * price;
        $('#total_amount').val(totalAmount);
        totalServiceAmount();

    }
    $(document).ready(function() {

        $(".kt_datepicker_3").flatpickr({
            enableTime: true,
            dateFormat: "Y-m-d H:i",
            time_24hr: true,
        });

    });
    // $('#promotion').on('keypress', function(event) {
    //     var regex = new RegExp("^(?=.*[1-9])\d{0,2}(?:\.\d{0,2})?$");
    //     var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    //     if (!regex.test(key)) {
    //         event.preventDefault();
    //         return false;
    //     }
    // });
    $("input[name='promotion']").keyup(function() {
        number = $("input[name='promotion']").val()
        if (number <= 0 || number >= 100) {
            $("input[name='promotion']").val("");
        }
    });
</script>
<!--end::Form-->