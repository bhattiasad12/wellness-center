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
                                        <a class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1">Appointment# <span>{{$appointment[0]->appointment_id}}</span>: <span class="text-primary">{{ucwords($appointment[0]->client_first_name)}} {{ucwords($appointment[0]->client_last_name)}}</span></a>
                                        <a>
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen026.svg-->
                                            <span class="svg-icon svg-icon-1 svg-icon-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.3" d="M12.025 4.725C9.725 2.425 6.025 2.425 3.725 4.725C1.425 7.025 1.425 10.725 3.725 13.025L11.325 20.625C11.725 21.025 12.325 21.025 12.725 20.625L20.325 13.025C22.625 10.725 22.625 7.025 20.325 4.725C18.025 2.425 14.325 2.425 12.025 4.725Z" fill="black" />
                                                    <path d="M14.025 17.125H13.925C13.525 17.025 13.125 16.725 13.025 16.325L11.925 11.125L11.025 14.325C10.925 14.725 10.625 15.025 10.225 15.025C9.825 15.125 9.425 14.925 9.225 14.625L7.725 12.325L6.525 12.925C6.425 13.025 6.225 13.025 6.125 13.025H3.125C2.525 13.025 2.125 12.625 2.125 12.025C2.125 11.425 2.525 11.025 3.125 11.025H5.925L7.725 10.125C8.225 9.925 8.725 10.025 9.025 10.425L9.825 11.625L11.225 6.72498C11.325 6.32498 11.725 6.02502 12.225 6.02502C12.725 6.02502 13.025 6.32495 13.125 6.82495L14.525 13.025L15.225 11.525C15.425 11.225 15.725 10.925 16.125 10.925H21.125C21.725 10.925 22.125 11.325 22.125 11.925C22.125 12.525 21.725 12.925 21.125 12.925H16.725L15.025 16.325C14.725 16.925 14.425 17.125 14.025 17.125Z" fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </a>
                                    </div>
                                    <!--end::Name-->
                                    <!--begin::Info-->
                                    <div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
                                        <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                            <!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
                                            <span class="svg-icon svg-icon-4 me-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.3" d="M11 6.5C11 9 9 11 6.5 11C4 11 2 9 2 6.5C2 4 4 2 6.5 2C9 2 11 4 11 6.5ZM17.5 2C15 2 13 4 13 6.5C13 9 15 11 17.5 11C20 11 22 9 22 6.5C22 4 20 2 17.5 2ZM6.5 13C4 13 2 15 2 17.5C2 20 4 22 6.5 22C9 22 11 20 11 17.5C11 15 9 13 6.5 13ZM17.5 13C15 13 13 15 13 17.5C13 20 15 22 17.5 22C20 22 22 20 22 17.5C22 15 20 13 17.5 13Z" fill="black" />
                                                    <path d="M17.5 16C17.5 16 17.4 16 17.5 16L16.7 15.3C16.1 14.7 15.7 13.9 15.6 13.1C15.5 12.4 15.5 11.6 15.6 10.8C15.7 9.99999 16.1 9.19998 16.7 8.59998L17.4 7.90002H17.5C18.3 7.90002 19 7.20002 19 6.40002C19 5.60002 18.3 4.90002 17.5 4.90002C16.7 4.90002 16 5.60002 16 6.40002V6.5L15.3 7.20001C14.7 7.80001 13.9 8.19999 13.1 8.29999C12.4 8.39999 11.6 8.39999 10.8 8.29999C9.99999 8.19999 9.20001 7.80001 8.60001 7.20001L7.89999 6.5V6.40002C7.89999 5.60002 7.19999 4.90002 6.39999 4.90002C5.59999 4.90002 4.89999 5.60002 4.89999 6.40002C4.89999 7.20002 5.59999 7.90002 6.39999 7.90002H6.5L7.20001 8.59998C7.80001 9.19998 8.19999 9.99999 8.29999 10.8C8.39999 11.5 8.39999 12.3 8.29999 13.1C8.19999 13.9 7.80001 14.7 7.20001 15.3L6.5 16H6.39999C5.59999 16 4.89999 16.7 4.89999 17.5C4.89999 18.3 5.59999 19 6.39999 19C7.19999 19 7.89999 18.3 7.89999 17.5V17.4L8.60001 16.7C9.20001 16.1 9.99999 15.7 10.8 15.6C11.5 15.5 12.3 15.5 13.1 15.6C13.9 15.7 14.7 16.1 15.3 16.7L16 17.4V17.5C16 18.3 16.7 19 17.5 19C18.3 19 19 18.3 19 17.5C19 16.7 18.3 16 17.5 16Z" fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->Machine: <span class="fw-bolder mx-1">{{ucwords($appointment[0]->machine_name)}}</span>
                                        </a>
                                        <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                            <!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
                                            <span class="svg-icon svg-icon-4 me-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="black"></path>
                                                    <path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="black"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->Service: <span class="fw-bolder mx-1">{{ucwords($appointment[0]->service_name)}}</span>
                                        </a>
                                    </div>
                                    <!--end::Info-->
                                </div>
                                <!--end::User-->
                                <!--begin::Actions-->
                                <div class="d-flex my-4">
                                    <button type="button" class="btn btn-sm btn-circle btn-light-primary me-2" onclick="editAppointment('{{$appointment[0]->appointment_id}}')">Edit Appointment</button>
                                    @if($appointment[0]->unpaid <= '0' ) <button disabled class="btn btn-sm btn-circle btn-light-warning me-2" data-bs-toggle="modal" data-bs-target="#kt_modal_add_payment">Add Remaining Payment</button>
                                        @else
                                        <a href="#" class="btn btn-sm btn-circle btn-light-warning me-2" data-bs-toggle="modal" data-bs-target="#kt_modal_add_payment">Add Remaining Payment</a>
                                        @endif
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
            <div class="row">
                <div class="col-lg-7">
                    <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                        <!--begin::Card header-->
                        <div class="card-header cursor-pointer">
                            <!--begin::Card title-->
                            <div class="card-title m-0">
                                <h3 class="fw-bolder m-0">Appointment Details</h3>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--begin::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body p-9">
                            <div class="d-flex flex-column me-n7 pe-7">
                                <div class="row mb-7">
                                    <div class="col-lg-6">
                                        <label class="fw-bold fs-6 mb-2">First Name</label>
                                        <p class="text-muted">{{ucwords($appointment[0]->client_first_name)}}</p>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="fw-bold fs-6 mb-2">Last Name</label>
                                        <p class="text-muted">{{ucwords($appointment[0]->client_last_name)}}</p>
                                    </div>
                                </div>
                                <div class="row mb-7">
                                    <div class="col-lg-6">
                                        <label class="fw-bold fs-6 mb-2">Phone Number</label>
                                        <p class="text-muted">{{$appointment[0]->phone_number}}</p>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="fw-bold fs-6 mb-2">Appointment Date</label>
                                        <p class="text-muted">{{Date("Y-m-d",strtotime($appointment[0]->appointment_start))}}</p>
                                    </div>
                                </div>

                                <div class="separator separator-dashed my-10"></div>
                                <div class="row mb-7">
                                    <div class="col-lg-6">
                                        <label class="fw-bold fs-6 mb-2">Type</label>
                                        <p class="text-muted">{{ucwords($appointment[0]->type)}}</p>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="fw-bold fs-6 mb-2">Pack Name</label>
                                        <p class="text-muted">{{ucwords($appointment[0]->pack_name)}}</p>
                                    </div>
                                </div>
                                <div class="row mb-7">
                                    <div class="col-lg-6">
                                        <label class="fw-bold fs-6 mb-2">Machine</label>
                                        <p class="text-muted">{{ucwords($appointment[0]->machine_name)}}</p>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="fw-bold fs-6 mb-2">Hand</label>
                                        <p class="text-muted">{{ucwords($appointment[0]->hand_name)}}</p>
                                    </div>
                                </div>
                                <div class="row mb-7">
                                    <div class="col-lg-6">
                                        <label class="fw-bold fs-6 mb-2">Service</label>
                                        <p class="text-muted">{{ucwords($appointment[0]->service_name)}}</p>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="fw-bold fs-6 mb-2">Zone</label>
                                        <p class="text-muted">{{ucwords($zone[0]->zone)}}</p>
                                    </div>
                                </div>
                                <div class="row mb-7">
                                    <div class="col-lg-6">
                                        <label class="fw-bold fs-6 mb-2">Sessions</label>
                                        <p class="text-muted">{{$appointment[0]->session}}</p>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="fw-bold fs-6 mb-2">Session Price</label>
                                        <p class="text-muted">${{$appointment[0]->session_price}}</p>
                                    </div>
                                </div>
                                <div class="row mb-7">
                                    <div class="col-lg-6">
                                        <label class="fw-bold fs-6 mb-2">Promotion(%)</label>
                                        <p class="text-muted">{{$appointment[0]->promotion}}</p>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="fw-bold fs-6 mb-2">Total Service Amount</label>
                                        <p class="text-muted">${{$appointment[0]->total_service_amount}}</p>
                                    </div>
                                </div>

                                <!-- <div class="separator separator-dashed my-10"></div>

                                <div class="row mb-7">
                                    <div class="col-lg-6">
                                        <label class="fw-bold fs-6 mb-2">Payment Method</label>
                                        <p class="text-muted">Cash</p>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="fw-bold fs-6 mb-2">Cash</label>
                                        <p class="text-muted">$300</p>
                                    </div>
                                </div>
                                <div class="row mb-7">
                                    <div class="col-lg-6">
                                        <label class="fw-bold fs-6 mb-2">Paid</label>
                                        <p class="text-muted">$300</p>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="fw-bold fs-6 mb-2">Un-Paid</label>
                                        <p class="text-muted">$500</p>
                                    </div>
                                </div> -->

                                <div class="separator separator-dashed my-10"></div>

                                <div class="row mb-7">
                                    <div class="col-lg-6">
                                        <label class="fw-bold fs-6 mb-2">Start Time(Check-In)</label>
                                        <p class="text-muted">{{$appointment[0]->appointment_start}}</p>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="fw-bold fs-6 mb-2">Finish Time (Check-Out)</label>
                                        <p class="text-muted">{{$appointment[0]->appointment_end}}</p>
                                    </div>
                                </div>
                                <div class="row mb-7">
                                    <div class="col-lg-6">
                                        <label class="fw-bold fs-6 mb-2">Room Time</label>
                                        <p class="text-muted">{{$appointment[0]->room_time}}</p>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="fw-bold fs-6 mb-2">Room</label>
                                        <p class="text-muted">{{ucwords($appointment[0]->room_name)}}</p>
                                    </div>
                                </div>
                                <div class="row mb-7">
                                    <div class="col-lg-6">
                                        <label class="fw-bold fs-6 mb-2">Practitionner</label>
                                        <p class="text-muted">{{ucwords($appointment[0]->pra_first_name)}} {{ucwords($appointment[0]->pra_last_name)}}</p>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="fw-bold fs-6 mb-2">Settings</label>
                                        <p class="text-muted">{{ucwords($appointment[0]->setting_name)}}</p>
                                    </div>
                                </div>
                                <div class="row mb-7">
                                    <div class="col-lg-6">
                                        <label class="fw-bold fs-6 mb-2">Appointment Status</label>
                                        <div class="d-table-cell badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">{{ucwords($appointment[0]->status)}}</div>
                                    </div>
                                </div>
                                <div class="row mb-7">
                                    <div class="col-lg-12">
                                        <label class="fw-bold fs-6 mb-2">Notes</label>
                                        <p class="text-muted">{{ucfirst($appointment[0]->note)}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Card body-->
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="row">
                        <div class="card mb-5 mb-xl-3" id="kt_profile_details_view">
                            <!--begin::Card header-->
                            <div class="card-header cursor-pointer">
                                <!--begin::Card title-->
                                <div class="card-title m-0">
                                    <h3 class="fw-bolder m-0">Payments History</h3>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <!--begin::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body p-9">
                                <div class="d-flex flex-column me-n7 pe-7">
                                    <div class="row mb-7">
                                        <div class="col-lg-12">
                                            <table class="table table-row-bordered gy-5 kt_datatable_example_1">
                                                <thead>
                                                    <tr class="fw-bold fs-6 text-muted">
                                                        <th>ID</th>
                                                        <th>Payment Date</th>
                                                        <th>Payment Method</th>
                                                        <th>Paid Amount</th>
                                                        <th>Un-Paid Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @for ($i = 0; $i < count($paymentHistory); $i++) @php $a=$i; $a++; @endphp <tr>
                                                        <td>{{$a}}</td>
                                                        <td>{{date("Y-m-d",strtotime($paymentHistory[$i]->payment_date))}}</td>
                                                        <td>{{ucwords($paymentHistory[$i]->payment_method)}}</td>
                                                        <td>${{$paymentHistory[$i]->paid}}</td>
                                                        <td>${{$paymentHistory[$i]->unpaid}}</td>
                                                        </tr>
                                                        @endfor
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Card body-->
                        </div>
                    </div>
                    <div class="row" style="position: sticky; top: 75px;">
                        <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                            <!--begin::Card header-->
                            <div class="card-header cursor-pointer">
                                <!--begin::Card title-->
                                <div class="card-title m-0">
                                    <h3 class="fw-bolder m-0">Payments Details</h3>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <!--begin::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body p-9">
                                <div class="d-flex flex-column me-n7 pe-7">
                                    <div class="row mb-7 justify-content-end text-end">
                                        <div class="col-lg-6">
                                            <label class="fw-bold fs-6 mb-2">Total Service Amount</label>
                                            <h3 class="fw-bolder m-0 text-primary">${{$appointment[0]->total_service_amount}}</h3>
                                        </div>
                                    </div>
                                    <div class="row mb-7 justify-content-end text-end">
                                        <div class="col-lg-6">
                                            <label class="fw-bold fs-6 mb-2">Paid</label>
                                            <h3 class="fw-bolder m-0 text-success">${{$appointment[0]->paid}}</h3>
                                        </div>
                                    </div>
                                    <div class="row mb-7 justify-content-end text-end">
                                        <div class="col-lg-6">
                                            <label class="fw-bold fs-6 mb-2">Un-Paid</label>
                                            <h3 class="fw-bolder m-0 text-danger">${{$appointment[0]->unpaid}}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Card body-->
                        </div>
                    </div>
                </div>
            </div>
            <!--end::details View-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>


<!--begin::Modal - Add Remaining Payment-->
<div class="modal fade" id="kt_modal_add_payment" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_user_header">
                <!--begin::Modal title-->
                <h2 class="fw-bolder">Add Remaining Payment</h2>
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
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-10 my-7 mb-0 pb-0">
                <!--begin::Form-->
                <form id="paymentfrom" class="form" method="POST" action="{{ route('add_payment') }}" enctype="multipart/form-data">
                    @csrf
                    <!--begin::Scroll-->
                    <input type="hidden" name="appointment_id" value="{{$appointment[0]->appointment_id}}" />
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                        <div class="row mb-7">
                            <div class="col-lg-6">
                                <label class="required fw-bold fs-6 mb-2">Payment Method</label>
                                <select name="payment_method" id="payment_method" class="form-control form-control-solid mb-3 mb-lg-0" required>
                                    <option value="">-- Select Payment Method --</option>
                                    <option value="Cash">Cash</option>
                                    <option value="Credit Card">Credit Card</option>
                                    <option value="Cheque">Cheque</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-7">
                            <div class="col-lg-6">
                                <label class="required fw-bold fs-6 mb-2">Paid</label>
                                <div class="input-group mb-5">
                                    <span class="input-group-text border-0">$</span>
                                    <input type="text" class="form-control form-control-solid mb-3 mb-lg-0" id="paid" name="paid" placeholder="Please Enter your Paid Amount here." required />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label class="required fw-bold fs-6 mb-2">Un-Paid</label>
                                <div class="input-group mb-5">
                                    <span class="input-group-text border-0">$</span>
                                    <input type="text" class="form-control form-control-solid mb-3 mb-lg-0" readonly id="unpaid" name="unpaid" value="{{$appointment[0]->unpaid}}" placeholder="Please Enter your Un-Paid Amount here.">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer flex-center">
                        <button type="reset" data-bs-dismiss="modal" aria-label="Close" class="btn btn-light me-3">Discard</button>
                        <button type="button" onclick="submitFromA()" class="btn btn-primary">Submit</button>
                    </div>
                    <!--end::Scroll-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->

            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Add Remaining Payment-->
<script>
    function editAppointment(id) {
        url = "{{ route('appointment.edit', ':id') }}";
        url = url.replace(':id', id);
        $.ajax({
            type: 'GET',
            url: url,
            success: function(result) {
                $('#myModalLgHeading').html('Edit Appointment');
                $('#modalBodyLarge').html(result);
                $('#myModalLg').modal('show');
            }
        });
    }

    function submitFromA() {
        var paymentMethod = $("#payment_method").val();
        if (paymentMethod == '') {
            alert('Payment method must be selected');
            return false;
        }
        var paid = $("#paid").val();
        if (paid == '') {
            alert('Please enter amount');
            return false;
        }
        var unpaid = $("#unpaid").val();
        if (parseInt(paid) > parseInt(unpaid)) {
            alert('The amount is greater then unpaid amount');
            return false;
        }

        var unpaid = $("#unpaid").val();
        if (parseInt(paid) <= parseInt(unpaid)) {
            document.getElementById("paymentfrom").submit();
        }

    }
</script>
@endsection