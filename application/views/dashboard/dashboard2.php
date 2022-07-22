
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Add User</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
          <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
          <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
        </div>
        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
          <span data-feather="calendar"></span>
          This week
        </button>
      </div>
    </div>

    <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->

    <div class="table-responsive">
        
    <h4>User Info</h4>
    <?php 
            if($this->session->flashdata('message'))
            {
        ?>
              <p class="container alert alert-success"> <?php echo $this->session->flashdata('message'); ?></p>
        <?php
            }
        ?>
        <form class="needs-validation" novalidate method="POST" action="usersubmit" enctype="multipart/form-data">
            <div class="container col-sm-3 w-10 h-10">
                <div class="w-100 h-100 border border-primary">
                    <img id="frame" src="<?php echo base_url('assets/images/default.jpg'); ?>" class="img-fluid w-100 h-100"/>
                </div>
                <div class="w-100 h-100 mb-5 border border-solid border-gray" style="">
                    <input class="form-control" type="file" name="user_image" id="formFile" onchange="preview()">
                    <!-- <button onclick="clearImage()" class="btn btn-primary mt-3">Click me</button> -->
                </div>
            </div>

            <script>
                function preview() {
                    frame.src = URL.createObjectURL(event.target.files[0]);
                }
                function clearImage() {
                    document.getElementById('formFile').value = null;
                    frame.src = "";
                }
            </script>
            <div class="form-row">
                <div class="col-sm-4 mb-3">
                    <label for="validationCustom01">First name</label>
                    <input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="" name="first_name" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                 </div>
                <div class="col-md-4 mb-3">
                    <label for="validationCustom01">Middle name</label>
                    <input type="text" class="form-control" id="validationCustom01" placeholder="Middle name" value="" name="middle_name" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                 </div>
                 <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Last name</label>
                    <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" value="" name="last_name" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
            </div>
            <div class="form-row">
                <label for="inputAddress">Address</label>
                <input type="text" name="street_address" class="form-control" id="inputAddress" placeholder="1234 Main St" required>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="validationCustom03">City</label>
                    <input name="city" type="text" name="city" class="form-control" id="validationCustom03" placeholder="City" required>
                    <div class="invalid-feedback">
                        Please provide a valid city.
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="validationCustom04">State</label>
                    <input name="province" type="text" class="form-control" id="validationCustom04" placeholder="Province" required>
                    <div class="invalid-feedback">
                        Please provide a valid state.
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="validationCustom05">Zip</label>
                    <input name="zip_code" type="text" class="form-control" id="validationCustom05" placeholder="Zip" required>
                    <div class="invalid-feedback">
                        Please provide a valid zip.
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                    <label class="form-check-label" for="invalidCheck">
                        Agree to terms and conditions
                    </label>
                    <div class="invalid-feedback">
                        You must agree before submitting.
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Submit form</button>
        </form>

        <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
            });
        }, false);
        })();
        </script>
    </div>
    <br/>
  </main>

