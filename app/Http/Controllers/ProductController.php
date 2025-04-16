<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function showSamsung()
    {
        return view('samsung'); 
    }

    public function showLG()
    {
        return view('lg');
    }

    public function showSony()
    {
        return view('sony');
    }

    public function showPanasonic()
    {
        return view('panasonic');
    }

    public function showApple()
    {
        return view('apple');
    }

    public function showXiaomi()
    {
        return view('xiaomi');
    }

    public function showBelkin()
    {
        return view('belkin');
    }

    public function showRapoo()
    {
        return view('rapoo');
    }

    public function showMicrosoft()
    {
        return view('microsoft');
    }

    public function showDeka()
    {
        return view('deka');
    }

    public function showHaier()
    {
        return view('haier');
    }

    public function showRombam()
    {
        return view('rombam');
    }

    public function showNescafe()
    {
        return view('nescafe');
    }

    public function showKhind()
    {
        return view('khind');
    }

    public function showSharp()
    {
        return view('sharp');
    }

    public function showOgawa()
    {
        return view('ogawa');
    }

    public function showLaifen()
    {
        return view('laifen');
    }

    public function showAqara()
    {
        return view('aqara');
    }

    public function showUniq()
    {
        return view('uniq');
    }

    public function showFaber()
    {
        return view('faber');
    }

    public function showKdk()
    {
        return view('kdk');
    }

    public function showUnknown()
    {
        return view('unknown');
    }
}
