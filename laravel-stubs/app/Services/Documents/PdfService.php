<?php

namespace App\Services\Documents;

use Barryvdh\DomPDF\Facade\Pdf;

class PdfService {
    public function renderQuote($quote){ return Pdf::loadView('pdf.quote', compact('quote'))->output(); }
    public function renderSurvey($lead, array $rooms){ return Pdf::loadView('pdf.survey_report', compact('lead','rooms'))->output(); }
    public function renderRAMS($job, array $hazards, array $steps){ return Pdf::loadView('pdf.rams', compact('job','hazards','steps'))->output(); }
    public function renderWarranty($quote, int $warrantyMonths, string $scope){ return Pdf::loadView('pdf.warranty', compact('quote','warrantyMonths','scope'))->output(); }
    public function renderCareGuide(){ return Pdf::loadView('pdf.care_guide')->output(); }
    public function renderInvoice($invoice, array $lines){ return Pdf::loadView('pdf.invoice', compact('invoice','lines'))->output(); }
}
