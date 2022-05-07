@extends('layouts.main')

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header">
                    <h2 class="card-title fw-bolder">Calendar</h2>
                    <div class="card-toolbar">
                        <button type="button" class="btn btn-primary" onclick="addAppointment()">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                                    <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->Add Appointment
                        </button>
                    </div>
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body">
                    <!--begin::Calendar-->
                    <!-- <div id="kt_calendar_app"></div> -->
                    <div id="kt_docs_fullcalendar_basic"></div>
                    <!--end::Calendar-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
<script>
    function addAppointment() {
        $.ajax({
            type: 'GET',
            url: "appointment/create",
            success: function(result) {
                $('#myModalLgHeading').html('Add Appointment');
                $('#modalBodyLarge').html(result);
                $('#myModalLg').modal('show');
            }
        });
    }
</script>
@endsection