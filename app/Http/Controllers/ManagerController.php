<?php

namespace App\Http\Controllers;

use App\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $managers = Manager::all();
        return view('manager.index', compact('managers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manager.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd($request->all());
        try{
            $message = [
                'name.required' => 'User name is required',
                'email.required' => 'Email name is required',
                'position.required' => 'Email name is required',
                
                'email.unique' => 'Email already exists, try new one !',
                
            ];
            $rules = [
                'name' => 'required',
                'email' => 'required|unique:admins',
                'position' => 'required'
                
                //'createdBy' => 'required',
            ];
            $validator = Validator::make($request->all(), $rules, $message);
            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }

           

            $manager = new Manager();
            $manager->name = $request->name;
            $manager->email = $request->email;
            $manager->position = $request->position;
            $manager->password = bcrypt('sabuz123');
            $manager->save();
            alert()->success('Manager Created');

            return redirect()->route('managers.index');

        }catch(\Exception $e){
            return $e->getMessage();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function show(Manager $manager)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $manager = Manager::findOrFail($id);
        return view('manager.edit', compact('manager'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $message = [
                'name.required' => 'Manager name is required',
                'email.required' => 'Email name is required',
                'position.required' => 'Position name is required',
                
                
               
                
            ];
            $rules = [
                'name' => 'required',
                'email' => 'required',
                'position' => 'required'
                
                //'createdBy' => 'required',
            ];
            $validator = Validator::make($request->all(), $rules, $message);
            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }

           

            $manager = Manager::findOrFail($id);
            $position = $request->position;
            $pmanager = Manager::where('position',$position)->first();
            if($pmanager){
                $pmanager->position = $manager->position;
                $pmanager->save();
            }
           
            $manager->name = $request->name;
            $manager->email = $request->email;
            $manager->position = $request->position;
            $manager->save();
            
            
           
            alert()->success('Manager Updated');

            return redirect()->route('managers.index');

        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $manager = Manager::findOrFail($id);
        $manager->delete();
        alert()->success('Manager Delete');
        return redirect()->route('managers.index');
    }
}
