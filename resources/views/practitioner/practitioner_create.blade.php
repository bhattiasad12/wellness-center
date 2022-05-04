<x-auth-validation-errors class="mb-4" style="color:red" :errors="$errors" />
<form id="" class="form" method="POST" action="{{route('practitioner.store')}}">
    @csrf
    <!--begin::Scroll-->
    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
        <div class="row mb-7">
            <div class="col-lg-6">
                <label class="required fw-bold fs-6 mb-2">Practitioner First Name</label>
                <input type="text" name="first_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter the Practitioner First Name" />
            </div>
            <div class="col-lg-6">
                <label class="required fw-bold fs-6 mb-2">Practitioner Last Name</label>
                <input type="text" name="last_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter the Practitioner Last Name" />
            </div>
        </div>
        <div class="row mb-7">
            <div class="col-lg-6">
                <label class="required fw-bold fs-6 mb-2">Email</label>
                <input type="email" name="email" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter the Email" />
            </div>
            <div class="col-lg-6">
                <label class="required fw-bold fs-6 mb-2">Phone Number</label>
                <input type="number" name="phone_number" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter the Practitioner Phone Number" />
            </div>
        </div>
        <div class="row mb-7" id='details'>
            <div class="col-lg-3">
                <label class="required fw-bold fs-6 mb-2">Week Day</label>
                <select name="days[]" class="form-control form-control-solid mb-3 mb-lg-0">
                    <option>-- Select Week Day --</option>
                    @for ($i = 0; $i< count($days); $i++) <option value=" {{$days[$i]->id}} "> {{ucwords($days[$i]->day)}} </option>
                        @endfor
                </select>
            </div>
            <div class="col-lg-3">
                <label class="required fw-bold fs-6 mb-2">Start Time(Check-In)</label>
                <input class="form-control form-control-solid kt_datepicker_8" name="check_in[]" value="" />
            </div>
            <div class="col-lg-3">
                <label class="required fw-bold fs-6 mb-2">Start Time(Check-Out)</label>
                <input class="form-control form-control-solid kt_datepicker_8" name="check_out[]" value="" />
            </div>
            <div class="col-lg-3" style="text-align: center;align-self: center;">
                <button type="button" class="btn btn-icon btn-light-facebook me-5" onclick="addMore(this)">
                    <i class="fas fa-plus fs-4"></i>
                </button>
                <button type="button" class="btn btn-icon btn-light-google me-5" hidden onclick="deleteMore(this)">
                    <i class="fas fa-minus fs-4"></i>
                </button>
            </div>
        </div>
        <div id='more'>
        </div>
    </div>
    <!--end::Scroll-->
    <!--begin::Actions-->
    <div class="text-center pt-15">
        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" aria-label="Close">Discard</button>
        <button type="submit" class="btn btn-primary">Add</button>
    </div>
    <!--end::Actions-->
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

        let id = obj.parentElement.parentElement.id;
        aa = document.getElementById(id);
        a = aa.cloneNode(true);
        a.children[3].children[1].removeAttribute('hidden');
        document.getElementById('more').appendChild(a);

        $(".kt_datepicker_8").flatpickr({
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true,

        });

    }

    function deleteMore(obj) {
        i--;
        obj.parentElement.parentElement.remove();
    }
</script>