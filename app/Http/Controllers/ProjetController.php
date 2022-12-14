<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projet;

class ProjetController extends Controller
{
    //
    function addprojet(Request $req)
    {
        $projet = new Projet;
        $projet->name=$req->input('name');
        $projet->client=$req->input('client');
        $projet->activite=$req->input('activite');
        $projet->objectif=$req->input('objectif');
        $projet->percentage=$req->input('percentage');
        $projet->commentaire=$req->input('commentaire');
        $projet->date=$req->input('date');
        $projet->eq=$req->input('eq');
        $projet->categ1=$req->input('categ1');
        $projet->categ2=$req->input('categ2');
        $projet->save();
        return $projet;
    }

    function listp()
    {
        return Projet::all();
    }
    function delete($id)
    {
        $result = Projet:: where('id',$id)->delete();
        if($result)
        {
            return["result"=>"Projet a ete bien supprimer"];
        }
    }
    function getProjet()
    {
        return Projet::find($id);
    }
    function updateProjet()
    {
        $projet =Projet::find($id);
        $projet->name=$req->input('name');
        $projet->client=$req->input('client');
        $projet->activite=$req->input('activite');
        $projet->objectif=$req->input('objectif');
        $projet->percentage=$req->input('percentage');
        $projet->commentaire=$req->input('commentaire');
        $projet->date=$req->input('date');
        $projet->eq=$req->input('eq');
        $projet->categ1=$req->input('categ1');
        $projet->categ2=$req->input('categ2');
        $projet->save();
        return $projet;
    }
    function searchp($Key)
    {
        return Projet::where('name','Like',"%$Key%")->get();
    }
}
