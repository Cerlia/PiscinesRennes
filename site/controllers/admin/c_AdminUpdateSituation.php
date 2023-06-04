<?php

class AdminUpdateSituation
{
    private $situationToUpdate;

    function __construct()
    {
        $situationID = intval($_POST["id"]);
        $situationPDO = new SituationPDO();
        $this->situationToUpdate = $situationPDO->getSituation($situationID);
    }

    function printUpdateSituationForm()
    {
        echo '
        <form method="POST" action="index.php">
        <label for="situationname">Libellé de la situation :</label></br>
        <input type="text" style="width:50%" name="situationname" id="situationname" value="' .
            $this->situationToUpdate->getName() . '" required>
        <br><br>
        <label><input type="checkbox" name="active" value="1" ' .
            ($this->situationToUpdate->getActive() == 1 ? "checked" : "") . '>Situation disponible</label>
        <br><br>
        <input type="hidden" name="id_situation" value="' . $this->situationToUpdate->getIdSituation() . '">
        <input type="hidden" name="action" value="adminRedirection" >
        <input type="hidden" name="step" value="updateSituationAction" >
        <button type="submit">Modifier la situation</button>
        </form>';
    }
}
