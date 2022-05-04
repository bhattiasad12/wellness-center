  <!--begin::Form-->
  <form id="" class="form" action="#">
      <!--begin::Scroll-->
      <div class="d-flex flex-column scroll-y me-n7 pe-7" id="" data-kt-scroll="true"
          data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
          data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
          data-kt-scroll-offset="300px">
          <div class="fv-row mb-7">
              <label for="" class="required fw-bold fs-6 mb-2">Machine</label>
              <select name="machine" class="form-control form-control-solid mb-3 mb-lg-0" id="">
                  <option value="">-- Select Machine --</option>
                  <option value="Machine A">Machine A</option>
                  <option value="Machine B">Machine B</option>
                  <option value="Machine C">Machine C</option>
              </select>
              <!-- <select class="form-select form-select-solid js-example-basic-single" data-placeholder="Select an option">
                        <option></option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                        <option value="4">Option 4</option>
                        <option value="5">Option 5</option>
                    </select> -->
          </div>
          <div class="fv-row mb-7">
              <label class="required fw-bold fs-6 mb-2">Hand</label>
              <input type="text" name="hand" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Hand 2" />
          </div>
          <div class="fv-row mb-7">
              <label class="required fw-bold fs-6 mb-2">Service Name</label>
              <input type="text" min="0" name="service" class="form-control form-control-solid mb-3 mb-lg-0"
                  placeholder="Service 2" />
          </div>
          <div class="fv-row mb-7">
              <label class="required fw-bold fs-6 mb-2">Zone</label>
              <select name="zone" class="form-control form-control-solid mb-3 mb-lg-0" id="">
                  <option value="">-- Select Zone --</option>
                  <option value="Face">Face</option>
                  <option value="Leg">Leg</option>
                  <option value="Arm">Arm</option>
              </select>
          </div>
          <div class="fv-row mb-7">
              <label class="required fw-bold fs-6 mb-2">Sessions</label>
              <select name="sessions" class="form-control form-control-solid mb-3 mb-lg-0" id="">
                  <option value="">-- Select Sessions --</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
              </select>
          </div>
          <div class="fv-row mb-7">
              <label class="required fw-bold fs-6 mb-2">Time Limit (min)</label>
              <input type="number" name="time_limit" class="form-control form-control-solid mb-3 mb-lg-0"
                  placeholder="20" />
          </div>
          <div class="fv-row mb-7">
              <label class="required fw-bold fs-6 mb-2">Price ($)</label>
              <input type="number" name="price" class="form-control form-control-solid mb-3 mb-lg-0"
                  placeholder="299" />
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
