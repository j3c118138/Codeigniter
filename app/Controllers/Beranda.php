<?php
namespace App\Controllers;

class Beranda extends BaseController {
    public function index() {
        echo view('header_v');
        echo view('beranda_v'); //beranda untuk view
        echo view('footer_v');
    }
}