<?php

class AdminDeactivate
{
    private $situation;
    private $activity;

    function __construct()
    {
        $type = $_POST["type"];
        $id = $_POST["id"];
        switch ($type) {
            case 'activity':
                $activityPDO = new ActivityPDO();
                $this->activity = $activityPDO->read($id);
                break;
            case 'situation':
                $situationPDO = new SituationPDO();
                $this->situation = $situationPDO->getSituation($id);
                break;
        }
    }

    function printDeactivateResult()
    {
        if ($this->activity != null) {
            $this->activity->setActive(0);
            $activityPDO = new ActivityPDO();
            $activityPDO->update($this->activity);
            echo '<p>L\'activité a été désactivée</br><a href="index.php?action=adminRedirection&step=view">Retour</a></p>';
        } else if ($this->situation != null) {
            $this->situation->setActive(0);
            $situationPDO = new SituationPDO();
            $situationPDO->update($this->situation);
            echo '<p>La situation a été désactivée</br><a href="index.php?action=adminRedirection&step=view">Retour</a></p>';
        }
    }
}
