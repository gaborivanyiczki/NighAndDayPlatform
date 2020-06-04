@extends('layouts.app')

@section('content')


<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>Politica Cookies</h2></div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">acasa</a></li>
                        <li class="breadcrumb-item active">Politica Cookies</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->


<!--section start-->
<section class="faq-section section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="accordion theme-accordion" id="accordionExample">
                    <p><strong>1. Politica de utilizare cookies <br></strong>Aceasta politica se refera la cookies si pagina web operata de <strong>4Brands S.R.L. cu sediul social in Strada Depozitelor, Nr. 7, Maramureş, Baia Mare, Județ Maramures, România </strong>, la care se va face in continuare referire sub forma „NightAndDay by 4Brands”.</p>
                    <p><strong>2. Ce este un cookie?<br></strong>Un cookie este un fisier text de mici dimensiuni, format in general din identificatori, nume ale website-urilor litere si numere, caruia utilizatorul, cand navigheaza pe pagina web prin intermediul unui browser web (ex: Internet Explorer, Chrome, etc.), ii poate permite sau nu instalarea prin stocare pe computerul, terminalul mobil sau alte echipamente folosite de acesta. Fisierul cookie este “pasiv” (nu contine programe software, virusi sau spyware si nu poate accesa informatiile de pe hard disk-ul utilizatorului).</p>
                    <p><strong>3. La ce sunt folosite cookies?<br></strong>Aceste fisiere fac posibila recunoasterea terminalului utilizatorului si prezentarea catre acesta a unui continut adaptat preferintelor sale. Cookies asigura utilizatoriului o experienta placuta de navigare si sustin eforturile 4Brands pentru a oferi servicii confortabile utilizatorului, cum ar fi: preferintele in materie de confidentialitate online, cosul de cumparaturi sau publicitate relevanta. Cookies sunt utilizate in pregatirea unor statistici anonime agregate care ne ajuta sa intelegem modul in care un utilizator beneficiaza de paginile noastre web, permitandu-ne imbunatatirea structurii si continutului acestora.</p>
                    <p><strong>4. Ce tipuri de cookies folosim?<br></strong>Folosim doua tipuri de cookies:</p>
                    <ul>
                        <li>de sesiune - fisiere temporare ce raman in terminalul utilizatorului pana la inchiderea sesiunii de navigare sau inchiderea aplicatiei (browser-ului web)</li>
                        <li>persistente - fisiere care raman in terminalul utilizatorului pe o perioada definita de parametrii acelui cookie sau pana sunt sterse manual de utilizator.&nbsp;</li>
                    </ul>
                    <p></p>
                    <p><strong>5. Cum sunt folosite cookies de catre acest site?<br></strong>O vizita pe acest site poate plasa urmatoarele tipuri de cookies:</p>
                    <ul type="disc">
                        <li>Cookie-uri de performanta a site-ului;</li>
                        <li>Cookie-uri de analiza a vizitatorilor;</li>
                        <li>Cookie-uri de inregistrare;</li>
                        <li>Cookie-uri pentru publicitate;</li>
                        <li>Cookie-uri ale furnizorilor de publicitate.</li>
                    </ul>
                    <p>Exemple privind utilitatea cookies (care nu necesita autentificarea unui utilizator prin intermediul unui cont):</p>
                    <ul type="disc">
                        <li>Continut si servicii adaptate preferintelor utilizatorului – categorii de produse si servicii.</li>
                        <li>Oferte adaptate intereselor utilizatorilor;</li>
                        <li>Retinerea detaliilor de autentificare (utilizator si parola);</li>
                        <li>Retinerea filtrelor de protectie a copiilor privind continutul pe Internet (optiuni family mode, functii safe search);</li>
                        <li>Limitarea frecventei de difuzare a reclamelor – limitarea numarului de afisari a unei reclame pentru un anumit utilizator pe un site;</li>
                        <li>Furnizarea de publicitate relevanta pentru utilizator;</li>
                        <li>Masurarea, optimizarea si caracteristicile de analitice – cum ar fi confirmarea unui anumit nivel de trafic pe un website, ce tip de continut este vizualizat si modul cum un utilizator ajunge pe un website (ex.: prin motoare de cautare, direct, din alte website-uri etc). Website-urile deruleaza aceasta analiza a utilizarii lor pentru a imbunatati continutul acestora in beneficiul utilizatorului.</li>
                    </ul>
                    <p>Cookies care, din punct de vedere tehnic, nu sunt obligatorii a fi stocate pe terminalul utilizatorului, vor fi folosite doar daca utilizatorul isi exprima consimtamantul expres si neechivoc in legatura cu acestea, prin bifarea categoriilor prezentate.</p>
                    <p>Utilizatorul isi poate retrage consimtamantul in orice moment prin modificarea setarilor aferente browser-ului utilizat. Detalii privind modificarea setarilor browserelor puteti gasi pe website-urile dezvoltatorilor browserelor , in Sectiunea ”Setari”, prezentate mai jos:</p>
                    <ul>
                        <li><a href="https://support.google.com/chrome/answer/95647?hl=ro">Google Chrome</a></li>
                        <li><a href="https://support.mozilla.org/ro/kb/cookie-urile">Mozilla Firefox</a></li>
                        <li><a href="https://privacy.microsoft.com/en-us/windows-10-microsoft-edge-and-privacy">Microsoft Edge</a></li>
                        <li><a href="http://support.microsoft.com/kb/278835/ro">Microsoft Internet Explorer</a></li>
                        <li><a href="https://www.opera.com/help/tutorials/security/privacy/">Opera</a></li>
                        <li><a href="https://www.apple.com/legal/privacy/">Apple Safari</a></li>
                    </ul>
                    <p></p>
                    <p><strong>6. Ce date contin cookies?</strong></p>
                    <p>In cele mai multe cazuri, cookies nu identifica in mod direct utilizatorii de Internet, ci terminalul de pe care acestia au accesat anumite pagini web. Aceste date sunt criptate intr-un mod care nu permite accesul &nbsp;neautorizat al tertilor.</p>
                    <p></p>
                    <p><strong>7. Retentia si stergerea cookies</strong></p>
                    <p>In general, o aplicatie folosita pentru accesarea paginilor web permite salvarea cookies pe terminalul utilizatorului in mod implicit. Aceste setari pot fi modificate de catre utilizator astfel incat administrarea automata a cookies sa fie blocata de browser-ul web sau utilizatorul sa fie informat de fiecare data cand cookies sunt trimise catre terminalul sau.</p>
                    <p></p>
                    <p><strong>8. Actualizari are politicii de cookies</strong></p>
                    <p>4Brands poate actualiza prezenta politica de cookies pentru a reflecta schimbari ale diverselor cookies folosite in scop operational, juridic sau de reglementare. Va rugam sa cititi regulat politica de cookies pentru a va asigura ca sunteti informat corespunzator cu privire la modul in care utilizam cookies. Data prezentei politici este actualizata in antetul acestei sectiuni.</p>
                    <p></p>
                    <p><strong>9. Linkuri utile</strong></p>
                    <p>Daca doriti sa afli mai multe infromatii despre cookie-uri si la ce sunt utilizate, recomandam urmatoarele linkuri:<br> <a href="https://privacy.microsoft.com/en-us/privacystatement">Microsoft Cookies guide</a><br> <a href="http://www.allaboutcookies.org/">All About Cookies</a><br> <a href="http://www.youronlinechoices.com/ro/">http://www.youronlinechoices.com/ro/</a></p>

                </div>
            </div>
        </div>
    </div>
</section>
<!--Section ends-->


@endsection
