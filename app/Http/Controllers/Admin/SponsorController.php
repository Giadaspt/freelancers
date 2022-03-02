<?php

namespace App\Http\Controllers\Admin;

use App\Sponsorship;
use App\User;
use App\SponsorshipUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SplHeap;

class SponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sponsors = $request->all();

        $sponsorExists = true;
      
        $user = Auth::user();
        $user_id = Auth::user()->id;

        $sponsors = Sponsorship::all();

        if(count($sponsors) <= 0){
            $sponsorExists = false;
        }

        return view('admin.users.sponsor', compact('sponsors', 'user_id', 'sponsorExists','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sponsor = Sponsorship::find($id);
        
        $user = Auth::user();
        return view('admin.users.riepilogoSponsor', compact('sponsor', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sponsorship $sponsor)
    {
        $data = $request->all();
        dump($data);

        // $sponsors = Sponsorship::all();

        $sponsorUsers = SponsorshipUser::all();

        // $new_sponsor = new Sponsorship();

        // $new_sponsor = fill($data);

        $sponsor->update($data);

        return redirect()->route('admin.sponsorships.show', compact( 'sponsorUsers', 'sponsor'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
