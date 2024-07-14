<div>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Settings</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="classes_streams.html">Accademic Years & Terms</a>
                                </li>
                                <li class="breadcrumb-item active">Enrollments</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="class-group-form">
                <div class="row">
                    <!-- Term Table -->
                    <div class="col-md-6">
                        <div class="card card-table comman-shadow">
                            <div class="card-body">
                                <div class="page-header">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h3 class="page-title">Terms</h3>
                                            <div class="col-auto text-end float-end ms-auto download-grp">
                                                <div class="search-class-btn">
                                                    <button wire:click="createTerm" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createTermModal">Add
                                                        Term</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table border-0 star-class table-hover table-center mb-0 datatable table-striped">
                                        <thead class="class-thread">
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th class="text-end">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($terms as $term)
                                            <tr>
                                                <td>{{ $term->id }}</td>
                                                <td>{{ $term->name }}</td>
                                                <td class="text-end">
                                                    <div class="actions">
                                                        <button wire:click="viewTerm({{ $term->id }})" class="btn btn-sm bg-success-light me-2" data-bs-toggle="modal" data-bs-target="#viewTermModal"><i class="feather-eye"></i> View</button>
                                                        <button wire:click="editTerm({{ $term->id }})" class="btn btn-sm bg-primary-light me-2" data-bs-toggle="modal" data-bs-target="#editTermModal"><i class="feather-edit"></i> Edit</button>
                                                        <button wire:click="deleteTerm({{ $term->id }})" class="btn btn-sm bg-danger-light me-2"><i class="feather-trash"></i> Delete</button>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Academic Year Table -->
                    <div class="col-md-6">
                        <div class="card card-table comman-shadow">
                            <div class="card-body">
                                <div class="page-header">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h3 class="page-title">Academic Years</h3>
                                            <div class="col-auto text-end float-end ms-auto download-grp">
                                                <div class="search-class-btn">
                                                    <button wire:click="createAcademicYear" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createAcademicYearModal">Add Academic
                                                        Year</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table border-0 star-class table-hover table-center mb-0 datatable table-striped">
                                        <thead class="class-thread">
                                            <tr>
                                                <th>ID</th>
                                                <th>Year</th>
                                                <th class="text-end">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($academicYears as $academicYear)
                                            <tr>
                                                <td>{{ $academicYear->id }}</td>
                                                <td>{{ $academicYear->name }}</td>
                                                <td class="text-end">
                                                    <div class="actions">
                                                        <button wire:click="viewAcademicYear({{ $academicYear->id }})" class="btn btn-sm bg-success-light me-2" data-bs-toggle="modal" data-bs-target="#viewAcademicYearModal"><i class="feather-eye"></i> View</button>
                                                        <button wire:click="editAcademicYear({{ $academicYear->id }})" class="btn btn-sm bg-primary-light me-2" data-bs-toggle="modal" data-bs-target="#editAcademicYearModal"><i class="feather-edit"></i> Edit</button>
                                                        <button wire:click="deleteAcademicYear({{ $academicYear->id }})" class="btn btn-sm bg-danger-light me-2"><i class="feather-trash"></i> Delete</button>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>



    <!-- Create Term Modal -->
    <div wire:ignore.self class="modal fade" id="createTermModal" tabindex="-1" role="dialog" aria-labelledby="createTermModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createTermModalLabel">Add Term</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="termName" class="form-label">Term Name</label>
                            <input type="text" wire:model.defer="termName" class="form-control" id="termName">
                            @error('termName') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button wire:click="storeTerm" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Academic Year Modal -->
    <div wire:ignore.self class="modal fade" id="createAcademicYearModal" tabindex="-1" role="dialog" aria-labelledby="createAcademicYearModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createAcademicYearModalLabel">Add Academic Year</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="academicYearName" class="form-label">Academic Year</label>
                            <input type="text" wire:model.defer="academicYearName" class="form-control" id="academicYearName">
                            @error('academicYearName') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button wire:click="storeAcademicYear" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- View Term Modal -->
    <div wire:ignore.self class="modal fade" id="viewTermModal" tabindex="-1" role="dialog" aria-labelledby="viewTermModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewTermModalLabel">View Term</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Display term details here -->
                    @if($selectedTerm)
                    <p>ID: {{ $selectedTerm->id }}</p>
                    <p>Name: {{ $selectedTerm->name }}</p>
                    <!-- Add more fields as per your term details -->
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- View Academic Year Modal -->
    <div wire:ignore.self class="modal fade" id="viewAcademicYearModal" tabindex="-1" role="dialog" aria-labelledby="viewAcademicYearModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewAcademicYearModalLabel">View Academic Year</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Display academic year details here -->
                    @if($selectedAcademicYear)
                    <p>ID: {{ $selectedAcademicYear->id }}</p>
                    <p>Name: {{ $selectedAcademicYear->name }}</p>
                    <!-- Add more fields as per your academic year details -->
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Term Modal -->
    <div wire:ignore.self class="modal fade" id="editTermModal" tabindex="-1" role="dialog" aria-labelledby="editTermModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editTermModalLabel">Edit Term</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="editTermName" class="form-label">Term Name</label>
                            <input type="text" wire:model.defer="termName" class="form-control" id="editTermName">
                            @error('termName') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button wire:click="updateTerm" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Academic Year Modal -->
    <div wire:ignore.self class="modal fade" id="editAcademicYearModal" tabindex="-1" role="dialog" aria-labelledby="editAcademicYearModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editAcademicYearModalLabel">Edit Academic Year</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="editAcademicYearName" class="form-label">Academic Year</label>
                            <input type="text" wire:model.defer="academicYearName" class="form-control" id="editAcademicYearName">
                            @error('academicYearName') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button wire:click="updateAcademicYear" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        window.livewire.on('openTermModal', () => {
            var myModal = new bootstrap.Modal(document.getElementById('viewTermModal'));
            myModal.show();
        });

        window.livewire.on('openAcademicYearModal', () => {
            var myModal = new bootstrap.Modal(document.getElementById('viewAcademicYearModal'));
            myModal.show();
        });

    });
</script>