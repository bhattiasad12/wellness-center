   <!--begin::Form-->
   <form id="" class="form" action="#">
       <!--begin::Scroll-->
       <div class="d-flex flex-column scroll-y me-n7 pe-7" id="" data-kt-scroll="true"
           data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
           data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
           data-kt-scroll-offset="300px">
           <div class="fv-row mb-7">
               <label class="d-block fw-bold fs-6 mb-5">Avatar</label>
               <div class="image-input image-input-outline" data-kt-image-input="true"
                   style="background-image: url({{ asset('theme/assets/media/svg/avatars/blank.svg') }})">
                   <div class="image-input-wrapper w-125px h-125px"
                       style="background-image: url({{ asset('theme/assets/media/avatars/300-3.jpg') }})">
                   </div>
                   <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                       data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                       <i class="bi bi-pencil-fill fs-7"></i>
                       <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                       <input type="hidden" name="avatar_remove" />
                   </label>
                   <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                       data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                       <i class="bi bi-x fs-2"></i>
                   </span>
                   <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                       data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                       <i class="bi bi-x fs-2"></i>
                   </span>
               </div>
               <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
           </div>
           <div class="fv-row mb-7">
               <label class="required fw-bold fs-6 mb-2">First Name</label>
               <input type="text" name="first_name" class="form-control form-control-solid mb-3 mb-lg-0"
                   value="Tiger" />
           </div>
           <div class="fv-row mb-7">
               <label class="required fw-bold fs-6 mb-2">Last Name</label>
               <input type="text" name="last_name" class="form-control form-control-solid mb-3 mb-lg-0" value="Nixon" />
           </div>
           <div class="fv-row mb-7">
               <label class="required fw-bold fs-6 mb-2">Email</label>
               <input type="email" name="email" class="form-control form-control-solid mb-3 mb-lg-0"
                   value="tiger223@gmail.com" />
           </div>
           <div class="fv-row mb-7">
               <label class="required fw-bold fs-6 mb-2">Phone Number</label>
               <input type="number" min="0" name="phone_number" class="form-control form-control-solid mb-3 mb-lg-0"
                   value="03343394556" />
           </div>
           <div class="fv-row mb-7">
               <label class="required fw-bold fs-6 mb-2">Age</label>
               <input type="number" min="0" name="age" class="form-control form-control-solid mb-3 mb-lg-0"
                   value="45" />
           </div>
           <div class="fv-row mb-7">
               <label class="required fw-bold fs-6 mb-2">Source</label>
               <input type="text" name="source" class="form-control form-control-solid mb-3 mb-lg-0" value="Facebook" />
           </div>
           <div class="fv-row mb-7">
               <label class="required fw-bold fs-6 mb-2">Neighborhood</label>
               <input type="text" name="neighborhood" class="form-control form-control-solid mb-3 mb-lg-0"
                   value="L74, Sector 11-C" />
           </div>
           <div class="fv-row mb-7">
               <label class="required fw-bold fs-6 mb-2">City</label>
               <input type="text" name="city" class="form-control form-control-solid mb-3 mb-lg-0" value="Karachi" />
           </div>
           <div class="fv-row mb-7">
               <label class="required fw-bold fs-6 mb-2">Zip Code</label>
               <input type="text" name="zipcode" class="form-control form-control-solid mb-3 mb-lg-0" value="74000" />
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
