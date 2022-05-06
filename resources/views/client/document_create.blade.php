<x-auth-validation-errors class="mb-4" style="color:red" :errors="$errors" />
<form id="" class="form" method="POST" action="{{ route('store_document') }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="client_id" value="{{ $clientId }}" />
    <div class="form-group">
        <input type="file" id='fileinput' name="document" class="form-control" required>
        <span class="form-text fs-6 text-muted">Max file size is 5MB per
            file.</span>
    </div>
    <div class="text-center pt-15">
        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" aria-label="Close">Discard</button>
        <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">Submit</button>
    </div>
</form>
<script>
    document.getElementById("fileinput").addEventListener("change", function(evt) {
        //Retrieve the first (and only!) File from the FileList object
        var f = evt.target.files[0];
        if (f) {
            var r = new FileReader();
            r.onload = function(e) {
                var contents = e.target.result;
                alert("Got the file\n" +
                    "name: " + f.name + "\n"
                    //"type: " + f.type + "\n" +
                    "size: " + f.size + " bytes\n"
                    //"starts with: " + contents.substr(1, contents.indexOf("\n"))
                );
                if (f.size > 5000) {
                    alert('File size Greater then 5MB!');
                    document.getElementById("fileinput").value = '';
                }
            }
            r.readAsText(f);
        } else {
            alert("Failed to load file");
        }
    })
</script>
