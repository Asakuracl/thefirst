<?php $title = "View administration";?>

<?php
    ob_start();

    if (isset($_SESSION['nickname'])) {
?>

<section class="updatePost-section">
    <div class="updatePost-first-div">
        <h1>
            Modifier les chapitres
        </h1>

        <form action="index.php?action=updatePost&amp;id=<?=$post['id'];?>" method="post">
            <div class="updatePost-form">
                <label for="title">Titre</label><br>
                <input type="text" id="title" name="title" class="updatePost-input" value="<?=$post['title'];?>" />
                <br>
                <label for="newPost">Contenu</label><br>
                <textarea id="newPost" class="updatePost-textarea" name="content"
                    rows="5"><?=$post['content'];?></textarea>
            </div>
            <div>
                <input type="submit" class="updatePost-button" value="Modifier"
                    onclick="return confirm('Confirmez-vous la modification ?')" />
            </div>
        </form>
    </div>
    <p>
        <a href="index.php?action=erasePost" class="tag-return">Retour</a>
    </p>
</section>

<?php
    }
?>

<?php $content = ob_get_clean()?>

<?php require "template.php";?>