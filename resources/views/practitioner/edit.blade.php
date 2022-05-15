<div class="alert alert-danger" style="display:none"></div>
<form id="editPractionerForm" class="form" method="POST" action="{{ route('practitioner.update', $id) }}">
    @method('PUT')
    @csrf
    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="" data-kt-scroll="true"
        data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
        data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
        data-kt-scroll-offset="300px">
        <div class="row mb-7">
            <div class="col-lg-6">
                <label class="required fw-bold fs-6 mb-2">Practitioner First Name</label>
                <input type="text" name="first_name" value="{{ $practitioner[0]->first_name }}"
                    class="form-control form-control-solid mb-3 mb-lg-0"
                    placeholder="Please Enter the Practitioner First Name" />
            </div>
            <div class="col-lg-6">
                <label class="required fw-bold fs-6 mb-2">Practitioner Last Name</label>
                <input type="text" name="last_name" value="{{ $practitioner[0]->last_name }}"
                    class="form-control form-control-solid mb-3 mb-lg-0"
                    placeholder="Please Enter the Practitioner Last Name" />
            </div>
        </div>
        <div class="row mb-7">
            <div class="col-lg-6">
                <label class="required fw-bold fs-6 mb-2">Email</label>
                <input type="email" name="email" value="{{ $practitioner[0]->email }}"
                    class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter the Email" />
            </div>
            <div class="col-lg-6">
                <label class="required fw-bold fs-6 mb-2">Phone Number</label>
                <input type="number" name="phone_number" value="{{ $practitioner[0]->phone_number }}"
                    class="form-control form-control-solid mb-3 mb-lg-0"
                    placeholder="Please Enter the Practitioner Phone Number" />
            </div>
        </div>
        @php $count = 0; @endphp
        @foreach ($practitioner as $item)
            <input type="hidden" name="practitioner_time_id[]" value="{{ $item->practitioner_time_id }}">
            <div class="row mb-7" id='details'>
                <div class="col-lg-3">
                    <label class="required fw-bold fs-6 mb-2">Week Day</label>
                    <select name="days[]" class="form-control form-control-solid mb-3 mb-lg-0">
                        <option>-- Select Week Day --</option>
                        @for ($i = 0; $i < count($days); $i++)
                            <option value="{{ $days[$i]->id }}"
                                {{ $days[$i]->day == $item->day ? 'selected' : '' }}>
                                {{ ucwords($days[$i]->day) }}</option>
                        @endfor
                    </select>
                </div>
                <div class="col-lg-3">
                    <label class="required fw-bold fs-6 mb-2">Start Time(Check-In)</label>
                    <input class="form-control form-control-solid kt_datepicker_8" name="check_in[]"
                        value="{{ $item->start_time }}" />
                </div>
                <div class="col-lg-3">
                    <label class="required fw-bold fs-6 mb-2">Start Time(Check-Out)</label>
                    <input class="form-control form-control-solid kt_datepicker_8" name="check_out[]"
                        value="{{ $item->end_time }}" />
                </div>
                <div class="col-lg-3 pt-8" style="text-align: center;align-self: center;">
                    <button type="button" class="btn btn-icon btn-light-facebook me-5" onclick="addMore(this)">
                        <i class="fas fa-plus fs-4"></i>
                    </button>
                    <button type="button" class="btn btn-icon btn-light-google me-5"
                        @if ($count == 0) {
                        {{ 'hidden' }}
                    } @endif
                        onclick="deleteMore(this)">
                        <i class="fas fa-minus fs-4"></i>
                    </button>
                </div>
            </div>
            @php $count++ @endphp
        @endforeach
        <div id='more'>
        </div>
    </div>
    <div class="text-center pt-15">
        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" aria-label="Close">Discard</button>
        <button type="submit" id="ajaxSubmit" class="btn btn-primary">Update</button>
    </div>
</form>
<script>
    var i = 1;

    function addMore(obj) {

        if (i == 7) {
            alert("All days are selected");
            return true;
        }
        i++;
        $(document).ready(function() {
            $('select').on('change', function() {
                //restore previously selected value
                var prevValue = $(this).data('previous');
                $('select').not(this).find('option[value="' + prevValue + '"]').show();
                //hide option selected                
                var value = $(this).val();
                //update previously selected data
                $(this).data('previous', value);
                $('select').not(this).find('option[value="' + value + '"]').hide();
            });
        });

        $('body').on('focus', ".kt_datepicker_8", function() {
            $(".kt_datepicker_8").flatpickr({
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
                time_24hr: true,

            });
        });

        let rowId = obj.parentElement.parentElement.id;
        rowId = document.getElementById(rowId);
        let row = rowId.cloneNode(true);
        row.children[3].children[1].removeAttribute('hidden');
        document.getElementById('more').appendChild(row);
    }

    function deleteMore(obj) {
        i--;
        let row = obj.parentElement.parentElement;
        row.remove();
        val = row.children[0].children[1].value
        $('select').not(this).find('option[value="' + val + '"]').show();
    }
    jQuery(document).ready(function() {
        jQuery('#ajaxSubmit').click(function(e) {
            $("#ajaxSubmit").prop("disabled", true);
            e.preventDefault();
            jQuery.ajax({
                url: $("#editPractionerForm").attr('action'),
                method: 'POST',
                data: $('#editPractionerForm').serialize(),
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
</script>
