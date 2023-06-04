<?php require_once('controllers/admin/c_AdminUpdateActivity.php') ?>
<?php $title = "Piscines municipales de Rennes - Page Administrative - Modification Activité"; ?>

<?php ob_start(); ?>

<?php $ControllerAdminUpdateActivity = new AdminUpdateActivity ?>

<main>
    <h1>Modifier une activité</h1>
    <?php $ControllerAdminUpdateActivity->printUpdateActivityForm(); ?>
    <form method="POST" action="index.php">
    <input type="hidden" name="action" value="adminRedirection" >
    <input type="hidden" name="step" value="view" >
    <button type="submit">Annuler</button>
</form>
</main>

<?php $content = ob_get_clean(); ?>
<?php require('view/layout.php') ?>