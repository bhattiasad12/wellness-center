@extends('layouts.partials.footer')

<div class="alert alert-danger" style="display:none"></div>
<form id="createClientForm" class="form" method="POST" action="{{ route('client.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="d-flex flex-column scroll-y me-n7 pe-7">
        <div class="fv-row mb-7">
            <label class="d-block fw-bold fs-6 mb-5">Avatar</label>
            <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url({{ asset('theme/assets/media/svg/avatars/blank.svg') }})">
                <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{ asset('theme/assets/media/svg/avatars/blank.svg') }})">
                </div>
                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                    <i class="bi bi-pencil-fill fs-7"></i>
                    <input onchange="fileValidation(this.id)" type="file" id='avatar' name="avatar" accept=".png, .jpg, .jpeg" />
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
            <input type="text" name="first_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter your First Name here." required />
        </div>
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Last Name</label>
            <input type="text" name="last_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter your Last Name here." required />
        </div>
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Email</label>
            <input id='email' type="email" name="email" onblur="CheckValidEmail(this.id)" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="example@domain.com" required />
        </div>
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Phone Number</label>
            <input type="number" min="0" name="phone_number" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter your Phone Number here." required />
        </div>
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Age</label>
            <input type="number" min="0" name="age" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter your Age here." required />
        </div>
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Source</label>
            <input type="text" name="source" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter the Source here." required />
        </div>
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Neighborhood</label>
            <input type="text" name="neighborhood" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter your Neighborhood here." required />
        </div>
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">City</label>
            <input type="text" name="city" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter your City here." required />
        </div>
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Zip Code</label>
            <input type="text" name="zipcode" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter your Zip Code here." required />
        </div>
    </div>
    <div class="text-center pt-15">
        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" aria-label="Close">Discard</button>
        <button type="submit" id="" class="btn btn-primary">Submit</button>
    </div>
</form>

<!-- <script>
    jQuery(document).ready(function() {
        jQuery('#ajaxSubmit').click(function(e) {
            $("#ajaxSubmit").prop("disabled", true);
            e.preventDefault();
            jQuery.ajax({
                url: $("#createClientForm").attr('action'),
                method: 'POST',
                data: $('#createClientForm').serialize(),
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
</script> -->