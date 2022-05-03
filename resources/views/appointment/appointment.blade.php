@extends('layouts.main')

@section('content')
    <style>
        @media (min-width:1400px) {

            .container,
            .container-lg,
            .container-md,
            .container-sm,
            .container-xl,
            .container-xxl {
                max-width: 1620px
            }
        }

    </style>

    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Row-->
                <div class="row gy-5 g-xl-10">
                    <div class="col-xl-12 mb-5 mb-xl-10">
                        <!--begin::Card-->
                        <div class="card card-docs mb-2">
                            <div class="p-10">
                                <!--begin::Heading-->
                                <h1 class="anchor fw-bolder mb-5" id="zero-configuration">
                                    <a href="javascript:;"></a>Appointments List
                                </h1>
                                <!--begin::Notice-->
                                <div class="d-flex align-items-center rounded py-5 px-4 bg-light-info">
                                    <!--begin::Icon-->
                                    <div class="d-flex h-80px w-80px flex-shrink-0 flex-center position-relative ms-3 me-6">
                                        <!--begin::Svg Icon | path: icons/duotune/abstract/abs051.svg-->
                                        <span class="svg-icon svg-icon-info position-absolute opacity-10">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="70px" height="70px"
                                                viewBox="0 0 70 70" fill="none" class="w-80px h-80px">
                                                <path
                                                    d="M28 4.04145C32.3316 1.54059 37.6684 1.54059 42 4.04145L58.3109 13.4585C62.6425 15.9594 65.3109 20.5812 65.3109 25.5829V44.4171C65.3109 49.4188 62.6425 54.0406 58.3109 56.5415L42 65.9585C37.6684 68.4594 32.3316 68.4594 28 65.9585L11.6891 56.5415C7.3575 54.0406 4.68911 49.4188 4.68911 44.4171V25.5829C4.68911 20.5812 7.3575 15.9594 11.6891 13.4585L28 4.04145Z"
                                                    fill="#000000" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <!--begin::Svg Icon | path: icons/duotune/art/art006.svg-->
                                        <span class="svg-icon svg-icon-3x svg-icon-info position-absolute">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M6.5 11C8.98528 11 11 8.98528 11 6.5C11 4.01472 8.98528 2 6.5 2C4.01472 2 2 4.01472 2 6.5C2 8.98528 4.01472 11 6.5 11Z"
                                                    fill="black" />
                                                <path opacity="0.3"
                                                    d="M13 6.5C13 4 15 2 17.5 2C20 2 22 4 22 6.5C22 9 20 11 17.5 11C15 11 13 9 13 6.5ZM6.5 22C9 22 11 20 11 17.5C11 15 9 13 6.5 13C4 13 2 15 2 17.5C2 20 4 22 6.5 22ZM17.5 22C20 22 22 20 22 17.5C22 15 20 13 17.5 13C15 13 13 15 13 17.5C13 20 15 22 17.5 22Z"
                                                    fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Description-->
                                    <div class="text-gray-700 fw-bold fs-6 lh-lg">Here we have a list of all of the
                                        Appointments that are booked.</div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Notice-->
                                <!--end::Heading-->
                            </div>
                            <!--begin::Card header-->
                            <div class="card-header border-0">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <!--begin::Search-->
                                    <div class="d-flex align-items-center position-relative my-1">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                        <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                                    rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                                <path
                                                    d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                                    fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <input type="text" id="search" data-kt-user-table-filter="search"
                                            class="form-control form-control-solid w-250px ps-14" placeholder="Search" />
                                    </div>
                                    <!--end::Search-->
                                </div>
                                <!--begin::Card title-->
                                <!--begin::Card toolbar-->
                                <div class="card-toolbar">
                                    <!--begin::Toolbar-->
                                    <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                        <!--begin::Add Client-->
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#kt_modal_add_appointment">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1"
                                                        transform="rotate(-90 11.364 20.364)" fill="black" />
                                                    <rect x="4.36396" y="11.364" width="16" height="2" rx="1"
                                                        fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->Add Appointment
                                        </button>
                                        <!--end::Add Client-->
                                    </div>
                                    <!--end::Toolbar-->
                                </div>
                                <!--end::Card toolbar-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card Body-->
                            <div class="card-body fs-6 py-lg-5 text-gray-700">

                                <!--begin::Block-->
                                <div class="py-5">
                                    <table class="kt_datatable_example_1 table table-row-bordered gy-5">
                                        <thead>
                                            <tr class="fw-bold fs-6 text-muted">
                                                <th class="min-w-150px">Appointment ID</th>
                                                <th class="min-w-150px">Appointment Date</th>
                                                <th class="min-w-100px">First Name</th>
                                                <th class="min-w-100px">Last Name</th>
                                                <th class="min-w-150px">Phone Number</th>
                                                <th class="min-w-80px">Machine</th>
                                                <th class="min-w-80px">Service</th>
                                                <th class="min-w-100px">Hand</th>
                                                <th class="min-w-80px">Zone</th>
                                                <th class="min-w-80px">Sessions</th>
                                                <th class="min-w-100px">Session Price</th>
                                                <th class="min-w-150px">Total Service Price</th>
                                                <th class="min-w-80px">Paid</th>
                                                <th class="min-w-80px">Un-Paid</th>
                                                <th class="min-w-200px">Start Time(Check-In)</th>
                                                <th class="min-w-200px">Finish Time (Chek-Out)</th>
                                                <th class="min-w-150px">Room Time</th>
                                                <th class="min-w-100px">Room</th>
                                                <th class="min-w-150px">Practitionner</th>
                                                <th class="min-w-150px">Settings</th>
                                                <th class="min-w-150px">Appointment Status</th>
                                                <th class="min-w-300px">Notes</th>
                                                <th class="min-w-150px">Creation Date</th>
                                                <th class="min-w-100px">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="fw-bold text-gray-600">
                                            <tr>
                                                <td><a href="{{ route('appointment.show', '1') }}"
                                                        class="fw-bolder text-gray-800 text-hover-primary mb-1">001</a></td>
                                                <td><a href="{{ route('appointment.show', '1') }}"
                                                        class="fw-bolder text-gray-800 text-hover-primary mb-1">11-04-2022</a>
                                                </td>
                                                <td><a href="{{ route('appointment.show', '1') }}"
                                                        class="fw-bolder text-gray-800 text-hover-primary mb-1">Tiger</a>
                                                </td>
                                                <td><a href="{{ route('appointment.show', '1') }}"
                                                        class="fw-bolder text-gray-800 text-hover-primary mb-1">Nixon</a>
                                                </td>
                                                <td>03343394556</td>
                                                <td>IPL</td>
                                                <td>Laser</td>
                                                <td>01 Epilation</td>
                                                <td>Legs</td>
                                                <td>4</td>
                                                <td>200</td>
                                                <td>800</td>
                                                <td>300</td>
                                                <td>500</td>
                                                <td>11-04-2022 3:00 PM</td>
                                                <td>11-04-2022 3:30 PM</td>
                                                <td>3:00 PM</td>
                                                <td>Room 3</td>
                                                <td>John Andrew</td>
                                                <td>Jules</td>
                                                <td>Completed</td>
                                                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus eveniet
                                                    asperiores.</td>
                                                <td>08-04-2022</td>
                                                <td>
                                                    <a href="#kt_modal_edit_appointment"
                                                        class="btn btn-icon btn-sm btn-color-gray-400 btn-active-icon-primary me-2"
                                                        data-bs-toggle="modal" data-bs-original-title="Edit Client">
                                                        <span class="svg-icon svg-icon-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                                viewBox="0 0 24 24" fill="none">
                                                                <path opacity="0.3"
                                                                    d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                                    fill="black"></path>
                                                                <path
                                                                    d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                                    fill="black"></path>
                                                            </svg>
                                                        </span>
                                                    </a>
                                                    <a href=""
                                                        class="btn btn-icon btn-sm btn-color-gray-400 btn-active-icon-danger me-2"
                                                        data-bs-toggle="tooltip" data-bs-original-title="Delete Client">
                                                        <span class="svg-icon svg-icon-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                                viewBox="0 0 24 24" fill="none">
                                                                <path
                                                                    d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                                                                    fill="black"></path>
                                                                <path opacity="0.5"
                                                                    d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                                                                    fill="black"></path>
                                                                <path opacity="0.5"
                                                                    d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                                                                    fill="black"></path>
                                                            </svg>
                                                        </span>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!--end::Card Body-->
                        </div>
                        <!--end::Card-->
                    </div>
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->

    <!--begin::Modal - Add Appointment-->
    <div class="modal fade" id="kt_modal_add_appointment" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_add_user_header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder">Add Appointment</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-2x">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                    transform="rotate(-45 6 17.3137)" fill="black"></rect>
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                    fill="black"></rect>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y mx-10 my-7 mb-0 pb-0">
                    <!--begin::Form-->
                    <form id="" class="form" action="#">
                        <!--begin::Scroll-->
                        <div class="d-flex flex-column scroll-y me-n7 pe-7" id="" data-kt-scroll="true"
                            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                            data-kt-scroll-dependencies="#kt_modal_add_user_header"
                            data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                            <div class="row mb-7">
                                <div class="col-lg-6">
                                    <label class="required fw-bold fs-6 mb-2">Client</label>
                                    <select name="client" class="form-control form-control-solid mb-3 mb-lg-0">
                                        <option>-- Select Client --</option>
                                        <option value="1">Tiger Nixon</option>
                                        <option value="2">James Greg</option>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label class="required fw-bold fs-6 mb-2">Email Address</label>
                                    <input disabled type="email" min="0" name="email"
                                        class="form-control form-control-solid mb-3 mb-lg-0" value="abc@gmail.com" />
                                </div>
                            </div>
                            <div class="row mb-7">
                                <div class="col-lg-6">
                                    <label class="required fw-bold fs-6 mb-2">Phone Number</label>
                                    <input disabled type="text" min="0" name="phone_number"
                                        class="form-control form-control-solid mb-3 mb-lg-0" value="+923343394556" />
                                </div>
                                <div class="col-lg-6">
                                    <label class="required fw-bold fs-6 mb-2">Appointment Date</label>
                                    <input class="form-control form-control-solid kt_datepicker_3" name="appointment_date"
                                        placeholder="Pick Appointment Date & Time" />
                                </div>
                            </div>

                            <div class="separator separator-dashed my-10"></div>

                            <div class="row mb-7">
                                <div class="col-lg-6">
                                    <label class="required fw-bold fs-6 mb-2">Room</label>
                                    <select name="room" class="form-control form-control-solid mb-3 mb-lg-0">
                                        <option>-- Select Room --</option>
                                        <option value="1">Room 1</option>
                                        <option value="2">Room 2</option>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label class="required fw-bold fs-6 mb-2">Practitionner</label>
                                    <select name="practitionner" class="form-control form-control-solid mb-3 mb-lg-0">
                                        <option>-- Select Practitionner --</option>
                                        <option value="1">Tiger Nixon</option>
                                        <option value="2">James Greg</option>
                                    </select>
                                </div>
                            </div>

                            <div class="separator separator-dashed my-10"></div>

                            <div class="row mb-7">
                                <div class="col-lg-6">
                                    <label class="required fw-bold fs-6 mb-2">Machine</label>
                                    <select name="machine" class="form-control form-control-solid mb-3 mb-lg-0">
                                        <option>-- Select Machine --</option>
                                        <option value="1">IPL</option>
                                        <option value="2">MICRO YEUX</option>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label class="required fw-bold fs-6 mb-2">Hand</label>
                                    <select name="hand" class="form-control form-control-solid mb-3 mb-lg-0">
                                        <option>-- Select Hand --</option>
                                        <option value="1">01 Epilation</option>
                                        <option value="2">10 PHOTO</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-7">
                                <div class="col-lg-6">
                                    <label class="required fw-bold fs-6 mb-2">Service</label>
                                    <select name="service" class="form-control form-control-solid mb-3 mb-lg-0">
                                        <option>-- Select Service --</option>
                                        <option value="1">EPILATION IPL</option>
                                        <option value="2">EPILATION LASER</option>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label class="required fw-bold fs-6 mb-2">Zone</label>
                                    <select name="zone" class="form-control form-control-solid mb-3 mb-lg-0">
                                        <option>-- Select Zone --</option>
                                        <option value="1">Front</option>
                                        <option value="2">Leg</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-7">
                                <div class="col-lg-6">
                                    <label class="required fw-bold fs-6 mb-2">Sessions</label>
                                    <input type="number" min="0" name="sessions"
                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                        placeholder="Please Enter your Sessions here." />
                                </div>
                                <div class="col-lg-6">
                                    <label class="required fw-bold fs-6 mb-2">Settings</label>
                                    <input type="text" min="0" name="settings"
                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                        placeholder="Please Enter your Settings here." />
                                </div>
                            </div>
                            <div class="row mb-7">
                                <div class="col-lg-6">
                                    <label class="fw-bold fs-6 mb-2">Session Price</label>
                                    <input type="number" name="session_price"
                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                        placeholder="Please Enter your Session Price here." />
                                </div>
                            </div>
                            <div class="row mb-7">
                                <div class="col-lg-6">
                                    <label class="fw-bold fs-6 mb-2">Promotion(%)</label>
                                    <input type="number" name="promotion"
                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                        placeholder="Please Enter your Promotion(%) here." />
                                </div>
                                <div class="col-lg-6">
                                    <label class="fw-bold fs-6 mb-2">Total Service Amount</label>
                                    <div class="input-group mb-5">
                                        <span class="input-group-text">$</span>
                                        <input type="text" disabled class="form-control mb-3 mb-lg-0"
                                            name="total_service_amount" placeholder="800">
                                    </div>
                                </div>
                            </div>

                            <div class="separator separator-dashed my-10"></div>

                            <div class="row mb-7">
                                <div class="col-lg-6">
                                    <label class="required fw-bold fs-6 mb-2">Room Time</label>
                                    <input disabled class="form-control form-control-solid kt_datepicker_8"
                                        name="room_time" value="15 min" />
                                </div>
                            </div>
                            <div class="row mb-7">
                                <div class="col-lg-6">
                                    <label class="required fw-bold fs-6 mb-2">Start Time(Check-In)</label>
                                    <input class="form-control form-control-solid kt_datepicker_3" name="start_time"
                                        value="1:05 PM" />
                                </div>
                                <div class="col-lg-6">
                                    <label class="required fw-bold fs-6 mb-2">Finish Time (Check-Out)</label>
                                    <input disabled class="form-control form-control-solid kt_datepicker_3"
                                        name="finish_time" value="2:05 PM" />
                                </div>
                            </div>
                            <div class="row mb-7">
                                <div class="col-lg-6">
                                    <label class="required fw-bold fs-6 mb-2">Appointment Status</label>
                                    <select name="appointment_status" class="form-control form-control-solid mb-3 mb-lg-0">
                                        <option>-- Select Status --</option>
                                        <option value="1">Taken</option>
                                        <option value="1">Confirmed</option>
                                        <option value="1">Check-in</option>
                                        <option value="1">Cancelled</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-7">
                                <div class="col-lg-12">
                                    <label class="required fw-bold fs-6 mb-2">Notes</label>
                                    <textarea name="notes" class="form-control form-control-solid mb-3 mb-lg-0" cols="30" rows="5"></textarea>
                                </div>
                            </div>
                            <!-- Pricing Box Start -->
                            <div class="separator separator-dashed my-10"></div>
                            <div class="row mb-7 justify-content-end text-end">
                                <div class="col-lg-6">
                                    <label class="fw-bold fs-6 mb-2">Total Service Amount</label>
                                    <h3 class="fw-bolder m-0 text-primary">$800</h3>
                                </div>
                            </div>
                            <div class="row mb-7 justify-content-end text-end">
                                <div class="col-lg-6">
                                    <label class="fw-bold fs-6 mb-2">Paid</label>
                                    <h3 class="fw-bolder m-0 text-success">$300</h3>
                                </div>
                            </div>
                            <div class="row mb-7 justify-content-end text-end">
                                <div class="col-lg-6">
                                    <label class="fw-bold fs-6 mb-2">Un-Paid</label>
                                    <h3 class="fw-bolder m-0 text-danger">$500</h3>
                                </div>
                            </div>
                            <!-- Pricing Box End -->
                        </div>
                        <!--end::Scroll-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Modal body-->
                <div class="modal-footer flex-center">
                    <button type="reset" data-bs-dismiss="modal" aria-label="Close"
                        class="btn btn-light me-3">Discard</button>
                    <button type="submit" id="kt_modal_add_customer_submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <!--end::Modal - Add Appointment-->

    <!--begin::Modal - Edit Appointment-->
    <div class="modal fade" id="kt_modal_edit_appointment" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_add_user_header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder">Edit Appointment</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-2x">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                    transform="rotate(-45 6 17.3137)" fill="black"></rect>
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                    fill="black"></rect>
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
                    <form id="" class="form" action="#">
                        <!--begin::Scroll-->
                        <div class="d-flex flex-column scroll-y me-n7 pe-7" id="" data-kt-scroll="true"
                            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                            data-kt-scroll-dependencies="#kt_modal_add_user_header"
                            data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                            <div class="row mb-7">
                                <div class="col-lg-6">
                                    <label class="required fw-bold fs-6 mb-2">Client</label>
                                    <select name="client" class="form-control form-control-solid mb-3 mb-lg-0">
                                        <option>-- Select Client --</option>
                                        <option value="1">Tiger Nixon</option>
                                        <option value="2">James Greg</option>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label class="required fw-bold fs-6 mb-2">Email Address</label>
                                    <input disabled type="email" min="0" name="email"
                                        class="form-control form-control-solid mb-3 mb-lg-0" value="abc@gmail.com" />
                                </div>
                            </div>
                            <div class="row mb-7">
                                <div class="col-lg-6">
                                    <label class="required fw-bold fs-6 mb-2">Phone Number</label>
                                    <input disabled type="text" min="0" name="phone_number"
                                        class="form-control form-control-solid mb-3 mb-lg-0" value="+923343394556" />
                                </div>
                                <div class="col-lg-6">
                                    <label class="required fw-bold fs-6 mb-2">Appointment Date</label>
                                    <input class="form-control form-control-solid kt_datepicker_3" name="appointment_date"
                                        placeholder="Pick Appointment Date & Time" />
                                </div>
                            </div>

                            <div class="separator separator-dashed my-10"></div>

                            <div class="row mb-7">
                                <div class="col-lg-6">
                                    <label class="required fw-bold fs-6 mb-2">Room</label>
                                    <select name="room" class="form-control form-control-solid mb-3 mb-lg-0">
                                        <option>-- Select Room --</option>
                                        <option value="1">Room 1</option>
                                        <option value="2">Room 2</option>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label class="required fw-bold fs-6 mb-2">Practitionner</label>
                                    <select name="practitionner" class="form-control form-control-solid mb-3 mb-lg-0">
                                        <option>-- Select Practitionner --</option>
                                        <option value="1">Tiger Nixon</option>
                                        <option value="2">James Greg</option>
                                    </select>
                                </div>
                            </div>

                            <div class="separator separator-dashed my-10"></div>

                            <div class="row mb-7">
                                <div class="col-lg-6">
                                    <label class="required fw-bold fs-6 mb-2">Machine</label>
                                    <select name="machine" class="form-control form-control-solid mb-3 mb-lg-0">
                                        <option>-- Select Machine --</option>
                                        <option value="1">IPL</option>
                                        <option value="2">MICRO YEUX</option>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label class="required fw-bold fs-6 mb-2">Hand</label>
                                    <select name="hand" class="form-control form-control-solid mb-3 mb-lg-0">
                                        <option>-- Select Hand --</option>
                                        <option value="1">01 Epilation</option>
                                        <option value="2">10 PHOTO</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-7">
                                <div class="col-lg-6">
                                    <label class="required fw-bold fs-6 mb-2">Service</label>
                                    <select name="service" class="form-control form-control-solid mb-3 mb-lg-0">
                                        <option>-- Select Service --</option>
                                        <option value="1">EPILATION IPL</option>
                                        <option value="2">EPILATION LASER</option>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label class="required fw-bold fs-6 mb-2">Zone</label>
                                    <select name="zone" class="form-control form-control-solid mb-3 mb-lg-0">
                                        <option>-- Select Zone --</option>
                                        <option value="1">Front</option>
                                        <option value="2">Leg</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-7">
                                <div class="col-lg-6">
                                    <label class="required fw-bold fs-6 mb-2">Sessions</label>
                                    <input type="number" min="0" name="sessions"
                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                        placeholder="Please Enter your Sessions here." />
                                </div>
                                <div class="col-lg-6">
                                    <label class="required fw-bold fs-6 mb-2">Settings</label>
                                    <input type="text" min="0" name="settings"
                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                        placeholder="Please Enter your Settings here." />
                                </div>
                            </div>
                            <div class="row mb-7">
                                <div class="col-lg-6">
                                    <label class="fw-bold fs-6 mb-2">Session Price</label>
                                    <input type="number" name="session_price"
                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                        placeholder="Please Enter your Session Price here." />
                                </div>
                            </div>
                            <div class="row mb-7">
                                <div class="col-lg-6">
                                    <label class="fw-bold fs-6 mb-2">Promotion(%)</label>
                                    <input type="number" name="promotion"
                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                        placeholder="Please Enter your Promotion(%) here." />
                                </div>
                                <div class="col-lg-6">
                                    <label class="fw-bold fs-6 mb-2">Total Service Amount</label>
                                    <div class="input-group mb-5">
                                        <span class="input-group-text">$</span>
                                        <input type="text" disabled class="form-control mb-3 mb-lg-0"
                                            name="total_service_amount" placeholder="800">
                                    </div>
                                </div>
                            </div>

                            <div class="separator separator-dashed my-10"></div>

                            <div class="row mb-7">
                                <div class="col-lg-6">
                                    <label class="required fw-bold fs-6 mb-2">Room Time</label>
                                    <input disabled class="form-control form-control-solid kt_datepicker_8"
                                        name="room_time" value="15 min" />
                                </div>
                            </div>
                            <div class="row mb-7">
                                <div class="col-lg-6">
                                    <label class="required fw-bold fs-6 mb-2">Start Time(Check-In)</label>
                                    <input class="form-control form-control-solid kt_datepicker_3" name="start_time"
                                        value="1:05 PM" />
                                </div>
                                <div class="col-lg-6">
                                    <label class="required fw-bold fs-6 mb-2">Finish Time (Check-Out)</label>
                                    <input disabled class="form-control form-control-solid kt_datepicker_3"
                                        name="finish_time" value="2:05 PM" />
                                </div>
                            </div>
                            <div class="row mb-7">
                                <div class="col-lg-6">
                                    <label class="required fw-bold fs-6 mb-2">Appointment Status</label>
                                    <select name="appointment_status" class="form-control form-control-solid mb-3 mb-lg-0">
                                        <option>-- Select Status --</option>
                                        <option value="1">Taken</option>
                                        <option value="1">Confirmed</option>
                                        <option value="1">Check-in</option>
                                        <option value="1">Cancelled</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-7">
                                <div class="col-lg-12">
                                    <label class="required fw-bold fs-6 mb-2">Notes</label>
                                    <textarea name="notes" class="form-control form-control-solid mb-3 mb-lg-0" cols="30" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                        <!--end::Scroll-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Modal body-->
                <div class="modal-footer flex-center">
                    <button type="reset" data-bs-dismiss="modal" aria-label="Close"
                        class="btn btn-light me-3">Discard</button>
                    <button type="submit" id="kt_modal_add_customer_submit" class="btn btn-primary">Submit</button>
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <!--end::Modal - Edit Appointment-->
@endsection
