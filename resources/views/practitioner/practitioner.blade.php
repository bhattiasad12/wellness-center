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
                                <a href="javascript:;"></a>Practitioners Listing
                            </h1>
                            <!--begin::Notice-->
                            <div class="d-flex align-items-center rounded py-5 px-4 bg-light-info">
                                <!--begin::Icon-->
                                <div class="d-flex h-80px w-80px flex-shrink-0 flex-center position-relative ms-3 me-6">
                                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs051.svg-->
                                    <span class="svg-icon svg-icon-info position-absolute opacity-10">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="70px" height="70px" viewBox="0 0 70 70" fill="none" class="w-80px h-80px">
                                            <path d="M28 4.04145C32.3316 1.54059 37.6684 1.54059 42 4.04145L58.3109 13.4585C62.6425 15.9594 65.3109 20.5812 65.3109 25.5829V44.4171C65.3109 49.4188 62.6425 54.0406 58.3109 56.5415L42 65.9585C37.6684 68.4594 32.3316 68.4594 28 65.9585L11.6891 56.5415C7.3575 54.0406 4.68911 49.4188 4.68911 44.4171V25.5829C4.68911 20.5812 7.3575 15.9594 11.6891 13.4585L28 4.04145Z" fill="#000000" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <!--begin::Svg Icon | path: icons/duotune/art/art006.svg-->
                                    <span class="svg-icon svg-icon-3x svg-icon-info position-absolute">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M4.335 8.61499C3.98049 8.61579 3.64078 8.75725 3.39048 9.0083C3.14018 9.25935 2.99973 9.59947 3 9.95398V15.307C3 15.6611 3.14065 16.0006 3.39101 16.251C3.64138 16.5013 3.98094 16.642 4.335 16.642C4.68907 16.642 5.02863 16.5013 5.27899 16.251C5.52935 16.0006 5.67 15.6611 5.67 15.307V9.95398C5.67027 9.59947 5.52983 9.25935 5.27953 9.0083C5.02922 8.75725 4.68952 8.61579 4.335 8.61499ZM20.353 8.61499C19.9986 8.61579 19.659 8.75734 19.4088 9.00842C19.1587 9.25951 19.0185 9.59956 19.019 9.95398V15.307C19.0141 15.4853 19.045 15.6628 19.1099 15.829C19.1748 15.9952 19.2723 16.1467 19.3967 16.2745C19.5211 16.4024 19.6699 16.504 19.8342 16.5734C19.9985 16.6428 20.1751 16.6786 20.3535 16.6786C20.5319 16.6786 20.7085 16.6428 20.8728 16.5734C21.0371 16.504 21.1859 16.4024 21.3103 16.2745C21.4347 16.1467 21.5322 15.9952 21.5971 15.829C21.662 15.6628 21.6929 15.4853 21.688 15.307V9.95398C21.6883 9.59947 21.5478 9.25935 21.2975 9.0083C21.0472 8.75725 20.7075 8.61579 20.353 8.61499Z" fill="black" />
                                            <path d="M8.33899 18.062V20.662C8.33899 21.0161 8.47964 21.3556 8.73 21.606C8.98036 21.8563 9.31993 21.9969 9.67399 21.9969C10.0281 21.9969 10.3676 21.8563 10.618 21.606C10.8683 21.3556 11.009 21.0161 11.009 20.662V18.062H8.33899Z" fill="black" />
                                            <path opacity="0.3" d="M16.344 18.062C16.6984 18.0615 17.0381 17.9202 17.2885 17.6693C17.5388 17.4184 17.6793 17.0784 17.679 16.724V8.69299H7.004V16.724C7.00373 17.0784 7.1442 17.4184 7.39454 17.6693C7.64487 17.9202 7.98458 18.0615 8.339 18.062H16.344Z" fill="black" />
                                            <path d="M13.679 18.062V20.662C13.679 21.0161 13.8196 21.3556 14.07 21.606C14.3204 21.8563 14.6599 21.9969 15.014 21.9969C15.368 21.9969 15.7076 21.8563 15.958 21.606C16.2083 21.3556 16.349 21.0161 16.349 20.662V18.062H13.679Z" fill="black" />
                                            <path d="M15.676 4.53889L16.864 3.09492C16.9209 3.02747 16.9639 2.94945 16.9904 2.8653C17.017 2.78115 17.0266 2.69257 17.0187 2.60468C17.0109 2.51679 16.9857 2.43131 16.9446 2.35322C16.9035 2.27512 16.8474 2.206 16.7794 2.14973C16.7115 2.09345 16.633 2.05112 16.5486 2.02534C16.4642 1.99955 16.3756 1.99079 16.2878 1.99946C16.2 2.00813 16.1147 2.03408 16.037 2.07587C15.9593 2.11767 15.8906 2.17451 15.835 2.24299L14.535 3.82099C13.8435 3.50074 13.0902 3.33617 12.3282 3.33893C11.5662 3.3417 10.8141 3.51173 10.125 3.83698L8.85999 2.2519C8.80503 2.18348 8.73714 2.1266 8.66018 2.08442C8.58322 2.04224 8.49871 2.01569 8.41147 2.00617C8.32423 1.99665 8.23597 2.00441 8.15173 2.029C8.06748 2.05359 7.98891 2.09452 7.92049 2.14948C7.85207 2.20444 7.79515 2.27235 7.75297 2.34931C7.71079 2.42627 7.68418 2.51073 7.67466 2.59797C7.66515 2.68521 7.6729 2.77349 7.69749 2.85773C7.72209 2.94198 7.76303 3.02052 7.81799 3.08893L8.98999 4.55793C8.37138 5.05535 7.87187 5.68486 7.52806 6.40034C7.18426 7.11581 7.00485 7.89915 7.00299 8.69294H17.684C17.6821 7.8943 17.5006 7.10632 17.1531 6.38727C16.8055 5.66823 16.3007 5.03648 15.676 4.53889ZM10.676 7.34699C10.4782 7.34699 10.2849 7.28829 10.1204 7.17841C9.95597 7.06853 9.8278 6.91241 9.75211 6.72968C9.67642 6.54696 9.65662 6.34578 9.69521 6.1518C9.73379 5.95782 9.82903 5.77969 9.96888 5.63984C10.1087 5.49998 10.2869 5.40474 10.4809 5.36616C10.6749 5.32757 10.8759 5.34735 11.0587 5.42304C11.2414 5.49873 11.3976 5.62688 11.5075 5.79133C11.6173 5.95578 11.676 6.14921 11.676 6.34699C11.676 6.61221 11.5706 6.86649 11.3831 7.05402C11.1956 7.24156 10.9412 7.34699 10.676 7.34699ZM14.005 7.34699C13.8072 7.34699 13.6139 7.28829 13.4494 7.17841C13.285 7.06853 13.1568 6.91241 13.0811 6.72968C13.0054 6.54696 12.9856 6.34578 13.0242 6.1518C13.0628 5.95782 13.158 5.77969 13.2979 5.63984C13.4377 5.49998 13.6159 5.40474 13.8099 5.36616C14.0039 5.32757 14.2049 5.34735 14.3877 5.42304C14.5704 5.49873 14.7266 5.62688 14.8365 5.79133C14.9463 5.95578 15.005 6.14921 15.005 6.34699C15.005 6.61221 14.8996 6.86649 14.7121 7.05402C14.5246 7.24156 14.2702 7.34699 14.005 7.34699Z" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                                <!--end::Icon-->
                                <!--begin::Description-->
                                <div class="text-gray-700 fw-bold fs-6 lh-lg">Here we have a list of all of the Practitioners that we have.</div>
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
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                            <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <input type="text" id="search" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search" />
                                </div>
                                <!--end::Search-->
                            </div>
                            <!--begin::Card title-->
                            <!--begin::Card toolbar-->
                            <div class="card-toolbar">
                                <!--begin::Toolbar-->
                                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                    <!--begin::Add Practitioner-->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_practitioner">
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                                                <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->Add Practitioner
                                    </button>
                                    <!--end::Add Practitioner-->
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
                                            <th>ID</th>
                                            <th>Practitioner</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="fw-bold text-gray-600">
                                        <tr>
                                            <td>1</td>
                                            <td><a href="{{ route('practitioner.show','1') }}" class="fw-bolder text-gray-800 text-hover-primary mb-1">Idres Bhai</a></td>
                                            <td>
                                                <a href="#kt_modal_edit_practitioner" class="btn btn-icon btn-sm btn-color-gray-400 btn-active-icon-primary me-2" data-bs-toggle="modal" data-bs-original-title="Edit Practitioner">
                                                    <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                    <span class="svg-icon svg-icon-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black"></path>
                                                            <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black"></path>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </a>
                                                <a href="" class="btn btn-icon btn-sm btn-color-gray-400 btn-active-icon-danger me-2" data-bs-toggle="tooltip" data-bs-original-title="Delete Practitioner">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                                    <span class="svg-icon svg-icon-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black"></path>
                                                            <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black"></path>
                                                            <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black"></path>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td><a href="{{ route('practitioner.show','1') }}" class="fw-bolder text-gray-800 text-hover-primary mb-1">Dawn Gill</a></td>
                                            <td>
                                                <a href="#kt_modal_edit_practitioner" class="btn btn-icon btn-sm btn-color-gray-400 btn-active-icon-primary me-2" data-bs-toggle="modal" data-bs-original-title="Edit Practitioner">
                                                    <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                    <span class="svg-icon svg-icon-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black"></path>
                                                            <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black"></path>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </a>
                                                <a href="" class="btn btn-icon btn-sm btn-color-gray-400 btn-active-icon-danger me-2" data-bs-toggle="tooltip" data-bs-original-title="Delete Practitioner">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                                    <span class="svg-icon svg-icon-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black"></path>
                                                            <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black"></path>
                                                            <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black"></path>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
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

<!--begin::Modal - Add Practitioner-->
<div class="modal fade" id="kt_modal_add_practitioner" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_user_header">
                <!--begin::Modal title-->
                <h2 class="fw-bolder">Add Practitioner</h2>
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
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Add Practitioner-->

<!--begin::Modal - Edit Practitioner -->
<div class="modal fade" id="kt_modal_edit_practitioner" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_user_header">
                <!--begin::Modal title-->
                <h2 class="fw-bolder">Edit Practitioner </h2>
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
                                <input type="text" name="first_name" class="form-control form-control-solid mb-3 mb-lg-0" value="{{old('first_name')}}" placeholder="Please Enter the Practitioner First Name" required />
                            </div>
                            <div class="col-lg-6">
                                <label class="required fw-bold fs-6 mb-2">Practitioner Last Name</label>
                                <input type="text" name="last_name" class="form-control form-control-solid mb-3 mb-lg-0" value="{{old('last_name')}}" placeholder="Please Enter the Practitioner Last Name" required />
                            </div>
                        </div>
                        <div class="row mb-7">
                            <div class="col-lg-6">
                                <label class="required fw-bold fs-6 mb-2">Email</label>
                                <input type="email" name="email" class="form-control form-control-solid mb-3 mb-lg-0" value="{{old('email')}}" placeholder="Please Enter the Email" required />
                            </div>
                            <div class="col-lg-6">
                                <label class="required fw-bold fs-6 mb-2">Phone Number</label>
                                <input type="number" name="phone_number" class="form-control form-control-solid mb-3 mb-lg-0" value="{{old('phone_number')}}" placeholder="Please Enter the Practitioner Phone Number" required />
                            </div>
                        </div>
                        <div class="row mb-7">
                            <div class="col-lg-3">
                                <label class="required fw-bold fs-6 mb-2">Week Day</label>
                                <select name="appointment_status" class="form-control form-control-solid mb-3 mb-lg-0" required>
                                    <option>-- Select Week Day --</option>
                                    @for ($i = 0; $i< count($days); $i++) <option value="{{$days[$i]->id}}"> {{ucwords($days[$i]->day)}} </option>
                                        @endfor
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label class="required fw-bold fs-6 mb-2">Start Time(Check-In)</label>
                                <input class="form-control form-control-solid kt_datepicker_8" name="monday_checkin" value="" required />
                            </div>
                            <div class="col-lg-3">
                                <label class="required fw-bold fs-6 mb-2">Start Time(Check-Out)</label>
                                <input class="form-control form-control-solid kt_datepicker_8" name="monday_checkout" value="" required />
                            </div>
                            <div class="col-lg-3" style="text-align: center;align-self: center;">
                                <button type="button" class="btn btn-icon btn-light-facebook me-5">
                                    <i class="fas fa-plus fs-4"></i>
                                </button>
                                <button type="button" class="btn btn-icon btn-light-google me-5" style="display: none;">
                                    <i class="fas fa-minus fs-4"></i>
                                </button>
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
<!--end::Modal - Edit Practitioner -->
<script>
    function addMore(obj) {
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
        obj.parentElement.parentElement.remove();
    }
</script>
@endsection