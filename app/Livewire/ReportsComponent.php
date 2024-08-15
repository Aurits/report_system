<?php
namespace App\Livewire;
use Livewire\Component;
use View;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use Illuminate\Support\Facades\App;
class ReportsComponent extends Component
{
    public function generatePDF()
    {
        $viewName = 'livewire.pdf-generator';
        // $header = View::make('reports.header');
        // for some reason $footer is not working (need to check this)
        // $footer = View::make('reports.footer');
        $pdf = PDF::loadView($viewName)->setOrientation('landscape');
        $pdf->setOption('enable-local-file-access', true);
        // $pdf->setOption('header-html', $header);
        // $pdf->setOption('footer-html', $footer);

        // download pdf file
        return $pdf->download('report.pdf');

        //stream pdf file
        // return $pdf->download('report.pdf');

        //open pdf as view
        // return view($viewName);
    }

    public function render()
    {
        return view('livewire.reports-component');
    }
}
