<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notes;

class NotesController extends Controller
{
    //
    function ajounotes(Request $req)
    {
        $notes = new Notes;
        $notes->prenom=$req->input('prenom');
        $notes->nom=$req->input('nom');
        $notes->periode=$req->input('periode');
        $notes->date=$req->input('date');
        $notes->nomf=$req->input('nomf');
        $notes->carburant=$req->input('carburant');
        $notes->transport=$req->input('transport');
        $notes->hotel=$req->input('hotel');
        $notes->fourniture=$req->input('fourniture');
        $notes->entretien=$req->input('entretien');
        $notes->divers=$req->input('divers');
        $notes->montant=$req->input('montant');
        $notes->tva=$req->input('tva');
        $notes->montantttc=$req->input('montantttc');
        $notes->avancer=$req->input('avancer');
        $notes->notef=$req->input('notef');
        $notes->datevirement=$req->input('datevirement');
        $notes->save();
        return $notes;
    }
    function listn()
    {
        return Notes::all();
    }
    function deleten($id)
    {
        $result = Notes:: where('id',$id)->delete();
        if($result)
        {
            return["result"=>"Notes a ete bien supprimer"];
        }
    }
    function getNotes()
    {
        return Notes::find($id);
    }
}
