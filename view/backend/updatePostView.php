<?php $title = "View administration";?>

<?php
    ob_start();

    if (isset($_SESSION['nickname'])):
?>

<section class="manage-section">
    <div class="manage-div">
        <h1>
            Modifier les chapitres
        </h1>
        <div class="view-images">
            <p>Image titre</p>
            <img src="public/images/<?=$post['view_image'];?>">
        </div>

        <form action="index.php?action=updatePost&amp;id=<?=$post['id'];?>" method="post" enctype="multipart/form-data">
            <div class="radio">
                <p class="radio-p">
                    <?php if($post['draft'] > 0):?>
                    <span> Ceci est un brouillon !</span>
                    <?php
                        endif;
                    ?>
                    Votre choix, brouillon ?
                </p>
                <label for="oui">Oui</label>
                <input type="radio" name="draft" id="draft-yes" value="1" />
                <label for="non">Non</label>
                <input type="radio" name="draft" id="draft-no" value="0" />
            </div>
            <label for="title-image-update">Ajouter ou remplacer image titre</label><br>
            <input class="createPost-image" type="file" id="title-image-update" name="view_image" />
            <br>
            <div class="manage-form">
                <label for="title">Titre</label><br>
                <input type="text" id="title" name="title" class="manage-input" value="<?=$post['title'];?>" />
                <br>
                <label for="newPost">Contenu</label><br>
                <textarea id="newPost" class="manage-textarea textareaTiny" name="content"
                    rows="5"><?=$post['content'];?></textarea>
            </div>
            <div>
                <input type="submit" class="manage-button" value="Modifier"
                    onclick="return confirm('Confirmez-vous la modification ?')" />
            </div>
        </form>
    </div>
    <p>
        <a href="index.php?action=erasePost" class="tag-return">Retour</a>
    </p>
</section>

<?php
    endif;
?>

<?php $content = ob_get_clean()?>

<?php require "template.php";?>