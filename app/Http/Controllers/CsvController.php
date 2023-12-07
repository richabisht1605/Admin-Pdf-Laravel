<?php

namespace App\Http\Controllers;
use App\Models\Product;
use TCPDF;
use Illuminate\Http\Request;

class CsvController extends Controller
{
   
    public function CsvToPdf(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');

            // Read the CSV file
            $csvData = array_map('str_getcsv', file($file));

            // Get the headers (first row) to identify SKU column
            $headers = array_shift($csvData);
            $skuColumnIndex = array_search('SKU', $headers);

            // Initialize TCPDF object
            $pdf = new TCPDF();

            // Set document information
            $pdf->SetCreator('YourCreator');
            $pdf->SetAuthor('YourAuthor');
            $pdf->SetTitle('Generated PDF');

            // Loop through each row
            foreach ($csvData as $row) {
                $sku = $row[$skuColumnIndex]; // Get SKU code from CSV

                // Fetch product data based on SKU from the database
                $product = Product::where('Sku_Code', $sku)->first();

                if ($product && $product->Image) {
                    $imagePath = $product->Image; // Assuming Image field stores the image path

                    // Add a new page
                    $pdf->AddPage();
                    // Add image to PDF
                    $pdf->Image($imagePath, null, null); // Adjust width and height as needed
                }
            }

            // Close and output PDF
            $pdf->Output('generated_pdf.pdf', 'D'); // 'D' for download, 'I' for inline display
        }
    }
}

