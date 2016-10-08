<?php
/**
 * Created by PhpStorm.
 * User: Roy
 * Date: 8-10-2016
 * Time: 16:01
 */
require 'vendor/autoload.php';

use GuzzleHttp\Client;

$tekst = "Een tekst met pseuso-json. Hebben we resultaat?<br/>";

echo $tekst;
// Create a client with a base URI
$client = new Client([
    // Base URI is used with relative requests
    'base_uri' => 'http://crassus-php.azurewebsites.net',
    // You can set any number of default request options.
    'timeout'  => 10.0,
]);

$response = $client->get('http://crassus-php.azurewebsites.net/jayson/blabla.html');

$code = $response->getStatusCode(); // kan 200 zijn
$reason = $response->getReasonPhrase(); // OK

if ($response->hasHeader('Content-Length')) {
    echo "Ja<br/>Code:",$code,"<br/>Reason:",$reason;
} else {
    echo "Nee</br>Code:\",$code,\"<br/>Reason:\",$reason";
}

$client = new MongoDB\Client("mongodb://crassus:0ur0b0r0s@ds046939.mlab.com:46939");
$collection = $client->crassus->questions;
$cursor = $collection->find( [ 'question_nr' => 1 ] );
foreach ($cursor as $doc) {
    var_dump($doc);
}
/*$cursor = $collection->insertOne(
    [
        'question_nr' => 99,
        'question' => 'Does this work?'
    ]
);*/
//echo "Wat hebben we hier '{$cursor->getInsertedId()}'";

?>