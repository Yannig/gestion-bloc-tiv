<h2>Bienvenue sur le site de gestion du matériel du club Aqua Sénart</h2>
<p>
Vous êtes à la racine du site permettant de gérer le matériel du club Aqua Sénart.
</p>
<ul>
<li>L'onglet bloc/détendeur/stabs vous donnera un recensement simple du matériel du club.</li>
<li>L'onglet Inspecteur TIV vous donnera la liste des personnes recensées dans le club en mesure de faire des inspections visuelles. Vous pourrez également accéder à la liste des blocs qui auront été inspectées par chaque TIV.</li>
<li>L'onglet Status des blocs (TIV/ré-épreuve) vous donnera une liste des blocs nécessitant des blocs dans moins de 5 mois ainsi que les blocs nécessitant une inspection TIV dans moins de 1 mois.</li>
</ul>
<p>Bonne inspection de bloc !</p>
<h2>Déclaration d'un nouveau matériel</h2>
<form name="ajout_form" id="ajout_form" action="ajout_element.php" method="POST">
<p>Type d'élément à déclarer :
<select id="element" name="element">
<option>bloc</option>
<option>stab</option>
<option>detendeur</option>
</select></p>
<p><input type="submit" name="submit" value="Procéder à la création du nouvel élément"></p>
</form>
<h2>Messages importants</h2>
<div id="message_important_reepreuve"></div>
<div id="message_important_tiv"></div>
