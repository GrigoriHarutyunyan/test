<?php

namespace App\Http\Controllers;

use App\Http\Requests\CoachRequest;
use App\Services\CoachService;
use Illuminate\Http\Request;

class CoachController extends Controller
{
    protected $coachService;
    public function __construct(CoachService $coachService)
    {
        $this->middleware('moderator')->only([
            'create',
            'edit',
        ]);
         $this->coachService = $coachService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $coaches = $this->coachService->getAllCoaches();
        }catch(Exception $e){
            $coaches = [
                'status' => 500,
                'message' => $e->getMessage(),
            ];
        }
       return view('coach.index', compact('coaches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $clubs = $this->coachService->getClubs();
        return view('coach.create', compact('clubs'));
    }

    /**
     * @param CoachRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CoachRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->all();

        try{
            $this->coachService->saveCoach($data);
        }catch(\Exception $e){
            $coach = [
                'status' => 500,
                'message' => $e->getMessage(),
            ];
        }

        return redirect()->route('coach.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(int $id)
    {
        try{
            $coach = $this->coachService->showCoach($id);
        }catch (\Exception $e){
            $coach = [
                'status' => 500,
                'message' => $e->getMessage(),
            ];
        }

        return view('coach.show', compact('coach'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $coach = $this->coachService->showCoach($id);
        $clubs= $this->coachService->getClubs();
        return view('coach.edit', compact('coach', 'clubs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CoachRequest $request, $id)
    {
        $data = $request->all();
        try {
            $this->coachService->updateCoach($data, $id);
        }catch (Exception $e){
            $coach = [
                'status'=>500,
                'message'=> $e->getMessage(),
            ];
        }
        return redirect()->route('coach.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try{
            $this->coachService->deleteCoach($id);
        }catch (\Exception $e){
            $coach = [
                'status'=> 500,
                'message'=> $e->getMessage(),
            ];
        }
        return redirect()->route('coach.index');
    }
}
