@extends('layouts.main')

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <div class="row g-5 g-xl-8">
                <div class="col-xl-4">
                    <div class="card card-xl-stretch mb-5 mb-xl-8">
                        <div class="card-body d-flex align-items-center pt-3 pb-0">
                            <div class="d-flex flex-column flex-grow-1 py-2 py-lg-13 me-2">
                                <a href="#" class="fw-bolder text-dark fs-4 mb-2 text-hover-primary">Hi, {{ucwords(Auth::user()->first_name)}} {{ucwords(Auth::user()->last_name)}}</a>
                                <span class="fw-bold text-muted fs-5">Admin</span>
                            </div>
                            <img src=" {{ asset('theme/assets/media/svg/avatars/004-boy-1.svg') }}" alt="" class="align-self-end h-100px">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row gy-5 g-xl-10">
                <div class="col-xl-4 mb-xl-10">
                    <div class="card h-md-100">
                        <div class="card-body d-flex flex-column flex-center">
                            <div class="mb-2">
                                <h1 class="fw-bold text-gray-800 text-center lh-lg">Quick form to
                                    <br />
                                    <span class="fw-boldest">Add New Appointment ?</span>
                                </h1>
                                <div class="flex-grow-1 bgi-no-repeat bgi-size-contain bgi-position-x-center card-rounded-bottom h-200px mh-200px my-5 my-lg-12" style="background-image:url({{ asset('theme/assets/media/svg/illustrations/easy/4-dark.svg') }})">
                                </div>
                            </div>
                            <div class="text-center">
                                <a href="{{ route('appointment.index') }}" class="btn btn-sm btn-primary me-2" data-bs-toggle="tooltip" data-bs-dismiss="click" data-bs-custom-class="tooltip-dark" title="Book an Appointment from the Appointments Page">Book Appointment</a>
                                <a href="{{ route('appointment.index') }}" class="btn btn-sm btn-light" data-bs-toggle="tooltip" data-bs-dismiss="click" data-bs-custom-class="tooltip-dark" title="Appointments Listing">View Appointments</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 mb-5 mb-xl-10">
                    <div class="row g-5 g-xl-10">
                        <div class="col-xl-12 mb-5 mb-xl-10">
                            <div class="card overflow-hidden mb-5 mb-xl-10">
                                <div class="card-body">
                                    <span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect x="8" y="9" width="3" height="10" rx="1.5" fill="black"></rect>
                                            <rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5" fill="black"></rect>
                                            <rect x="18" y="11" width="3" height="8" rx="1.5" fill="black"></rect>
                                            <rect x="3" y="13" width="3" height="6" rx="1.5" fill="black"></rect>
                                        </svg>
                                    </span>
                                    <div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">{{$appointmentsInfo[0]->total_appointment}}</div>
                                    <div class="fw-bold text-gray-400">Total Appointments</div>
                                </div>
                            </div>
                            <div class="card overflow-hidden h-md-50 mb-5 mb-xl-10">
                                <div class="card-body d-flex justify-content-between flex-column px-0 pb-0">
                                    <div class="mb-4 px-9">
                                        <div class="d-flex align-items-center mb-2">
                                            <span class="fs-2hx fw-bolder text-gray-800 me-2 lh-1">${{$appointmentsInfo[0]->total_revenue}}</span>
                                            <span class="d-flex align-items-end text-gray-400 fs-6 fw-bold">USD</span>
                                        </div>
                                        <span class="fs-6 fw-bold text-gray-400">Total Revenue Generated</span>
                                    </div>
                                    <div id="kt_card_widget_9_chart" class="min-h-auto" style="height: 125px"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 mb-5 mb-xl-10">
                    <div class="card h-md-100 mb-5 mb-xl-10">
                        <div class="card-body p-0">
                            <div class="px-9 pt-7 card-rounded h-275px w-100 bg-primary">
                                <div class="d-flex flex-stack ms-1">
                                    <h3 class="m-0 text-white fw-bolder fs-3">Appointments Summary</h3>
                                </div>
                                <div class="d-flex text-center flex-column text-white pt-8">
                                    <span class="fw-bold fs-7">Total Appointments</span>
                                    <span class="fw-bolder fs-2x pt-1">{{$appointmentsInfo[0]->total_appointment}}</span>
                                </div>
                            </div>
                            <div class="bg-body shadow-sm card-rounded mx-9 mb-9 px-6 py-9 position-relative z-index-1" style="margin-top: -100px">
                                <div class="d-flex align-items-center mb-6">
                                    <div class="symbol symbol-45px w-40px me-5">
                                        <span class="symbol-label bg-lighten">
                                            <span class="svg-icon svg-icon-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.3" d="M18.4 5.59998C21.9 9.09998 21.9 14.8 18.4 18.3C14.9 21.8 9.2 21.8 5.7 18.3L18.4 5.59998Z" fill="black"></path>
                                                    <path d="M12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22C17.5 22 22 17.5 22 12C22 6.5 17.5 2 12 2ZM19.9 11H13V8.8999C14.9 8.6999 16.7 8.00005 18.1 6.80005C19.1 8.00005 19.7 9.4 19.9 11ZM11 19.8999C9.7 19.6999 8.39999 19.2 7.39999 18.5C8.49999 17.7 9.7 17.2001 11 17.1001V19.8999ZM5.89999 6.90002C7.39999 8.10002 9.2 8.8 11 9V11.1001H4.10001C4.30001 9.4001 4.89999 8.00002 5.89999 6.90002ZM7.39999 5.5C8.49999 4.7 9.7 4.19998 11 4.09998V7C9.7 6.8 8.39999 6.3 7.39999 5.5ZM13 17.1001C14.3 17.3001 15.6 17.8 16.6 18.5C15.5 19.3 14.3 19.7999 13 19.8999V17.1001ZM13 4.09998C14.3 4.29998 15.6 4.8 16.6 5.5C15.5 6.3 14.3 6.80002 13 6.90002V4.09998ZM4.10001 13H11V15.1001C9.1 15.3001 7.29999 16 5.89999 17.2C4.89999 16 4.30001 14.6 4.10001 13ZM18.1 17.1001C16.6 15.9001 14.8 15.2 13 15V12.8999H19.9C19.7 14.5999 19.1 16.0001 18.1 17.1001Z" fill="black"></path>
                                                </svg>
                                            </span>
                                        </span>
                                    </div>
                                    <div class="d-flex align-items-center flex-wrap w-100">
                                        <div class="mb-1 pe-3 flex-grow-1">
                                            <a href="#" class="fs-5 text-gray-800 text-hover-primary fw-bolder">Taken</a>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="fw-bolder fs-5 text-gray-800 pe-1">{{$appointmentsInfo[0]->taken}}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mb-6">
                                    <div class="symbol symbol-45px w-40px me-5">
                                        <span class="symbol-label bg-lighten">
                                            <span class="svg-icon svg-icon-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <rect x="2" y="2" width="9" height="9" rx="2" fill="black"></rect>
                                                    <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black"></rect>
                                                    <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black"></rect>
                                                    <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black"></rect>
                                                </svg>
                                            </span>
                                        </span>
                                    </div>
                                    <div class="d-flex align-items-center flex-wrap w-100">
                                        <div class="mb-1 pe-3 flex-grow-1">
                                            <a href="#" class="fs-5 text-gray-800 text-hover-primary fw-bolder">Confirmed</a>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="fw-bolder fs-5 text-gray-800 pe-1">{{$appointmentsInfo[0]->confirmed}}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mb-6">
                                    <div class="symbol symbol-45px w-40px me-5">
                                        <span class="symbol-label bg-lighten">
                                            <span class="svg-icon svg-icon-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.3" d="M15 19H7C5.9 19 5 18.1 5 17V7C5 5.9 5.9 5 7 5H15C16.1 5 17 5.9 17 7V17C17 18.1 16.1 19 15 19Z" fill="black"></path>
                                                    <path d="M8.5 2H13.4C14 2 14.5 2.4 14.6 3L14.9 5H6.89999L7.2 3C7.4 2.4 7.9 2 8.5 2ZM7.3 21C7.4 21.6 7.9 22 8.5 22H13.4C14 22 14.5 21.6 14.6 21L14.9 19H6.89999L7.3 21ZM18.3 10.2C18.5 9.39995 18.5 8.49995 18.3 7.69995C18.2 7.29995 17.8 6.90002 17.3 6.90002H17V10.9H17.3C17.8 11 18.2 10.7 18.3 10.2Z" fill="black"></path>
                                                </svg>
                                            </span>
                                        </span>
                                    </div>
                                    <div class="d-flex align-items-center flex-wrap w-100">
                                        <div class="mb-1 pe-3 flex-grow-1">
                                            <a href="#" class="fs-5 text-gray-800 text-hover-primary fw-bolder">Check-In</a>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="fw-bolder fs-5 text-gray-800 pe-1">{{$appointmentsInfo[0]->checkin}}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-45px w-40px me-5">
                                        <span class="symbol-label bg-lighten">
                                            <span class="svg-icon svg-icon-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM12.5 18C12.5 17.4 12.6 17.5 12 17.5H8.5C7.9 17.5 8 17.4 8 18C8 18.6 7.9 18.5 8.5 18.5L12 18C12.6 18 12.5 18.6 12.5 18ZM16.5 13C16.5 12.4 16.6 12.5 16 12.5H8.5C7.9 12.5 8 12.4 8 13C8 13.6 7.9 13.5 8.5 13.5H15.5C16.1 13.5 16.5 13.6 16.5 13ZM12.5 8C12.5 7.4 12.6 7.5 12 7.5H8C7.4 7.5 7.5 7.4 7.5 8C7.5 8.6 7.4 8.5 8 8.5H12C12.6 8.5 12.5 8.6 12.5 8Z" fill="black"></path>
                                                    <rect x="7" y="17" width="6" height="2" rx="1" fill="black"></rect>
                                                    <rect x="7" y="12" width="10" height="2" rx="1" fill="black"></rect>
                                                    <rect x="7" y="7" width="6" height="2" rx="1" fill="black"></rect>
                                                    <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="black"></path>
                                                </svg>
                                            </span>
                                        </span>
                                    </div>
                                    <div class="d-flex align-items-center flex-wrap w-100">
                                        <div class="mb-1 pe-3 flex-grow-1">
                                            <a href="#" class="fs-5 text-gray-800 text-hover-primary fw-bolder">Cancelled</a>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="fw-bolder fs-5 text-gray-800 pe-1">{{$appointmentsInfo[0]->cancelled}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    var KTCardWidget9 = {
        init: function() {
            !(function() {
                var e = document.getElementById("kt_card_widget_9_chart");
                if (e) {
                    var t = parseInt(KTUtil.css(e, "height")),
                        a =
                        (KTUtil.getCssVariableValue("--bs-border-dashed-color"),
                            KTUtil.getCssVariableValue("--bs-gray-800")),
                        r = KTUtil.getCssVariableValue("--bs-light-info"),
                        o = new ApexCharts(e, {
                            series: [{
                                name: "Revenue",
                                data: <?php echo $dataGraph ?>,
                            }, ],
                            chart: {
                                fontFamily: "inherit",
                                type: "area",
                                height: t,
                                toolbar: {
                                    show: !1
                                },
                            },
                            legend: {
                                show: !1
                            },
                            dataLabels: {
                                enabled: !1
                            },
                            fill: {
                                type: "solid",
                                opacity: 0
                            },
                            stroke: {
                                curve: "smooth",
                                show: !0,
                                width: 2,
                                colors: [a],
                            },
                            xaxis: {
                                axisBorder: {
                                    show: !1
                                },
                                axisTicks: {
                                    show: !1
                                },
                                labels: {
                                    show: !1
                                },
                                crosshairs: {
                                    position: "front",
                                    stroke: {
                                        color: a,
                                        width: 1,
                                        dashArray: 3
                                    },
                                },
                                tooltip: {
                                    enabled: !0,
                                    formatter: void 0,
                                    offsetY: 0,
                                    style: {
                                        fontSize: "12px"
                                    },
                                },
                            },
                            yaxis: {
                                labels: {
                                    show: !1
                                }
                            },
                            states: {
                                normal: {
                                    filter: {
                                        type: "none",
                                        value: 0
                                    }
                                },
                                hover: {
                                    filter: {
                                        type: "none",
                                        value: 0
                                    }
                                },
                                active: {
                                    allowMultipleDataPointsSelection: !1,
                                    filter: {
                                        type: "none",
                                        value: 0
                                    },
                                },
                            },
                            tooltip: {
                                style: {
                                    fontSize: "12px"
                                },
                                x: {
                                    formatter: function(e) {
                                        return "Day " + e;
                                    },
                                },
                                y: {
                                    formatter: function(e) {
                                        return "$" + e;
                                    },
                                },
                            },
                            colors: [r],
                            grid: {
                                strokeDashArray: 4,
                                padding: {
                                    top: 0,
                                    right: -20,
                                    bottom: -20,
                                    left: -20,
                                },
                                yaxis: {
                                    lines: {
                                        show: !0
                                    }
                                },
                            },
                            markers: {
                                strokeColor: a,
                                strokeWidth: 2
                            },
                        });
                    setTimeout(function() {
                        o.render();
                    }, 300);
                }
            })();
        },
    };
    "undefined" != typeof module && (module.exports = KTCardWidget9),
        KTUtil.onDOMContentLoaded(function() {
            KTCardWidget9.init();
        });
</script>
<script src="{{ asset('theme/assets/js/widgets.bundle.js') }}"></script>
@endsection