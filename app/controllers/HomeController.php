<?php

class HomeController
{


    public function __construct()
    {
       
    }
    public function index()
    {

        
            view("home");

        // ??????????????????????????????????????????????????????????????????????????

        // $reference =  $_POST["reference"];
        // if (isPostRequest() && verify(["reference"], $_POST)) {
        //     $patient = $this->patientModel->fetchOne("where reference = :reference", ["reference" => $reference]);


        //     if (!$patient || $patient["reference"] !== $_POST["reference"]) {
                
        //         return view("login");
        //     }
        //     else
        //     {
        //         echo("hellooo");
        //     }


            //     createUserSession($user);
            //     if(isAdmin())
            // 
            //         return redirect("/voyage");
            //     }
            //     return redirect("/");
        }
        // else {
        // //     return view("login");
        // // }

    }
// 
