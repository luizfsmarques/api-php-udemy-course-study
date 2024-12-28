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
//     "Authorization: Client-ID aL58kfEBsAL5xB1doWZqfj9yHncBArG8ANCEL4fAnyI"
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
//     "Authorization: Client-ID aL58kfEBsAL5xB1doWZqfj9yHncBArG8ANCEL4fAnyI"
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

$ch = curl_init();
$headers = [
    "Authorization: Client-ID aL58kfEBsAL5xB1doWZqfj9yHncBArG8ANCEL4fAnyI"
];
curl_setopt_array(
    $ch,
    [
        CURLOPT_URL=>"https://api.unsplash.com/photos/random",
        CURLOPT_RETURNTRANSFER=>true,
        CURLOPT_HTTPHEADER=>$headers,
        CURLOPT_HEADER=>true
    ]
);
$response = curl_exec($ch);
$status_code = curl_getinfo($ch,CURLINFO_HTTP_CODE);
$content_type = curl_getinfo($ch,CURLINFO_CONTENT_TYPE);
$content_length = curl_getinfo($ch,CURLINFO_CONTENT_LENGTH_DOWNLOAD);
curl_close($ch);

echo "Status code: " . $status_code, "\n";
echo "Content type: " . $content_type, "\n";
echo "Content length: " . $content_length, "\n";
echo "Response: ". $response, "\n";
