<?php

class LogoutController
{
    public function __construct()
    {
        Middleware::assign($this, ["index"], "auth");
    }

    public function index()
    {
        logout();
        return redirect("/login");
    }
}
