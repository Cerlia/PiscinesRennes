<?php

class AdminUpdateSituationAction
{
    function __construct()
    {
    }

    function executeSituationUpdate()
    {
        if (isset($_POST['id_situation'])) {
            $id_situation = htmlspecialchars($_POST['id_situation']);
            $name = htmlspecialchars($_POST['situationname']);
            $active = isset($_POST['active']) ? 1 : 0;
            $updatedSituation = new Situation($name, $active, $id_situation);
            $situationPDO = new SituationPDO();
            if ($situationPDO->update($updatedSituation)) {
                echo '<p>La situation a été modifiée</br><a href="index.php?action=adminRedirection&step=view">Retour</a></p>';
            } else {
                echo "Une erreur est survenue lors de la modification de la situation.";
            }
        }
    }
}
