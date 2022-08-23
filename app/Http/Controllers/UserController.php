<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    //
    function register(Request $req)
    {
        $user=new User;
        $user->nom=$req->input('nom');
        $user->prenom=$req->input('prenom');
        $user->email=$req->input('email');
        $user->pass=Hash::make($req->input('pass'));
        $user->sexe=$req->input('sexe');
        $user->date_naissance=$req->input('date_naissance');
        $user->statu_matrimonial=$req->input('statu_matrimonial');
        $user->nombre_enfant=$req->input('nombre_enfant');
        $user->nationalite=$req->input('nationalite');
        $user->identite=$req->input('identite');
        $user->rue=$req->input('rue');
        $user->codep=$req->input('codep');
        $user->ville=$req->input('ville');
        $user->pays=$req->input('pays');
        $user->tel_p=$req->input('tel_p');
        $user->tel_f=$req->input('tel_f');
        $user->email_perso=$req->input('email_perso');
        $user->contact_urgence=$req->input('contact_urgence');
        $user->fonction=$req->input('fonction');
        $user->type_contrat=$req->input('type_contrat');
        $user->date_entree=$req->input('date_entree');
        $user->date_sortie=$req->input('date_sortie');
        $user->banque=$req->input('banque');
        $user->iban=$req->input('iban');
        $user->rib=$req->input('rib');
        $user->securite_social=$req->input('securite_social');
        $user->matricule=$req->input('matricule');
        $user->role=$req->input('role');
        $user->save();
        return $user;
    }

    function login(Request $req)
    {
        $user=User::where('email',$req->email)->first();
        if(!$user || !Hash::check($req->pass,$user->pass))
        {
            return["error"=>"Email ou bien password pas valide"];
        }
        return $user;
    }
    function list()
    {
        return User::all();
    }
}
