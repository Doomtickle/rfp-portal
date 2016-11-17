<?php
use App\ProposalRequest;

/**
 * Created by Daron Adkins.
 * Date: 11/6/16
 * @param $title
 * @param $message
 * @return \Illuminate\Foundation\Application|mixed
 */

function flash($title = null, $message = null)
{
    $flash = app('App\Http\Flash');

    if (func_num_args() == 0) {
        return $flash;
    }

    return $flash->info($title, $message);

}