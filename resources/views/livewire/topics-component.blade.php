<div>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Manage Enrollments</h3>
                    </div>
                </div>
            </div>

            @if (Session::has('message'))
            <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif

            <form wire:submit.prevent="loadEnrollments">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="nav nav-pills mb-3" id="academicYearTab" role="tablist">
                            @foreach ($academicYears as $year)
                            <li class="nav-item" role="presentation">
                                <a class="nav-link @if ($selectedYear == $year->id) active @endif"
                                    id="year-{{ $year->id }}-tab" data-bs-toggle="pill"
                                    wire:click="$set('selectedYear', {{ $year->id }})" role="tab"
                                    aria-controls="year-{{ $year->id }}"
                                    aria-selected="{{ $selectedYear == $year->id ? 'true' : 'false' }}">{{ $year->year }}</a>
                            </li>
                            @endforeach
                        </ul>
                        <hr>

                        <ul class="nav nav-pills mb-3" id="termTab" role="tablist">
                            @foreach ($terms as $term)
                            <li class="nav-item" role="presentation">
                                <a class="nav-link @if ($selectedTerm == $term->id) active @endif"
                                    id="term-{{ $term->id }}-tab" data-bs-toggle="pill"
                                    wire:click="$set('selectedTerm', {{ $term->id }})" role="tab"
                                    aria-controls="term-{{ $term->id }}"
                                    aria-selected="{{ $selectedTerm == $term->id ? 'true' : 'false' }}">{{ $term->name }}</a>
                            </li>
                            @endforeach
                        </ul>
                        <hr>

                        <ul class="nav nav-pills mb-3" id="classTab" role="tablist">
                            @foreach ($classes as $class)
                            <li class="nav-item" role="presentation">
                                <a class="nav-link @if ($selectedClass == $class->id) active @endif"
                                    id="class-{{ $class->id }}-tab" data-bs-toggle="pill"
                                    wire:click="$set('selectedClass', {{ $class->id }})" role="tab"
                                    aria-controls="class-{{ $class->id }}"
                                    aria-selected="{{ $selectedClass == $class->id ? 'true' : 'false' }}">{{ $class->name }}</a>
                            </li>
                            @endforeach
                        </ul>
                        <hr>

                        <ul class="nav nav-pills mb-3" id="streamTab" role="tablist">
                            @foreach ($streams as $stream)
                            <li class="nav-item" role="presentation">
                                <a class="nav-link @if ($selectedStream == $stream->id) active @endif"
                                    id="stream-{{ $stream->id }}-tab" data-bs-toggle="pill"
                                    wire:click="$set('selectedStream', {{ $stream->id }})" role="tab"
                                    aria-controls="stream-{{ $stream->id }}"
                                    aria-selected="{{ $selectedStream == $stream->id ? 'true' : 'false' }}">{{ $stream->name }}</a>
                            </li>
                            @endforeach
                        </ul>
                        <hr>

                        <ul class="nav nav-pills mb-3" id="subjectTab" role="tablist">
                            @foreach ($subjects as $subject)
                            <li class="nav-item" role="presentation">
                                <a class="nav-link @if ($selectedSubject == $subject->id) active @endif"
                                    id="subject-{{ $subject->id }}-tab" data-bs-toggle="pill"
                                    wire:click="$set('selectedSubject', {{ $subject->id }})" role="tab"
                                    aria-controls="subject-{{ $subject->id }}"
                                    aria-selected="{{ $selectedSubject == $subject->id ? 'true' : 'false' }}">{{ $subject->name }}</a>
                            </li>
                            @endforeach
                        </ul>
                        <hr>

                        <button type="submit" class="btn btn-primary mb-5">Submit</button>
                    </div>
                </div>
            </form>

            @if ($marks->isNotEmpty())
            <div class="card mt-3">
                <div class="card-header">
                    <h5 class="card-title">
                        Enrollments List - Class: {{ $classes->find($selectedClass)->name ?? 'N/A' }} - Year:
                        {{ $academicYears->find($selectedYear)->year ?? 'N/A' }} - Term:
                        {{ $terms->find($selectedTerm)->name ?? 'N/A' }} - Stream:
                        {{ $streams->find($selectedStream)->name ?? 'N/A' }} - Subject:
                        {{ $subjects->find($selectedSubject)->name ?? 'N/A' }}
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table border-0 star-class table-hover table-center mb-0 datatables table-striped">
                            <thead>
                                <tr>
                                    <th>Enrollment ID</th>
                                    <th>Student ID</th>
                                    <th>Name</th>
                                </tr>
                            </thead>
      
                      <tbody>
                                @foreach ($marks as $mark)

                                <tr>
                                    <td>{{ $mark->id }}</td>
                                    <td>{{ $mark->student->id }}</td>
                                    <td>{{ $mark->student->name }}</td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @else
            <div class="alert alert-info">No enrollments found for the selected criteria.</div>
            @endif
        </div>
    </div>
</div>