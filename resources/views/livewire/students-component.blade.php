<div>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Students</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="students.html">Student</a>
                                </li>
                                <li class="breadcrumb-item active">All Students</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="student-group-form">
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
                        <div class="search-student-btn">
                            <button type="btn" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table comman-shadow">
                        <div class="card-body">
                            @if($sessionMessage)
                            <div class="alert alert-{{ $sessionType }}" role="alert">
                                {{ $sessionMessage }}
                            </div>
                            @endif
                            <div class="page-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h3 class="page-title">Students</h3>
                                    </div>
                                    <div class="col-auto text-end float-end ms-auto download-grp">

                                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bulkUploadModal"><i class="fas fa-upload"></i> Bulk
                                            Upload</button>
                                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addStudentModal" wire:click="resetInputFields"><i class="fas fa-plus"></i> Add Student</button>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                    <thead class="student-thread">
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
                                        @foreach($students as $student)
                                        <tr>
                                            <td>{{ $student->student_id }}</td>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->gender }}</td>
                                            <td>{{ $student->email }}</td>
                                            <td>{{ $student->phone }}</td>
                                            <td class="text-end">
                                                <div class="actions">
                                                    <button class="btn btn-sm bg-success-light me-2" data-bs-toggle="modal" data-bs-target="#viewStudentModal" wire:click="view({{ $student->id }})"><i class="feather-eye"></i> View</button>
                                                    <button class="btn btn-sm bg-success-light me-2" data-bs-toggle="modal" data-bs-target="#editStudentModal" wire:click="edit({{ $student->id }})"><i class="feather-edit"></i> Edit</button>
                                                    <button class="btn btn-sm bg-danger-light" wire:click="delete({{ $student->id }})"><i class="feather-trash"></i> Delete</button>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="pagination mt-3">
                                {{ $students->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modals -->
    <!-- Add Student Modal -->
    <div wire:ignore.self class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="addStudentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addStudentModalLabel">Add Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="store">
                        <div class="mb-3">
                            <label for="student_id" class="form-label">Student ID</label>
                            <input type="text" class="form-control" id="student_id" wire:model="student_id">
                            @error('student_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" wire:model="name">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-select" id="gender" wire:model="gender">
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Others">Others</option>
                            </select>
                            @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" wire:model="email">
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" wire:model="phone">
                            @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Student Modal -->
    <div wire:ignore.self class="modal fade" id="editStudentModal" tabindex="-1" aria-labelledby="editStudentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editStudentModalLabel">Edit Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if($sessionMessage)
                    <div class="alert alert-{{ $sessionType }}" role="alert">
                        {{ $sessionMessage }}
                    </div>
                    @endif
                    <form wire:submit.prevent="update">
                        <div class="mb-3">
                            <label for="student_id" class="form-label">Student ID</label>
                            <input type="text" class="form-control" id="student_id" wire:model="student_id">
                            @error('student_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" wire:model="name">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-select" id="gender" wire:model="gender">
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Others">Others</option>
                            </select>
                            @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" wire:model="email">
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" wire:model="phone">
                            @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- View Student Modal -->
    <div class="modal fade" id="viewStudentModal" tabindex="-1" aria-labelledby="viewStudentModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="viewStudentModalLabel">View Student Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if($sessionMessage)
                    <div class="alert alert-{{ $sessionType }}" role="alert">
                        {{ $sessionMessage }}
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-12">
                            <div class="student-details">
                                @if($studentToView)
                                <div class="mb-3">
                                    <strong>Student ID:</strong> {{$studentToView['student_id']}}
                                </div>
                                <div class="mb-3">
                                    <strong>Name:</strong> {{$studentToView['name']}}
                                </div>
                                <div class="mb-3">
                                    <strong>Gender:</strong> {{$studentToView['gender']}}
                                </div>
                                <div class="mb-3">
                                    <strong>Email:</strong> {{$studentToView['email']}}
                                </div>
                                <div class="mb-3">
                                    <strong>Phone:</strong> {{$studentToView['phone']}}
                                </div>
                                @else
                                <div class="mb-3">
                                    <p>No student data available.</p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bulk Upload Modal -->
    <div wire:ignore.self class="modal fade" id="bulkUploadModal" tabindex="-1" aria-labelledby="bulkUploadModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bulkUploadModalLabel">Bulk Upload Students</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if($sessionMessage)
                    <div class="alert alert-{{ $sessionType }}" role="alert">
                        {{ $sessionMessage }}
                    </div>
                    @endif
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <button wire:click="downloadTemplate" class="btn btn-outline-secondary me-2"><i class="fas fa-download"></i>Template</button>
                        </div>
                        <div class="col-md-8">

                            <input type="file" class="form-control" id="bulkUploadFile" wire:model="bulkUploadFile">
                            @error('bulkUploadFile') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" wire:click="uploadBulk">Upload</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        window.livewire.on('openEditModal', () => {
            var myModal = new bootstrap.Modal(document.getElementById('editStudentModal'));
            myModal.show();
        });

        window.livewire.on('openViewModal', () => {
            var myModal = new bootstrap.Modal(document.getElementById('viewStudentModal'));
            myModal.show();
        });

        window.livewire.on('openBulkUploadModal', () => {
            var myModal = new bootstrap.Modal(document.getElementById('bulkUploadModal'));
            myModal.show();
        });
    });
</script>