<?php
/*
    Class 5
    Get the response of a server by code php
*/

// $response = file_get_contents("https://example.com");
// $response = file_get_contents("https://randomuser.me/api");
// echo $response;

/*
    Class 6
    Decoding the JSON response in PHP object and in an associative array
*/

// $response = file_get_contents("https://randomuser.me/api");

// $data = json_decode($response); //to PHP object
// $data = json_decode($response,true); //to associative array

// var_dump($data);
// echo $data['results'][0]['name']['first'],"\n";

/*
    Class 7
    We got a name from a form, after called an api, decoded the JSON response and at the 
    end displayed the result on page.

    Obs.: Don't forget that you using the open tag <?php, at the beggining of the file.
*/

if(!empty($_GET['name']))
{
    $response = file_get_contents("https://api.agify.io?name={$_GET['name']}");
    $data = json_decode($response,true);
    $name = $data['name'];
    $age = $data['age'];
}

?>

<!DOCTYPE html>

<html>
    <head>
        <title>Example</title>
    </head>
    <body>

        <?php if(isset($name) && isset($age)): ?>
            Name:<?= $name ?>
            </br>
            Age: <?= $age ?>
        <?php endif; ?>
        
        </br>
        </br>
        <form>
            <label for="name">Name</label>
            <input name="name" id="name">
            <button>Guess age</button>
        </form>
    </body>


</html>