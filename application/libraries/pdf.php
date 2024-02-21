<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(dirname(__FILE__) . '/dompdf/autoload.inc.php');
// require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
use Dompdf\Options;
class Pdf {
    public function generate($html, $filename='', $paper = '', $orientation = '', $download=TRUE)
    {   
        $options = new Options();
        $options->set('isRemoteEnabled', TRUE);
        $dompdf = new Dompdf($options);
        // $dompdf = new Dompdf\DOMPDF();
        $dompdf->load_html($html);
        $dompdf->set_paper($paper, $orientation);
        $dompdf->render();
        if ($download) {
            $dompdf->stream($filename.".pdf", array("Attachment" => 0));
        } else {
            return $dompdf->output();
            // $dompdf->stream($filename.".pdf", array("Attachment" => 0));
        }
    }
}