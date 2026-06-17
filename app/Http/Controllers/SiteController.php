<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index() { return view('site.index'); }
    public function features() { return view('site.features'); }
    public function documentation() { return view('site.documentation'); }
    public function pricing() { return view('site.pricing'); }
    public function security() { return view('site.security'); }
    public function contact() { return view('site.contact'); }
}
