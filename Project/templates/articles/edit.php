<?php require(__DIR__.'/../header.php'); ?>
<form action="<?=dirname($_SERVER['SCRIPT_NAME'])?>/article/update/<?=$article->getId();?>" method = "POST">
    <input type="hidden" name="inputAuthorId" value=<?=$article->getAuthorId()->getId();?>>

  <div class="mb-3">
    <label for="inputTitle" class="form-label">Title article</label>
    <input name='inputTitle' type="text" class="form-control" id="inputTitle" value="<?=$article->getTitle();?>">
  </div>

  <div class="mb-3">
    <label for="inputText" class="form-label">Text article</label>
    <textarea name='inputText' type="text" class="form-control" id="inputText"><?=$article->getText();?></textarea>
  </div>

  <button type="submit" class="btn btn-primary">Save</button>
</form>
<?php require(__DIR__.'/../footer.php'); ?>