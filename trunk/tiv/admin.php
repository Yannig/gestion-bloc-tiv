<h2>Déclaration d'un nouveau matériel</h2>
<form name="ajout_form" id="ajout_form" action="ajout_element.php" method="POST">
<p>Type d'élément à déclarer :
<select id="element" name="element">
<option value='bloc'>Bloc</option>
<option value='stab'>Gillet Stabilisateur</option>
<option value='detendeur'>Détendeur</option>
<option value='inspecteur_tiv'>Inspecteur TIV</option>
</select>
<input type="submit" name="submit" onclick='return(confirm("Procéder à la création ?"));' value="Procéder à la création du nouvel élément"></p>
</form>
<h2>Préparation d'un TIV</h2>
<script>
  $(function() {
    $('#choix-tiv').hide();
    $('#choix-tiv-toggle').click(function() {
      $('#choix-tiv').toggle(400);
      return false;
    });
    $.validator.messages.required = "Champ obligatoire";
    $("#preparation_tiv").validate({
      debug: true,
      rules: {
        date_tiv: {
            required: true,
            date: true,
        },
      },
      submitHandler: function(form) {
        if(confirm("Lancer la procédure ?")) form.submit();
      }
    });
    $('#date_tiv' ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: 'yy-mm-dd',
      appendText: '(yyyy-mm-dd)',
    });
  });
</script>
<p>A noter que la préparation d'un TIV consiste à pré-affecter les blocs aux différentes personnes qui feront plus tard le TIV.</p>
<form name="preparation_tiv" id="preparation_tiv" action="preparation_tiv.php" method="POST">
<p>Date de préparation du TIV :<input type="text" name="date_tiv" id="date_tiv" size="10" value=""/>
<input type="submit" name="lancer" value="Procéder à la pré-affectation" /></p>
<p><a href="#" id="choix-tiv-toggle">Choisir les personnes faisant le TIV</a></p>
<div id="choix-tiv">
<select id="tivs" name="tivs[]" multiple='multiple'>
<?php
include_once("connect_db.inc.php");
$db_result = $db_con->query("SELECT id,nom,actif FROM inspecteur_tiv ORDER BY nom");
while($result = $db_result->fetch_array()) {
  print "<option value='".$result["id"]."'".($result["actif"] === "oui" ? " selected" : "").">".$result["nom"]."</option>\n";
}
?>
</select>
</div>
</form>
