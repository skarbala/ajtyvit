<?php

namespace App\Http\Controllers;

use App\Vacation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Nuxia\BusinessDayManipulator\DatePeriod;
use Nuxia\BusinessDayManipulator\LocalizedManipulator;
use Nuxia\BusinessDayManipulator\Manipulator;

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
        $this->validate($request, [
            'vacation_from' => 'required',
            'vacation_to' => 'required|after_or_equal:vacation_from',
        ]);

        $vacationDays = $this->countDaysOfVacation($request->vacation_from, $request->vacation_to);

        if ($vacationDays == 0){
            return redirect()->back()->withErrors(['msg' => 'netreba ti dovolenku']);
        }
        if ($vacationDays > Auth::user()->getDaysOfVacationLeft()) {
            return redirect()->back()->withErrors(['msg' => 'mas malo dovolenky']);
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
        return redirect()->back();
    }

    public function confirmVacation($id)
    {
        $vacation = Vacation::find($id);
        $vacation->confirmVacation();
        flash('Dovolenka uspesne schvalena')->success();
        return redirect()->back();
    }

    public function cancelVacation($id)
    {
        $vacation = Vacation::find($id);
        $vacation->cancelVacation();
        flash('Dovolenka uspesne stornovana')->success();
        return redirect()->back();
    }

    /**
     * @param $vacation_from
     * @param $vacation_to
     * @return int
     */
    public function countDaysOfVacation($vacation_from, $vacation_to)
    {
        $holidays = [
            new DatePeriod(new \DateTime('2017-12-24'), new \DateTime('2017-12-26')),
            new DatePeriod(new \DateTime('2018-12-24'), new \DateTime('2018-12-26')),
        ];

        $freeDays = [
            new \DateTime('2017-01-01'),
            new \DateTime('2017-01-06'),
            new \DateTime('2017-04-14'),
            new \DateTime('2017-04-17'),
            new \DateTime('2017-05-01'),
            new \DateTime('2017-05-08'),
            new \DateTime('2017-07-05'),
            new \DateTime('2017-08-29'),
            new \DateTime('2017-09-01'),
            new \DateTime('2017-09-15'),
            new \DateTime('2017-11-01'),
            new \DateTime('2017-11-17'),
        ];

        $freeWeekDays = [
            Manipulator::SATURDAY,
            Manipulator::SUNDAY
        ];

        $manipulator = new Manipulator($freeDays, $freeWeekDays, $holidays);


        $manipulator->setStartDate(new \DateTime($vacation_from));
        $manipulator->setEndDate(new \DateTime($vacation_to));

        return  $manipulator->getBusinessDays();
    }

    public function admin()
    {
        $vacation = new Vacation();
        return view('vacation.administration')->with('vacations', $vacation->getSubmittedVacations());
    }

}
