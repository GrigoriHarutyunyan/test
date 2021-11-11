<?php

namespace App\Http\Controllers;


use App\Http\Requests\ClubRequest;
use App\Services\ClubService;


class ClubController extends Controller
{

    /**
     * @var ClubService
     */
    private $clubService;

    public function __construct(ClubService $clubService){
        $this->middleware('moderator')->only([
            'create',
            'edit',
        ]);
        $this->clubService = $clubService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $clubs = $this->clubService->getAll();
        }catch(\Exception $e){
            $clubs = [
                'status' => 500,
                'error' => $e->getMessage(),
            ];
        }

        return view('Club.index', compact('clubs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('Club.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ClubRequest $request)
    {
        $data = $request->all();
        try{
            $this->clubService->storeClubData($data);
        }catch(\Exception $e){
            $club = [
                'status' => 500,
                'error' => $e->getMessage(),
            ];
        }
        return redirect()->route('club.index');
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
            $club = $this->clubService->getById($id);
        }catch(Exception $e){
            $club = [
                'status' => '500',
                'error' => $e->getMessage(),
            ];
        }

//        dd($clubs);
        return view('club.show', compact('club'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $club = $this->clubService->getById($id);
        return view('club.edit', compact('club'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ClubRequest $request, $id)
    {
        $data = $request->all();
        try{
            $this->clubService->updateClubById($data, $id);
        }catch(Exception $e){
            $club = [
                'status' => 500,
                'error' => $e->getMessage(),
            ];
        }
        return redirect()->route('club.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            $club = $this->clubService->deleteClub($id);
            }catch(Exception $e){
                $club = [
                    'status' => 500,
                    'error' => $e->getMessage(),
                ];
        }
        return redirect()->route('club.index');
    }
}
