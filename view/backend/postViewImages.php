<?php $title = "View administration";?>

<?php
    ob_start();

    if (isset($_SESSION['nickname'])):
?>

<section class="manage-section">
    <div class="manage-div">
        <h1>
            Ajouter des images
        </h1>
        <div class="postviewImage-second-div">
            <p>images actuelles :</p>
            <?php
                while ($image = $images->fetch()):
            ?>
            <span class="postView-images">
                <img class="postView-images-size" src="public/images/postimages/<?=$image['postview_image'];?>">
            </span>
            <?php 
                endwhile; 
            ?>
        </div>
        <form action="index.php?action=addImages&amp;id=<?=$post['id'];?>" method="post" enctype="multipart/form-data">
            <div class="radio">
                <label for="title">Ajouter image contenu</label><br>
                <input class="postviewImage-input" type="file" id="content-image" name="postviewImage" required />
            </div>
            <div>
                <input type="submit" class="manage-button" value="Envoyer"
                    onclick="return confirm('Confirmez-vous l'\'envois ?')" />
            </div>
            <div class="imageSend">
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