<?php

namespace App\Services;

use App\Repositories\ClubRepository;
use App\Services\Interfaces\ClubServiceInterface;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class ClubService implements ClubServiceInterface
{
    /**
     * @var $clubRepository
     */
    protected $clubRepository;

    /**
     * ClubService constructor.
     * @param ClubRepository $clubRepository
     */
    public function __construct(ClubRepository $clubRepository)
    {
        $this->clubRepository = $clubRepository;
    }

    public function getAll(){
        return $this->clubRepository->getAllClub();
    }

    /**
     * @param $data
     * @return mixed
     */
    public function storeClubData($data)
    {
       return $this->clubRepository->save($data);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return $this->clubRepository
                    ->with('players', 'coach')
                    ->getById($id);
    }

    /**
     * @param $data
     * @param $id
     * @return mixed
     */
    public function updateClubById($data, $id)
    {
        return $this->clubRepository->updateById($id, $data);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function deleteClub($id)
    {
        return $this->clubRepository->deleteById($id);
    }
}
