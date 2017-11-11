<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GrahamCampbell\GitHub\Facades\GitHub;
use GuzzleHttp\Client;
use App\Api;
include_once(base_path()
 . '\vendor\autoload.php');

class ApiController extends Controller
{
   
public function display(){
		$apiDetails = Api::paginate(25);
		return view ( 'display' )->withDetails($apiDetails);
	}
	
	
	public function fetch()
{
  $username = \Auth::user()->username;

  $channels = Channel::where('channel', $username)->orderBy('created_at', 'desc')->take(3)->get();

  // Return as json
  return Response::json($channels);
}
   
   
   public function saveApiData()
    {
		
		
		$client = new \Github\Client();
$repositories = $client->api('user')->repositories('ornicar');

foreach ($repositories as $repositori) {
    $values = new Api();
    $values->name = $repositori["name"];
    $values->fullname= $repositori["full_name"];
    $values->html_url = $repositori['html_url'];
    $values->description = $repositori['description'];
	$values->url = $repositori['url'];
	$values->size = $repositori['size'];
    $values->save();
}

dd($repositories);
		}
	
}
