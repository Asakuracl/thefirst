<?php $title = htmlspecialchars($post['title']);?>

<?php ob_start()?>

<section class="postView-section">
    <div class="postView-div">
        <h1>
            <u>
                <?=htmlspecialchars($post['title']);?>
            </u>
        </h1>

        <div>
            <p>
                <?=($post['content']);?>
            </p>
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

        <h2 class="postView-h3">Commentaires</h2>

        <form action="index.php?action=addComment&amp;id=<?=$post['id']?>" method="post">
            <div class="postView-form">
                <label for="author">Auteur
                    <span id="helpAuthor"></span>
                </label>
                <input type="text" id="author" class="postView-input" name="author" placeholder="Auteur" />
                <br>
                <label for="comment">Commentaire
                    <span id="helpTextarea"></span>
                </label>
                <textarea id="comment" class="postView-textarea textareaTiny" name="comment"></textarea>
            </div>
            <div>
                <input type="button" class="postView-btn-input" value="Renseigner le formulaire"
                    onclick=" return confirm('Confirmez-vous l\'envois du commentaire ?')" />
            </div>
        </form>
    </div>

</section>
<section class="postView-section">
    <button class="accordion">
        Voir commentaires
        <i class="fas fa-plus"></i>
    </button>
    <div class="postView-comment-div">
        <?php
            while ($comment = $comments->fetch()):
        ?>
        <p class="postView-second-p">
            <span class="postView-comment-date">
                <i class="fas fa-circle"></i> le
                <?=$comment['comment_date_fr'] . ' par ';?>
            </span>
            <span class="postView-comment-author">
                <?=htmlspecialchars($comment['author']);?>
            </span>
            <a href="index.php?action=warningComment&amp;id=<?=$comment['id'];?>">
                <button type="submit" id="alarm" class="postView-comment-btn" title="signalé commentaire ?"
                    onclick=" return confirm('Confirmez-vous le signalement ?')">
                    <i class="fas fa-bullhorn"></i>
                </button>
            </a>
        </p>
        <?php
            if (($comment['warning']) > 0):
        ?>
        <p class="warning-comment">
            Cet auteur a été signalé
            <span class="warning-underline"></span>
        </p>
        <?php
            endif;
        ?>
        <p class="postView-third-p">
            <?=nl2br(htmlspecialchars($comment['comment']));?>
        </p>
        <?php
            endwhile;   
        ?>
    </div>
</section>
<?php $content = ob_get_clean()?>

<?php require "template.php";?>