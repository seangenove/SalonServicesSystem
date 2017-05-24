<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Customer;
use App\Service;
use App\ServiceProvider;
use App\Transaction;
use App\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class TransactionsController extends Controller
{
    private function validateForm($request)
    {
        $this->validate($request, [
            'status' => 'required',
            'date_started' => 'required',
            'request_id' => 'required'
        ]);
    }
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
            $transactions = Transaction::where('status', 'LIKE', "%$keyword%")
				->orWhere('visits', 'LIKE', "%$keyword%")
				->orWhere('date_started', 'LIKE', "%$keyword%")
				->orWhere('date_finished', 'LIKE', "%$keyword%")
				->orWhere('amount', 'LIKE', "%$keyword%")
				->orWhere('request_id', 'LIKE', "%$keyword%")
				
                ->paginate($perPage);
        } else {
            $transactions = Transaction::paginate($perPage);
        }
        $customers = Customer::all();
        $service_providers = ServiceProvider::all();
        $detailed_transactions = DB::table('transactions')
            ->join('service_requests', 'transactions.request_id', '=', 'service_requests.id')
            ->select('transactions.*',
                'service_requests.date_requested',
                'service_requests.date_accepted',
//                'service_requests.service_id',
                'service_requests.customer_id',
                'service_requests.sp_id')
            ->get();
        $visits = Visit::all();

        return view('admin.transactions.index', compact('transactions'))
            ->with('customers', $customers)
            ->with('service_providers', $service_providers)
            ->with('transactions', $detailed_transactions)
            ->with('visits', $visits);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.transactions.create');
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
        $this->validateForm($request);
        $requestData = $request->all();
        
        Transaction::create($requestData);

        Session::flash('flash_message', 'Transaction added!');

        return redirect('admin/transactions');
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
        $visits = Visit::all()->where('transactionId', $id)->count();
        $detailed_transaction = DB::table('transactions')
            ->where('transactions.id', $id)
            ->join('service_requests', 'transactions.request_id', '=', 'service_requests.id')
            ->select('transactions.*',
                'service_requests.date_requested',
                'service_requests.date_accepted',
                'service_requests.service_id',
                'service_requests.customer_id',
                'service_requests.service_providers')
            ->get()[0];

        $service = Service::find($detailed_transaction->service_id)->name;


        $customer_instance = Customer::findOrFail($detailed_transaction->customer_id);
        $customer = strtoupper($customer_instance->last_name).", ".$customer_instance->first_name;

        $service_provider_instance = Customer::findOrFail($detailed_transaction->service_providers);
        $service_provider = strtoupper( $service_provider_instance->last_name).", ". $service_provider_instance->first_name;


        return view('admin.transactions.show', compact('detailed_transaction'))
            ->with('customer', $customer)
            ->with('service_provider', $service_provider)
            ->with('service', $service)
            ->with('visits', $visits);
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
        $transaction = Transaction::findOrFail($id);

        return view('admin.transactions.edit', compact('transaction'));
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
        $this->validateForm($request);
        $requestData = $request->all();
        
        $transaction = Transaction::findOrFail($id);
        $transaction->update($requestData);

        Session::flash('flash_message', 'Transaction updated!');

        return redirect('admin/transactions');
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
        Transaction::destroy($id);

        Session::flash('flash_message', 'Transaction deleted!');

        return redirect('admin/transactions');
    }
}
