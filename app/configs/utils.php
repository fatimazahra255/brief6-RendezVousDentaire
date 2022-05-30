<?php

use Jenssegers\Blade\Blade;

/**
 * retour fichier view  
 * @param string $path chemin du fichier view après /resources/views
 * @param array $data tableau à décompresser dans view(html)
 */
function view($path, $data = [])
{

    extract($data);
    $path = ltrim($path, "/");
    include dirname(__DIR__) . "/resources/views/$path.php";
}

function bladeView($path, $data = [])
{
    $views = dirname(__DIR__) . "/resources/views";
    $cache = dirname(__DIR__) . "/cache/views";

    $blade = new Blade($views, $cache);

    echo $blade->render($path, $data);
}

function json($data = [])
{
    header("Content-Type: application/json");
    echo json_encode($data);
}


function component($path, $data = [])
{
    view("/components/$path", $data);
}



/**
 * vérifier si la requête entrante est en méthode POST
 */
function isPostRequest()
{
    return $_SERVER["REQUEST_METHOD"] == "POST";
}




/**
 * vérifier si le tableau a des champs obligatoires
 * @param array $requiredFields champs obligatoires
 * @param array $data tableau associatif de données
 * 
 * @return bool
 */
function verify($requiredFields, $data): bool
{
    foreach ($requiredFields as $field) {
        if (empty($data[$field])) {
            return false;
        }
    }
    return true;
}




/**
 * vérifier si l'utilisateur est connecté ou non
 * @return [type] 
 */
function isLoggedIn()
{
    if (!isset($_SESSION)) {
        session_start();
    }
    return isset($_SESSION[MAIN_PATIENT_KEY]) && !empty($_SESSION[MAIN_PATIENT_KEY]);
}


function logout(){
    isLoggedIn();
    session_destroy();
}







// /**
//  * obtenir le rôle de l'utilisateur actuel
//  * @return [type]
//  */
function currentUserRole()
{
    if (!isLoggedIn()) return null;
    return $_SESSION["role"];
}


/**
 * retourne "reference" de patient actuel à partir du tableau de $_SESSION
 */
function currentPatientRef()
{
    isLoggedIn();
    return $_SESSION[MAIN_PATIENT_KEY] ?? null; // nullish coalascing  
}

/** 
 * créer une session pour patient par son reference
 */
function createPatientSession($patient)
{
    if (!isset($_SESSION)) {
        session_start();
    }
    $_SESSION[MAIN_PATIENT_KEY] = $patient[MAIN_PATIENT_KEY];
    $_SESSION["currentPatient"] = $patient;
}

function currentPatient(){
    if(!isLoggedIn()) return null;
    return $_SESSION["currentPatient"];
}






/**
 * redirect vers un chemin spécifié 
 * @param string $path chemin aprés /{PROJECT_NAME}/
 * 
 * @return [type]
 */
function redirect($path)
{
    $path = trim($path, "/");
    header("location: /" . PROJECT_NAME . "/$path");
}


/**
 * générer une chaîne aléatoire avec une longueur choisie
 * @param int $length
 * 
 * @return [type]
 */
function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}



/**
 * créez un lien après /{PROJECT_NAME}/
 * @param mixed $path
 * 
 * @return [type]
 */
function createLink($path)
{
    $path = trim($path, "/");
    return "/" . PROJECT_NAME . "/$path";
}
