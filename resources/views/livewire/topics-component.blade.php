<div>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Manage Marks</h3>
                    </div>
                </div>
            </div>

            @if (Session::has('message'))
            <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif

            <div class="row">
                <div class="col-lg-12">
                    <ul class="nav nav-pills mb-3" id="academicYearTab" role="tablist">
                        @foreach ($academicYears as $year)
                        <li class="nav-item" role="presentation">
                            <a class="nav-link @if ($loop->first) active @endif" id="year-{{ $year->id }}-tab"
                                data-bs-toggle="pill" href="#year-{{ $year->id }}" role="tab"
                                aria-controls="year-{{ $year->id }}"
                                aria-selected="{{ $loop->first ? 'true' : 'false' }}">{{ $year->year }}</a>
                        </li>
                        @endforeach
                    </ul>

                    <div class="tab-content" id="academicYearTabContent">
                        @foreach ($academicYears as $year)
                        <div class="tab-pane fade @if ($loop->first) show active @endif" id="year-{{ $year->id }}"
                            role="tabpanel" aria-labelledby="year-{{ $year->id }}-tab">
                            <ul class="nav nav-pills mb-3" id="classTab-{{ $year->id }}" role="tablist">
                                @foreach ($classes as $class)
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link @if ($loop->first) active @endif"
                                        id="class-{{ $class->id }}-tab-{{ $year->id }}" data-bs-toggle="pill"
                                        href="#class-{{ $class->id }}-{{ $year->id }}" role="tab"
                                        aria-controls="class-{{ $class->id }}-{{ $year->id }}"
                                        aria-selected="{{ $loop->first ? 'true' : 'false' }}">{{ $class->name }}</a>
                                </li>
                                @endforeach
                            </ul>

                            <div class="tab-content" id="classTabContent-{{ $year->id }}">
                                @foreach ($classes as $class)
                                <div class="tab-pane fade @if ($loop->first) show active @endif"
                                    id="class-{{ $class->id }}-{{ $year->id }}" role="tabpanel"
                                    aria-labelledby="class-{{ $class->id }}-tab-{{ $year->id }}">
                                    <ul class="nav nav-pills mb-3" id="streamTab-{{ $class->id }}-{{ $year->id }}"
                                        role="tablist">
                                        @foreach ($streams as $stream)
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link @if ($loop->first) active @endif"
                                                id="stream-{{ $stream->id }}-tab-{{ $class->id }}-{{ $year->id }}"
                                                data-bs-toggle="pill"
                                                href="#stream-{{ $stream->id }}-{{ $class->id }}-{{ $year->id }}"
                                                role="tab"
                                                aria-controls="stream-{{ $stream->id }}-{{ $class->id }}-{{ $year->id }}"
                                                aria-selected="{{ $loop->first ? 'true' : 'false' }}">{{ $stream->name }}</a>
                                        </li>
                                        @endforeach
                                    </ul>

                                    <div class="tab-content" id="streamTabContent-{{ $class->id }}-{{ $year->id }}">
                                        @foreach ($streams as $stream)
                                        <div class="tab-pane fade @if ($loop->first) show active @endif"
                                            id="stream-{{ $stream->id }}-{{ $class->id }}-{{ $year->id }}"
                                            role="tabpanel"
                                            aria-labelledby="stream-{{ $stream->id }}-tab-{{ $class->id }}-{{ $year->id }}">
                                            <ul class="nav nav-pills mb-3"
                                                id="subjectTab-{{ $stream->id }}-{{ $class->id }}-{{ $year->id }}"
                                                role="tablist">
                                                @foreach ($subjects as $subject)
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link @if ($loop->first) active @endif"
                                                        id="subject-{{ $subject->id }}-tab-{{ $stream->id }}-{{ $class->id }}-{{ $year->id }}"
                                                        data-bs-toggle="pill"
                                                        href="#subject-{{ $subject->id }}-{{ $stream->id }}-{{ $class->id }}-{{ $year->id }}"
                                                        role="tab"
                                                        aria-controls="subject-{{ $subject->id }}-{{ $stream->id }}-{{ $class->id }}-{{ $year->id }}"
                                                        aria-selected="{{ $loop->first ? 'true' : 'false' }}">{{ $subject->name }}</a>
                                                </li>
                                                @endforeach
                                            </ul>

                                            <div class="tab-content"
                                                id="subjectTabContent-{{ $stream->id }}-{{ $class->id }}-{{ $year->id }}">
                                                @foreach ($subjects as $subject)
                                                <div class="tab-pane fade @if ($loop->first) show active @endif"
                                                    id="subject-{{ $subject->id }}-{{ $stream->id }}-{{ $class->id }}-{{ $year->id }}"
                                                    role="tabpanel"
                                                    aria-labelledby="subject-{{ $subject->id }}-tab-{{ $stream->id }}-{{ $class->id }}-{{ $year->id }}">
                                                    <ul class="nav nav-pills mb-3"
                                                        id="termTab-{{ $subject->id }}-{{ $stream->id }}-{{ $class->id }}-{{ $year->id }}"
                                                        role="tablist">
                                                        @foreach ($terms as $term)
                                                        <li class="nav-item" role="presentation">
                                                            <a class="nav-link @if ($loop->first) active @endif"
                                                                id="term-{{ $term->id }}-tab-{{ $subject->id }}-{{ $stream->id }}-{{ $class->id }}-{{ $year->id }}"
                                                                data-bs-toggle="pill"
                                                                href="#term-{{ $term->id }}-{{ $subject->id }}-{{ $stream->id }}-{{ $class->id }}-{{ $year->id }}"
                                                                role="tab"
                                                                aria-controls="term-{{ $term->id }}-{{ $subject->id }}-{{ $stream->id }}-{{ $class->id }}-{{ $year->id }}"
                                                                aria-selected="{{ $loop->first ? 'true' : 'false' }}">{{ $term->name }}</a>
                                                        </li>
                                                        @endforeach
                                                    </ul>

                                                    <div class="tab-content"
                                                        id="termTabContent-{{ $subject->id }}-{{ $stream->id }}-{{ $class->id }}-{{ $year->id }}">
                                                        @foreach ($terms as $term)
                                                        <div class="tab-pane fade @if ($loop->first) show active @endif"
                                                            id="term-{{ $term->id }}-{{ $subject->id }}-{{ $stream->id }}-{{ $class->id }}-{{ $year->id }}"
                                                            role="tabpanel"
                                                            aria-labelledby="term-{{ $term->id }}-tab-{{ $subject->id }}-{{ $stream->id }}-{{ $class->id }}-{{ $year->id }}">
                                                            <div class="card">
                                                                <div class="card-header">
                                                                    <h5 class="card-title">Marks List -
                                                                        {{ $class->name }}
                                                                        ({{ $year->year }}) - Stream:
                                                                        {{ $stream->name }} -
                                                                        Subject: {{ $subject->name }} - Term:
                                                                        {{ $term->name }}
                                                                    </h5>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="table-responsive">
                                                                        <table
                                                                            class="table border-0 star-class table-hover table-center mb-0 datatable table-striped">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Student ID</th>
                                                                                    <th>Name</th>
                                                                                    <th>Topic</th>
                                                                                    <th>Marks</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @foreach ($marks as $mark)
                                                                                @if ($mark->enrollment &&
                                                                                $mark->enrollment->student)
                                                                                <tr>
                                                                                    <td>{{ $mark->enrollment->student->id }}
                                                                                    </td>
                                                                                    <td>{{ $mark->enrollment->student->name }}
                                                                                    </td>
                                                                                    <td>{{ $mark->topic ? $mark->topic->name : '-' }}
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="number"
                                                                                            class="form-control"
                                                                                            wire:model.defer="marks.{{ $mark->id }}">
                                                                                    </td>
                                                                                </tr>
                                                                                @endif
                                                                                @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>