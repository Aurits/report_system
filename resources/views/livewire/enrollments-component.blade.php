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

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Enrollment Form</h5>
                        </div>
                        <div class="card-body">
                            <form wire:submit.prevent="enrollStudents">
                                <div class="form-group">
                                    <label>Select Students</label>
                                    <select wire:model="students" class="form-control" multiple>
                                        @foreach($students as $student)
                                        {{$student}}
                                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('students') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

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