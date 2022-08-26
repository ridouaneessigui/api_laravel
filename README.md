<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).



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
