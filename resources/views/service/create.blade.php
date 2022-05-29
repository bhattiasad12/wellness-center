<div class="alert alert-danger" style="display:none"></div>
<form id="createServiceForm" class="form" method="POST" action="{{ route('service.store') }}" enctype="multipart/form-data">
    @csrf
    <!--begin::Scroll-->
    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
        <div class="fv-row mb-7">
            <label for="" class="required fw-bold fs-6 mb-2">Machine</label>
            <select name="machine" class="form-control form-control-solid mb-3 mb-lg-0" required onchange="GetHand(this.value)">
                <option value="">-- Select Machine --</option>
                @for ($i = 0; $i < count($machine); $i++) <option value="{{ $machine[$i]->id }}">{{ ucwords($machine[$i]->name) }}</option>
                    @endfor
            </select>
        </div>
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Hand</label>
            <select name="hand" id='hand' class="form-control form-control-solid mb-3 mb-lg-0" required>
                <option value="">-- Select Hand --</option>

            </select>
        </div>
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Service Name</label>
            <input type="text" min="0" name="service_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Service 2" required />
        </div>
        <!-- <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Zone</label>
            <select name="zone" class="form-control form-control-solid mb-3 mb-lg-0" required>
                <option value="">-- Select Zone --</option>
                @for ($i = 0; $i < count($zone); $i++)
                    <option value="{{ $zone[$i]->zone_name }}">{{ ucwords($zone[$i]->zone_name) }}</option>
                @endfor
            </select>
        </div> -->
        <!-- <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Sessions</label>
            <select name="session" class="form-control form-control-solid mb-3 mb-lg-0" required>
                <option value="">-- Select Sessions --</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
        </div> -->
        <!-- <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Time Limit (min)</label>
            <input type="number" name="time_limit" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="20" required />
        </div>
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Price ($)</label>
            <input type="number" name="price" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="299" required />
        </div> -->

    </div>
    <!--end::Scroll-->
    <!--begin::Actions-->
    <div class="text-center pt-15">
        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" aria-label="Close">Discard</button>
        <button type="submit" id="ajaxSubmit" class="btn btn-primary">Add</button>
    </div>
    <!--end::Actions-->
</form>
<script>
    GetHand = (machineId) => {
        let value = {
            machineId: machineId,
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

    jQuery(document).ready(function() {
        jQuery('#ajaxSubmit').click(function(e) {
            $("#ajaxSubmit").prop("disabled", true);
            e.preventDefault();
            jQuery.ajax({
                url: $("#createServiceForm").attr('action'),
                method: 'POST',
                data: $('#createServiceForm').serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                success: function(response) {
                    jQuery('.alert-danger').hide();
                    location.reload();
                },
                error: function(response) {
                    let err = response.responseJSON.errors;
                    $("#ajaxSubmit").prop("disabled", false);
                    $('.alert-danger').html('');
                    $.each(err, function(key, value) {
                        $('.alert-danger').show();
                        $('.alert-danger').append('<li>' + value + '</li>');
                    });
                }
            });
        });
    });
</script>