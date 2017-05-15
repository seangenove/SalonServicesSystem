<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ServiceProvider;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class ServiceProvidersController extends Controller
{
    private function validateForm($request)
    {
        $this->validate($request, [
            'last_name' => 'required|string',
            'first_name' => 'required|string',
            'category_id' => 'required',
            'contact_number' => 'required',
            'email' => 'required|email',
            'status' => 'required',
            'description' => 'required',
            'password' => 'required',
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
        $perPage = 25;

        if (!empty($keyword)) {
            $serviceproviders = ServiceProvider::where('lastName', 'LIKE', "%$keyword%")
				->orWhere('firstName', 'LIKE', "%$keyword%")
				->orWhere('category_id', 'LIKE', "%$keyword%")
				->orWhere('contact_number', 'LIKE', "%$keyword%")
				->orWhere('email', 'LIKE', "%$keyword%")
				->orWhere('status', 'LIKE', "%$keyword%")
				
                ->paginate($perPage);
        } else {
            $serviceproviders = ServiceProvider::paginate($perPage);
        }

        return view('admin.service-providers.index', compact('serviceproviders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.service-providers.create');
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
        
        ServiceProvider::create($requestData);

        Session::flash('flash_message', 'ServiceProvider added!');

        return redirect('admin/service-providers');
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
        $serviceprovider = ServiceProvider::findOrFail($id);
        $detailed_transactions = DB::table('transactions')
            ->join('service_requests', 'transactions.request_id', '=', 'service_requests.id')
            ->select('transactions.*',
                'service_requests.date_requested',
                'service_requests.date_accepted',
                'service_requests.service_id',
                'service_requests.customer_id',
                'service_requests.service_providers')
            ->where('service_requests.service_providers', $id)
            ->get();
//            dd($detailed_transactions);
//        dd($detailed_transactions);
        return view('admin.service-providers.show', compact('serviceprovider'))
            ->with('transactions', $detailed_transactions);
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
        $serviceprovider = ServiceProvider::findOrFail($id);

        return view('admin.service-providers.edit', compact('serviceprovider'));
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
        
        $serviceprovider = ServiceProvider::findOrFail($id);
        $serviceprovider->update($requestData);

        Session::flash('flash_message', 'ServiceProvider updated!');

        return redirect('admin/service-providers');
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
        ServiceProvider::destroy($id);

        Session::flash('flash_message', 'ServiceProvider deleted!');

        return redirect('admin/service-providers');
    }
}
