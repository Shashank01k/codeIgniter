<?php

namespace App\Repositories;

use App\Models\States;

// class StateRepository implements StateRepositoryInterface
// {
//     public function getAllStatesByCountryID(int $countryID) : States
//     {
//         $statesModel = new States;
//         $statesModel->where('country_id',$countryID);
//         $statesData = $statesModel->get();
//         return $statesData;
//     }
// }
class StateRepository
{
    public function getAllStatesByCountryID(int $countryID) : States
    {
        $statesModel = new States;
        $statesData = $statesModel->where('country_id',$countryID)->get();
        return $statesData;
    }
}