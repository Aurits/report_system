<?php
namespace App\Http\Livewire;

use Livewire\Component;
use PDF;

class PdfGenerator extends Component
{
    public function generatePdf()
    {
        // Define the data you want to pass to the view
        $data = [
            'title' => 'My PDF Title',
            'content' => 'This is the content of the PDF.'
        ];

        // Load the view and pass the data
        $pdf = PDF::loadView('livewire.pdf-generator', $data);

        // Return the PDF for download or stream it to the browser
        return $pdf->download('document.pdf');
    }

    public function render()
    {
        return view('livewire.pdf-generator');
    }
}
