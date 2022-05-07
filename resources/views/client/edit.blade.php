@extends('layouts.partials.footer')
<div class="alert alert-danger" style="display:none"></div>

<form id="editClientForm" class="form" method="POST" action="{{ route('client.update', $client->id) }}" enctype="multipart/form-data">
    @method("PUT")
    @csrf
    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
        <div class="fv-row mb-7">
            <label class="d-block fw-bold fs-6 mb-5">Avatar</label>
            <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url({{ asset($client->profile_pic) }})">
                <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{ asset($client->profile_pic) }})">
                </div>
                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                    <i class="bi bi-pencil-fill fs-7"></i>
                    <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                    <input type="hidden" name="avatar_remove" />
                </label>
                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                    <i class="bi bi-x fs-2"></i>
                </span>
                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                    <i class="bi bi-x fs-2"></i>
                </span>
            </div>
            <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
        </div>
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">First Name</label>
            <input type="text" name="first_name" class="form-control form-control-solid mb-3 mb-lg-0" value="{{ $client->first_name }}" required />
        </div>
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Last Name</label>
            <input type="text" name="last_name" class="form-control form-control-solid mb-3 mb-lg-0" value="{{ $client->last_name }}" required />
        </div>
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Email</label>
            <input type="email" name="email" class="form-control form-control-solid mb-3 mb-lg-0" value="{{ $client->email }}" required />
        </div>
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Phone Number</label>
            <input type="number" min="0" name="phone_number" class="form-control form-control-solid mb-3 mb-lg-0" value="{{ $client->phone_number }}" required />
        </div>
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Age</label>
            <input type="number" min="0" name="age" class="form-control form-control-solid mb-3 mb-lg-0" value="{{ $client->age }}" required />
        </div>
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Source</label>
            <input type="text" name="source" class="form-control form-control-solid mb-3 mb-lg-0" value="{{ $client->source }}" required />
        </div>
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Neighborhood</label>
            <input type="text" name="neighborhood" class="form-control form-control-solid mb-3 mb-lg-0" value="{{ $client->neighborhood }}" required />
        </div>
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">City</label>
            <input type="text" name="city" class="form-control form-control-solid mb-3 mb-lg-0" value="{{ $client->city }}" required />
        </div>
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Zip Code</label>
            <input type="text" name="zipcode" class="form-control form-control-solid mb-3 mb-lg-0" value="{{ $client->zip_code }}" required />
        </div>
    </div>
    <div class="text-center pt-15">
        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" aria-label="Close">Discard</button>
        <button type="submit" id="ajaxSubmit" class="btn btn-primary">Update</button>
    </div>
</form>

<!-- <script>
    jQuery(document).ready(function() {
        jQuery('#ajaxSubmit').click(function(e) {
            $("#ajaxSubmit").prop("disabled", true);
            e.preventDefault();
            jQuery.ajax({
                url: $("#editClientForm").attr('action'),
                method: 'POST',
                data: $('#editClientForm').serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
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
</script> -->