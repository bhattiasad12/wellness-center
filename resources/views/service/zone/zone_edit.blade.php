<div class="alert alert-danger" style="display:none"></div>
<form id="createServiceForm" class="form" method="POST" action="{{ route('service_zone.update', $serviceZone->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <!--begin::Scroll-->
    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">

        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Zone</label>
            <input type="text" name="zone" value="{{ $serviceZone->zone }}" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="20" required />


        </div>
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Sessions</label>
            <input type="number" name="session" class="form-control form-control-solid mb-3 mb-lg-0" value="{{$serviceZone->session}}" required />
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