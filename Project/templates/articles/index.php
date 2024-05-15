<?php require(__DIR__.'/../header.php'); ?>
    <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Text</th>
        <th scope="col">Author</th>
        <th scope="col">Created</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($articles as $article):?>
    <tr>
      <th scope="row"><?=$article->getId();?></th>
      <td><a href="<?=dirname($_SERVER['SCRIPT_NAME'])?>/article/<?=$article->getId();?>"><?=$article->getTitle();?></a></td>
      <td><?=$article->getText();?></td>
      <td><?=$article->getAuthorId()->getNickName();?></td>
      <td><?=$article->getCreatedAt();?></td>
    </tr>
    <?php endforeach;?>
    </tbody>
    </table>
<?php require(__DIR__.'/../footer.php'); ?>