
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Add Marks</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Exam</a></li>
                        <li class="breadcrumb-item active">Add Marks</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="student-group-form">
                            <div class="row">
                                <div class="col-lg-3 col-md-6">
                                    <div class="form-group">
                                        <label>Class</label>
                                        <select class="form-control select">
                                            <option>Select Class</option>
                                            @foreach($classes as $class)
                                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                                            @endforeach


                                        </select>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="form-group">
                                        <label>Stream</label>
                                        <select class="form-control select">
                                            <option>Select Stream</option>
                                            @foreach($streams as $stream)
                                                <option value="{{ $stream->id }}">{{ $stream->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="form-group">
                                        <label>Subject</label>
                                        <select class="form-control select">
                                            <option>Select Subject</option>
                                            @foreach($subjects as $subject)
                                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>


                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div style= "height:30%"></div>
                                    <div class="form-group">


                                        <div class="col-lg-3">
                                            <div class="search-student-btn">
                                                <button wire:click="search"
                                                        type="btn"
                                                        class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table
                                class="datatable table table-stripped">
                                <thead>

                                <tr>
                                    <th>Student ID</th>
                                    <th>Student Name</th>
                                    <th>Residence House</th>
                                    <th>Age</th>
                                    <th>Cumulative Score</th>
                                    <th>Activity Mark</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($students as $student)
                                <tr>
                                    <td>{{ $student['id'] }}</td>
                                    <td>{{ $student['name'] }}</td>
                                    <td>{{ $student['gender'] }}</td>
                                    <td>{{ $student['email'] }}</td>
                                    <td>{{ $student['phone'] }}</td>
                                    <td>
                                        <div class="col-md-10">
                                            <input placeholder="Enter mark..." type="text" class="form-control">
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
