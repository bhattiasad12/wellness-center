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
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <div class="row gy-5 g-xl-10">
                <div class="col-xl-12 mb-5 mb-xl-10">
                    <div class="card card-docs mb-2">
                        <div class="p-10">
                            <h1 class="anchor fw-bolder mb-5" id="zero-configuration">
                                <a href="javascript:;"></a>Appointments List
                            </h1>
                            <div class="d-flex align-items-center rounded py-5 px-4 bg-light-info">
                                <div class="d-flex h-80px w-80px flex-shrink-0 flex-center position-relative ms-3 me-6">
                                    <span class="svg-icon svg-icon-info position-absolute opacity-10">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="70px" height="70px" viewBox="0 0 70 70" fill="none" class="w-80px h-80px">
                                            <path d="M28 4.04145C32.3316 1.54059 37.6684 1.54059 42 4.04145L58.3109 13.4585C62.6425 15.9594 65.3109 20.5812 65.3109 25.5829V44.4171C65.3109 49.4188 62.6425 54.0406 58.3109 56.5415L42 65.9585C37.6684 68.4594 32.3316 68.4594 28 65.9585L11.6891 56.5415C7.3575 54.0406 4.68911 49.4188 4.68911 44.4171V25.5829C4.68911 20.5812 7.3575 15.9594 11.6891 13.4585L28 4.04145Z" fill="#000000" />
                                        </svg>
                                    </span>
                                    <span class="svg-icon svg-icon-3x svg-icon-info position-absolute">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M6.5 11C8.98528 11 11 8.98528 11 6.5C11 4.01472 8.98528 2 6.5 2C4.01472 2 2 4.01472 2 6.5C2 8.98528 4.01472 11 6.5 11Z" fill="black" />
                                            <path opacity="0.3" d="M13 6.5C13 4 15 2 17.5 2C20 2 22 4 22 6.5C22 9 20 11 17.5 11C15 11 13 9 13 6.5ZM6.5 22C9 22 11 20 11 17.5C11 15 9 13 6.5 13C4 13 2 15 2 17.5C2 20 4 22 6.5 22ZM17.5 22C20 22 22 20 22 17.5C22 15 20 13 17.5 13C15 13 13 15 13 17.5C13 20 15 22 17.5 22Z" fill="black" />
                                        </svg>
                                    </span>
                                </div>
                                <div class="text-gray-700 fw-bold fs-6 lh-lg">Here we have a list of all of the
                                    Appointments that are booked.</div>
                            </div>
                        </div>
                        <div class="card-header border-0">
                            <div class="card-title">
                                <div class="d-flex align-items-center position-relative my-1">
                                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                            <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                                        </svg>
                                    </span>
                                    <input type="text" id="search" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search" />
                                </div>
                            </div>
                            <div class="card-toolbar">
                                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                    <button type="button" class="btn btn-primary" onclick="addAppointment()">
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                                                <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
                                            </svg>
                                        </span>
                                        Add Appointment
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body fs-6 py-lg-5 text-gray-700">

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
                                        @for ($i = 0; $i < count($appointment); $i++) <tr>
                                            <td><a href="{{ route('appointment.show', $appointment[$i]->appointment_id) }}" class="fw-bolder text-gray-800 text-hover-primary mb-1">{{$appointment[$i]->appointment_id}}</a></td>
                                            <td><a href="{{ route('appointment.show', $appointment[$i]->appointment_id) }}" class="fw-bolder text-gray-800 text-hover-primary mb-1">{{Date("Y-m-d",strtotime($appointment[$i]->appointment_start))}}</a>
                                            </td>
                                            <td><a href="{{ route('appointment.show', $appointment[$i]->appointment_id) }}" class="fw-bolder text-gray-800 text-hover-primary mb-1">{{ucwords($appointment[$i]->client_first_name)}}</a>
                                            </td>
                                            <td><a href="{{ route('appointment.show', $appointment[$i]->appointment_id) }}" class="fw-bolder text-gray-800 text-hover-primary mb-1">{{ucwords($appointment[$i]->client_last_name)}}</a>
                                            </td>
                                            <td>{{$appointment[$i]->phone_number}}</td>
                                            <td>{{ucwords($appointment[$i]->machine_name)}}</td>
                                            <td>{{ucwords($appointment[$i]->service_name)}}</td>
                                            <td>{{ucwords($appointment[$i]->hand_name)}}</td>
                                            <td>{{ucwords($appointment[$i]->zone)}}</td>
                                            <td>{{$appointment[$i]->session}}</td>
                                            <td>{{$appointment[$i]->session_price}}</td>
                                            <td>{{$appointment[$i]->total_service_amount}}</td>
                                            <td>{{$appointment[$i]->paid}}</td>
                                            <td>{{$appointment[$i]->unpaid}}</td>
                                            <td>{{$appointment[$i]->appointment_start}}</td>
                                            <td>{{$appointment[$i]->appointment_end}}</td>
                                            <td>{{$appointment[$i]->room_time}}</td>
                                            <td>{{ucwords($appointment[$i]->room_name)}}</td>
                                            <td>{{ucwords($appointment[$i]->pra_first_name)}} {{ucwords($appointment[$i]->pra_last_name)}}</td>
                                            <td>{{ucwords($appointment[$i]->setting_name)}}</td>
                                            <td>{{ucwords($appointment[$i]->status)}}</td>
                                            <td>{{ucfirst($appointment[$i]->note)}}</td>
                                            <td>{{date("Y-m-d",strtotime($appointment[$i]->created_at))}}</td>
                                            <td>
                                                <button class="btn btn-icon btn-sm btn-color-gray-400 btn-active-icon-primary me-2" onclick="">
                                                    <span class="svg-icon svg-icon-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black"></path>
                                                            <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black"></path>
                                                        </svg>
                                                    </span>
                                                </button>
                                                <form style="display: inline-block" method="POST" action="{{ route('appointment.destroy', $appointment[$i]->appointment_id) }}">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-icon btn-sm btn-color-gray-400 btn-active-icon-danger me-2" data-bs-toggle="tooltip" data-bs-original-title="Delete Client">
                                                        <span class="svg-icon svg-icon-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black"></path>
                                                                <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black"></path>
                                                                <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black"></path>
                                                            </svg>
                                                        </span>
                                                    </button>
                                                </form>
                                            </td>
                                            </tr>
                                            @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
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

    function editAppointment(id) {
        $.ajax({
            type: 'GET',
            // url: `{{ route('room.create', ['id' => `+ id +`]) }}`,
            url: `appointment/` + id + `/edit `,
            success: function(result) {
                $('#myModalLgHeading').html('Edit Appointment');
                $('#modalBodyLarge').html(result);
                $('#myModalLg').modal('show');
            }
        });
    }
</script>
@endsection