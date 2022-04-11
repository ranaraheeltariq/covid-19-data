<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\CovidDataRepository;

class CovidDataController extends Controller
{
    private $covidDataRepository;
  
  public function __construct(CovidDataRepository $covidDataRepository){
    $this->covidDataRepository = $covidDataRepository;
  }

  /**
   * Get Global Cases Data 
   * 
   */
  public function globalCases()
  {
    return $this->covidDataRepository->globalCases();
  }

  /**
   * Get List of Countries data 
   * 
   */
  public function countries()
  {
    return $this->covidDataRepository->countries();
  }

  /**
    * Get data for specific country using mathdro countries API
    * 
    */
    public function country($name)
    {
        return $this->covidDataRepository->country($name);
    }
}
