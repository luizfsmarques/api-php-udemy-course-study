<?php
/*
    Class 8
    Get the response of a server by code php, using cURL
*/

// //We can pass the url as an argument
// // $ch = curl_init("https://randomuser.me/api");

// $ch = curl_init(); //To start curl session

// //To set up the options
// // curl_setopt($ch,CURLOPT_URL,"https://randomuser.me/api");
// // curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

// curl_setopt_array(
//     $ch,
//     [
//         CURLOPT_URL=>"https://randomuser.me/api",
//         CURLOPT_RETURNTRANSFER=>true
//     ]
// );

// $response = curl_exec($ch); //To excute the curl call to the API

// curl_close($ch); //Close the curl session to avoid waste of system resources.

// echo $response, "\n";

/*
    Class 9
    Getting status code from the response
*/

// $ch = curl_init();
// curl_setopt_array(
//     $ch,
//     [
//         // CURLOPT_URL=>"https://randomuser.me/api",
//         // CURLOPT_URL=>"https://api.openweathermap.org/data/2.5/weather?q=London",
//         CURLOPT_URL=>"https://api.openweathermap.org/data/2.5/weather?lat=-21.73548&lon=-41.30920&appid=16d2330220b4fcda9b069859fa2d757c",
//         CURLOPT_RETURNTRANSFER=>true
//     ]
// );
// $response = curl_exec($ch);
// $status_code = curl_getinfo($ch,CURLINFO_HTTP_CODE);
// curl_close($ch);
// echo $status_code,"\n";
// echo $response, "\n";

/*
    Class 10
    Add headers to a HTTP request
*/

// $ch = curl_init();
// $headers = [
//     "Authorization: Client-ID API_KEY"
// ];
// curl_setopt_array(
//     $ch,
//     [
//         CURLOPT_URL=>"https://api.unsplash.com/photos/random",
//         CURLOPT_RETURNTRANSFER=>true,
//         CURLOPT_HTTPHEADER=>$headers
//     ]
// );
// $response = curl_exec($ch);
// $status_code = curl_getinfo($ch,CURLINFO_HTTP_CODE);
// curl_close($ch);
// echo $status_code,"\n";
// echo $response,"\n";


/* My exercise - Showing the random img into a page view. */
// $ch = curl_init();
// $headers = [
//     "Authorization: Client-ID API_KEY"
// ];
// curl_setopt_array(
//     $ch,
//     [
//         CURLOPT_URL=>"https://api.unsplash.com/photos/random",
//         CURLOPT_RETURNTRANSFER=>true,
//         CURLOPT_HTTPHEADER=>$headers
//     ]
// );
// $response = curl_exec($ch);
// $status_code = curl_getinfo($ch,CURLINFO_HTTP_CODE);
// curl_close($ch);
// $data = json_decode($response,true);
// $img = $data['urls']['small'];
//Here I close the php tag

/*
    Class 11
    Getting the headers of the response
*/

// $ch = curl_init();
// $headers = [
//     "Authorization: Client-ID API_KEY"
// ];
// curl_setopt_array(
//     $ch,
//     [
//         CURLOPT_URL=>"https://api.unsplash.com/photos/random",
//         CURLOPT_RETURNTRANSFER=>true,
//         CURLOPT_HTTPHEADER=>$headers, //This is to enable us to pass the request headers. We put the headers into an array.
//         CURLOPT_HEADER=>true //This is to set up to get the response headers
//     ]
// );
// $response = curl_exec($ch);
// $status_code = curl_getinfo($ch,CURLINFO_HTTP_CODE);
// $content_type = curl_getinfo($ch,CURLINFO_CONTENT_TYPE);
// $content_length = curl_getinfo($ch,CURLINFO_CONTENT_LENGTH_DOWNLOAD);
// curl_close($ch);

// echo "Status code: " . $status_code, "\n";
// echo "Content type: " . $content_type, "\n";
// echo "Content length: " . $content_length, "\n";
// echo "Response: ". $response, "\n";

/*
    Class 12
    Putting the each header of response, into array
*/

// $ch = curl_init();
// $headers = [
//     "Authorization: Client-ID API_KEY"
// ];

// $response_headers = [];
// // $header_callback = function($ch,$header) use (&$response_headers){ //This only put the header into array
// //     $len = strlen($header);
// //     $response_headers[] = $header;
// //     return $len;
// // };
// $header_callback = function($ch,$header) use (&$response_headers){ //Here we put the header's name as key and the header's content as value of array
//     $len =strlen($header);
//     $parts = explode(":",$header,2);
//     if(count($parts)<2)
//     {
//         return $len;
//     }
//     $response_headers[$parts[0]] = trim($parts[1]);
//     return $len;
// };
// curl_setopt_array(
//     $ch,
//     [
//         CURLOPT_URL=>"https://api.unsplash.com/photos/random",
//         CURLOPT_RETURNTRANSFER=>true,
//         CURLOPT_HTTPHEADER=>$headers, 
//         CURLOPT_HEADERFUNCTION=>$header_callback
//     ]
// );
// $response = curl_exec($ch);
// $status_code = curl_getinfo($ch,CURLINFO_HTTP_CODE);
// curl_close($ch);

// echo "Status code: " . $status_code, "\n";
// print_r($response_headers);
// echo "Response: ". $response, "\n";


/* 
    Class 13
    Putting specific request headers required by the API we are using.
*/

$ch = curl_init();
$headers = [
    // "Authoriazação aqui
    "User-Agent: luizfsmarques"
];
curl_setopt_array(
    $ch,
    [
        CURLOPT_URL=>"https://api.github.com/user/starred/{owner}/{repo}",
        CURLOPT_RETURNTRANSFER=>true,
        CURLOPT_HTTPHEADER=>$headers, 
        // CURLOPT_USERAGENT=> "luizfsmarques",
    ]
);
$response = curl_exec($ch);
$status_code = curl_getinfo($ch,CURLINFO_HTTP_CODE);
curl_close($ch);

echo "Status code: " . $status_code, "\n";
echo "Response: ". $response, "\n";
