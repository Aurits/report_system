<div>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Classes, Streams & Houses</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="classes_streams.html">Classes & Streams</a>
                                </li>
                                <li class="breadcrumb-item active">All Classes, Streams & Houses</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="class-group-form">


                <!-- Class Table -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-table comman-shadow">
                            <div class="card-body">
                                <div class="page-header">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h3 class="page-title">Classes</h3>
                                            <div class="col-auto text-end float-end ms-auto download-grp">
                                                <div class="search-class-btn">
                                                    <button wire:click="createClass" class="btn btn-primary"
                                                        data-bs-toggle="modal" data-bs-target="#createClassModal">Add
                                                        Class</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table
                                        class="table border-0 star-class table-hover table-center mb-0 datatables table-striped">
                                        <thead class="class-thread">
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th class="text-end">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($classes as $class)
                                            <tr>
                                                <td>{{ $class->id }}</td>
                                                <td>{{ $class->name }}</td>
                                                <td class="text-end">
                                                    <div class="actions">
                                                        <button wire:click="viewClass({{ $class->id }})"
                                                            class="btn btn-sm bg-success-light me-2"
                                                            data-bs-toggle="modal" data-bs-target="#viewClassModal"><i
                                                                class="feather-eye"></i> View</button>
                                                        <button wire:click="editClass({{ $class->id }})"
                                                            class="btn btn-sm bg-primary-light me-2"
                                                            data-bs-toggle="modal" data-bs-target="#editClassModal"><i
                                                                class="feather-edit"></i> Edit</button>
                                                        <button wire:click="deleteClass({{ $class->id }})"
                                                            class="btn btn-sm bg-danger-light me-2"><i
                                                                class="feather-trash"></i> Delete</button>
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
                    <div class="col-md-6">
                        <div class="card card-table comman-shadow">
                            <div class="card-body">
                                <div class="page-header">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h3 class="page-title">Streams</h3>
                                            <div class="col-auto text-end float-end ms-auto download-grp">
                                                <div class=" search-class-btn">
                                                    <button wire:click="createStream" class="btn btn-primary"
                                                        data-bs-toggle="modal" data-bs-target="#createStreamModal">Add
                                                        Stream</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table
                                        class="table border-0 star-class table-hover table-center mb-0 datatables table-striped">
                                        <thead class="class-thread">
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th class="text-end">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($streams as $stream)
                                            <tr>
                                                <td>{{ $stream->id }}</td>
                                                <td>{{ $stream->name }}</td>
                                                <td class="text-end">
                                                    <div class="actions">
                                                        <button wire:click="viewStream({{ $stream->id }})"
                                                            class="btn btn-sm bg-success-light me-2"
                                                            data-bs-toggle="modal" data-bs-target="#viewStreamModal"><i
                                                                class="feather-eye"></i>
                                                            View</button>
                                                        <button wire:click="editStream({{ $stream->id }})"
                                                            class="btn btn-sm bg-primary-light me-2"
                                                            data-bs-toggle="modal" data-bs-target="#editStreamModal"><i
                                                                class="feather-edit"></i>
                                                            Edit</button>
                                                        <button wire:click="deleteStream({{ $stream->id }})"
                                                            class="btn btn-sm bg-danger-light me-2"><i
                                                                class="feather-trash"></i> Delete</button>
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
                    <div class="col-md-6">
                        <div class="card card-table comman-shadow">
                            <div class="card-body">
                                <div class="page-header">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h3 class="page-title">Houses</h3>
                                            <div class="col-auto text-end float-end ms-auto download-grp"">
                                            <div class=" search-class-btn">
                                                <button wire:click="createHouse" class="btn btn-primary"
                                                    data-bs-toggle="modal" data-bs-target="#createHouseModal">Add
                                                    House</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table
                                    class="table border-0 star-class table-hover table-center mb-0 datatables table-striped">
                                    <thead class="class-thread">
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th class="text-end">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($houses as $house)
                                        <tr>
                                            <td>{{ $house->id }}</td>
                                            <td>{{ $house->name }}</td>
                                            <td class="text-end">
                                                <div class="actions">
                                                    <button wire:click="viewHouse({{ $house->id }})"
                                                        class="btn btn-sm bg-success-light me-2" data-bs-toggle="modal"
                                                        data-bs-target="#viewHouseModal"><i class="feather-eye"></i>
                                                        View</button>
                                                    <button wire:click="editHouse({{ $house->id }})"
                                                        class="btn btn-sm bg-primary-light me-2" data-bs-toggle="modal"
                                                        data-bs-target="#editHouseModal"><i class="feather-edit"></i>
                                                        Edit</button>
                                                    <button wire:click="deleteHouse({{ $house->id }})"
                                                        class="btn btn-sm bg-danger-light me-2"><i
                                                            class="feather-trash"></i> Delete</button>
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

<!-- Create Class Modal -->
<div wire:ignore.self class="modal fade" id="createClassModal" tabindex="-1" role="dialog"
    aria-labelledby="createClassModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createClassModalLabel">Add Class</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3 local-forms">
                        <label for="className" class="form-label">Class Name <span class="login-danger">*</span></label>
                        <input type="text" wire:model.defer="className" class="form-control" id="className">
                        @error('className') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button wire:click="storeClass" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Create Stream Modal -->
<div wire:ignore.self class="modal fade" id="createStreamModal" tabindex="-1" role="dialog"
    aria-labelledby="createStreamModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createStreamModalLabel">Add Stream</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3 local-forms">
                        <label for="streamName" class="form-label">Stream Nam <span
                                class="login-danger">*</span></label>
                        <input type="text" wire:model.defer="streamName" class="form-control" id="streamName">
                        @error('streamName') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button wire:click="storeStream" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Create House Modal -->
<div wire:ignore.self class="modal fade" id="createHouseModal" tabindex="-1" role="dialog"
    aria-labelledby="createHouseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createHouseModalLabel">Add House</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3 local-forms">
                        <label for="houseName" class="form-label">House Name <span class="login-danger">*</span></label>
                        <input type="text" wire:model.defer="houseName" class="form-control" id="houseName">
                        @error('houseName') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button wire:click="storeHouse" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- View Class Modal -->
<div wire:ignore.self class="modal fade" id="viewClassModal" tabindex="-1" role="dialog"
    aria-labelledby="viewClassModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewClassModalLabel">View Class</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Display class details here -->
                @if($selectedClass)
                <p>ID: {{ $selectedClass->id }}</p>
                <p>Name: {{ $selectedClass->name }}</p>
                <!-- Add more fields as per your class details -->
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- View Stream Modal -->
<div wire:ignore.self class="modal fade" id="viewStreamModal" tabindex="-1" role="dialog"
    aria-labelledby="viewStreamModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewStreamModalLabel">View Stream</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Display stream details here -->
                @if($selectedStream)
                <p>ID: {{ $selectedStream->id }}</p>
                <p>Name: {{ $selectedStream->name }}</p>
                <!-- Add more fields as per your stream details -->
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- View House Modal -->
<div wire:ignore.self class="modal fade" id="viewHouseModal" tabindex="-1" role="dialog"
    aria-labelledby="viewHouseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewHouseModalLabel">View House</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Display house details here -->
                @if($selectedHouse)
                <p>ID: {{ $selectedHouse->id }}</p>
                <p>Name: {{ $selectedHouse->name }}</p>
                <!-- Add more fields as per your house details -->
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- Edit Class Modal -->
<div wire:ignore.self class="modal fade" id="editClassModal" tabindex="-1" role="dialog"
    aria-labelledby="editClassModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editClassModalLabel">Edit Class</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3 local-forms">
                        <label for="editClassName" class="form-label">Class Name <span
                                class="login-danger">*</span></label>
                        <input type="text" wire:model.defer="className" class="form-control" id="editClassName">
                        @error('editClassName') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button wire:click="updateClass" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Stream Modal -->
<div wire:ignore.self class="modal fade" id="editStreamModal" tabindex="-1" role="dialog"
    aria-labelledby="editStreamModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editStreamModalLabel">Edit Stream</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3 local-forms">
                        <label for="editStreamName" class="form-label">Stream Name <span
                                class="login-danger">*</span></label>
                        <input type="text" wire:model.defer="streamName" class="form-control" id="editStreamName">
                        @error('editStreamName') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button wire:click="updateStream" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit House Modal -->
<div wire:ignore.self class="modal fade" id="editHouseModal" tabindex="-1" role="dialog"
    aria-labelledby="editHouseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editHouseModalLabel">Edit House</h5>

         
       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>


            <div class="modal-body">
                <form>
                    <div class="mb-3 local-forms">
                        <label for="editHouseName" class="form-label">House Name <span
                                class="login-danger">*</span></label>
                        <input type="text" wire:model.defer="houseName" class="form-control" id="editHouseName">
                        @error('editHouseName') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button wire:click="updateHouse" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
</div>


<script>
document.addEventListener('DOMContentLoaded', function() {
    window.livewire.on('openClassModal', () => {
        var myModal = new bootstrap.Modal(document.getElementById('viewClassModal'));
        myModal.show();
    });

    window.livewire.on('openStreamModal', () => {
        var myModal = new bootstrap.Modal(document.getElementById('viewStreamModal'));
        myModal.show();
    });

    window.livewire.on('openHouseModal', () => {
        var myModal = new bootstrap.Modal(document.getElementById('viewHouseModal'));
        myModal.show();
    });
});
</script>