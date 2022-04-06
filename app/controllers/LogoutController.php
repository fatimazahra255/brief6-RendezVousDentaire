<?php

class LogoutController
{

    public function index()
    {
        if (isLoggedIn()) {
            session_destroy();
            $_SESSION = null;
        }
        return redirect("home");
        view("Rendezvous");
    }
}
