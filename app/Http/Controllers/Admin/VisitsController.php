<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Visit;
use Illuminate\Http\Request;
use Session;

class VisitsController extends Controller
{
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
            $visits = Visit::where('description', 'LIKE', "%$keyword%")
				->orWhere('scheduled_date', 'LIKE', "%$keyword%")
				->orWhere('transactionId', 'LIKE', "%$keyword%")
				->orWhere('status', 'LIKE', "%$keyword%")
				
                ->paginate($perPage);
        } else {
            $visits = Visit::paginate($perPage);
        }
//dd($visits);
        return view('admin.visits.index', compact('visits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.visits.create');
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
        
        Visit::create($requestData);

        Session::flash('flash_message', 'Visit added!');

        return redirect('admin/visits');
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
        $visit = Visit::findOrFail($id);

        return view('admin.visits.show', compact('visit'));
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
        $visit = Visit::findOrFail($id);

        return view('admin.visits.edit', compact('visit'));
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
        
        $visit = Visit::findOrFail($id);
        $visit->update($requestData);

        Session::flash('flash_message', 'Visit updated!');

        return redirect('admin/visits');
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
        Visit::destroy($id);

        Session::flash('flash_message', 'Visit deleted!');

        return redirect('admin/visits');
    }
}
