{{-- <div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Reports</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Report</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reports as $report)
                                    <tr>
                                        <td>{{ $report->id }}</td>
                                        <td>{{ $report->report }}</td>
                                        <td>{{ $report->created_at }}</td>
                                        <td>
                                            <button class="btn btn-primary">Edit</button>
                                            <button class="btn btn-danger">Delete</button>
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
</div> --}}
{{-- @livewire(pdf-generator) --}}
<div>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Reports</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="classes_streams.html">Report</a>
                                </li>
                                <li class="breadcrumb-item active">Generic Report</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id = "report" class="row mt-4">
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <title>Sample Report Card</title>


                <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

                <link rel="stylesheet" href="assets/plugins/feather/feather.css">

                <link rel="stylesheet" href="assets/plugins/icons/flags/flags.css">

                <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
                <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

                <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

                <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

                <link rel="stylesheet" href="assets/css/style.css">
            </head>

            <body>
                <div class="report-card">
                    <header>
                        <div class="school-info" style="margin-bottom: 0%;">
                            <strong>
                                <h1 style="font-size: 30pt; color: black; margin: 0%;">SHAREBILITY UGANDA HIGH SCHOOL
                                </h1>
                            </strong>
                            <b>
                                <p margin: 0%; style="margin-bottom: 0%;">P. O. Box 212 Kampala | www.sharebility.net |
                                    info@sharebility.net | Tel: +256 776960740</p>
                            </b>
                        </div>
                        <hr style="color: #8a2b2b; height: 5px; margin-bottom: -2%; margin-top: 0%;" />
                        <hr style="color: #0004ff; height: 5px" />
                        <h2 style="margin-bottom: 0%"><strong>LEARNER'S END OF TERM REPORT CARD FOR TERM ONE,
                                2023</strong></h2>

                        <div class="invoice-item ">
                            <div class="row">

                                <div class="col-md-5">
                                    <div class="student-details">
                                        <div style="padding-left: 5%;">
                                            <p>LIN:_____________NAME: ______________________</p>
                                            <p>SchPay Code:_________ FeesBal:_______________</p>
                                            <p>HOUSE: __________ CLASS/ STREAM:__________</p>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="attendance">
                                        <table>
                                            <thead>
                                                <tr aria-rowspan="2">
                                                    <th colspan="2">Attendance</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td style="border-bottom: 0 solid #ffffff; border-right: 0  ">Days
                                                        Present</td>
                                                    <td
                                                        style="border: 0 solid #ffffff; border-right: 5px solid #8a2b2b">
                                                        73</td>
                                                </tr>
                                                <tr>
                                                    <td style="border-top: 0 solid #ffffff;   border-right: 0 ">Days
                                                        Absent</td>
                                                    <td
                                                        style="border: 0 solid #ffffff; border-right: 5px solid #8a2b2b">
                                                        15</td>
                                                </tr>

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td>Total</td>
                                                    <td>88</td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div class="square-frame">

                                </div>
                                <div class="col-md-5">

                                </div>
                            </div>

                        </div>

                    </header>
                    <main>
                        <div class="invoice-item invoice-item-two">

                            <table>
                                <thead>
                                    <tr>
                                        <th>Subject</th>
                                        <th>Topic and Competency</th>
                                        <th>Score</th>
                                        <th>Descriptor</th>
                                        <th>Generic Skills</th>
                                        <th>Remarks</th>
                                        <th>Teacher / Sign</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td rowspan="4">Mathematics</td>
                                        <td>1. Number Bases</td>
                                        <td>2.6</td>
                                        <td>Outstanding</td>
                                        <td rowspan="4">Rogers is able to think critically and solve real-life
                                            problems.</td>
                                        <td rowspan="4">Rogers achieved most of the learning outcomes for competency.
                                        </td>
                                        <td rowspan="4">Iguma Mercy</td>
                                    </tr>
                                    <tr>
                                        <td>2. Working with Integers</td>
                                        <td>2.7</td>
                                        <td>Outstanding</td>


                                    </tr>
                                    <tr>
                                        <td>3. Fractions, Percentages and Decimals</td>
                                        <td>1.6</td>
                                        <td>Moderate</td>

                                    </tr>
                                    <tr>
                                        <td>4. Rectangular Cartesian Coordinates in 2 Dimensions</td>
                                        <td>1</td>
                                        <td>Basic</td>

                                    </tr>
                                    <tr>
                                        <td>English</td>
                                        <td>1. Topic Name</td>
                                        <td>1</td>
                                        <td>Basic</td>
                                        <td rowspan="2"></td>
                                        <td rowspan="2"></td>
                                        <td rowspan="2"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>2. Topic Name</td>
                                        <td>2.8</td>
                                        <td>Outstanding</td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </main>
                    <footer>
                        <p>School Motto: "Have to Give"</p>
                    </footer>
                </div>
            </body>

            </html>
        </div>
        <div>
            <div class="mt-4">
                <button id="downloadExcelBtn" class="btn btn-primary">Download Excel</button>
                <button id="downloadPdfBtn" class="btn btn-danger">Download PDF</button>
            </div>
            <!-- Include TableExport and jsPDF scripts -->
            <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.23/jspdf.plugin.autotable.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.4.120/pdf.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

            <script>
                document.getElementById('downloadPdfBtn').addEventListener('click', function() {
                    var {
                        jsPDF
                    } = window.jspdf;
                    var doc = new jsPDF();
                    // doc.autoTable({
                    //     html: '#report'
                    // });
                    // doc.save('academic_report.pdf');
                    var element = document.getElementById('report'); // Replace 'yourDivID' with the ID of your div

                    doc.html(element, {
                        callback: function(doc) {
                            doc.save('specific-div.pdf'); // You can specify the name of the PDF file
                        },
                        x: -100,
                        y: -100
                    });
                });
            </script>

            <script>
                // Path to your PDF file (replace 'path_to_your_pdf_file.pdf' with the actual path)
                var url = '/home/mkb/Dev/report_system/storage/Certificate of Finances.pdf';

                var pdfjsLib = window['pdfjs-dist/build/pdf'];
                pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.4.120/pdf.worker.min.js';

                var loadingTask = pdfjsLib.getDocument(url);
                loadingTask.promise.then(function(pdf) {
                    console.log('PDF loaded');

                    // Fetch the first page
                    var pageNumber = 1;
                    pdf.getPage(pageNumber).then(function(page) {
                        console.log('Page loaded');

                        var scale = 1.5;
                        var viewport = page.getViewport({
                            scale: scale
                        });

                        // Prepare canvas using PDF page dimensions
                        var canvas = document.getElementById('pdf-canvas');
                        var context = canvas.getContext('2d');
                        canvas.height = viewport.height;
                        canvas.width = viewport.width;

                        // Render PDF page into canvas context
                        var renderContext = {
                            canvasContext: context,
                            viewport: viewport
                        };
                        var renderTask = page.render(renderContext);
                        renderTask.promise.then(function() {
                            console.log('Page rendered');
                        });
                    });
                }, function(reason) {
                    console.error(reason);
                });
            </script>
            <div>
            </div>

        </div>
