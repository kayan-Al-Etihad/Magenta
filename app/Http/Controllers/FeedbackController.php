<?php

namespace App\Http\Controllers;

use App\Feedback as AppFeedback;
use App\Http\Requests\feedback as RequestsFeedback;
use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Support\Facades\DB;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Front.feedback.feedback');
    }


    public function showinAdminSide()
    {
        $feedbacks = Feedback::all()->where('status' , '==' , '0');
        return view('admin.feedback.index' ,['feedbacks' => $feedbacks]);
    }

    public function aproved()
    {
        $feedbacks = Feedback::all()->where('status' , '==' , '1');
        return view('admin.feedback.aproved' ,['feedbacks' => $feedbacks]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Front.feedback.feedback');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestsFeedback $request)
    {
        // $request->validate([
        //     'name'    =>'required',
        //     'email'     =>'required',
        //     'phone'           =>'required',
        //     'feedback'        =>'required',
        // ]);
        $valdated = $request->all();
        $feedback = Feedback::create($valdated);
        $feedback->save();
        return redirect('Front.feedback.feedback')->with('success' ,'The feedback has been sent successfully');

        // $feedback = new Feedback; 
        // $feedback->name = $request->name;
        // $feedback->email = $request->email;
        // $feedback->phone = $request->phone;
        // $feedback->feedback = $request->feedback;
        // dd($feedback);
        
    }


    public function updateStatus(Request $request, $id){

        $feedback = Feedback::find($id);
    
        $feedback->status = "1";
        $feedback->save();
        return back()->withMessage('feedback form Updated');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Destroy = Feedback::find($id);
        $Destroy->destroy($id);
       return back()->withMessage('feedback form deleted');
    }
}
