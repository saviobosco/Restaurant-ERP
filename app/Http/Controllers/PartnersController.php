<?php

namespace App\Http\Controllers;

use App\Partner;
use Illuminate\Http\Request;

class PartnersController extends Controller
{
    public function index()
    {
        $partners = Partner::query()
            ->paginate(20);

        return view('partners.index')
            ->with(compact('partners'));
    }

    public function create()
    {
        return view('partners.create');
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => ['required','unique:partners']
        ]);

        $partner = Partner::create($request->input());
        if ($partner) {
            session()->flash('success', 'Partner record was successfully created.');
        } else {
            session()->flash('error', 'Partner record could not be created. Please try again');
        }
        return redirect()
            ->route('partners.index');
    }


    public function edit(Partner $partner)
    {
        return view('partners.edit')
            ->with(compact('partner'));
    }


    public function update(Request $request, Partner $partner)
    {
        $this->validate($request,[
            'name' => 'required'
        ]);

        $updated = $partner->update($request->input());
        if ($updated) {
            session()->flash('success', 'Partner details was successfully updated.');
        } else {
            session()->flash('error', 'Partner details could not be updated. Please try again');
        }
        return back();
    }


    public function destroy(Partner $partner)
    {
        try {
            $partner->delete();
            session()->flash('success','Partner details was successfully deleted');
        } catch (\Exception $exception)
        {
            session()->flash('error', 'Partner details could not be deleted. Please try again.');
        }
        return back();
    }

    public function getNames()
    {
        $partners = Partner::query()
            ->select(['id', 'name as option_text'])
            ->get()
            ->toArray();

        return response()
            ->json([
                'data' => $partners
            ]);
    }

}
