<div>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Teachers</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="teachers.html">Teacher</a>
                                </li>
                                <li class="breadcrumb-item active">All Teachers</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="teacher-group-form">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search by ID ..." />
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search by Name ..." />
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search by Phone ..." />
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="search-teacher-btn">
                            <button type="btn" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table comman-shadow">
                        <div class="card-body">
                            <div class="page-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h3 class="page-title">Teachers</h3>
                                    </div>
                                    <div class="col-auto text-end float-end ms-auto download-grp">
                                        <a href="teachers.html" class="btn btn-outline-gray me-2 active"><i class="feather-list"></i></a>
                                        <a href="teachers-grid.html" class="btn btn-outline-gray me-2"><i class="feather-grid"></i></a>
                                        <a href="#" class="btn btn-outline-primary me-2"><i class="fas fa-download"></i>
                                            Download</a>
                                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTeacherModal"><i class="fas fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table border-0 star-teacher table-hover table-center mb-0 datatable table-striped">
                                    <thead class="teacher-thread">
                                        <tr>
                                            <th>
                                                <div class="form-check check-tables">
                                                    <input class="form-check-input" type="checkbox" value="something" />
                                                </div>
                                            </th>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Gender</th>
                                            <th>Subject</th>
                                            <th>Stream</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-check check-tables">
                                                    <input class="form-check-input" type="checkbox" value="something" />
                                                </div>
                                            </td>
                                            <td>TEA2209</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="teacher-details.html" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="assets/img/profiles/avatar-01.jpg" alt="User Image" /></a>
                                                    <a href="teacher-details.html">John Doe</a>
                                                </h2>
                                            </td>
                                            <td>Male</td>
                                            <td>Mathematics</td>
                                            <td>Stream 1</td>
                                            <td class="text-end">
                                                <div class="actions">
                                                    <a href="javascript:;" class="btn btn-sm bg-success-light me-2"><i class="feather-eye"></i></a>
                                                    <a href="edit-teacher.html" class="btn btn-sm bg-danger-light"><i class="feather-edit"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check check-tables">
                                                    <input class="form-check-input" type="checkbox" value="something" />
                                                </div>
                                            </td>
                                            <td>TEA2213</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="teacher-details.html" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="assets/img/profiles/avatar-03.jpg" alt="User Image" /></a>
                                                    <a href="teacher-details.html">Jane Smith</a>
                                                </h2>
                                            </td>
                                            <td>Female</td>
                                            <td>Science</td>
                                            <td>Stream 2</td>
                                            <td class="text-end">
                                                <div class="actions">
                                                    <a href="javascript:;" class="btn btn-sm bg-success-light me-2"><i class="feather-eye"></i></a>
                                                    <a href="edit-teacher.html" class="btn btn-sm bg-danger-light"><i class="feather-edit"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check check-tables">
                                                    <input class="form-check-input" type="checkbox" value="something" />
                                                </div>
                                            </td>
                                            <td>TEA2143</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="teacher-details.html" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="assets/img/profiles/avatar-02.jpg" alt="User Image" /></a>
                                                    <a href="teacher-details.html">Michael Brown</a>
                                                </h2>
                                            </td>
                                            <td>Male</td>
                                            <td>English</td>
                                            <td>Stream 1</td>
                                            <td class="text-end">
                                                <div class="actions">
                                                    <a href="javascript:;" class="btn btn-sm bg-success-light me-2"><i class="feather-eye"></i></a>
                                                    <a href="edit-teacher.html" class="btn btn-sm bg-danger-light"><i class="feather-edit"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- Add more teacher rows as needed -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Teacher Modal -->
    <div class="modal fade" id="addTeacherModal" tabindex="-1" aria-labelledby="addTeacherModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTeacherModalLabel">Add New Teacher</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-12">
                                <h5 class="form-title"><span>Basic Details</span></h5>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Teacher ID <span class="login-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Teacher ID" />
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Name <span class="login-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Enter Name" />
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Gender <span class="login-danger">*</span></label>
                                    <select class="form-control select">
                                        <option>Male</option>
                                        <option>Female</option>
                                        <option>Others</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms calendar-icon">
                                    <label>Date Of Birth <span class="login-danger">*</span></label>
                                    <input class="form-control datetimepicker" type="text" placeholder="DD-MM-YYYY" />
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Religion <span class="login-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Enter Religion" />
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Joining Date <span class="login-danger">*</span></label>
                                    <input class="form-control datetimepicker" type="text" placeholder="DD-MM-YYYY" />
                                </div>
                            </div>
                            <div class="col-12">
                                <h5 class="form-title"><span>Contact Details</span></h5>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Email ID <span class="login-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Enter Email ID" />
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Mobile Number <span class="login-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Enter Phone Number" />
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Subject</label>
                                    <input type="text" class="form-control" placeholder="Enter Subject" />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="student-submit">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>