<?php

class AdminAddSituation
{
    private $newSituation;

    function __construct()
    {
        $libelle = $_POST["situationname"];
        $active = isset($_POST["active"]) ? 1 : 0;
        $this->newSituation = new Situation($libelle, $active);
    }

    function printAddSituationResult()
    {
        $situationPDO = new SituationPDO();
        if ($situationPDO->create($this->newSituation)) {
            echo '<p>La situation a été ajoutée</br><a href="index.php?action=adminRedirection&step=view">Retour</a></p></p>';
        } else {
            echo "<p>Echec de l'enregistrement</p>";
        }
    }
}
