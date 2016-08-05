<?php
namespace App\Controllers;

use App\Controller;

class weatherController extends Controller
{
    public function index()
    {
        $key = "a7454186567d4b09ace90420163105";
        $city = (isset($_POST['city']) ? $_POST['city'] : 'Zwolle');
        $url = "http://api.apixu.com/v1/current.json?key=$key&q=$city&=";

        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

        $json_output=curl_exec($ch);
        $weather = json_decode($json_output);

        $this->set('weather', $weather);
    }    
}
?>
