<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use PDF;

class PdfController extends Controller
{
    public function pdf_generate($id)
    {
        $product = Product::find($id);

        $data = [
            'title' => 'My Big Commissions',
            'product' => $product
        ];

        $pdf = PDF::loadView('admin.products.pdf', $data);

        return $pdf->download('product.pdf');
    }
}
