  <!--begin::Form-->
  <form id="editRoomForm" class="form" method="POST" action="{{ route('service.update', $service->id) }}">
      @csrf
      @method('PUT')
      <!--begin::Scroll-->
      <div class="d-flex flex-column scroll-y me-n7 pe-7" id="" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
          <div class="fv-row mb-7">
              <label for="" class="required fw-bold fs-6 mb-2">Machine</label>
              <select id="machine" name="machine" class="form-control form-control-solid mb-3 mb-lg-0" required onchange="GetHand(this.value)">
                  <option value="">-- Select Machine --</option>
                  @for($i=0; $i < count($machine); $i++) <option value="{{$machine[$i]->id}}" {{$machine[$i]->id == $service->machine_id ? "selected" :"" }}>{{ucwords($machine[$i]->name)}}</option>
                      @endfor
              </select>
          </div>
          <div class="fv-row mb-7">
              <label class="required fw-bold fs-6 mb-2">Hand</label>
              <select name="hand" id='hand' class="form-control form-control-solid mb-3 mb-lg-0" required>
                  <option value="">-- Select Hand --</option>

              </select>
          </div>
          <div class="fv-row mb-7">
              <label class="required fw-bold fs-6 mb-2">Service Name</label>
              <input type="text" min="0" name="service_name" value="{{$service->service_name}}" class="form-control form-control-solid mb-3 mb-lg-0" value="Service 2" />
          </div>
          <div class="fv-row mb-7">
              <label class="required fw-bold fs-6 mb-2">Zone</label>
              <select name="zone" class="form-control form-control-solid mb-3 mb-lg-0" required>
                  <option value="">-- Select Zone --</option>
                  @for($i=0; $i < count($zone); $i++) <option value="{{$zone[$i]->zone_name}}" {{$zone[$i]->zone_name == $service->zone ? "selected" :"" }}>{{ucwords($zone[$i]->zone_name)}}</option>
                      @endfor
              </select>
          </div>
          <div class="fv-row mb-7">
              <label class="required fw-bold fs-6 mb-2">Sessions</label>
              <select name="session" class="form-control form-control-solid mb-3 mb-lg-0" id="">
                  <option value="1" {{"1" == $service->session ? "selected" :"" }}>1</option>
                  <option value="2" {{"2" == $service->session ? "selected" :"" }}>2</option>
                  <option value="3" {{"3" == $service->session ? "selected" :"" }}>3</option>
                  <option value="4" {{"4" == $service->session ? "selected" :"" }}>4</option>
                  <option value="5" {{"5" == $service->session ? "selected" :"" }}>5</option>
                  <option value="6" {{"6" == $service->session ? "selected" :"" }}>6</option>
                  <option value="7" {{"7" == $service->session ? "selected" :"" }}>7</option>
                  <option value="8" {{"8" == $service->session ? "selected" :"" }}>8</option>
                  <option value="9" {{"9" == $service->session ? "selected" :"" }}>9</option>
                  <option value="10" {{"10" == $service->session ? "selected" :"" }}>10</option>
              </select>
          </div>
          <div class="fv-row mb-7">
              <label class="required fw-bold fs-6 mb-2">Time Limit (min)</label>
              <input type="number" name="time_limit" value="{{$service->time_limit}}" class="form-control form-control-solid mb-3 mb-lg-0" value="20" />
          </div>
          <div class="fv-row mb-7">
              <label class="required fw-bold fs-6 mb-2">Price ($)</label>
              <input type="number" name="price" value="{{$service->price}}" class="form-control form-control-solid mb-3 mb-lg-0" value="299" />
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
  <script>
      var machine = $('#machine').val();
      GetHand(machine);

      function GetHand(machineId) {
          let value = {
              machineId: machineId,
          };
          $.ajax({
              type: 'GET',
              url: "{{ route('machine_hand') }}",
              data: value,
              success: function(result) {
                  document.getElementById('hand').innerHTML = '<option value="">-- Select Hand --</option>';
                  for (var i = 0; i < result.length; i++) {
                      var opt = document.createElement('option');
                      opt.value = result[i].id;
                      opt.innerHTML = result[i].name;
                      if (result[i].id == "{{$service->hand_id}}") opt.defaultSelected = true;
                      document.getElementById('hand').appendChild(opt);
                  }

              }
          });
      }
  </script>