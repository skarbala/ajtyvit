<?php

namespace App\Http\Controllers;

use App\Vacation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VacationController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vacation.list')->with('vacations', Auth::user()->getVacations());
    }

    public function create()
    {
        return view('vacation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $vacationDays = $this->countDaysOfVacation($request->vacation_from, $request->vacation_to);

        $this->validate($request, [
            'vacation_from' => 'required',
            'vacation_to' => 'required|after:vacation_from',
        ]);

        if ($vacationDays > Auth::user()->getDaysOfVacationLeft()) {
            return redirect('/new_vacation')->withErrors(['msg' => 'mas malo dovolenky']);
        }
        Vacation::create([
            'vacation_from' => $request['vacation_from'],
            'vacation_to' => $request['vacation_to'],
            'user_id' => Auth::user()->id,
            'days_of_vacation' => $this->countDaysOfVacation($request['vacation_from'], $request['vacation_to']),
            'status_id' => 1,
        ]);
        return redirect()->action('HomeController@index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        return view('vacation.detail')->with('vacation', Vacation::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


    public function declineVacation($id)
    {
        $vacation = Vacation::find($id);
        $vacation->cancelVacation();
        flash('Dovolenka uspesne zamietnuta')->success();
        return redirect('/')->with('vacations', Auth::user()->getVacations());
    }

    public function confirmVacation($id)
    {
        $vacation = Vacation::find($id);
        $vacation->confirmVacation();
        flash('Dovolenka uspesne schvalena')->success();
        return redirect('/')->with('vacations', Auth::user()->getVacations());
    }

    public function cancelVacation($id)
    {
        $vacation = Vacation::find($id);
        $vacation->cancelVacation();
        flash('Dovolenka uspesne stornovana')->success();
        return redirect('/')->with('vacations', Auth::user()->getVacations());
    }

    /**
     * @param $vacation_from
     * @param $vacation_to
     * @return int
     */
    public function countDaysOfVacation($vacation_from, $vacation_to)
    {
        if ($vacation_from == $vacation_to) {
            return 1;
        }
        return Carbon::parse($vacation_to)->diffInDays(Carbon::parse($vacation_from));
    }

    public function admin(){
        $vacation = new Vacation();
        return view('vacation.administration')->with('vacations',$vacation->getSubmittedVacations());
    }

}
