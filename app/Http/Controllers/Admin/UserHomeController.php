<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Skill;
use App\User;

use App\Http\Controllers\Controller;
use App\Sponsorship;
use App\SponsorshipUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Carbon\Carbon;

class UserHomeController extends Controller
{

    public function index(){
        return redirect()->route('admin.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

        $date_now = Carbon::now();

        $packBaseExpiration = '';
        $packPremiumExpiration = '';
        $packEliteExpiration = '';

       if(count($user->sponsorships) > 0){

         $packBaseExpiration = Carbon::parse($user->sponsorships[count($user->sponsorships) - 1]->pivot->created_at)->addHours(24);

         $packPremiumExpiration = Carbon::parse($user->sponsorships[count($user->sponsorships) - 1]->pivot->created_at)->addHours(72);

         $packEliteExpiration = Carbon::parse($user->sponsorships[count($user->sponsorships) - 1]->pivot->created_at)->addHours(144);

       }
       
        $user = Auth::user();

        $categories = Category::all();

        $skills = Skill::all();

        $sponsorships = Sponsorship::all();

        return view('admin.users.show', compact('user', 'categories', 'skills', 'sponsorships', 'packBaseExpiration', 'packPremiumExpiration', 'packEliteExpiration', 'date_now'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user = Auth::user();

        $categories = Category::all();

        $skills = Skill::all();
        
        return view('admin.users.edit', compact('user','categories', 'skills' ));
    }

    public function editSponsorships($id)
    {
        $user = User::find($id);

        $categories = Category::all();

        $skills = Skill::all();

        $sponsorships = Sponsorship::all();
        
        return view('admin.users.riepilogoSponsor', compact('user','categories', 'skills', 'sponsorships' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        
        $request->validate($this->makeValidation(), $this->makeValidationMessage());
        
        $data = $request->all();

        // dd($data);

        if(array_key_exists('image', $data)){
            
            if($user->image){
                Storage::delete($user->image);
            }

            $data['image'] =  $request->file('image')->getClientOriginalName();

            $image_path = Storage::putFile('img', $request->file('image'));

            $data['image'] = $image_path;
        } 

        if(array_key_exists('cv', $data)){
            
            if($user->cv){
                Storage::delete($user->cv);
            }

            $data['cv'] =  $request->file('cv')->getClientOriginalName();

            $cv_path = Storage::putFile('cv', $request->file('cv'));

            $data['cv'] = $cv_path;
        } 



        $new_user = new User();
        $new_user->fill($data);

        $data['slug'] = User::generateSlug($data['name']);

        $user->update($data);

       

        if(array_key_exists('categories', $data)){
            $user->categories()->sync($data['categories']);
        } else {
            $user->categories()->detach();
        }
        // dd($user->categories());

        if(array_key_exists('skills', $data)){
            $user->skills()->sync($data['skills']);
        } else {
            $user->skills()->detach();
        }

        // if(array_key_exists('sponsorships', $data)){
        //     $user->sponsorships()->attach($data['sponsorships']);
        // } else {
        //     $user->sponsorships()->detach();
        // }

        return redirect()->route('admin.users.show', $user);
    }

     public function updateSponsorship(Request $req, User $user){

        $dataSponsor = $req->all();

        // dd($dataSponsor);

        $new_user = new User();
        $new_user->fill($dataSponsor);

        $user->update($dataSponsor);

        if(array_key_exists('sponsorships', $dataSponsor)){
            $user->sponsorships()->attach($dataSponsor['sponsorships']);
        } else {
            $user->sponsorships()->detach();
        }

        return redirect()->route('admin.users.show', $user);

     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('login')->with('deleted', "L'utente $user->name $user->lastname è stato eliminato");
    }

    private function makeValidation(){
        return [
            "name" => "required|max:50|min:2",
            "lastname" => "required|max:50|min:2",
            "address" => "required|max:250|min:2",
            "city" => "required|max:150|min:2",
            "description_job" => "nullable|min:2",
            "image" => "nullable|mimes:jpg,png,jpeg,svg|max:32000",
            "cv" => "nullable|mimes:jpg,png,jpeg,svg,pdf|max:32000",
            "sponsorships" => "nullable"
        ];
    }

    private function makeValidationMessage(){
        return [
            "name.required" =>"Il nome è obbligatorio",
            "name.max" =>"Il nome può avere massimo :max caratteri",
            "name.min" =>"Il nome deve avere minimo :min caratteri",
            "lastname.required" =>"Il cognome è obbligatorio",
            "lastname.max" =>"Il cognome può avere massimo :max caratteri",
            "lastname.min" =>"Il cognome deve avere minimo :min caratteri",
            "address.required" =>"L'indirizzo è obbligatorio",
            "address.max" => "L'indirizzo può contenere :max caratteri",
            "address.min" => "L'indirizzo deve contenere :min caratteri",
            "city.required" =>"La città è obbligatoria",
            "city.max" => "La città può contenere :max caratteri",
            "city.min" => "La città deve contenere :min caratteri",
            "description_job.min" => "La descrizione deve contenere :min caratteri",
            "image.mimes" => "L'immagine deve essere un file di tipo:jpg ,png, jpeg, svg",
            "image.max" => "L'immagine è troppo grande",
            "cv.mimes" => "Il file deve essere di tipo:jpg ,png, jpeg, svg, pdf",
            "cv.max" => "Il file è troppo grande",
        ];
    }

}
