<?php

namespace App\Http;
use App\Ad;
use Illuminate\View\View;


class MainComposer
{

    public function composeAds(View $view)
    {
        $lalala = Ad::all();
        $view->with('lalala', $lalala);
    }

    public function composeMenu(View $view)
    {
        $lalala = Ad::all();
        $view->with('lalala', $lalala);
    }


}