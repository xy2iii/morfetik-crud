<div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h1>Guide d'utilisation</h1>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-2">
                    <nav id="table-of-contents" class="navbar navbar-light bg-light">
                        <div class="position-sticky">
                            <a class="navbar-brand" href="#">Contenu</a>
                            <nav class="nav nav-pills flex-column">
                                <a class="nav-link" href="#utilisation">L'utilisation</a>
                                <a class="nav-link" href="#espace-de-travail">L'espace de travail</a>
                                <a class="nav-link" href="#categories-grammaticales">Les catégories grammaticales</a>
                                <a class="nav-link" href="#sous-categories-grammaticales">Les sous-catégories grammaticales</a>
                                <nav class="nav nav-pills nav-justified flex-column">
                                    <a class="nav-link ml-2 my-1" href="#adjectifs">Adjectifs</a>
                                    <a class="nav-link ml-2 my-1" href="#determinants">Déterminants</a>
                                    <a class="nav-link ml-2 my-1" href="#noms">Noms</a>
                                    <a class="nav-link ml-2 my-1" href="#verbes">Verbes</a>
                                </nav>
                                <a class="nav-link" href="#nombre">Le nombre</a>
                                <a class="nav-link" href="#genre">Le genre</a>
                                <a class="nav-link" href="#personne">La personne</a>
                                <a class="nav-link" href="#temps">Les temps</a>
                                <a class="nav-link" href="#domaine">Les domaines</a>
                                <a class="nav-link" href="#formes-rares">Les formes rares</a>
                                <a class="nav-link" href="#ressources-externes">Ressources externes</a>
                                <nav class="nav nav-pills nav-justified flex-column">
                                    <a class="nav-link ml-2 my-1" href="#neoveille">Néoveille</a>
                                    <a class="nav-link ml-2 my-1" href="#franceterme">FranceTerme</a>
                                </nav>
                            </nav>
                        </div>
                    </nav>
                </div>
                <div class="col-md-10 text-justify position-relative h-100">
                    <div data-spy="scroll" data-target="#table-of-contents" data-offset="0">
                        <p>
                            Morfetik permet d'obtenir, pour n'importe quel mot français, l'ensemble de ses formes (pluriel des noms, féminin et pluriel des adjectifs, formes conjuguées des verbes, etc.), ou bien, réciproquement, d'identifier le mot (la forme de base, le "lemme") correspondant à n'importe quelle forme fléchie. Par exemple, si l'on saisit la forme <em>avions</em>, on obtient les deux réponses suivantes :
                            <ul>
                                <li><em>avoir</em>, verbe, imparfait de l'indicatif, 1re personne du pluriel</li>
                                <li><em>avion</em>, nm, pluriel</li>
                            </ul>
                            Si maintenant on clique sur le mot <em>avoir</em>, on obtient toute sa conjugaison. 
                        </p>
                        <h2 class="mt-4" id="utilisation">L'utilisation</h2>
                        <p>
                            Commencer par taper la forme à rechercher. Choisir ensuite le mode de recherche :
                            <ul>
                                <li>avec ou sans prise en compte des accents. La prise en compte des accents permet une sélectivité plus grande des formes.</li>
                                <li>stricte (par défaut), c’est-à-dire une recherche exacte du mot tapé ou large, une recherche de tous les mots commençant par le mot tapé.</li>
                            </ul>
                            Cliquer ensuite sur l'un des liens représentant le lemme, une fenêtre contenant le résultat s'affichera.
                        </p>
                        <h2 class="mt-4" id="espace-de-travail">L'espace de travail</h2>
                        <p>L'espace de travail se décompose en 2 parties :
                            <ul>
                                <li>Un espace de recherche, composé d'un champ, d'un menu à option ("Sensible aux accents"), d'un bouton "Recherche" et d'un bouton "Recherche avancée"</li>
                                <li>Un champ pour les résultats suivant la taille du tableau informatif</li>
                            </ul>
                            Pour chaque résultat, on pourra cliquer sur le <i class="fa fa-plus-square"></i> pour obtenir toutes les informations sur le mot.
                        </p>
                        <h2 class="mt-4" id="categories-grammaticales">Les catégories grammaticales</h2>
                        <ul>
                            <li>Adjectif</li>
                            <li>Nom</li>
                            <li>Verbe</li>
                            <li>Adverbe</li>
                            <li>Conjonction</li>
                            <li>Déterminant</li>
                            <li>Pronom</li>
                            <li>Préposition</li>
                            <li>Interjection</li>
                        </ul>
                        <h2 class="mt-4" id="sous-categories-grammaticales">Les sous-catégories grammaticales</h2>
                        <h3 class="mt-3" id="adjectifs">Adjectifs</h3>
                        <table class="table table-sm table-hover table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th>Code</th>
                                    <th>Sous-catégorie grammaticale</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>adjm</td>
                                    <td>Adjectif masculin</td>
                                </tr>
                                <tr>
                                    <td>adjf</td>
                                    <td>Adjectif féminin</td>
                                </tr>
                                <tr>
                                    <td>adj(m)</td>
                                    <td>Adjectif généralement masculin (fém. rare)</td>
                                </tr>
                                <tr>
                                    <td>adj(f)</td>
                                    <td>Adjectif généralement féminin (masc. rare)</td>
                                </tr>
                                <tr>
                                    <td>adjms</td>
                                    <td>Adjectif masculin singulier</td>
                                </tr>
                                <tr>
                                    <td>adjmp</td>
                                    <td>Adjectif masculin pluriel</td>
                                </tr>
                                <tr>
                                    <td>adjfs</td>
                                    <td>Adjectif féminin singulier</td>
                                </tr>
                                <tr>
                                    <td>adjfp</td>
                                    <td>Adjectif féminin pluriel</td>
                                </tr>
                                <tr>
                                    <td>adjord</td>
                                    <td>Adjectif numéral ordinal</td>
                                </tr>
                                <tr>
                                    <td>adjord</td>
                                    <td>Adjectif ordinal</td>
                                </tr>
                                <tr>
                                    <td>adj <span class="badge badge-secondary">Locution</span></td>
                                    <td>Locution adjectivale</td>
                                </tr>
                            </tbody>
                        </table>

                        <h3 class="mt-3" id="determinants">Déterminants</h3>
                        <table class="table table-sm table-hover table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th>Code</th>
                                    <th>Sous-catégorie grammaticale</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>C:Coord</td>
                                    <td>Conjonction de coordination</td>
                                </tr>
                                <tr>
                                    <td>C:Sub</td>
                                    <td>Conjonction de subordination</td>
                                </tr>
                                <tr>
                                    <td>D:Déf</td>
                                    <td>Déterminant défini</td>
                                </tr>
                                <tr>
                                    <td>D:Dém</td>
                                    <td>Déterminant démonstratif</td>
                                </tr>
                                <tr>
                                    <td>D:Excl</td>
                                    <td>Déterminant exclamatif</td>
                                </tr>
                                <tr>
                                    <td>D:Ind</td>
                                    <td>Déterminant indéfini</td>
                                </tr>
                                <tr>
                                    <td>D:Int</td>
                                    <td>Déterminant interrogatif</td>
                                </tr>
                                <tr>
                                    <td>D:Num</td>
                                    <td>Déterminant numéral</td>
                                </tr>
                                <tr>
                                    <td>D:Part</td>
                                    <td>Déterminant partitif</td>
                                </tr>
                                <tr>
                                    <td>D:Poss</td>
                                    <td>Déterminant possessif</td>
                                </tr>
                                <tr>
                                    <td>D:Rel</td>
                                    <td>Déterminant relatif</td>
                                </tr>
                                <tr>
                                    <td>loc <span class="badge badge-secondary">Locution</span></td>
                                    <td>Locution</td>
                                </tr>
                                <tr>
                                    <td>loc C&nbsp;<span class="badge badge-secondary">Locution</span></td>
                                    <td>Locution conjonctive</td>
                                </tr>
                                <tr>
                                    <td>loc D&nbsp;<span class="badge badge-secondary">Locution</span></td>
                                    <td>Locution déterminative</td>
                                </tr>
                                <tr>
                                    <td>loc Interj&nbsp;<span class="badge badge-secondary">Locution</span></td>
                                    <td>Locution interjective</td>
                                </tr>
                                <tr>
                                    <td>loc P&nbsp;<span class="badge badge-secondary">Locution</span></td>
                                    <td>Locution pronominale</td>
                                </tr>
                                <tr>
                                    <td>loc Ph&nbsp;<span class="badge badge-secondary">Locution</span></td>
                                    <td>Locution-phrase</td>
                                </tr>
                                <tr>
                                    <td>loc Prép&nbsp;<span class="badge badge-secondary">Locution</span></td>
                                    <td>Locution prépositionnelle</td>
                                </tr>
                                <tr>
                                    <td>P:Dém</td>
                                    <td>Pronom démonstratif</td>
                                </tr>
                                <tr>
                                    <td>P:Ind</td>
                                    <td>Pronom indéfini</td>
                                </tr>
                                <tr>
                                    <td>P:Int</td>
                                    <td>Pronom interrogatif</td>
                                </tr>
                                <tr>
                                    <td>P:Pers</td>
                                    <td>Pronom personnel</td>
                                </tr>
                                <tr>
                                    <td>P:Poss</td>
                                    <td>Pronom possessif</td>
                                </tr>
                                <tr>
                                    <td>P:Rel</td>
                                    <td>Pronom relatif</td>
                                </tr>
                                <tr>
                                    <td>sig</td>
                                    <td>Sigle</td>
                                </tr>
                            </tbody>
                        </table>

                        <h3 class="mt-3" id="noms">Noms</h3>
                        <table class="table table-sm table-hover table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th>Code</th>
                                    <th>Sous-catégorie grammaticale</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>nm</td>
                                    <td>Nom masculin (flexion)</td>
                                </tr>
                                <tr>
                                    <td>nms</td>
                                    <td>Nom masculin singulier</td>
                                </tr>
                                <tr>
                                    <td>nmp</td>
                                    <td>Nom masculin pluriel</td>
                                </tr>
                                <tr>
                                    <td>nf</td>
                                    <td>Nom féminin (flexion)</td>
                                </tr>
                                <tr>
                                    <td>nfs</td>
                                    <td>Nom féminin singulier</td>
                                </tr>
                                <tr>
                                    <td>nfp</td>
                                    <td>Nom féminin pluriel</td>
                                </tr>
                                <tr>
                                    <td>np</td>
                                    <td>Nom pluriel</td>
                                </tr>
                                <tr>
                                    <td>loc n&nbsp;<span class="badge badge-secondary">Locution</span></td>
                                    <td>Locution nominale</td>
                                </tr>
                            </tbody>
                        </table>

                        <h3 class="mt-3" id="verbes">Verbes</h3>
                        <table class="table table-sm table-hover table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th>Code</th>
                                    <th>Sous-catégorie grammaticale</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>vi</td>
                                    <td>Verbe intransitif</td>
                                </tr>
                                <tr>
                                    <td>vt</td>
                                    <td>Verbe transitif</td>
                                </tr>
                                <tr>
                                    <td>vt (vpr)</td>
                                    <td>Verbe transitif (verbe pronominale)</td>
                                </tr>
                                <tr>
                                    <td>loc v&nbsp;<span class="badge badge-secondary">Locution</span></td>
                                    <td>Locution verbale</td>
                                </tr>
                            </tbody>
                        </table>

                        <h3 class="mt-3" class="mt-3" id="temps">Les temps</h3>
                        <table class="table table-sm table-hover table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th>Abréviation</th>
                                    <th>Signification</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Inf</td>
                                    <td>Infinitif</td>
                                </tr>
                                <tr>
                                    <td>Ind_p</td>
                                    <td>Indicatif présent</td>
                                </tr>
                                <tr>
                                    <td>Ind_imp</td>
                                    <td>Indicatif imparfait</td>
                                </tr>
                                <tr>
                                    <td>Ind_ps</td>
                                    <td>Indicatif passé simple</td>
                                </tr>
                                <tr>
                                    <td>Ind_fut</td>
                                    <td>Indicatif futur</td>
                                </tr>
                                <tr>
                                    <td>Cond_pr</td>
                                    <td>Conditionnel présent</td>
                                </tr>
                                <tr>
                                    <td>Sub_pr</td>
                                    <td>Subjonctif présent</td>
                                </tr>
                                <tr>
                                    <td>Sub_imp</td>
                                    <td>Subjonctif imparfait</td>
                                </tr>
                                <tr>
                                    <td>Imp_pr</td>
                                    <td>Impératif présent</td>
                                </tr>
                                <tr>
                                    <td>Ppres</td>
                                    <td>Participe présent</td>
                                </tr>
                                <tr>
                                    <td>Pp</td>
                                    <td>Participe passé</td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="row">
                            <div class="col-md-4">
                                <h2 class="mt-4" id="nombre">Le nombre</h2>
                                <table class="table table-sm table-hover table-bordered">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Abréviation</th>
                                            <th>Signification</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>S</td>
                                            <td>Singulier</td>
                                        </tr>
                                        <tr>
                                            <td>P</td>
                                            <td>Pluriel</td>
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-md-4">
                                <h2 class="mt-4" id="genre">Le genre</h2>
                                <table class="table table-sm table-hover table-bordered">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Abréviation</th>
                                            <th>Signification</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>M</td>
                                            <td>Masculin</td>
                                        </tr>
                                        <tr>
                                            <td>F</td>
                                            <td>Féminin</td>
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-md-4">
                                <h2 class="mt-4" id="personne">La personne</h2>
                                <table class="table table-sm table-hover table-bordered">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Abréviation</th>
                                            <th>Signification</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>1<sup>ère</sup> personne</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>2<sup>ème</sup> personne</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>3<sup>ème</sup> personne</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <h2 class="mt-3" id="domaine">Les domaines</h2>
                        <table class="table table-sm table-hover table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th>Code</th>
                                    <th>Domaine</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>admin.</td>
                                    <td>administration</td>
                                </tr>
                                <tr>
                                    <td>aéron.</td>
                                    <td>aéronautique</td>
                                </tr>
                                <tr>
                                    <td>agric.</td>
                                    <td>agriculture</td>
                                </tr>
                                <tr>
                                    <td>alim.</td>
                                    <td>alimentation</td>
                                </tr>
                                <tr>
                                    <td>ameub.-décor.</td>
                                    <td>ameublement et décoration</td>
                                </tr>
                                <tr>
                                    <td>anthrop.</td>
                                    <td>anthropologie</td>
                                </tr>
                                <tr>
                                    <td>archit.</td>
                                    <td>architecture</td>
                                </tr>
                                <tr>
                                    <td>art</td>
                                    <td>art</td>
                                </tr>
                                <tr>
                                    <td>artisan.</td>
                                    <td>artisanat</td>
                                </tr>
                                <tr>
                                    <td>arts déc.</td>
                                    <td>arts décoratifs</td>
                                </tr>
                                <tr>
                                    <td>astron.</td>
                                    <td>astronomie</td>
                                </tr>
                                <tr>
                                    <td>audiovis.</td>
                                    <td>audiovisuel</td>
                                </tr>
                                <tr>
                                    <td>biol.</td>
                                    <td>biologie</td>
                                </tr>
                                <tr>
                                    <td>bois</td>
                                    <td>bois</td>
                                </tr>
                                <tr>
                                    <td>bot.</td>
                                    <td>botanique</td>
                                </tr>
                                <tr>
                                    <td>chasse</td>
                                    <td>chasse</td>
                                </tr>
                                <tr>
                                    <td>chim.</td>
                                    <td>chimie</td>
                                </tr>
                                <tr>
                                    <td>cin.-phot.</td>
                                    <td>cinéma et photographie</td>
                                </tr>
                                <tr>
                                    <td>comm.</td>
                                    <td>commerce</td>
                                </tr>
                                <tr>
                                    <td>communic.</td>
                                    <td>communication (divers)</td>
                                </tr>
                                <tr>
                                    <td>constr.</td>
                                    <td>construction</td>
                                </tr>
                                <tr>
                                    <td>croy.-idéol.</td>
                                    <td>croyances et idéologies</td>
                                </tr>
                                <tr>
                                    <td>cuirs-peaux</td>
                                    <td>cuirs et peaux</td>
                                </tr>
                                <tr>
                                    <td>culture</td>
                                    <td>culture (divers)</td>
                                </tr>
                                <tr>
                                    <td>danse</td>
                                    <td>danse</td>
                                </tr>
                                <tr>
                                    <td>droit-jus.</td>
                                    <td>droit et justice</td>
                                </tr>
                                <tr>
                                    <td>écon.</td>
                                    <td>économie</td>
                                </tr>
                                <tr>
                                    <td>écrit</td>
                                    <td>écrit (divers)</td>
                                </tr>
                                <tr>
                                    <td>livre</td>
                                    <td>édition et métiers du livre</td>
                                </tr>
                                <tr>
                                    <td>éduc.</td>
                                    <td>éducation</td>
                                </tr>
                                <tr>
                                    <td>électr.</td>
                                    <td>électricité</td>
                                </tr>
                                <tr>
                                    <td>électron.</td>
                                    <td>électronique</td>
                                </tr>
                                <tr>
                                    <td>élev.</td>
                                    <td>élevage</td>
                                </tr>
                                <tr>
                                    <td>énergie</td>
                                    <td>énergie (divers)</td>
                                </tr>
                                <tr>
                                    <td>environn.-urb.</td>
                                    <td>environnement et urbanisme</td>
                                </tr>
                                <tr>
                                    <td>espace</td>
                                    <td>espace</td>
                                </tr>
                                <tr>
                                    <td>fin.</td>
                                    <td>finance</td>
                                </tr>
                                <tr>
                                    <td>géog.</td>
                                    <td>géographie</td>
                                </tr>
                                <tr>
                                    <td>géol.</td>
                                    <td>géologie</td>
                                </tr>
                                <tr>
                                    <td>géosc.</td>
                                    <td>géosciences (divers)</td>
                                </tr>
                                <tr>
                                    <td>habill.</td>
                                    <td>habillement</td>
                                </tr>
                                <tr>
                                    <td>habit.</td>
                                    <td>habitat</td>
                                </tr>
                                <tr>
                                    <td>hist.</td>
                                    <td>histoire</td>
                                </tr>
                                <tr>
                                    <td>industr.</td>
                                    <td>industrie (divers)</td>
                                </tr>
                                <tr>
                                    <td>info.-doc.</td>
                                    <td>information et documentation</td>
                                </tr>
                                <tr>
                                    <td>inform.</td>
                                    <td>informatique</td>
                                </tr>
                                <tr>
                                    <td>jeux</td>
                                    <td>jeux</td>
                                </tr>
                                <tr>
                                    <td>ling.</td>
                                    <td>linguistique</td>
                                </tr>
                                <tr>
                                    <td>littér.</td>
                                    <td>littérature</td>
                                </tr>
                                <tr>
                                    <td>lois.</td>
                                    <td>loisirs</td>
                                </tr>
                                <tr>
                                    <td>manut.-stock.</td>
                                    <td>manutention et stockage</td>
                                </tr>
                                <tr>
                                    <td>matér.</td>
                                    <td>matériaux</td>
                                </tr>
                                <tr>
                                    <td>math.</td>
                                    <td>mathématiques</td>
                                </tr>
                                <tr>
                                    <td>mécan.</td>
                                    <td>mécanique</td>
                                </tr>
                                <tr>
                                    <td>méd.</td>
                                    <td>médecine</td>
                                </tr>
                                <tr>
                                    <td>métaux</td>
                                    <td>métaux</td>
                                </tr>
                                <tr>
                                    <td>métrol.</td>
                                    <td>métrologie</td>
                                </tr>
                                <tr>
                                    <td>mil.</td>
                                    <td>militaire</td>
                                </tr>
                                <tr>
                                    <td>min.</td>
                                    <td>minéralogie</td>
                                </tr>
                                <tr>
                                    <td>mines-carr.</td>
                                    <td>mines et carrières</td>
                                </tr>
                                <tr>
                                    <td>mus.</td>
                                    <td>musique</td>
                                </tr>
                                <tr>
                                    <td>nautique</td>
                                    <td>nautique</td>
                                </tr>
                                <tr>
                                    <td>nucl.</td>
                                    <td>nucléaire</td>
                                </tr>
                                <tr>
                                    <td>pêche</td>
                                    <td>pêche</td>
                                </tr>
                                <tr>
                                    <td>pétrole</td>
                                    <td>pétrole</td>
                                </tr>
                                <tr>
                                    <td>phil.</td>
                                    <td>philosophie</td>
                                </tr>
                                <tr>
                                    <td>phys.</td>
                                    <td>physique</td>
                                </tr>
                                <tr>
                                    <td>pol.</td>
                                    <td>politique</td>
                                </tr>
                                <tr>
                                    <td>presse</td>
                                    <td>presse</td>
                                </tr>
                                <tr>
                                    <td>protect.-sécur.</td>
                                    <td>protection et sécurité</td>
                                </tr>
                                <tr>
                                    <td>psych.</td>
                                    <td>psychologie</td>
                                </tr>
                                <tr>
                                    <td>relig.</td>
                                    <td>religions</td>
                                </tr>
                                <tr>
                                    <td>sc.</td>
                                    <td>sciences (divers)</td>
                                </tr>
                                <tr>
                                    <td>sémiol.-symbol.</td>
                                    <td>sémiologie et symbolique</td>
                                </tr>
                                <tr>
                                    <td>serv.</td>
                                    <td>services (divers)</td>
                                </tr>
                                <tr>
                                    <td>soc.</td>
                                    <td>société</td>
                                </tr>
                                <tr>
                                    <td>spect.</td>
                                    <td>spectacles</td>
                                </tr>
                                <tr>
                                    <td>sports</td>
                                    <td>sports</td>
                                </tr>
                                <tr>
                                    <td>techn.</td>
                                    <td>techniques (divers)</td>
                                </tr>
                                <tr>
                                    <td>télécomm.</td>
                                    <td>télécommunications</td>
                                </tr>
                                <tr>
                                    <td>tempor.</td>
                                    <td>temporalité</td>
                                </tr>
                                <tr>
                                    <td>text.</td>
                                    <td>textile</td>
                                </tr>
                                <tr>
                                    <td>théât.</td>
                                    <td>théâtre</td>
                                </tr>
                                <tr>
                                    <td>therm.</td>
                                    <td>thermique</td>
                                </tr>
                                <tr>
                                    <td>toil.-parure</td>
                                    <td>toilette et parure</td>
                                </tr>
                                <tr>
                                    <td>transp.</td>
                                    <td>transports (divers)</td>
                                </tr>
                                <tr>
                                    <td>trav.</td>
                                    <td>travail</td>
                                </tr>
                                <tr>
                                    <td>ménag.</td>
                                    <td>travaux et équipement ménagers</td>
                                </tr>
                                <tr>
                                    <td>trav.publ.</td>
                                    <td>travaux publics</td>
                                </tr>
                                <tr>
                                    <td>vie quot.</td>
                                    <td>vie quotidienne (divers)</td>
                                </tr>
                                <tr>
                                    <td>voy.</td>
                                    <td>voyages</td>
                                </tr>
                                <tr>
                                    <td>zool.</td>
                                    <td>zoologie</td>
                                </tr>
                            </tbody>
                        </table>
                        <h2 class="mt-3" id="formes-rares">Les formes rares</h2>
                        <p>
                            Le signe <span class="badge badge-info">Rare</span> indique les flexions rares et/ou archaïques, notamment pour les verbes (<em>veuillons, partissiez, dormie...</em>) et pour quelques adjectifs (<em>châtaine, gringalette...</em>)
                        </p>

                        <h2 class="mt-3" id="ressources-externes">Les ressources externes </h2>
                        <p>
                            Vous pouvez compléter les résultats de votre recherche en cliquant sur les ressources externes <i class="fa fa-paper-plane"></i> (Néoveille) et <i class="fa fa-university"></i> (FranceTerme).

                            <h3 class="mt-4" id="neoveille">Néoveille</h3>
                            <p>
                                <p class="lead text-danger">à remplir</p>
                            </p>
                            <h3 class="mt-4" id="franceterme">FranceTerme</h3>
                            <p>
                                FranceTerme est une base de données terminologiques de la Délégation Générale à la Langue Française et aux Langues de France du ministère de la culture français (<a href="https://www.culture.gouv.fr/Sites-thematiques/Langue-francaise-et-langues-de-France/La-DGLFLF">DGLFLF)</a>, qui rassemble les récents néologismes avalisés par la Commission d'enrichissement de la langue française et parus au <em>Journal officiel</em>, remplaçant les termes importés d'autres langues. Elle a pour mission de promouvoir l'utilisation de mots en français, pour enrichir la langue française et éviter son recul dans le monde.
                            </p>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        </div>
    </div>
</div>