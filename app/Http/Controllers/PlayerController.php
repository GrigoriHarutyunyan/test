<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlayerRequest;
use App\Services\Interfaces\PlayerServiceInterface;
use App\Services\PlayerService;
use Illuminate\Http\Request;

class PlayerController extends Controller
{

    /**
     * @var PlayerService
     */
    private $playerService;

    /**
     * @param PlayerService $playerService
     */
    public function __construct(PlayerServiceInterface $playerService){
        $this->middleware('moderator')->only([
            'create',
            'edit',
        ]);
        $this->playerService = $playerService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $players = $this->playerService->getAllPlayers();
        }catch (Exception $e){
            $players = [
                'status'=> 500,
                'message' => $e->getMessage(),
            ];
        }

        return view('Player.index', compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $clubs = $this->playerService->getClubsForPlayer();
        return view('player.create', compact('clubs'));
    }

    /**
     * @param PlayerRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PlayerRequest $request)
    {
        $data = $request->all();

        try{
            $this->playerService->storePlayerData($data);
        }catch (\Exception $e){
            $player = [
                'status'=>500,
                'message'=> $e->getMessage(),
            ];
        }
        return redirect()->route('player.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $player = $this->playerService->getPlayerById($id);
        }catch (Exception $e){
            $player = [
                'status'=> 500,
                'message'=> $e->getMessage(),
            ];
        }

        return view('player.show', compact('player'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $player = $this->playerService->getPlayerById($id);
        $clubs = $this->playerService->getClubsForPlayer();
        return view('player.edit', compact('player', 'clubs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PlayerRequest $request, $id)
    {
        $data = $request->all();
        try{
           $this->playerService->updatePlayer($data, $id);
        }catch(Exception $e){
            $player = [
                'status' => 500,
                'error' => $e->getMessage(),
            ];
        }
//        dd($p);
        return redirect()->route('player.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
             $this->playerService->deletePlayer($id);
        }catch(Exception $e){
            $player = [
                'status' => 500,
                'error' => $e->getMessage(),
            ];
        }
        return redirect()->route('player.index');
    }
}
