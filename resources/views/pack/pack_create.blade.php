<div class="alert alert-danger" style="display:none"></div>
<form id="createServiceForm" class="form" method="POST" action="{{ route('pack.store') }}" enctype="multipart/form-data">
    @csrf
    <!--begin::Scroll-->
    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Pack Name</label>
            <input type="text" name="pack_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="pack name" required />
        </div>
        <div class="fv-row mb-7">
            <label for="" class="required fw-bold fs-6 mb-2">Services</label>
            <select name="services[]" class="form-select form-select-solid js-example-basic-single" data-control="select2" data-placeholder="Select an option" data-allow-clear="true" multiple="multiple" required>
                <option value="">-- Select Services --</option>
                @for ($i = 0; $i < count($service); $i++) <option value="{{ $service[$i]->id }}">{{ ucwords($service[$i]->service_name) }}</option>
                    @endfor


            </select>
        </div>
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">session</label>
            <input type="number" name="session" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="0" required />
        </div>
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Price $</label>
            <input type="number" name="price" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="0" required />
        </div>


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
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>