@extends('layouts.main')

@section('content')

<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Navbar-->
            <div class="card mb-5 mb-xl-10">
                <div class="card-body pt-9 pb-0">
                    <!--begin::Details-->
                    <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
                        <div class="flex-grow-1">
                            <!--begin::Title-->
                            <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                <!--begin::User-->
                                <div class="d-flex flex-column">
                                    <!--begin::Name-->
                                    <div class="d-flex align-items-center mb-2">
                                        <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1">Practitioner: <span>{{ucwords($data[0]->first_name) }}</span></a>
                                        <a href="#">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen026.svg-->
                                            <span class="svg-icon svg-icon-1 svg-icon-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                                    <path d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z" fill="#00A3FF" />
                                                    <path class="permanent" d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z" fill="white" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </a>
                                    </div>
                                    <!--end::Name-->
                                </div>
                                <!--end::User-->
                                <!--begin::Actions-->
                                <div class="d-flex">
                                    <a href="#" class="btn btn-sm btn-primary me-2" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_practitioner">Edit Practitioner</a>
                                </div>
                                <!--end::Actions-->
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::Details-->
                </div>
            </div>
            <!--end::Navbar-->
            <!--begin::details View-->
            <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                <!--begin::Card header-->
                <div class="card-header cursor-pointer">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Practitioner Details</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Card body-->
                <div class="card-body p-9">
                    <!--begin::Row-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold text-muted">Practitioner Name</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <span class="fw-bolder fs-6 text-gray-800">{{ucwords($data[0]->first_name) }} - {{ucwords($data[0]->last_name) }}</span>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold text-muted">Email</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <span class="fw-bold text-gray-800 fs-6">{{$data[0]->email }}</span>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold text-muted">Phone Number</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <span class="fw-bold text-gray-800 fs-6">{{$data[0]->phone_number }}</span>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <a class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1">Weekdays</a>
                    <div class="separator separator-dashed my-10 mt-2"></div>
                    <!--begin::Input group-->
                    @for($i=0;$i < count($data); $i++) <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold text-muted">{{ucwords($data[$i]->day)}}</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-3 fv-row">
                            <span class="fw-bold text-gray-800 fs-6">{{ucwords($data[$i]->start_time)}}</span>
                        </div>
                        <div class="col-lg-3 fv-row">
                            <span class="fw-bold text-gray-800 fs-6">{{ucwords($data[$i]->end_time)}}</span>
                        </div>
                        <!--end::Col-->
                </div>
                @endfor
                <!--end::Input group-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::details View-->
    </div>
    <!--end::Container-->
</div>
<!--end::Post-->
</div>
<!--end::Content-->

<!--begin::Modal - Edit Service-->
<div class="modal fade" id="kt_modal_edit_practitioner" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_user_header">
                <!--begin::Modal title-->
                <h2 class="fw-bolder">Edit Service</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-2x">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"></rect>
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"></rect>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-10 my-7">
                <!--begin::Form-->
                <form id="" class="form" action="#">
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
                        <div class="row mb-7">
                            <div class="col-lg-3">
                                <label class="required fw-bold fs-6 mb-2">Week Day</label>
                                <select name="appointment_status" class="form-control form-control-solid mb-3 mb-lg-0">
                                    <option>-- Select Week Day --</option>
                                    <option value="Monday">Monday</option>
                                    <option value="Tuesday">Tuesday</option>
                                    <option value="Wednesday">Wednesday</option>
                                    <option value="Thursday">Thursday</option>
                                    <option value="Friday">Friday</option>
                                    <option value="Saturday">Saturday</option>
                                    <option value="Sunday">Sunday</option>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label class="required fw-bold fs-6 mb-2">Start Time(Check-In)</label>
                                <input class="form-control form-control-solid kt_datepicker_8" name="monday_checkin" value="" />
                            </div>
                            <div class="col-lg-3">
                                <label class="required fw-bold fs-6 mb-2">Start Time(Check-Out)</label>
                                <input class="form-control form-control-solid kt_datepicker_8" name="monday_checkout" value="" />
                            </div>
                            <div class="col-lg-3" style="text-align: center;align-self: center;">
                                <a href="#" class="btn btn-icon btn-light-facebook me-5">
                                    <i class="fas fa-plus fs-4"></i>
                                </a>
                                <a href="#" class="btn btn-icon btn-light-google me-5">
                                    <i class="fas fa-minus fs-4"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" aria-label="Close">Discard</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Edit Service-->

@endsection