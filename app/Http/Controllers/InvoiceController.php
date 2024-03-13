<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Bill;
use App\Models\Client;
use App\Models\Invoice;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\CompanyReference;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = Client::where('user_id', auth()->user()->id)->first();
        $invoices = Invoice::where('client_id', $client->id)->get();
        $companyRef = CompanyReference::where('company_name', 'ABC Corp')->first();;
        return view('client.payment', compact('invoices', 'companyRef'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $project = Project::where('id', $id)->first();
        return view('client.invoice_create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $invo = Invoice::where('project_id', $request->project_id)->first();

        if ($invo !== null && ($invo->status !== 'Paid' || $invo->status === null)) {
            return redirect()->route('client.project')->with('error', 'invoice telah dibuat silahkan cek pada menu Payment');
        } else {

            $inv['project_id'] = $request->project_id;
            $inv['client_id'] = $request->client_id;
            $inv['total_amount'] = $request->total_amount;
            $inv['due_date'] = Carbon::now()->addDays(3);
            $inv['status'] = 'Pending';
            Invoice::create($inv);
            return redirect()->route('client.payment');
        }
    }

    public function billStore(Request $request)
    {
        $bill['invoice_id'] = $request->invoice_id;
        $bill['company_reference_id'] = $request->company_reference_id;
        $bill['status'] = $request->status;
        $bill['amount_paid'] = $request->amount_paid;
        // Image Handler
        $proof = $request->proof_of_payment;
        $namaProofPay = $proof->getClientOriginalName();

        $proof->storeAs('public/img/proof_payment', $namaProofPay);

        $bill['proof_of_payment'] = $namaProofPay;

        $billPay = Bill::create($bill);

        if ($billPay) {
            $inv['status'] = $request->status;
            Invoice::where('id', $request->invoice_id)->update($inv);
            if ($request->status == 'Down-Payment (DP)') {
                $pro['status'] = 'Active';
                Project::where('id', $billPay->invoice->project_id)->update($pro);
            } elseif ($request->status == 'Full-Payment') {
                $pro['status'] = 'Done';
                Project::where('id', $billPay->invoice->project_id)->update($pro);
            }
        }

        return redirect()->route('client.payment')->with('success', 'Pembayaran Berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
