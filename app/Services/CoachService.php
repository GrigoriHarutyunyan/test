<?php

namespace App\Services;

use App\Repositories\CoachRepository;
use App\Services\Interfaces\CoachServiceInterface;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;



class CoachService implements CoachServiceInterface
{
    /**
     * @var CoachRepository
     */
    private $coachRepository;

    /**
     * @param CoachRepository $coachRepository
     */
    public function __construct(CoachRepository $coachRepository)
    {
        return $this->coachRepository = $coachRepository;
    }

    /**
     * @return mixed
     */
    public function getAllCoaches()
    {
       return $this->coachRepository->getAll();
    }

    /**
     * @return mixed
     */
    public function getClubs()
    {
        return $this->coachRepository->getClubForCoaches();
    }

    /**
     * @param $data
     * @return mixed
     */
    public function saveCoach($data)
    {
        return $this->coachRepository->saveCoach($data);
    }

    /**
     * @param $id
     * @return CoachRepository[]|\Illuminate\Database\Eloquent\Collection|mixed
     */
    public function showCoach($id)
    {
        return $this->coachRepository
            ->with('club')
            ->getCoachById($id);
    }

    /**
     * @param $data
     * @param $id
     * @return mixed
     */
    public function updateCoach($data, $id)
    {
        return $this->coachRepository->updateById($id, $data);
    }

    /**
     * @param $id
     * @return mixed|void
     */
    public function deleteCoach($id)
    {
        return $this->coachRepository->deleteById($id);
    }

}
