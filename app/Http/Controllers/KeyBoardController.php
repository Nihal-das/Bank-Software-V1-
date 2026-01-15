<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KeyBoardController extends Controller
{
    public function show(Request $request)
    {
        $sentences = Str::of("The quick brown fox jumps over the lazy dog.Pack my box with five dozen liquor jugs.How vexingly quick daft zebras jump!Bright vixens jump; dozy fowl quack.Sphinx of black quartz, judge my vow. Jackdaws love my big sphinx of quartz.The five boxing wizards jump quickly.Quick zephyrs blow, vexing daft Jim.Two driven jocks help fax my big quiz.Five quacking zephyrs jolt my wax bed.The jay, pig, fox, zebra, and my wolves quack!Blowzy night-frumps vex'd Jack Q.Cozy lummox gives smart squid who asks for job pen.A quivering Texas zombie fought republic linked jewelry.Heavy boxes perform quick waltzes and jigs. Sixty zippers were quickly picked from the woven jute bag.Crazy Frederick bought many very exquisite opal jewels. We promptly judged antique ivory buckles for the next prize.")->explode(" ")->map(fn($s) => trim($s))->toArray();

        $text = $sentences[array_rand($sentences)];
        $result = null;

        if ($request->has('typed')) {
            $result = $request->typed === $request->session()->get('last_text')
                ? 'PASS'
                : 'FAIL';
        }

        session(['last_text' => $text]);

        return view('keyboard.KeyBoardTest', compact('text', 'result'));
    }
}
