<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = Yii::t('app', 'About');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about text-justify">
    <h1><?= Html::encode($this->title) ?></h1>
    <h2 class="mt-5">Qui sommes-nous ?</h2>
    <p>
        Morfetik est le résultat du travail de plus d’une vingtaine d’années de collecte et de description. Michel Mathieu-Colas (Maître de conférences honoraire à l’Université Sorbonne Paris Nord) est à l'origine de la ressource lexicale et de la structuration. En 2008, ce travail a été informatisé par une équipe du laboratoire LDI (<em>Lexiques, Dictionnaires, Informatique</em>, UMR 7187 CNRS), anciennement LLI (<em>Laboratoire de Linguistique Informatique</em>). Depuis 2015, Aude Grezka (Ingénieur de Recherche CNRS) a repris la direction du projet. La ressource a été mise à jour au niveau des données linguistiques et a évolué informatiquement. De nombreux outils ont été ajoutés à la ressource. <em>Morfetik</em> constitue ainsi un ensemble évolutif destiné à s’enrichir progressivement afin d’améliorer la chaîne de traitement des données textuelles.
    </p>
    <h2 class="mt-5">Contributeurs</h2>
    <h3 class="mt-4">Contributeurs linguistiques</h3>
    <table class="table">
        <thead class="thead-light">
            <th>Contributeur</th>
            <th>Institution</th>
        </thead>
        <tbody>
            <tr>
                <td><a href="https://lipn.univ-paris13.fr/~grezka/">GREZKA Aude</a></td>
                <td>CNRS/LIPN - Équipe RCLN (<a href="https://www.univ-paris13.fr/">Université Sorbonne Paris Nord</a>)</td>
            </tr>
            <tr>
                <td><a href="http://www.mathieu-colas.fr/michel" />MATTHIEU-COLAS Michel</a></td>
                <td><a href="https://www.univ-paris13.fr/">Université Sorbonne Paris Nord</a></td>
            </tr>
        </tbody>
    </table>
    <h3 class="mt-4">Modélisation et développements informatiques</h3>
    <table class="table">
        <thead class="thead-light">
            <th>Contributeur</th>
            <th>Contribution</th>
            <th>Institution</th>
        </thead>
        <tbody>
            <tr>
                <td><a href="https://xy2.dev/">ELHAJ-LAHSEN Hugo</a> (mars-juin 2020)</td>
                <td>Développement du site</td>
                <td>LIPN - Équipe RCLN (<a href="https://www.univ-paris13.fr/">Université Sorbonne Paris Nord</a>)</td>
            </tr>
            <tr>
                <td><a href="https://lipn.univ-paris13.fr/~cartier/">CARTIER Emmanuel</a></td>
                <td>Coordinateur</td>
                <td>LIPN - Équipe RCLN (<a href="https://www.univ-paris13.fr/">Université Sorbonne Paris Nord</a>)</td>
            </tr>
            <tr>
                <td>DIA Awa (nov.-dec. 2017)</td>
                <td>Développement du site</td>
                <td>LIPN - Équipe RCLN (<a href="https://www.univ-paris13.fr/">Université Sorbonne Paris Nord</a>)</td>
            </tr>
        </tbody>
    </table>
    <h3 class="mt-4">Réflexions sur l'évolution du projet</h3>
    <table class="table">
        <thead class="thead-light">
            <th>Contributeur</th>
            <th>Institution</th>
        </thead>
        <tbody>
            <tr>
                <td><a href="https://lipn.univ-paris13.fr/~grezka/">GREZKA Aude</a></td>
                <td>CNRS/LIPN - Équipe RCLN (<a href="https://www.univ-paris13.fr/">Université Sorbonne Paris Nord</a>)</td>
            </tr>
            <tr>
                <td><a href="https://lipn.univ-paris13.fr/~cartier/">CARTIER Emmanuel</a></td>
                <td>LIPN - Équipe RCLN (<a href="https://www.univ-paris13.fr/">Université Sorbonne Paris Nord</a>)</td>
            </tr>
            <tr>
                <td><a href="http://www.mathieu-colas.fr/michel" />MATTHIEU-COLAS Michel</a></td>
                <td><a href=" https://www.univ-paris13.fr/">Université Sorbonne Paris Nord</a> </td>
            </tr>
            <tr>
                <td><a href="https://fr.linkedin.com/in/lcatach">CATACH Laurent</a> (2015-2017)</td>
                <td>Consultant en édition numérique</td>
            </tr>
            <tr>
                <td><a href="http://www.leslyriades.fr/spip.php?article520">JACQUET-PFAU Christine</a> (2015-2017)</td>
                <td><a href="https://www.college-de-france.fr">Collège de France</a></td>
            </tr>
            <tr>
                <td><a href="https://www.researchgate.net/profile/Gabrielle_Le_Tallec-Lloret">LE TALLEC LLORET Gabrielle</a> (2015-2017)</td>
                <td><a href="https://www.univ-paris13.fr/">Université Sorbonne Paris Nord</a></td>
            </tr>
            <tr>
                <td><a href="https://data.bnf.fr/fr/13185178/francoise_martin-berthet/">MARTIN-BERTHET Françoise</a> (2015-2017)</td>
                <td><a href="https://www.univ-paris13.fr/">Université Sorbonne Paris Nord</a></td>
            </tr>
            <tr>
                <td><a href="https://data.bnf.fr/fr/13579648/jean-francois_sablayrolles/">SABLAYROLLES Jean-François</a> (2015-2017)</td>
                <td><a href="https://www.univ-paris13.fr/">Université Sorbonne Paris Nord</a></td>
            </tr>
        </tbody>
    </table>
    <h2 class="mt-5">Financements</h2>
    <h3 class="mt-4">2020</h3>
    <p>
        Ce travail a bénéficié partiellement d'une aide de l’Etat gérée par l'Agence Nationale de la Recherche au titre du programme "Investissements d’Avenir" portant la référence <a href="https://anr.fr/ProjetIA-10-LABX-0083">ANR-10-LABX-0083</a>. Il contribue à l’IdEx <a href="https://anr.fr/ProjetIA-18-IDEX-0001"> Université de Paris</a> - ANR-18-IDEX-0001. </p>
    <h3 class="mt-4">2015-2019</h3>
    <p>
        Subvention de la <a href="https://www.culture.gouv.fr/Sites-thematiques/Langue-francaise-et-langues-de-France/La-DGLFLF">Délégation Générale à la Langue Française et aux Langues de France</a> (DGLFLF). La DGLFLF élabore la politique linguistique du Gouvernement en liaison avec les autres départements ministériels.
    </p>
    <h2 class="mt-5">Mentions légales</h2>
    <p class="lead text-danger">à remplir</p>
</div>