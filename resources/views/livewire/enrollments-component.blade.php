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
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Students List</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table border-0 star-class table-hover table-center mb-0 datatable table-striped">
                                    <thead>
                                        <tr>
                                            <th>Student ID</th>
                                            <th>Name</th>
                                            <th>Select</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($students as $student)
                                        <tr>
                                            <td>{{ $student->id }}</td>
                                            <td>{{ $student->name }}</td>
                                            <td>
                                                <input type="checkbox" wire:model="studentsSelected" value="{{ $student->id }}">
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

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Enrollment Form</h5>
                        </div>
                        <div class="card-body">
                            <form wire:submit.prevent="enrollStudents">
                                <div class="form-group">
                                    <label>Select Class</label>
                                    <select wire:model="classId" class="form-control">
                                        <option value="">-- Select Class --</option>
                                        @foreach($classes as $class)
                                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('classId') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-group">
                                    <label>Select Academic Year</label>
                                    <select wire:model="academicYearId" class="form-control">
                                        <option value="">-- Select Academic Year --</option>
                                        @foreach($academicYears as $year)
                                        <option value="{{ $year->id }}">{{ $year->year }}</option>
                                        @endforeach
                                    </select>
                                    @error('academicYearId') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-group">
                                    <label>Select Stream (optional)</label>
                                    <select wire:model="streamId" class="form-control">
                                        <option value="">-- Select Stream --</option>
                                        @foreach($streams as $stream)
                                        <option value="{{ $stream->id }}">{{ $stream->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('streamId') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-group">
                                    <label>Select House (optional)</label>
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
</div>