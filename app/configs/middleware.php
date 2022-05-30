<?php

class Middleware
{
    static public function auth()
    {
        if (!isLoggedIn()) {
            return redirect("/login");
        }
        return true;
    }


    static public function assign($instance, $methods, $middlewareName)
    {
        $arr = [];
        foreach ($methods as $method) {
            $arr[$method] = $middlewareName;
        }
        $instance->{MIDDLEWARE} = $arr;
    }
}
