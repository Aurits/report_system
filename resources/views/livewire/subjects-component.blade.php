<div>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Subjects</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#">Subject</a>
                                </li>
                                <li class="breadcrumb-item active">All Subjects</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Subject Group Form -->
            <div class="subject-group-form">
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
                        <div class="search-subject-btn">
                            <button type="btn" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Subjects Table -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table comman-shadow">
                        <div class="card-body">
                            <div class="page-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h3 class="page-title">Subjects</h3>
                                    </div>
                                    <div class="col-auto text-end float-end ms-auto download-grp">
                                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSubjectModal">
                                            <i class="fas fa-plus"></i> Add Subject
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive mt-4">
                                <table class="table border-0 star-subject table-hover table-center mb-4 datatable table-striped">
                                    <thead class="subject-thread">
                                        <tr>
                                            <th>
                                                <div class="form-check check-tables">
                                                    <input class="form-check-input" type="checkbox" value="something" />
                                                </div>
                                            </th>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($subjects)
                                        @foreach ($subjects as $subject)
                                        <tr>
                                            <td>
                                                <div class="form-check check-tables">
                                                    <input class="form-check-input" type="checkbox" value="something" />
                                                </div>
                                            </td>
                                            <td>{{ $subject->id }}</td>
                                            <td>{{ $subject->name }}</td>
                                            <td class="text-end">
                                                <div class="actions">
                                                    <button class="btn btn-sm bg-success-light me-2" wire:click="viewSubject({{ $subject->id }})">
                                                        <i class="feather-eye"></i>
                                                    </button>
                                                    <button class="btn btn-sm bg-danger-light" wire:click="openEditSubjectModal({{ $subject->id }})">
                                                        <i class="feather-edit"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Spacing -->
            <div style="height: 30px;"></div>

            <!-- Topics Table -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table comman-shadow">
                        <div class="card-body">
                            <div class="page-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h3 class="page-title">Topics</h3>
                                    </div>
                                    <div class="col-auto text-end float-end ms-auto download-grp">
                                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTopicModal">
                                            <i class="fas fa-plus"></i> Add Topic
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive mt-4">
                                <table class="table border-0 star-subject table-hover table-center mb-0 datatable table-striped">
                                    <thead class="subject-thread">
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Subject</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($topics)
                                        @foreach ($topics as $topic)
                                        <tr>
                                            <td>{{ $topic->id }}</td>
                                            <td>{{ $topic->name }}</td>
                                            <td>{{ $topic->subject->name }}</td>
                                            <td class="text-end">
                                                <div class="actions">
                                                    <button class="btn btn-sm bg-success-light me-2" wire:click="viewTopic({{ $topic->id }})">
                                                        <i class="feather-eye"></i>
                                                    </button>
                                                    <button class="btn btn-sm bg-danger-light" wire:click="openEditTopicModal({{ $topic->id }})">
                                                        <i class="feather-edit"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Subject Modal -->
    <div class="modal fade" id="addSubjectModal" tabindex="-1" role="dialog" aria-labelledby="addSubjectModalLabel" aria-hidden="true" x-data>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addSubjectModalLabel">Add New Subject</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="storeSubject">
                        <div class="form-group">
                            <label for="addSubjectName">Name</label>
                            <input type="text" class="form-control" id="addSubjectName" wire:model.defer="newSubject.name">
                            @error('newSubject.name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" @click="$dispatch('close-modal', { modal: 'addSubjectModal' })">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- View Subject Modal -->
    <div class="modal fade" id="viewSubjectModal" tabindex="-1" role="dialog" aria-labelledby="viewSubjectModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewSubjectModalLabel">Subject Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="viewSubjectId">ID</label>
                        <input type="text" class="form-control" id="viewSubjectId" wire:model="subjectDetails.id" readonly>
                    </div>
                    <div class="form-group">
                        <label for="viewSubjectName">Name</label>
                        <input type="text" class="form-control" id="viewSubjectName" wire:model="subjectDetails.name" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Subject Modal -->
    <div class="modal fade" id="editSubjectModal" tabindex="-1" role="dialog" aria-labelledby="editSubjectModalLabel" aria-hidden="true" x-data>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editSubjectModalLabel">Edit Subject</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="updateSubject">
                        <div class="form-group">
                            <label for="editSubjectName">Name</label>
                            <input type="text" class="form-control" id="editSubjectName" wire:model.defer="subjectDetails.name">
                            @error('subjectDetails.name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" @click="$dispatch('close-modal', { modal: 'editSubjectModal' })">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Topic Modal -->
    <div class="modal fade" id="addTopicModal" tabindex="-1" role="dialog" aria-labelledby="addTopicModalLabel" aria-hidden="true" x-data>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTopicModalLabel">Add New Topic</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="storeTopic">
                        <div class="form-group">
                            <label for="addTopicName">Name</label>
                            <input type="text" class="form-control" id="addTopicName" wire:model.defer="newTopic.name">
                            @error('newTopic.name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="addTopicSubject">Subject</label>
                            <select class="form-control" id="addTopicSubject" wire:model.defer="newTopic.subject_id">
                                <option value="">Select Subject</option>
                                @foreach($subjects as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                @endforeach
                            </select>
                            @error('newTopic.subject_id') <span class="text-danger">{{ $message }}</span> @enderror
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

    <!-- View Topic Modal -->
    <div class="modal fade" id="viewTopicModal" tabindex="-1" role="dialog" aria-labelledby="viewTopicModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewTopicModalLabel">Topic Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="viewTopicId">ID</label>
                        <input type="text" class="form-control" id="viewTopicId" wire:model="topicDetails.id" readonly>
                    </div>
                    <div class="form-group">
                        <label for="viewTopicName">Name</label>
                        <input type="text" class="form-control" id="viewTopicName" wire:model="topicDetails.name" readonly>
                    </div>
                    <div class="form-group">
                        <label for="viewTopicSubject">Subject</label>
                        <input type="text" class="form-control" id="viewTopicSubject" wire:model="topicDetails.subject.name" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Topic Modal -->
    <div class="modal fade" id="editTopicModal" tabindex="-1" role="dialog" aria-labelledby="editTopicModalLabel" aria-hidden="true" x-data>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editTopicModalLabel">Edit Topic</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="updateTopic">
                        <div class="form-group">
                            <label for="editTopicName">Name</label>
                            <input type="text" class="form-control" id="editTopicName" wire:model.defer="topicDetails.name">
                            @error('topicDetails.name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="editTopicSubject">Subject</label>
                            <select class="form-control" id="editTopicSubject" wire:model.defer="topicDetails.subject_id">
                                <option value="">Select Subject</option>
                                @foreach($subjects as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                @endforeach
                            </select>
                            @error('topicDetails.subject_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('modalHandler', () => ({
            closeModal(modal) {
                var modalElement = new bootstrap.Modal(document.getElementById(modal));
                modalElement.hide();
            },
        }));

        Livewire.on('close-modal', event => {
            Alpine.store('modalHandler').closeModal(event.modal);
        });
    });
</script>