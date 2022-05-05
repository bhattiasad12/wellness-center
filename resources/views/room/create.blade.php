<div class="alert alert-danger" style="display:none"></div>
<form id="createRoomForm" class="form" method="POST" action="{{ route('room.store') }}">
    @csrf
    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Room</label>
            <input type="text" name="room" value="{{ old('room') }}" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter the Room Name" required />
        </div>
        <div class="picker">
            <input name='color' class="color_picker color_code" type="color" value="{{ old('color') }}">
        </div>
    </div>
    <div class="text-center pt-15">
        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" aria-label="Close">Discard</button>
        <button id="ajaxSubmit" class="btn btn-primary">Add</button>
    </div>
</form>

<script>
    jQuery(document).ready(function() {
        jQuery('#ajaxSubmit').click(function(e) {
            e.preventDefault();
            jQuery.ajax({
                url: $("#createRoomForm").attr('action'),
                method: 'POST',
                data: $('#createRoomForm').serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                success: function(response) {
                    jQuery('.alert-danger').hide();
                    location.reload();
                },
                error: function(response) {
                    let err = response.responseJSON.errors;
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