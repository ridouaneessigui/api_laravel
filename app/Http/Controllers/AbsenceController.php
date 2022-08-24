<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absence;

class AbsenceController extends Controller
{
    //
    function ajouabsence(Request $req)
    {
        $absence = new Absence;
        $absence->debut=$req->input('debut');
        $absence->fin=$req->input('fin');
        $absence->du=$req->input('du');
        $absence->au=$req->input('au');
        $absence->statut=$req->input('statut');
        $absence->type=$req->input('type');
        $absence->justificatif=$req->input('justificatif');
        $absence->commentaire=$req->input('commentaire');
        $absence->save();
        return $absence;
    }
    function lista()
    {
        return Absence::all();
    }
    function deletea($id)
    {
        $result = Absence:: where('id',$id)->delete();
        if($result)
        {
            return["result"=>"Absence a ete bien supprimer"];
        }
    }
    function getAbsence()
    {
        return Absence::find($id);
    }
}
