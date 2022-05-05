@extends('layouts.main')

@section('content')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Layout-->
            <div class="d-flex flex-column flex-lg-row">
                <!--begin::Sidebar-->
                <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-350px mb-10">
                    <!--begin::Card-->
                    <div class="card mb-5 mb-xl-8">
                        <!--begin::Card body-->
                        <div class="card-body">
                            <!--begin::Summary-->
                            <!--begin::User Info-->
                            <div class="d-flex flex-center flex-column py-5">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-100px symbol-circle mb-7">
                                    <img src="{{ asset($client->profile_pic) }}" alt="image" />
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Name-->
                                <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bolder mb-3">{{ucwords($client->first_name)}} {{ucwords($client->last_name)}}</a>
                                <!--end::Name-->
                                <!--begin::Position-->
                                <div class="mb-9">
                                    <!--begin::Badge-->
                                    <div class="badge badge-lg badge-light-primary d-inline">Client</div>
                                    <!--begin::Badge-->
                                </div>
                                <!--end::Position-->
                                <!--begin::Info-->
                                <!--begin::Info heading-->
                                <div class="fw-bolder mb-3">Total Count
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-html="true" data-bs-content="Total count of Notes made and the Attachments uploaded for this Client."></i>
                                </div>
                                <!--end::Info heading-->
                                <div class="d-flex flex-wrap flex-center fs-8">
                                    <!--begin::Stats-->
                                    <div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3 text-center">
                                        <div class="fs-5 fw-bolder text-gray-700">
                                            <span class="w-75px">{{count($clientNote)}}</span>
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                            <span class="svg-icon svg-icon-3 svg-icon-success">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
                                                    <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </div>
                                        <div class="fw-bold text-muted">Notes</div>
                                    </div>
                                    <!--end::Stats-->
                                    <!--begin::Stats-->
                                    <div class="border border-gray-300 border-dashed rounded py-3 px-3 mx-4 mb-3 text-center">
                                        <div class="fs-5 fw-bolder text-gray-700">
                                            <span class="w-50px">56</span>
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr065.svg-->
                                            <span class="svg-icon svg-icon-3 svg-icon-success">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
                                                    <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </div>
                                        <div class="fw-bold text-muted">Attachments</div>
                                    </div>
                                    <!--end::Stats-->
                                    <!--begin::Stats-->
                                    <div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3 text-center">
                                        <div class="fs-5 fw-bolder text-gray-700">
                                            <span class="w-50px">{{date("y-m-d",strtotime($client->created_at))}}</span>
                                        </div>
                                        <div class="fw-bold text-muted">Created On</div>
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::User Info-->
                            <!--end::Summary-->
                            <!--begin::Details toggle-->
                            <div class="d-flex flex-stack fs-4 py-3">
                                <div class="fw-bolder rotate collapsible" data-bs-toggle="collapse" href="#kt_user_view_details" role="button" aria-expanded="false" aria-controls="kt_user_view_details">Details
                                    <span class="ms-2 rotate-180">
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </span>
                                </div>
                                <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Edit customer details">
                                    <button href="#" class="btn btn-sm btn-light-primary" onclick="editClient('{{$client->id}}')">Edit</button>
                                </span>
                            </div>
                            <!--end::Details toggle-->
                            <div class="separator"></div>
                            <!--begin::Details content-->
                            <div id="kt_user_view_details" class="collapse show">
                                <div class="pb-5 fs-6">
                                    <!--begin::Details item-->
                                    <div class="fw-bolder mt-5">Client ID</div>
                                    <div class="text-gray-600">{{$client->id}}</div>
                                    <!--begin::Details item-->
                                    <!--begin::Details item-->
                                    <div class="fw-bolder mt-5">Email</div>
                                    <div class="text-gray-600">
                                        <a href="#" class="text-gray-600 text-hover-primary">{{$client->email}}</a>
                                    </div>
                                    <div class="fw-bolder mt-5">Phone Number</div>
                                    <div class="text-gray-600">
                                        <a href="#" class="text-gray-600 text-hover-primary">{{$client->phone_number}}</a>
                                    </div>
                                    <div class="fw-bolder mt-5">Age</div>
                                    <div class="text-gray-600">
                                        <a href="#" class="text-gray-600 text-hover-primary">{{$client->age}} yrs</a>
                                    </div>
                                    <!--begin::Details item-->
                                    <!--begin::Details item-->
                                    <div class="fw-bolder mt-5">Neighborhood</div>
                                    <div class="text-gray-600">{{ucwords($client->neighborhood)}}</div>
                                    <!--begin::Details item-->
                                    <!--begin::Details item-->
                                    <div class="fw-bolder mt-5">City</div>
                                    <div class="text-gray-600">{{ucwords($client->city)}}</div>
                                    <!--begin::Details item-->
                                    <!--begin::Details item-->
                                    <div class="fw-bolder mt-5">Zip Code</div>
                                    <div class="text-gray-600">{{$client->zip_code}}</div>
                                    <!--begin::Details item-->
                                    <!--begin::Details item-->
                                    <div class="fw-bolder mt-5">Source</div>
                                    <div class="text-gray-600">{{ucwords($client->source)}}</div>
                                    <!--begin::Details item-->
                                    <!--begin::Details item-->
                                    <div class="fw-bolder mt-5">Creation Date</div>
                                    <div class="text-gray-600">{{date("y-m-d",strtotime($client->created_at))}}</div>
                                    <!--begin::Details item-->
                                </div>
                            </div>
                            <!--end::Details content-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Sidebar-->
                <!--begin::Content-->
                <div class="flex-lg-row-fluid ms-lg-15">
                    <!--begin:::Tabs-->
                    <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-8">
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_user_view_notes_tab">Notes</a>
                        </li>
                        <!--end:::Tab item-->
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_user_view_cart">Cart</a>
                        </li>
                        <!--end:::Tab item-->
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_user_view_document_attachment">Document Attachments</a>
                        </li>
                        <!--end:::Tab item-->
                    </ul>
                    <!--end:::Tabs-->
                    <!--begin:::Tab content-->
                    <div class="tab-content" id="myTabContent">
                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade show active" id="kt_user_view_notes_tab" role="tabpanel">
                            <!--begin::Notes-->
                            <div class="card card-flush mb-6 mb-xl-9">
                                <!--begin::Card header-->
                                <div class="card-header mt-6">
                                    <!--begin::Card title-->
                                    <div class="card-title flex-column">
                                        <h2 class="mb-1">Client's Notes</h2>
                                        <div class="fs-6 fw-bold text-muted">Total 3 Notes in backlog</div>
                                    </div>
                                    <!--end::Card title-->
                                    <!--begin::Card toolbar-->
                                    <div class="card-toolbar">
                                        <button type="button" class="btn btn-light-primary btn-sm" onclick="addClientNote()">
                                            <!--begin::Svg Icon | path: icons/duotune/files/fil005.svg-->
                                            <span class="svg-icon svg-icon-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM16 13.5L12.5 13V10C12.5 9.4 12.6 9.5 12 9.5C11.4 9.5 11.5 9.4 11.5 10L11 13L8 13.5C7.4 13.5 7 13.4 7 14C7 14.6 7.4 14.5 8 14.5H11V18C11 18.6 11.4 19 12 19C12.6 19 12.5 18.6 12.5 18V14.5L16 14C16.6 14 17 14.6 17 14C17 13.4 16.6 13.5 16 13.5Z" fill="black" />
                                                    <rect x="11" y="19" width="10" height="2" rx="1" transform="rotate(-90 11 19)" fill="black" />
                                                    <rect x="7" y="13" width="10" height="2" rx="1" fill="black" />
                                                    <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->Add Notes
                                        </button>
                                    </div>
                                    <!--end::Card toolbar-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body d-flex flex-column">
                                    <!--begin::Item-->

                                    @for ($i = 0; $i< count($clientNote); $i++) @php $open='' ; $process="" ; $complete="" ; if($clientNote[$i]->status == 'open')
                                        {
                                        $status='info';
                                        $statusName='Open';
                                        $open="selected";
                                        }
                                        else if($clientNote[$i]->status == 'inprocess')
                                        {
                                        $status='primary';
                                        $statusName='In process';
                                        $process="selected";

                                        }
                                        else if($clientNote[$i]->status == 'completed')
                                        {
                                        $status='success';
                                        $statusName='Completed';
                                        $complete="selected";

                                        }
                                        @endphp

                                        <div class="d-flex align-items-center position-relative mb-7">
                                            <!--begin::Label-->
                                            <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px">
                                            </div>
                                            <!--end::Label-->
                                            <!--begin::Details-->
                                            <div class="fw-bold ms-5">
                                                <a href="javascript:;" class="fs-5 fw-bolder text-dark text-hover-primary">{{ucwords($clientNote[$i]->note)}}</a>
                                                <div class="badge badge-sm badge-light-{{$status}} d-inline">{{ $statusName}}</div>
                                                <!--begin::Info-->
                                                <div class="fs-7 text-muted">Created On
                                                    <a href="javascript:;">{{Date("Y-m-d",strtotime($clientNote[$i]->created_at))}}</a>
                                                </div>
                                                <div class="fs-7 text-muted">Added By
                                                    <a href="javascript:;">{{ucwords($clientNote[$i]->user_name)}}</a>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::Details-->
                                            <!--begin::Menu-->
                                            <button type="button" class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
                                                <span class="svg-icon svg-icon-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <path d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z" fill="black" />
                                                        <path opacity="0.3" d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z" fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </button>
                                            <!--begin::Task menu-->
                                            <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" data-kt-menu-id="kt-users-tasks">
                                                <!--begin::Header-->
                                                <div class="px-7 py-5">
                                                    <div class="fs-5 text-dark fw-bolder">Update Status</div>
                                                </div>
                                                <!--end::Header-->
                                                <!--begin::Menu separator-->
                                                <div class="separator border-gray-200"></div>
                                                <!--end::Menu separator-->
                                                <!--begin::Form-->
                                                <form class="form px-7 py-5" data-kt-menu-id="kt-users-tasks-form" method="POST" action="{{route('client_note.update',$clientNote[$i]->id)}}">
                                                    @method("PUT")
                                                    @csrf
                                                    <!--begin::Input group-->
                                                    <div class="fv-row mb-10">
                                                        <!--begin::Label-->
                                                        <label class="form-label fs-6 fw-bold">Status:</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <select class="form-select form-select-solid" name="task_status" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-hide-search="true" required>
                                                            <option></option>
                                                            <option value="open" {{$open}}>Open</option>
                                                            <option value=" inProcess" {{$process}}>In Process</option>
                                                            <option value="completed" {{$complete}}>Completed</option>
                                                        </select>
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Actions-->
                                                    <div class=" d-flex justify-content-end">
                                                        <button type="submit" class="btn btn-sm btn-primary">Apply</button>
                                                    </div>
                                                    <!--end::Actions-->
                                                </form>
                                                <!--end::Form-->
                                            </div>
                                            <!--end::Task menu-->
                                            <!--end::Menu-->
                                        </div>

                                        @endfor
                                </div>
                                <!--end::Card body-->
                                <!--end::Tasks-->
                            </div>
                        </div>
                        <!--end:::Tab pane-->

                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade" id="kt_user_view_cart" role="tabpanel">
                            <!--begin::Card-->
                            <div class="card mb-6 mb-xl-9">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2>History of Services <span class="text-gray-600 fs-6">(Consumed/ Not
                                                Consumed)</span></h2>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0 pb-5">
                                    <!--begin::Table wrapper-->
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table table-row-bordered gy-5 kt_datatable_example_1">
                                            <thead>
                                                <tr class="fw-bold fs-6 text-muted">
                                                    <th class="min-w-150px">Appointment ID</th>
                                                    <th class="min-w-150px">Appointment Date</th>
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
                                                    <th class="min-w-300px">Notes</th>
                                                    <th class="min-w-150px">Creation Date</th>
                                                    <th class="min-w-150px">Appointment Status</th>
                                                </tr>
                                            </thead>
                                            <tbody class="fw-bold">
                                                <tr>
                                                    <td>001</td>
                                                    <td>11-04-2022</td>
                                                    <td>IPL</td>
                                                    <td>Laser</td>
                                                    <td>01 Epilation</td>
                                                    <td>Legs</td>
                                                    <td>4</td>
                                                    <td>200</td>
                                                    <td class="fw-bolder">$800</td>
                                                    <td class="fw-bolder text-success">$300</td>
                                                    <td class="fw-bolder text-danger">$500</td>
                                                    <td>11-04-2022 3:00 PM</td>
                                                    <td>11-04-2022 3:30 PM</td>
                                                    <td>3:00 PM</td>
                                                    <td>Room 3</td>
                                                    <td>John Andrew</td>
                                                    <td>Jules</td>
                                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus
                                                        eveniet asperiores.</td>
                                                    <td>08-04-2022</td>
                                                    <td>
                                                        <div class="badge badge-lg badge-success d-inline">Consumed
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Table wrapper-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                            <!--Start::Card-->
                            <div class="card mb-6 mb-xl-9">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2>History of Payments <span class="text-gray-600 fs-6">(Paid, Not
                                                Paid)</span></h2>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--begin::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0 pb-5">
                                    <div class="table-responsive">
                                        <table class="table table-row-bordered gy-5 kt_datatable_example_1">
                                            <thead>
                                                <tr class="fw-bold fs-6 text-muted">
                                                    <th class="min-w-30px">ID</th>
                                                    <th class="min-w-80px">Service</th>
                                                    <th class="min-w-150px">Payment Method</th>
                                                    <th class="min-w-100px">Payment Date</th>
                                                    <th class="min-w-80px">Total</th>
                                                    <th class="min-w-80px">Paid</th>
                                                    <th class="min-w-80px">Un-Paid</th>
                                                    <th class="min-w-100px">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody class="fw-bold">
                                                <tr>
                                                    <td>1</td>
                                                    <td>Laser</td>
                                                    <td>Cash</td>
                                                    <td>11-04-2022</td>
                                                    <td class="fw-bolder">$800</td>
                                                    <td class="text-success fw-bolder">$800</td>
                                                    <td class="text-danger fw-bolder">$0</td>
                                                    <td class="">
                                                        <div class="badge badge-lg badge-success d-inline">Paid</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>01 Epilation</td>
                                                    <td>Credit Card</td>
                                                    <td>26-07-2022</td>
                                                    <td class="fw-bolder">$1200</td>
                                                    <td class="text-success fw-bolder">$800</td>
                                                    <td class="text-danger fw-bolder">$400</td>
                                                    <td class="">
                                                        <div class="badge badge-lg badge-danger d-inline">Un-Paid</div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--End::Card-->
                        </div>
                        <!--end:::Tab pane-->
                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade" id="kt_user_view_document_attachment" role="tabpanel">
                            <!--begin::Card-->
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <!--begin::Card header-->
                                <div class="card-header border-0">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2>Document Attachments</h2>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card-->
                                <div class="card card-flush">
                                    <!--begin::Card header-->
                                    <div class="card-header">
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
                                                <input type="text" id="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search Files &amp; Folders" />
                                            </div>
                                            <!--end::Search-->
                                        </div>
                                        <!--begin::Card toolbar-->
                                        <div class="card-toolbar">
                                            <!--begin::Toolbar-->
                                            <div class="d-flex justify-content-end" data-kt-filemanager-table-toolbar="base">
                                                <!--begin::Add customer-->
                                                <button type="button" class="btn btn-primary" onclick="addDocument()">
                                                    <!--begin::Svg Icon | path: icons/duotune/files/fil018.svg-->
                                                    <span class="svg-icon svg-icon-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <path opacity="0.3" d="M10 4H21C21.6 4 22 4.4 22 5V7H10V4Z" fill="black" />
                                                            <path d="M10.4 3.60001L12 6H21C21.6 6 22 6.4 22 7V19C22 19.6 21.6 20 21 20H3C2.4 20 2 19.6 2 19V4C2 3.4 2.4 3 3 3H9.20001C9.70001 3 10.2 3.20001 10.4 3.60001ZM16 11.6L12.7 8.29999C12.3 7.89999 11.7 7.89999 11.3 8.29999L8 11.6H11V17C11 17.6 11.4 18 12 18C12.6 18 13 17.6 13 17V11.6H16Z" fill="black" />
                                                            <path opacity="0.3" d="M11 11.6V17C11 17.6 11.4 18 12 18C12.6 18 13 17.6 13 17V11.6H11Z" fill="black" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->Upload Files
                                                </button>
                                                <!--end::Add customer-->
                                            </div>
                                            <!--end::Toolbar-->
                                        </div>
                                        <!--end::Card toolbar-->
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-1">
                                        <!--begin::Table-->
                                        <table data-kt-filemanager-table="files" class="table align-middle table-row-dashed fs-6 gy-5 kt_datatable_example_1">
                                            <!--begin::Table head-->
                                            <thead>
                                                <!--begin::Table row-->
                                                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                    <th class="min-w-250px">Name</th>
                                                    <th class="min-w-10px">Size</th>
                                                    <th class="min-w-125px">Last Modified</th>
                                                    <th class="w-125px"></th>
                                                </tr>
                                                <!--end::Table row-->
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->
                                            <tbody class="fw-bold text-gray-600">

                                                <tr>
                                                    <!--begin::Name=-->
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Svg Icon | path: icons/duotune/files/fil003.svg-->
                                                            <span class="svg-icon svg-icon-2x svg-icon-primary me-4">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22Z" fill="black" />
                                                                    <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="black" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                            <a href="#" class="text-gray-800 text-hover-primary">api-keys.html</a>
                                                        </div>
                                                    </td>
                                                    <!--end::Name=-->
                                                    <!--begin::Size-->
                                                    <td>489 KB</td>
                                                    <!--end::Size-->
                                                    <!--begin::Last modified-->
                                                    <td>24 Jun 2021, 5:30 pm</td>
                                                    <!--end::Last modified-->
                                                    <!--begin::Actions-->
                                                    <td class="text-end" data-kt-filemanager-table="action_dropdown">
                                                        <div class="d-flex justify-content-end">
                                                            <!--begin::More-->
                                                            <a href="javascript:;" class="badge badge-lg badge-light-primary p-3 d-inline">Download</a>
                                                            <!--end::More-->
                                                        </div>
                                                    </td>
                                                    <!--end::Actions-->
                                                </tr>
                                                <tr>
                                                    <!--begin::Name=-->
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Svg Icon | path: icons/duotune/files/fil003.svg-->
                                                            <span class="svg-icon svg-icon-2x svg-icon-primary me-4">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22Z" fill="black" />
                                                                    <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="black" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                            <a href="#" class="text-gray-800 text-hover-primary">billing.html</a>
                                                        </div>
                                                    </td>
                                                    <!--end::Name=-->
                                                    <!--begin::Size-->
                                                    <td>554 KB</td>
                                                    <!--end::Size-->
                                                    <!--begin::Last modified-->
                                                    <td>10 Nov 2021, 5:30 pm</td>
                                                    <!--end::Last modified-->
                                                    <!--begin::Actions-->
                                                    <td class="text-end" data-kt-filemanager-table="action_dropdown">
                                                        <div class="d-flex justify-content-end">
                                                            <!--begin::More-->
                                                            <a href="javascript:;" class="badge badge-lg badge-light-primary p-3 d-inline">Download</a>
                                                            <!--end::More-->
                                                        </div>
                                                    </td>
                                                    <!--end::Actions-->
                                                </tr>
                                                <tr>
                                                    <!--begin::Name=-->
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Svg Icon | path: icons/duotune/general/gen006.svg-->
                                                            <span class="svg-icon svg-icon-2x svg-icon-primary me-4">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path opacity="0.3" d="M22 5V19C22 19.6 21.6 20 21 20H19.5L11.9 12.4C11.5 12 10.9 12 10.5 12.4L3 20C2.5 20 2 19.5 2 19V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5ZM7.5 7C6.7 7 6 7.7 6 8.5C6 9.3 6.7 10 7.5 10C8.3 10 9 9.3 9 8.5C9 7.7 8.3 7 7.5 7Z" fill="black" />
                                                                    <path d="M19.1 10C18.7 9.60001 18.1 9.60001 17.7 10L10.7 17H2V19C2 19.6 2.4 20 3 20H21C21.6 20 22 19.6 22 19V12.9L19.1 10Z" fill="black" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                            <a href="#" class="text-gray-800 text-hover-primary">pattern-3.jpg</a>
                                                        </div>
                                                    </td>
                                                    <!--end::Name=-->
                                                    <!--begin::Size-->
                                                    <td>11 KB</td>
                                                    <!--end::Size-->
                                                    <!--begin::Last modified-->
                                                    <td>20 Jun 2021, 2:40 pm</td>
                                                    <!--end::Last modified-->
                                                    <!--begin::Actions-->
                                                    <td class="text-end" data-kt-filemanager-table="action_dropdown">
                                                        <div class="d-flex justify-content-end">
                                                            <!--begin::More-->
                                                            <a href="javascript:;" class="badge badge-lg badge-light-primary p-3 d-inline">Download</a>
                                                            <!--end::More-->
                                                        </div>
                                                    </td>
                                                    <!--end::Actions-->
                                                </tr>
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Card-->
                            </div>
                            <!--end::Card-->

                        </div>
                        <!--end:::Tab pane-->
                    </div>
                    <!--end:::Tab content-->
                </div>
                <!--end::Content-->
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
<script>
    function addClientNote() {
        var value = {
            clientId: '{{$client->id}}',
        };
        $.ajax({
            type: 'GET',
            url: "{{ route('client_note.create') }}",
            data: value,
            success: function(result) {
                $('#myModalLgHeading').html('Add a note');
                $('#modalBodyLarge').html(result);
                $('#myModalLg').modal('show');
            }
        });
    }

    function addDocument() {
        var value = {
            clientId: '{{$client->id}}',
        };
        $.ajax({
            type: 'GET',
            url: "{{ route('create_documnet') }}",
            data: value,
            success: function(result) {
                $('#myModalLgHeading').html('Add a note');
                $('#modalBodyLarge').html(result);
                $('#myModalLg').modal('show');
            }
        });
    }


    function editClient(id) {
        url = "{{route('client.edit',':id')}}";
        url = url.replace(':id', id);
        $.ajax({
            type: 'GET',
            url: url,
            success: function(result) {
                $('#myModalLgHeading').html('Edit Client');
                $('#modalBodyLarge').html(result);
                $('#myModalLg').modal('show');
            }
        });
    }
</script>
@endsection