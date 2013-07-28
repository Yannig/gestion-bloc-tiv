<?php
class personneElement extends TIVElement {
  function personneElement($db_con = false) {
    parent::__construct($db_con);
    $this->_parent_url       = "./#personne";
    $this->_parent_url_label = "<img src='images/personne.png' /> Plongeurs/inspecteurs TIV";
    $this->_creation_label = "Création d'une nouvelle personne";
    $this->_update_label = "Mettre à jour la personne";
    $this->_show_delete_form = true;
    $this->_elements = array("id" => "Réf.", "CONCAT(prenom,' ',nom)" => "Prénom Nom", "adresse" => "Adresse de la personne",
                             "CONCAT(
                                     CONCAT(IF(telephone_domicile,' domicile : ', ''), telephone_domicile,
                                            IF(telephone_portable,' portable : ', ''), telephone_portable),
                                     IF(telephone_bureau, ' bureau : ', ''), telephone_bureau)" =>
                             "Téléphone domicile/portable/bureau",);
    $niveau = array("", "Débutant", "Niveau 1", "Niveau 2", "Niveau 2 Initiateur", "Niveau 3", "Niveau 4");
    $assurance = array("", "1", "2", "3");
    $this->_forms = array(
      "groupe"                => array("required", "text", "Groupe"),
      "licence"               => array("required", "text", "n° de licence"),
      "prenom"                => array("required", "text", "Prénom"),
      "nom"                   => array("required", "text", "Nom"),
      "adresse"               => array("required", "text", "Adresse"),
      "code_postal"           => array("required", "text", "Code postal"),
      "ville"                 => array("required", "text", "Ville"),
      "telephone_domicile"    => array("required", "text", "Téléphone domicile"),
      "telephone_portable"    => array("required", "text", "Téléphone portable"),
      "telephone_bureau"      => array("required", "text", "Téléphone bureau"),
      "email"                 => array("required", "text", "Adresse mail"),
      "date_naissance"        => array("required", "date", "Date de naissance"),
      "lieu_naissance"        => array("required", "text", "Lieu de naissance"),
      "niveau"                => array("required", $niveau, "Niveau plongeur"),
      "date_obtention_niveau" => array("required", "date", "Date d'obtention du niveau"),
      "nombre_plongee"        => array("required", "integer", "Nombre de plongée"),
      "date_derniere_plongee" => array("required", "date", "Date dernière plongée"),
      "type_assurance"        => array("required", $assurance, "Type d'assurance"),
    );
    $this->_form_split_count = 6;
    $this->_forms_rules = '
  debug: false,
  rules: {
    nom: {
        required: true,
    },
    prenom: {
        required: true,
    },
    adresse: {
        required: true,
    },
    code_postal: {
        required: true,
    },
    ville: {
        required: true,
    },
  }';
  }
  function constructAdditionalFormElement($id) {
    $db_query = "SELECT id,qualification,qualification,id_externe FROM qualification_personne WHERE id_personne = $id";
    $db_result = $this->_db_con->query($db_query);
    $form = "<h3>Qualification(s) supplémentaire(s) du plongeur/plongeuse</h3>\n<p>\n";
    $qualification_count = 1;
    $qualifications_label = array("", "Nitrox", "Nitrox confirmé", "BIO AFBS", "BIO IFBS",
                                  "Bio 1", "Bio 2", "MFB1", "TIV", "RIFAP", "TIV");
    while($result = $db_result->fetch_array()) {
      $form .= $result["qualification"]." ".
               "<input type=\"submit\" name=\"suppression[".$result["id"]."]\" value='x' />\n";
      $qualification_count++;
    }
    $new_qualification_select = $this->constructSelectInput("qualification", $qualifications_label, "-");
    $form .= "</p>\n<p>Ajout d'une nouvelle qualification :\n$new_qualification_select".
             "<input type=\"submit\" name=\"ajout\" value='+'/></p>\n";
    return $form;
  }
  function updateAdditionalDBRecord($id) {
    $suppression = $_POST["suppression"];
    if(count($suppression) > 0) {
      foreach($suppression as $key => $value) {
        $db_query = "DELETE FROM qualification_personne WHERE id_personne = '$id' AND id = '$key'";
        $db_result = $this->_db_con->query($db_query);
        return 1;
      }
    }
    $qualification = $_POST["qualification"];
    if(strlen($qualification) == 0) {
      return 2;
    }
    $db_query = "SELECT * FROM qualification_personne WHERE id_personne = '$id' AND qualification = '$qualification'";
    $db_result = $this->_db_con->query($db_query);
    if($result = $db_result->fetch_array()) {
      return 2;
    }
    $this->_db_con->query("INSERT INTO qualification_personne (id_personne,qualification,id_externe) ".
                          "VALUES ('$id', '$qualification', '0')");
    return 1;
  }
  function getQuickNavigationFormInput() {
    $input  = " > Navigation rapide<select name='id' onchange='this.form.submit()'>\n".
              "<option></option>\n";
    $db_result = $this->_db_con->query("SELECT id,CONCAT(prenom,' ',nom) as nom FROM ".$this->getTableName()." ORDER BY prenom, nom");
    while($result = $db_result->fetch_array()) {
      $selected = ($result['id'] == $_GET['id'] ? " selected" : "");
      $input .= "<option value='".$result['id']."'$selected>".$result['nom']." (id n° ".$result['id'].")</option>\n";
    }
    $input .= "</select></p>".
              "</form>";
    return $input;
  }
}
?>