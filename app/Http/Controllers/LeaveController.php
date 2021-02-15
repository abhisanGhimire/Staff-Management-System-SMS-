<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Leave;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $leaves = Leave::latest()->get();
        return view('admin.leave.index', compact('leaves'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $leaves = Leave::latest()->where('user_id', auth()->user()->id)->get();
        return view('admin.leave.create', compact('leaves'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'from' => 'required',
            'to' => 'required',
            'description' => 'required',
            'type' => 'required'
        ]);
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        $data['message'] = '';
        $data['status'] = 0;
        Leave::create($data);
        return redirect()->back()->with('message', 'Leave Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $leave = Leave::find($id);
        return view('admin.leave.edit', compact('leave'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'from' => 'required',
            'to' => 'required',
            'description' => 'required',
            'type' => 'required'
        ]);
        $data = $request->all();
        $leave = Leave::find($id);
        $data['user_id'] = auth()->user()->id;
        $data['message'] = '';
        $data['status'] = 0;
        $leave->update($data);
        return redirect()->route('leaves.create')->with('message', 'Leave Updated');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $leave = Leave::find($id)->delete();
        return redirect()->back()->with('message', 'Leave Deleted');
    }

    public function acceptReject(Request $request, $id)
    {
        $status = $request->status;
        $messag = $request->message;
        $leave = Leave::find($id);
        $leave->update([
            'status' => $status,
            'message' => $messag
        ]);
        return redirect()->route('leaves.index')->with('message', 'Leave Updated');
    }
}
