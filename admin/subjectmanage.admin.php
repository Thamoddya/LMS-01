<div class="title-box">
                            <h5>Ongoing Units</h5>
                          </div>

                          <div class="container-fluid">
                            <div class="row">
                              <div class="col-12 mt-2">
                                <?php
                                include_once "./admin.layouts/ongoingSubjects.table1.php";
                                ?>
                              </div>
                              <div class="col-12">
                                <div class="profile-form">

                                  <!-- Profile Form -->
                                  <div>
                                    <div class="row clearfix">

                                      <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="text" class="border-primary" placeholder="Unit Name" required="" id="unitName">
                                      </div>
                                      <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <select class="form-select border-primary" aria-label="Default select example" id="unitGrade">
                                          <option value="12" selected>Grade :- 12</option>
                                          <option value="13">Grade :- 13</option>
                                        </select>
                                      </div>
                                      <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <input type="text" class="border-primary" placeholder="Unit Text" required="" id="unitText">
                                        <button class="theme-btn btn-style-three" onclick="updateSubjectData();">Update
                                          Unit<i class="fa fa-angle-right"></i></button>
                                      </div>
                                      <div class="col-12 mt-3">
                                        <div class="row">
                                          <div class="col-12">
                                            <h5>Add Unit</h5>
                                          </div>
                                          <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input type="text" class="border-primary" placeholder="Unit Name" required="" id="AddunitName">
                                          </div>
                                          <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <select class="form-select border-primary" aria-label="Default select example" id="AddunitGrade">
                                              <option value="12" selected>Grade :- 12</option>
                                              <option value="13">Grade :- 13</option>
                                            </select>
                                          </div>
                                          <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                            <input type="text" class="border-primary" placeholder="Unit Text" required="" id="AddunitText">
                                            <button class="theme-btn btn-style-three" onclick="addNewUnit();">Add Unit<i class="fa fa-angle-right"></i></button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                </div>

                              </div>
                            </div>
                          </div>