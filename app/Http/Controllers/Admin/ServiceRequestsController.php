<?php

namespace App\Http\Controllers\Admin;

use App\Customer;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Service;
use App\ServiceProvider;
use App\ServiceRequest;
use Illuminate\Http\Request;
use Session;

class ServiceRequestsController extends Controller
{
    private function validateForm($request)
    {
        $this->validate($request, [
            'status' => 'required',
            'date_requested' => 'required',
            'service_id' => 'required',
            'customer_id' => 'required'
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
            $servicerequests = ServiceRequest::where('status', 'LIKE', "%$keyword%")
				->orWhere('date_requested', 'LIKE', "%$keyword%")
				->orWhere('date_accepted', 'LIKE', "%$keyword%")
				->orWhere('service_id', 'LIKE', "%$keyword%")
				->orWhere('customer_id', 'LIKE', "%$keyword%")
				
                ->paginate($perPage);
        } else {
            $servicerequests = ServiceRequest::paginate($perPage);
        }

        $customers = Customer::all();
        $service_providers = ServiceProvider::all();
//        dd($servicerequests);

        return view('admin.service-requests.index', compact('servicerequests'))
            ->with('customers', $customers)
            ->with('service_providers', $service_providers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.service-requests.create');
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
        
        ServiceRequest::create($requestData);

        Session::flash('flash_message', 'ServiceRequest added!');

        return redirect('admin/service-requests');
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
        $servicerequest = ServiceRequest::findOrFail($id);
        $service = Service::findOrFail($servicerequest->service_id)->name;

        $customer_instance = Customer::findOrFail($servicerequest->customer_id);
        $customer = strtoupper($customer_instance->last_name).", ".$customer_instance->first_name;

        $service_provider_instance = Customer::findOrFail($servicerequest->service_provider_id);
        $service_provider = strtoupper( $service_provider_instance->last_name).", ". $service_provider_instance->first_name;

        return view('admin.service-requests.show', compact('servicerequest'))
            ->with('customer', $customer)
            ->with('service_provider', $service_provider)
            ->with('service', $service);
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
        $servicerequest = ServiceRequest::findOrFail($id);

        return view('admin.service-requests.edit', compact('servicerequest'));
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
        
        $servicerequest = ServiceRequest::findOrFail($id);
        $servicerequest->update($requestData);

        Session::flash('flash_message', 'ServiceRequest updated!');

        return redirect('admin/service-requests');
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
        ServiceRequest::destroy($id);

        Session::flash('flash_message', 'ServiceRequest deleted!');

        return redirect('admin/service-requests');
    }
}
