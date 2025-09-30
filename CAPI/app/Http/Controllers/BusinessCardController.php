<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BusinessCard;

class BusinessCardController extends Controller
{
    public function show($id)
    {
        $card = BusinessCard::findOrFail($id);
        return view('business-cards.show', compact('card'));
    }
}
