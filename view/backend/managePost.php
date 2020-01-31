<?php $title = "View administration";?>

<?php
    ob_start();

    if (isset($_SESSION['nickname'])) {
?>

<section class="">
    <div class="">
        <h1>Administrer les chapitres</h1>
    </div>
    <div class="">
        <?php
        while ($dataPosts = $posts->fetch()) {
    ?>
        <div class="">
            <div>
                <h2 class="">
                    <?=htmlspecialchars($dataPosts['title']);?>
                </h2>
                <p class="">
                    <br>le <?=$dataPosts['creation_date_fr'];?>
                </p>
            </div>
            <div>
                <a class="" href="index.php?action=updatePostView&amp;id=<?=$dataPosts['id'];?>">
                    Modifier chapitre
                </a>
            </div>
            <div>
                <a class="" href="index.php?action=moderateCommentView&amp;id=<?=$dataPosts['id'];?>">
                    Modérer commentaire
                </a>
            </div>
            <div>
                <a class="" href="index.php?action=deletePost&amp;id=<?=$dataPosts['id'];?>"
                    onclick="return confirm('attention suppression définitive !')">
                    Supprimer ?
                </a>
            </div>
        </div>
        <?php
        }
        $posts->closeCursor();
    ?>
    </div>
</section>

<section>
    <div class="">
        <h3 class="">
            Commentaire signalé dans :
        </h3>
    </div>
    <p class="">
        <?php
        while ($seeWarning = $seeWarningComment->fetch()) {
            if ($seeWarning['total'] > 0) {
        ?>
        <i class="fas fa-circle"></i>
        <?=$seeWarning['title'];?>
        <br>
        <?php
        }
            }
            $seeWarningComment->closeCursor();
            ?>
    </p>
</section>

<?php
    }
?>

<?php $content = ob_get_clean()?>

<?php require "template.php";?>