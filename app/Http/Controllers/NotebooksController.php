<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Notebook;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class NotebooksController extends Controller
{
    //
	public function index(){

		$user= Auth::user();

		$notebooks = $user->notebooks;


		return view('notebooks.index', compact('notebooks'));
	}

	//create method
	public function create(){
		return view('notebooks.create');
	}

	//show method
	public function show($id){
		 $notebook= Notebook::findOrFail($id);

		 $notes= $notebook->notes;

		 return view('notes.index',compact('notes','notebook'));

	}

	//store method
	public function store(Request $request){

		$dataInput = $request->all();

		$user= Auth::user();
		$user->notebooks()->create($dataInput);
		// Notebook::create($dataInput);

		return redirect('/notebooks');

	}

	//edit Notebook
	//To fetch one data with the where keyword, use first.
	//To fetch many data with the where keyword use get.
	public function edit($id){
		$notebook = Notebook::whereId($id)->first();

		$user= Auth::user();

		$notebook= $user->notebooks()->find($id);

		return view('notebooks.edit')->with('notebook',$notebook);

	}

	//update Notebook
	public function update(Request $request, $id){
		
		$user= Auth::user();

		$notebook= $user->notebooks()->find($id);

		$notebook->update($request->all());

		//$notebook = Notebook::whereId($id)->first();

		//$notebook->update($request->all());

		return redirect('/notebooks');

	}

	//delete notebook
	public function destroy($id){
		// $notebook = Notebook::whereId($id)->first();
		
		$user= Auth::user();

		$notebook= $user->notebooks()->find($id);

		$notebook->delete();

		return redirect('/notebooks');
	}

}
