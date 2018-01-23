<?php
/**
 * Created by PhpStorm.
 * User: ZeLiBoBaS
 * Date: 1/9/18
 * Time: 02:43
 */

namespace App;


class Menu
{
static public function render() {
    $lalala = Ad::all();

    return view('layouts.test', compact('lalala'));

}
}