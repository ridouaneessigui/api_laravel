## BD

``` SQL
CREATE DATABASE IF NOT EXISTS apiNumerus21;
USE apiNumerus21;
```

<BR>

# Tables

<BR>

### Table User

``` SQL
CREATE TABLE users(
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    prenom VARCHAR(255),
    nom VARCHAR(255),
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255),
    sexe ENUM('HOMME', 'FEMME') DEFAULT 'HOMME',
    datenaissance DATE,
    statumatrimonial VARCHAR(255),
    nombreenfant INT,
    nationalite VARCHAR(255),
    identite VARCHAR(255),
    rue VARCHAR(255),
    codep VARCHAR(255),
    ville VARCHAR(255),
    pays VARCHAR(255),
    telp VARCHAR(255),
    telf VARCHAR(255),
    emailperso VARCHAR(255),
    contacturgence VARCHAR(255),
    fonction VARCHAR(255),
    typecontrat VARCHAR(255),
    dateentree DATE,
    datesortie DATE,
    banque VARCHAR(255),
    iban VARCHAR(255),
    rib VARCHAR(255),
    securitesocial VARCHAR(255),
    matricule VARCHAR(255),
    role ENUM('SA', 'A','TE','C','CA','BE') DEFAULT 'TE'
)

```

### Table PROJET

``` SQL
CREATE TABLE projets(
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    name VARCHAR(255),
    client VARCHAR(255),
    activite VARCHAR(255),
    objectif VARCHAR(255),
    percentage float,
    commentaire VARCHAR(255),
    date DATE,
    eq VARCHAR(255),
    categ1 VARCHAR(255),
    categ2 VARCHAR(255),
    )
```

### Table ABSENCE

``` SQL
CREATE TABLE absences(
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    debut DATE,
    fin DATE,
    du VARCHAR(255),
    au VARCHAR(255),
    statut VARCHAR(255),
    type VARCHAR(255),
    justificatif BLOB,
    commentaire VARCHAR(255)
    )
```

### Table NOTE

``` SQL
CREATE TABLE notes(
    id INT PRIMARY KEY AUTO_INCREMENT default NOT NULL,
    prenom VARCHAR(255),
    nom VARCHAR(255),
    periode VARCHAR(255),
    date DATE,
    nomf VARCHAR(255),
    carburant FLOAT,
    transport FLOAT,
    hotel FLOAT,
    fourniture FLOAT,
    entretien FLOAT,
    divers FLOAT,
    montant FLOAT,
    tva FLOAT,
    montantttc FLOAT,
    avancer FLOAT,
    notef VARCHAR(255),
    datevirement DATE
    )
```

### Table DOCUMENT

``` SQL
CREATE TABLE documents(
    id INT PRIMARY KEY AUTO_INCREMENT default NOT NULL,
    name VARCHAR(255),
    path VARCHAR(255)
    )
```

``` SQL
CREATE TABLE clients(
    id INT PRIMARY KEY AUTO_INCREMENT default NOT NULL,
    name VARCHAR(255),
    id_projet INT FOREIGN KEY REFERENCES projets(id)
    )
```

``` SQL
CREATE TABLE projet_client(
    id_projet INT NOT NULL,
    id_client INT NOT NULL,
    primary Key(id_projet,id_client)
    )
```


import React, { useState } from "react";
import logo from "../assets/img/logo.png";
import "./Auth.css";
import { useNavigate } from "react-router-dom";

const Authentificate = () => {
  const [email, setemail] = useState("");
  const [pass, setpass] = useState("");
  const navigate = useNavigate();

  async function loginn() {
    let item = { email, pass };
    let res = await fetch("http://127.0.0.1:8000/api/login", {
      method: "POST",
      body: JSON.stringify(item),
      headers: {
        "Content-Type": "application/json",
        Accept: "application/json",
      },
    });
    res = await res.json();
    localStorage.setItem("user-info", JSON.stringify(res));
    //navigate("/profile");
  }
  return (
    <div className="mr">
      <img className="mb-4 img_logo image_fluid" src={logo} alt="" />
      <h1 className="h3 mb-3 fw-normal">Gestion du Personnel</h1>
      <div className="mb-3  ">
        <label for="exampleInput" className="form-label">
          Identifiant :
        </label>
        <input
          type="text"
          className="form-control"
          id="exampleInput"
          name="id"
          onChange={(e) => setemail(e.target.value)}
        />
      </div>
      <div className="mb-3 ">
        <label for="exampleInputPassword1" className="form-label">
          Mot de passe :
        </label>
        <input
          type="password"
          className="form-control"
          id="exampleInputPassword1"
          name="pwd"
          onChange={(e) => setpass(e.target.value)}
        />
      </div>
      <div className="mb-3  form-check">
        <input
          type="checkbox"
          className="form-check-input"
          id="exampleCheck1"
        />
        <label className="form-check-label" for="exampleCheck1">
          Resté connecté?
        </label>
      </div>
      <div>
        <button
          type="submit"
          className="btn btn-primary col-3"
          value="Connecter"
          onClick={loginn}
        >
          Valider
        </button>
      </div>
    </div>
  );
};
export default Authentificate;
