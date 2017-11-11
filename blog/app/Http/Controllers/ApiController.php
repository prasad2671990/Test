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
	
	
public function search(){
	
    $q = Input::get ( 'q' );
    $display = Api::where('name','LIKE','%'.$q.'%')->get();
    if(count($display) > 0)
        return view('display')->withDetails($display)->withQuery ( $q );
    else return view ('display')->withMessage('No Details found. Try to search again !');

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
