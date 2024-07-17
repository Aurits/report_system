<div>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Enroll Students</h3>
                    </div>
                </div>
            </div>
            @if (Session::has('message'))
            <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif

            <div class="row">
                <div class="col-lg-12">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        @for ($i = 1; $i <= 6; $i++) <li class="nav-item" role="presentation">
                            <a class="nav-link @if($i == 1) active @endif" id="pills-form{{ $i }}-tab"
                                data-bs-toggle="pill" href="#pills-form{{ $i }}" role="tab"
                                aria-controls="pills-form{{ $i }}"
                                aria-selected="@if($i == 1) true @else false @endif">Form {{ $i }}</a>
                            </li>
                            @endfor
                    </ul>

                    <div class="tab-content" id="pills-tabContent">
                        @for ($i = 1; $i <= 6; $i++) <div class="tab-pane fade @if($i == 1) show active @endif"
                            id="pills-form{{ $i }}" role="tabpanel" aria-labelledby="pills-form{{ $i }}-tab">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Students List - Form {{ $i }}</h5>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            id="selectAllStudentsForm{{ $i }}"
                                            wire:click="toggleAllStudentsByClass({{ $i }})">
                                        <label class="form-check-label" for="selectAllStudentsForm{{ $i }}">
                                            Select All Students
                                        </label>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table
                                            class="table border-0 star-class table-hover table-center mb-0 datatables table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Student ID</th>
                                                    <th>Name</th>
                                                    <th>Class</th>
                                                    <th>Select</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($studentsByClass[$i] as $student)
                                                <tr>
                                                    <td>{{ $student->id }}</td>
                                                    <td>{{ $student->name }}</td>
                                                    <td>{{ $student->classModel->name }}</td>
                                                    <td>
                                                        <input type="checkbox" wire:model="studentsSelected"
                                                            value="{{ $student->id }}">
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('history', ['studentId' => $student->id]) }}"
                                                            class="btn btn-sm bg-success-light me-2">
                                                            <i class="feather-eye"></i> View
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    @error('studentsSelected') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                    </div>
                    @endfor
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Subjects List</h5>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="selectAllSubjects"
                                wire:click="toggleAllSubjects">
                            <label class="form-check-label" for="selectAllSubjects">
                                Select All Subjects
                            </label>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table
                                class="table border-0 star-class table-hover table-center mb-0 datatables table-striped">
                                <thead>
                                    <tr>
                                        <th>Subject ID</th>
                                        <th>Name</th>
                                        <th>Select</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($subjects as $subject)
                                    <tr>
                                        <td>{{ $subject->id }}</td>
                                        <td>{{ $subject->name }}</td>
                                        <td>
                                            <input type="checkbox" wire:model="subjectsSelected"
                                                value="{{ $subject->id }}">
                                        </td>
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                        @error('subjectsSelected') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Enrollment Form</h5>
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent="enrollStudents">
                            <div class="form-group local-forms">
                                <label>Select Class <span class="login-danger">*</span></label>
                                <select wire:model="classId" class="form-control">
                                    <option value="">-- Select Class --</option>
                                    @foreach($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                    @endforeach
                                </select>
                                @error('classId') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group local-forms">
                                <label>Select Academic Year <span class="login-danger">*</span></label>
                                <select wire:model="academicYearId" class="form-control">
                                    <option value="">-- Select Academic Year --</option>
                                    @foreach($academicYears as $year)
                                    <option value="{{ $year->id }}">{{ $year->year }}</option>
                                    @endforeach
                                </select>
                                @error('academicYearId') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group local-forms">
                                <label>Select Term <span class="login-danger">*</span></label>
                                <select wire:model="termId" class="form-control">
                                    <option value="">-- Select Term --</option>
                                    @foreach($terms as $term)
                                    <option value="{{ $term->id }}">{{ $term->name }}</option>
                                    @endforeach
                                </select>
                                @error('termId') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group local-forms">
                                <label>Select Stream (optional) <span class="login-danger">*</span></label>
                                <select wire:model="streamId" class="form-control">
                                    <option value="">-- Select Stream --</option>
                                    @foreach($streams as $stream)
                                    <option value="{{ $stream->id }}">{{ $stream->name }}</option>
                                    @endforeach
                                </select>
                                @error('streamId') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group local-forms">
                                <label>Select House (optional) <span class="login-danger">*</span></label>
                                <select wire:model="houseId" class="form-control">
                                    <option value="">-- Select House --</option>
                                    @foreach($houses as $house)
                                    <option value="{{ $house->id }}">{{ $house->name }}</option>
                                    @endforeach
                                </select>


      
                          @error('houseId') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Enroll Students</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>