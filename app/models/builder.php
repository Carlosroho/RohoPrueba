<?php


class Builder  {


    public static function callFactory($type, $name)
    {
       

       return Factory::create($type, $name);

    }


    public static function checkdata($u,$g)
    {
       return Factory::desing($u,$g);
    }






}