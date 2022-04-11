<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Http;

class CovidDataRepository
{

	private $api = "https://covid19.mathdro.id/api";

	/**
	 * Get Global Cases Data 
	 * 
	 */
	public function globalCases()
	{
		return Http::withoutVerifying()->get($this->api);
	}

   /**
   * Get List of Countries data using mathdro countries API
   * 
   */
	public function countries()
	{
		return Http::withoutVerifying()->get($this->api.'/countries')->json();
	}

	/**
   	* Get data for specific country using mathdro countries API
   	* 
   	*/
	public function country($name)
	{
		return Http::withoutVerifying()->get($this->api.'/countries/'.$name);
	}
}