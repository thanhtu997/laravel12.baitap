<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events;
class EventController extends Controller
{
    public function index(){
    	$event = Events::orderBy('id','desc')->get();
    	return view('events.list',compact('event'));
    }
    public function show($id){
    	$event = Events::find($id);
    	return view('events.show',compact('event'));
    }
    public function create(){
    	return view('events.create');
    }
    public function store(Request $req){
    	$event = new Events;
    	$event->title = $req->title;
    	$event->content = $req->content;
    	$event->time = $req->time;
    	$event->location = $req->location;
    	$event->save();
    	return redirect('event');
    }
    public function del($id){
    	$event = Events::find($id)->delete();
    	return redirect('event');
    }

    public function edit($id){
    	$event = Events::find($id);
    	return view('events.edit',compact('event'));
    }
    public function editEvent(Request $req, $id){
    	$event = Events::find($id);
    	$event->title = $req->title;
    	$event->content = $req->content;
    	$event->location = $req->location;
    	$event->save();
    	return redirect('event');
    }
}
