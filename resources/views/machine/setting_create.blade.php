<x-auth-validation-errors class="mb-4" style="color:red" :errors="$errors" />

<form id="" class="form" method="POST" action="{{route('hand_setting.store')}}">
    @csrf
    <!--begin::Scroll-->
    <input type="hidden" name='machine_id' value="{{$mechineId}}" />
    <!--begin::Scroll-->
    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
        <div class="row mb-7">
            <div class="col-lg-6">
                <label class="required fw-bold fs-6 mb-2">Hand</label>
                <select name="hand" class="form-control form-control-solid mb-3 mb-lg-0" value="{{old('hand')}}">
                    <option>-- Select Hand --</option>
                    @for ($i = 0; $i< count($handLov); $i++) <option value="{{$handLov[$i]->id}}">{{ucwords($handLov[$i]->name)}}</option>
                        @endfor
                </select>
            </div>
            <div class="col-lg-6">
                <label class="required fw-bold fs-6 mb-2">Setting Name</label>
                <input type="text" class="form-control form-control-solid mb-3 mb-lg-0" value="{{old('setting_name')}}" name="setting_name" placeholder="Please Enter your Setting Name here.">
            </div>
        </div>
        <div class="row mb-7">
            <div class="col-lg-4">
                <label class="required fw-bold fs-6 mb-2">Min</label>
                <input type="text" class="form-control form-control-solid mb-3 mb-lg-0" value="{{old('min')}}" name="min" placeholder="Please Enter your Min here.">
            </div>
            <div class="col-lg-4">
                <label class="required fw-bold fs-6 mb-2">Max</label>
                <input type="text" class="form-control form-control-solid mb-3 mb-lg-0" value="{{old('max')}}" name="max" placeholder="Please Enter your Max here.">
            </div>
            <div class="col-lg-4">
                <label class="required fw-bold fs-6 mb-2">Start</label>
                <input type="text" class="form-control form-control-solid mb-3 mb-lg-0" value="{{old('start')}}" name="start" placeholder="Please Enter your Start here.">
            </div>
        </div>
    </div>
    <!--end::Scroll-->
    <div class="modal-footer flex-center">
        <button type="reset" data-bs-dismiss="modal" aria-label="Close" class="btn btn-light me-3">Discard</button>
        <button type="submit" id="kt_modal_add_customer_submit" class="btn btn-primary">Submit</button>
    </div>
</form>