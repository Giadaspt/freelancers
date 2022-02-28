<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Skill;
use App\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $user = User::find($id);

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        $categories = Category::all();

        $skills = Skill::all();

        return view('admin.users.edit', compact('user','categories', 'skills' ));
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

        if(array_key_exists('image', $data)){
            $data['image'] =  $request->file('image')->getClientOriginalName();

            $image_path = Storage::put('uploads', $data['image']);
            $data['image'] = $image_path;
        }

        $new_user = new User();
        $new_user->fill($data);

        $data['slug'] = User::generateSlug($data['name']);

        $user->update($data);

        return redirect()->route('admin.users.show', $user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

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
        ];
    }
}
