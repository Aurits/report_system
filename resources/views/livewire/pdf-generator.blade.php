<div>
    <h2>hello</h2>
    <div class="mt-4">
        <button id="downloadExcelBtn" class="btn btn-primary">Download Excel</button>
        <button id="downloadPdfBtn" class="btn btn-danger">Download PDF</button>
    </div>
<!-- Include TableExport and jsPDF scripts -->
<script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.23/jspdf.plugin.autotable.min.js"></script>

<script>
    document.getElementById('downloadExcelBtn').addEventListener('click', function() {
        var table = document.getElementById('transactionTable');
        var wb = XLSX.utils.table_to_book(table, {
            sheet: "Sheet JS"
        });
        XLSX.writeFile(wb, 'transaction_report.xlsx');
    });

    document.getElementById('downloadPdfBtn').addEventListener('click', function() {
        var {
            jsPDF
        } = window.jspdf;
        var doc = new jsPDF();
        doc.autoTable({
            html: '#transactionTable'
        });
        doc.save('transaction_report.pdf');
    });
</script>
<div>
