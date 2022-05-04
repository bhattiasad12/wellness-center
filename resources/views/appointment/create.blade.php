 <!--begin::Form-->
 <form id="" class="form" action="#">
     <!--begin::Scroll-->
     <div class="d-flex flex-column scroll-y me-n7 pe-7" id="" data-kt-scroll="true"
         data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
         data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
         data-kt-scroll-offset="300px">
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
                 <input disabled type="email" min="0" name="email" class="form-control form-control-solid mb-3 mb-lg-0"
                     value="abc@gmail.com" />
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
                 <input type="number" min="0" name="sessions" class="form-control form-control-solid mb-3 mb-lg-0"
                     placeholder="Please Enter your Sessions here." />
             </div>
             <div class="col-lg-6">
                 <label class="required fw-bold fs-6 mb-2">Settings</label>
                 <input type="text" min="0" name="settings" class="form-control form-control-solid mb-3 mb-lg-0"
                     placeholder="Please Enter your Settings here." />
             </div>
         </div>
         <div class="row mb-7">
             <div class="col-lg-6">
                 <label class="fw-bold fs-6 mb-2">Session Price</label>
                 <input type="number" name="session_price" class="form-control form-control-solid mb-3 mb-lg-0"
                     placeholder="Please Enter your Session Price here." />
             </div>
         </div>
         <div class="row mb-7">
             <div class="col-lg-6">
                 <label class="fw-bold fs-6 mb-2">Promotion(%)</label>
                 <input type="number" name="promotion" class="form-control form-control-solid mb-3 mb-lg-0"
                     placeholder="Please Enter your Promotion(%) here." />
             </div>
             <div class="col-lg-6">
                 <label class="fw-bold fs-6 mb-2">Total Service Amount</label>
                 <div class="input-group mb-5">
                     <span class="input-group-text">$</span>
                     <input type="text" disabled class="form-control mb-3 mb-lg-0" name="total_service_amount"
                         placeholder="800">
                 </div>
             </div>
         </div>

         <div class="separator separator-dashed my-10"></div>

         <div class="row mb-7">
             <div class="col-lg-6">
                 <label class="required fw-bold fs-6 mb-2">Room Time</label>
                 <input disabled class="form-control form-control-solid kt_datepicker_8" name="room_time"
                     value="15 min" />
             </div>
         </div>
         <div class="row mb-7">
             <div class="col-lg-6">
                 <label class="required fw-bold fs-6 mb-2">Start Time(Check-In)</label>
                 <input class="form-control form-control-solid kt_datepicker_3" name="start_time" value="1:05 PM" />
             </div>
             <div class="col-lg-6">
                 <label class="required fw-bold fs-6 mb-2">Finish Time (Check-Out)</label>
                 <input disabled class="form-control form-control-solid kt_datepicker_3" name="finish_time"
                     value="2:05 PM" />
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
