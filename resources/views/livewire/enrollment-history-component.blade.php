<div>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Enrollment History</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    @if($processedHistory)
                    <div class="table-responsive">
                        <table class="table border-0 star-class table-hover table-center mb-0 datatables table-striped">
                            <thead>
                                <tr>
                                    <th>Academic Year</th>
                                    <th>Term</th>
                                    <th>Stream</th>
                                    <th>House</th>
                                    <th>Class</th>
                                    <th>Subject</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $currentYear = '';
                                $currentTerm = '';
                                $currentStream = '';
                                $currentHouse = '';
                                @endphp
                                @foreach($processedHistory as $data)
                                <tr>
                                    @if($currentYear != $data['history']->academicYear->year)
                                    <td rowspan="{{ $data['yearRowspan'] }}">
                                        {{ $data['history']->academicYear->year }}
                                    </td>
                                    @php $currentYear = $data['history']->academicYear->year; @endphp
                                    @endif
                                    @if($currentTerm != $data['history']->term->name)
                                    <td rowspan="{{ $data['termRowspan'] }}">
                                        {{ $data['history']->term->name }}
                                    </td>
                                    @php $currentTerm = $data['history']->term->name; @endphp
                                    @endif
                                    @if($currentStream != $data['history']->stream->name)
                                    <td rowspan="{{ $data['streamRowspan'] }}">
                                        {{ $data['history']->stream->name }}
                                    </td>
                                    @php $currentStream = $data['history']->stream->name; @endphp
                                    @endif
                                    @if($currentHouse != $data['history']->house->name)
                                    <td rowspan="{{ $data['houseRowspan'] }}">
                                        {{ $data['history']->house->name }}
                                    </td>
                                    @php $currentHouse = $data['history']->house->name; @endphp
                                    @endif
                                    <td>{{ $data['history']->classModel->name }}</td>
                                    <td>{{ $data['history']->subject->name }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <p>No enrollment history available.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
