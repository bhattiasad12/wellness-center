<x-auth-validation-errors class="mb-4" style="color:red" :errors="$errors" />
<form id="" class="form" method="POST" action="{{route('client_note.store')}}">
    @csrf
    <!--begin::Input group-->
    <input type="hidden" name="client_id" value="{{$clientId}}" />
    <div class="fv-row mb-1">
        <!--begin::Label-->
        <label class="required fs-6 fw-bold form-label mb-2">Notes Description</label>
        <!--end::Label-->
        <!--begin::Input-->
        <textarea class="form-control form-control-solid rounded-3" name='note' required></textarea>
        <!--end::Input-->
    </div>
    <!--end::Input group-->
    <!--begin::Actions-->
    <div class="text-center pt-15">
        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" aria-label="Close">Discard</button>
        <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">Submit</button>
    </div>
    <!--end::Actions-->
</form>