<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Service;
use App\ServiceProvider;
use Illuminate\Http\Request;
use Session;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

    private function getServiceProviderNames()
    {
        $sp_names = [];
        $allSP = ServiceProvider::all();
        foreach ($allSP as $service_provider) {
//            dd($service_provider->id);
            $sp_names[$service_provider->id] = $service_provider->last_name.", ".$service_provider->first_name;
        }
        return $sp_names;
    }

    private function validateForm($request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'price' => 'required',
            'category_id' => 'required'
        ]);
    }

    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 500;

        if (!empty($keyword)) {
            $services = Service::where('name', 'LIKE', "%$keyword%")
				->orWhere('price', 'LIKE', "%$keyword%")
				->orWhere('category_id', 'LIKE', "%$keyword%")
				
                ->paginate($perPage);
        } else {
            $services = Service::paginate($perPage);
        }

        $serviceproviders = ServiceProvider::all();
        return view('admin.services.index', compact('services'))
            ->with('serviceproviders', $serviceproviders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.services.create')->with(['category_names' => $this->getCategoryNames()]);
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
        
        Service::create($requestData);

        Session::flash('flash_message', 'Service added!');

        return redirect('admin/services');
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

        $service = Service::findOrFail($id);
        $service_provider_instance = ServiceProvider::all()->where('id', $service->spid)[0];
//        dd($service_provider_instance);
        $service_provider = $service_provider_instance->last_name . ", " . $service_provider_instance->first_name;
        return view('admin.services.show', compact('service'))
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
        $service_providers = ServiceProvider::all();
        $service = Service::findOrFail($id);
//        $services = Service::all();
//        dd($service_providers);
//            dd($this->getServiceProviderNames());
        return view('admin.services.edit', compact('service'))
            ->with(['sp_names' => $this->getServiceProviderNames()])
            ->with('service_providers', $service_providers);
//            ->with('services', $services);
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
        
        $service = Service::findOrFail($id);
        $service->update($requestData);

        Session::flash('flash_message', 'Service updated!');

        return redirect('admin/services');
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
        Service::destroy($id);

        Session::flash('flash_message', 'Service deleted!');

        return redirect('admin/services');
    }
}
