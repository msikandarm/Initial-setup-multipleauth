<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserPdf;
use App\Models\Product;
use PDF;

class UserPdfController extends Controller
{
    public function store(Request $request)
    {
        $pdf = new UserPdf();

        $pdf->product_id = $request['product_id'];
        $pdf->name = $request['name'];
        $pdf->email = $request['email'];
        $pdf->phone = $request['phone'];
        $pdf->link = $request['link'];

        $pdf->save();

        return redirect()->route('thank.you', $pdf->id);

    }

    public function thank_you($id)
    {
        $pdf_id = $id;

        return view('frontend.thank_you', compact('pdf_id'));

    }

    public function pdf_generate($id)
    {
        $pdf = UserPdf::find($id);

        $product = Product::where('id' , $pdf->product_id)->first();

        $data = [
            'product' => $product,
            'pdf' => $pdf,
        ];

        $pdf = PDF::loadView('frontend.pdf', $data);

        return $pdf->download('userproduct.pdf');

    }
}
