<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller {

public function welcome() {
    return view('index', [
        'title' => 'Portfolio Projector',
        'totalCryptoWorthSentence' => session('totalCryptoWorthSentence', null),
        'cryptoOneSentence' => session('cryptoOneSentence', null),
        'cryptoTwoSentence' => session('cryptoTwoSentence', null),
        'cryptoThreeSentence' => session('cryptoThreeSentence', null),
        'amountOfCryptos' => session('amountOfCryptos', null),
    ]);
}

public function calculate(Request $request) {

    // Validation for all input fields based on how many cryptocurrencies is selected
    $amountOfCryptos = $request->input('amountOfCryptos', '1');
    if ($amountOfCryptos >= 1) {
        $request->validate([
            'cryptoNameOne' => 'required|alpha:ascii',
            'cryptoQuantityOne' => 'required|numeric',
            'cryptoPriceOne' => 'required|numeric',
        ]);
    }
    if ($amountOfCryptos >= 2) {
        $request->validate([
            'cryptoNameTwo' => 'required|alpha:ascii',
            'cryptoQuantityTwo' => 'required|numeric',
            'cryptoPriceTwo' => 'required|numeric',
        ]);
    }
    if ($amountOfCryptos == 3) {
        $request->validate([
            'cryptoNameThree' => 'required|alpha:ascii',
            'cryptoQuantityThree' => 'required|numeric',
            'cryptoPriceThree' => 'required|numeric',
        ]);
    }
    
    // Get form data
    $cryptoNameOne = $request->input('cryptoNameOne', '');
    $cryptoQuantityOne = $request->input('cryptoQuantityOne', 0);
    $cryptoPriceOne = $request->input('cryptoPriceOne', 0);
    $cryptoNameTwo = $request->input('cryptoNameTwo', '');
    $cryptoQuantityTwo = $request->input('cryptoQuantityTwo', 0);
    $cryptoPriceTwo = $request->input('cryptoPriceTwo', 0);
    $cryptoNameThree = $request->input('cryptoNameThree', '');
    $cryptoQuantityThree = $request->input('cryptoQuantityThree', 0);
    $cryptoPriceThree = $request->input('cryptoPriceThree', 0);

    // Do calculation
    $cryptoValueOne = $cryptoQuantityOne*$cryptoPriceOne;
    $cryptoValueTwo = $cryptoQuantityTwo*$cryptoPriceTwo;
    $cryptoValueThree = $cryptoQuantityThree*$cryptoPriceThree;

    $cryptoOneSentence = strval($cryptoQuantityOne).' '.$cryptoNameOne.' at a price of $'.strval($cryptoPriceOne).' is worth $'.strval($cryptoValueOne);
    $cryptoTwoSentence = strval($cryptoQuantityTwo).' '.$cryptoNameTwo.' at a price of $'.strval($cryptoPriceTwo).' is worth $'.strval($cryptoValueTwo);
    $cryptoThreeSentence = strval($cryptoQuantityThree).' '.$cryptoNameThree.' at a price of $'.strval($cryptoPriceThree).' is worth $'.strval($cryptoValueThree);

    // total worth of all user cryptocurrencies
    $totalCryptoWorth = $cryptoValueOne + $cryptoValueTwo + $cryptoValueThree;
    $totalCryptoWorthSentence = 'The total projected worth of your portfolio is: $'.strval($totalCryptoWorth);

    return redirect('/')->with([
        'totalCryptoWorthSentence' => $totalCryptoWorthSentence,
        'cryptoOneSentence' => $cryptoOneSentence,
        'cryptoTwoSentence' => $cryptoTwoSentence,
        'cryptoThreeSentence' => $cryptoThreeSentence,
        'amountOfCryptos' => $amountOfCryptos,
    ])->withInput();
}

}