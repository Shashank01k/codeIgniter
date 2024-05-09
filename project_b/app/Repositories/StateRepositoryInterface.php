<?php

namespace App\Repositories;

use App\Models\States;

interface StateRepositoryInterface
{
    public function getAllStatesByCountryID(int $countryID): States;
}
