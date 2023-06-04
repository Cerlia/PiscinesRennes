<?php

class AdminUpdateActivity
{
    private $activityToUpdate;

    function __construct()
    {
        $activityID = intval($_POST["id"]);
        $activityPDO = new ActivityPDO();
        $this->activityToUpdate = $activityPDO->read($activityID);
    }

    function printUpdateActivityForm()
    {
        echo '
        <form method="POST" action="index.php">
        <label for="activityname">Libellé de l\'activité :</label></br>
        <input type="text" style="width:50%" name="activityname" id="activityname" value="' .
            $this->activityToUpdate->getName() . '" required>
        <br><br>
        <label for="description">Description de l\'activité :</label></br>
        <input type="text" style="width:80%" name="description" id="description" value="' .
            $this->activityToUpdate->getDescription() . '" required>
        <br><br>
        <label><input type="checkbox" name="booking" id="booking" value="1" ' .
            ($this->activityToUpdate->getBooking() == 1 ? "checked" : "") . '> Réservation nécessaire</label>
        <br><br>
        <label><input type="checkbox" name="active" id="active" value="1" ' .
            ($this->activityToUpdate->getActive() == 1 ? "checked" : "") . '> Activité disponible</label>
        <br><br>
        <input type="hidden" name="id_activity" value="' . $this->activityToUpdate->getIdActivity() . '">
        <input type="hidden" name="action" value="adminRedirection" >
        <input type="hidden" name="step" value="updateActivityAction" >
        <button type="submit">Modifier l\'activité</button>
        </form>';
    }
}
