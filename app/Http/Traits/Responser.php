<?php

namespace App\Traits;
use Session;

trait Responser
{
    protected function success($data)
    {   
        Session::flash('success', $data);
    }

    protected function error($data)
    {
        Session::flash('error', $data);
    }
}
