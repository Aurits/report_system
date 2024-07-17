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
                                        <a href="#" class="btn btn-outline-primary me-2"><i class="fas fa-download"></i>
                                            Download</a>
                                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTeacherModal" wire:click="resetInputFields"><i class="fas fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table border-0 star-teacher table-hover dataTables table-center mb-0 table-striped">
                                    <thead class="teacher-thread">
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Gender</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($teachers as $teacher)
                                        <tr>
                                            <td>{{ $teacher->teacher_id }}</td>
                                            <td>{{ $teacher->name }}</td>
                                            <td>{{ $teacher->gender }}</td>
                                            <td>{{ $teacher->email }}</td>
                                            <td>{{ $teacher->phone }}</td>
                                            <td class="text-end">
                                                <div class="actions">
                                                    <button wire:click="view({{ $teacher->id }})" class="btn btn-sm bg-success-light me-2"><i class="feather-eye"></i> View</button>
                                                    <button wire:click="edit({{ $teacher->id }})" class="btn btn-sm bg-danger-light me-2"><i class="feather-edit"></i> Edit</button>
                                                    <button wire:click="delete({{ $teacher->id }})" class="btn btn-sm bg-danger-light"><i class="feather-trash"></i>
                                                        Delete</button>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="pagination mt-3 d-none">
                                {{ $teachers->links() }}
                            </div>

                            @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                            @endif
                            @if (session()->has('error_message'))
                            <div class="alert alert-danger">
                                {{ session('error_message') }}
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add/Edit Teacher Modal -->
    <div class="modal fade" id="addTeacherModal" tabindex="-1" aria-labelledby="addTeacherModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTeacherModalLabel">
                        {{ $editMode ? 'Edit Teacher' : 'Add New Teacher' }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="{{ $editMode ? 'update' : 'store' }}">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="form-title"><span>Basic Details</span></h5>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Teacher ID <span class="login-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Teacher ID" wire:model="teacher_id" />
                                    @error('teacher_id') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Name <span class="login-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Enter Name" wire:model="name" />
                                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Gender <span class="login-danger">*</span></label>
                                    <select class="form-control" wire:model="gender">
                                        <option value="">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Others">Others</option>
                                    </select>
                                    @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Email <span class="login-danger">*</span></label>
                                    <input type="email" class="form-control" placeholder="Enter Email" wire:model="email" />
                                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Phone <span class="login-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Enter Phone" wire:model="phone" />
                                    @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                            </div>
                            <div class="col-12">
                                <div class="student-submit">
                                    <button type="submit" class="btn btn-primary">{{ $editMode ? 'Update' : 'Submit' }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                    @endif
                    @if (session()->has('error_message'))
                    <div class="alert alert-danger">
                        {{ session('error_message') }}
                    </div>
                    @endif

                    <hr />

                    <div class="bulk-upload-section">
                        <h5 class="form-title"><span>Bulk Upload</span></h5>
                        <div class="form-group local-forms">
                            <label>Upload Excel File</label>
                            <input type="file" class="form-control" wire:model="bulkUploadFile" />
                            @error('bulkUploadFile') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group local-forms">
                            <button type="button" class="btn btn-primary" wire:click="uploadBulk">Upload</button>
                            <button type="button" class="btn btn-secondary" wire:click="downloadTemplate">Download
                                Template</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- View Teacher Modal -->
    <div class="modal fade" id="viewTeacherModal" tabindex="-1" aria-labelledby="viewTeacherModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="viewTeacherModalLabel">View Teacher Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="teacher-details">
                                @if($teacherToView)
                                <div class="mb-3">
                                    <strong>Teacher ID:</strong> {{$teacherToView['teacher_id']}}
                                </div>
                                <div class="mb-3">
                                    <strong>Name:</strong> {{$teacherToView['name']}}
                                </div>
                                <div class="mb-3">
                                    <strong>Gender:</strong> {{$teacherToView['gender']}}
                                </div>
                                <div class="mb-3">
                                    <strong>Email:</strong> {{$teacherToView['email']}}





                                </div>
                                <div class="mb-3">
                                    <strong>Phone:</strong> {{$teacherToView['phone']}}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>