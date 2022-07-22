
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <!-- <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div> -->
      </div>

      <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->

      <div class="table-responsive">
        <h2>Users List</h2>
        <?php if($this->session->flashdata('message')) { ?>
              <p class="container alert alert-success"> <?php echo $this->session->flashdata('message'); ?></p>
        <?php } ?>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">First Name</th>
              <th scope="col">Middle  Name</th>
              <th scope="col">Last Name</th>
              <th scope="col">Image</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php if($users){ ?>
              <?php foreach($users as $user): ?>
                <tr>
                  <td class='text-capitalize'><?php echo $user->first_name; ?></td>
                  <td class='text-capitalize'><?php echo $user->middle_name; ?></td>
                  <td class='text-capitalize'><?php echo $user->last_name; ?></td>
                  <td class='text-capitalize bg-red'><img class="w-25 p-4" id="frame" src="<?php echo base_url('assets/images/').$user->image_name; ?>" class="frame img-fluid w-50 h-50"/></td>
                  <td class='text-capitalize'>
                    <!-- <button type="button" class="d-inline btn btn-success">View</button>&nbsp; -->
                    <button type="button" class="d-inline btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#ModalView<?php echo $user->id; ?>">View</button><br/>
                    <button type="button" class="d-inline btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $user->id; ?>">Edit</button><br/>
                    <button type="button" class="btn btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#ModalDelete<?php echo $user->id; ?>">Delete</button>
                  </td>
                  <form method="POST" action="updateuser" enctype="multipart/form-data">
                    <input type="text" name="id" class="form-control d-none" placeholder="" value="<?php echo $user->id; ?>" />
                    <input type="text" name="originalImageName" class="form-control d-none" placeholder="" value="<?php echo $user->image_name; ?>" />
                    <input type="text" name="originalImagePath" class="form-control d-none" placeholder="" value="<?php echo $user->image_path; ?>" />
                    <!-- View Modal starts here  -->
                    <div class="myModal modal fade" id="ModalView<?php echo $user->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">View User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="form-row col-md-16">
                              <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Profile Picture</label>
                                  <img id="frame" src="<?php echo base_url('assets/images/').$user->image_name; ?>" class="frame img-fluid w-100 h-100"/>
                              </div>
                            </div>
                            <div class="form-row col-md-2">
                              <div class="col-md-4 mb-3">
                                  <label>First name</label>
                                  <div class="col-md-4 mb-3 form-control">
                                    <?php echo $user->first_name; ?>
                                  </div>
                              </div>
                            </div>
                            <div class="form-row">
                              <div class="col-md-4 mb-3">
                                  <label>Middle name</label>
                                  <div class="col-md-4 mb-3 form-control">
                                    <?php echo $user->middle_name; ?>
                                  </div>
                              </div>
                            </div>
                            <div class="form-row">
                              <div class="col-md-4 mb-3">
                                  <label for="validationCustom02">Last name</label>
                                  <div class="col-md-4 mb-3 form-control">
                                    <?php echo $user->last_name; ?>
                                  </div>
                              </div>
                            </div>
                            <div class="form-row col-md-4 mb-3">
                                <label>Address</label>
                                <div class="col-md-4 mb-3 form-control">
                                    <?php echo $user->street_address; ?>
                                </div>
                            </div>
                            <div class="form-row">
                              <div class="col-md-4 mb-3">
                                  <label for="validationCustom03">City</label>
                                  <div class="col-md-4 mb-3 form-control">
                                    <?php echo $user->city; ?>
                                  </div>
                              </div>
                            </div>
                            <div class="form-row">
                              <div class="col-md-4 mb-3">
                                <label for="validationCustom04">Province</label>
                                <div class="col-md-4 mb-3 form-control">
                                    <?php echo $user->province; ?>
                                </div>
                              </div>
                            </div>
                            <div class="form-row">
                              <div class="col-md-4 mb-3">
                                <label for="validationCustom05">Zip Code</label>
                                <div class="col-md-4 mb-3 form-control">
                                  <?php echo $user->zip_code; ?>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- View Modal Ends here  border: 1px solid #ced4da;-->
                    <!-- Edit Modal starts here  -->
                    <div class="myModal modal fade" id="ModalEdit<?php echo $user->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="form-row">
                              <div class="col-md-4 mb-3">
                                  <img id="frame" src="<?php echo base_url('assets/images/').$user->image_name; ?>" class="frame img-fluid w-100 h-100"/>
                                  <input class="formFile form-control" type="file" name="user_image" class="formFile">
                                  <label for="validationCustom01">Picture</label>
                                  <div class="valid-feedback">
                                      Looks good!
                                  </div>
                              </div>
                            </div>
                            <div class="form-row">
                              <div class="col-md-4 mb-3">
                                  <label for="validationCustom01">First name</label>
                                  <input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="<?php echo $user->first_name; ?>" name="first_name" required>
                                  <div class="valid-feedback">
                                      Looks good!
                                  </div>
                              </div>
                              <div class="col-md-4 mb-3">
                                  <label for="validationCustom01">Middle name</label>
                                  <input type="text" class="form-control" id="validationCustom01" placeholder="Middle name" value="<?php echo $user->middle_name; ?>" name="middle_name" required>
                                  <div class="valid-feedback">
                                      Looks good!
                                  </div>
                              </div>
                              <div class="col-md-4 mb-3">
                                  <label for="validationCustom02">Last name</label>
                                  <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" value="<?php echo $user->last_name; ?>" name="last_name" required>
                                  <div class="valid-feedback">
                                      Looks good!
                                  </div>
                              </div>
                            </div>
                            <div class="form-row">
                                <label for="inputAddress">Address</label>
                                <input type="text" value='<?php echo $user->street_address; ?>' name="street_address" class="form-control" id="inputAddress" placeholder="1234 Main St" required>
                            </div>
                            <div class="form-row">
                              <div class="col-md-6 mb-3">
                                  <label for="validationCustom03">City</label>
                                  <input type="text" value='<?php echo $user->city; ?>' name="city" type="text" class="form-control" id="validationCustom03" placeholder="City" required>
                                  <div class="invalid-feedback">
                                      Please provide a valid city.
                                  </div>
                              </div>
                              <div class="col-md-3 mb-3">
                                  <label for="validationCustom04">State</label>
                                  <input value='<?php echo $user->province; ?>' name="province" type="text" class="form-control" id="validationCustom04" placeholder="Province" required>
                                  <div class="invalid-feedback">
                                      Please provide a valid state.
                                  </div>
                              </div>
                              <div class="col-md-3 mb-3">
                                  <label for="validationCustom05">Zip</label>
                                  <input value='<?php echo $user->zip_code; ?>' name="zip_code" type="text" class="form-control" id="validationCustom05" placeholder="Zip" required>
                                  <div class="invalid-feedback">
                                      Please provide a valid zip.
                                  </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Edit Modal Ends here  -->

                    <!-- Delete Modal Starts here -->
                    <div class="modal fade" id="ModalDelete<?php echo $user->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            Are you sure you want to Delete this USER?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <a href="user_delete/<?php echo $user->id; ?>" class="btn btn-primary"> Yes </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Delete Modal ends here -->

                  </form>
                </tr>
              <?php endforeach; ?>
            <?php } ?>
          </tbody>
        </table>
      </div>

      <!-- Large modal -->
    <!-- Button trigger modal -->
    <!-- <button class="myInput" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Edit
    </button> -->

    
    </main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
   

   $(document).ready(function() {
      $(".formFile").on('change', function() {
          var val = $(this).val();
          //alert(URL.createObjectURL(event.target.files[0]));
          $(this).closest('div').find('.frame').attr('src', URL.createObjectURL(event.target.files[0]));
      });
    });
 </script>
