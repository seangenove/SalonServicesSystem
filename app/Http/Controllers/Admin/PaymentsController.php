<?php

namespace App\Http\Controllers\Admin;

use App\Customer;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Payment;
use App\ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 500;

        if (!empty($keyword)) {
            $payments = Payment::where('amount', 'LIKE', "%$keyword%")
				->orWhere('date', 'LIKE', "%$keyword%")
				->orWhere('transaction_id', 'LIKE', "%$keyword%")

                ->paginate($perPage);
        } else {
            $payments = Payment::paginate($perPage);
        }

        $payments = DB::table('payments')
            ->join('transactions', 'transactions.id', '=', 'payments.transaction_id')
            ->join('service_requests', 'transactions.request_id', '=', 'service_requests.id')
            ->select('transactions.*',
                'service_requests.date_requested',
                'service_requests.date_accepted',
                'service_requests.service_id',
                'service_requests.customer_id',
                'service_requests.service_providers',
                'payments.amount',
                'payments.transaction_id',
                'payments.time',
                'payments.date')
            ->get();

        $customers = Customer::all();
        $serviceproviders = ServiceProvider::all();

        return view('admin.payments.index', compact('payments'))
            ->with('customers', $customers)
            ->with('serviceproviders', $serviceproviders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.payments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        Payment::create($requestData);

        Session::flash('flash_message', 'Payment added!');

        return redirect('admin/payments');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $payment = Payment::findOrFail($id);

        $customer_instance = Customer::findOrFail($payment->customer_id);
        $customer = strtoupper($customer_instance->last_name).", ".$customer_instance->first_name;

        $service_provider_instance = Customer::findOrFail($payment->service_providers);
        $service_provider = strtoupper( $service_provider_instance->last_name).", ". $service_provider_instance->first_name;


        return view('admin.payments.show', compact('payment'))
            ->with('customer', $customer)
            ->with('service_provider', $service_provider);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $payment = Payment::findOrFail($id);

        return view('admin.payments.edit', compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        
        $requestData = $request->all();
        
        $payment = Payment::findOrFail($id);
        $payment->update($requestData);

        Session::flash('flash_message', 'Payment updated!');

        return redirect('admin/payments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Payment::destroy($id);

        Session::flash('flash_message', 'Payment deleted!');

        return redirect('admin/payments');
    }
}
