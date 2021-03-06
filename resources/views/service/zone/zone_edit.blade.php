<div class="alert alert-danger" style="display:none"></div>
<form id="createServiceForm" class="form" method="POST" action="{{ route('service_zone.update', $serviceZone->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <!--begin::Scroll-->
    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">

        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Zone</label>
            <select name="zone" class="form-control form-control-solid mb-3 mb-lg-0" required>
                <option value="">-- Select Zone --</option>
                @for ($i = 0; $i < count($zone); $i++) <option value="{{ $zone[$i]->zone_name }}" {{$serviceZone->zone == $zone[$i]->zone_name ? "Selected":""}}>{{ ucwords($zone[$i]->zone_name) }}</option>
                    @endfor
            </select>
        </div>
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Sessions</label>
            <select name="session" class="form-control form-control-solid mb-3 mb-lg-0" id="">
                <option value="1" {{ '1' == $serviceZone->session ? 'selected' : '' }}>1</option>
                <option value="2" {{ '2' == $serviceZone->session ? 'selected' : '' }}>2</option>
                <option value="3" {{ '3' == $serviceZone->session ? 'selected' : '' }}>3</option>
                <option value="4" {{ '4' == $serviceZone->session ? 'selected' : '' }}>4</option>
                <option value="5" {{ '5' == $serviceZone->session ? 'selected' : '' }}>5</option>
                <option value="6" {{ '6' == $serviceZone->session ? 'selected' : '' }}>6</option>
                <option value="7" {{ '7' == $serviceZone->session ? 'selected' : '' }}>7</option>
                <option value="8" {{ '8' == $serviceZone->session ? 'selected' : '' }}>8</option>
                <option value="9" {{ '9' == $serviceZone->session ? 'selected' : '' }}>9</option>
                <option value="10" {{ '10' == $serviceZone->session ? 'selected' : '' }}>10</option>
            </select>
        </div>

        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Time Limit (min)</label>
            <input type="number" name="time_limit" class="form-control form-control-solid mb-3 mb-lg-0" value="{{$serviceZone->time_limit}}" placeholder="20" required />
        </div>
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Price ($)</label>
            <input type="number" name="price" class="form-control form-control-solid mb-3 mb-lg-0" value="{{$serviceZone->price}}" placeholder="299" required />
        </div>

    </div>
    <!--end::Scroll-->
    <!--begin::Actions-->
    <div class="text-center pt-15">
        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" aria-label="Close">Discard</button>
        <button type="submit" id="ajaxSubmit" class="btn btn-primary">Update</button>
    </div>
    <!--end::Actions-->
</form>