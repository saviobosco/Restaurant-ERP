<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Invoice;
use App\InvoiceItem;
use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Http\Request;

class InvoicesController extends Controller
{

    public function index()
    {
        $invoices = Invoice::query()
            ->latest()
            ->paginate(20);

        return view('invoices.index')
            ->with(compact('invoices'));

    }

    public function create()
    {
        return view('invoices.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'sub_total' => 'required',
            'total' => 'required',
        ]);

        $newInvoiceData = $request->only([
            'license_number','customer_id','remark','odometer','discount','tax','sub_total','total'
        ]);
        $newInvoiceData['issued_by'] = auth()->user()->name;

        try {
            DB::beginTransaction();
            $invoice = Invoice::create($newInvoiceData);
            $invoice_items = $request->input('products');
            if (!empty($invoice_items)) {
                foreach($invoice_items as $item) {
                    $invoice->invoice_items()->create($item);
                    // reduce the items in the table.
                }
            }
            DB::commit();
            if ($request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Invoice was successfully generated',
                    'data' => $invoice
                ]);
            }
            session()->flash('success', 'Invoice was successfully created.');
            return back();
        } catch (\Exception $exception) {
            DB::rollBack();
            if ($request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error occurred: '.$exception->getMessage(),
                    'data' => null
                ]);
            }
            session()->flash('error', 'Invoice could not be created. Please try again');
            return back()->withInput();
        }
    }


    public function show(Invoice $invoice)
    {
        return view('invoices.show')
            ->with(compact('invoice'));
    }


    public function destroy(Invoice $invoice)
    {
        try {
            $invoice->delete();
            $invoice->invoice_items()->delete();

            session()->flash('success', 'Invoice was successfully deleted!');
        } catch (\Exception $exception) {
            session()->flash('error', 'Invoice could not be deleted. Please try again');
        }
        return back();
    }


    public function generatePDF(Invoice $invoice)
    {
        // share data to view
        view()->share('invoice',$invoice);
        $pdf = PDF::loadView('invoices.pdf_preview', $invoice);


        return $pdf/*->save(public_path().'/pdf/'.$invoice->total.' Amount #'.$invoice->id.'-'.time().'.pdf')*/
            ->stream($invoice->total.' Amount #'.$invoice->id.'-'.time().'.pdf');
        // download PDF file with download method
        //return $pdf->download('pdf_file.pdf');

    }

}
