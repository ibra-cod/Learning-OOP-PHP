<?php
use App\Posts;
    require_once '../vendor/autoload.php';
    require '../elements/header.php';
    $pdo = new PDO('mysql:dbname=grafikartphp;host=127.0.0.1','root','Trackmania12--!!');
    $error = null;
   try {
    if (isset($_POST['name'],$_POST['message'])) {
        $query = $pdo->prepare('INSERT INTO posts (name, content,create_at) values (:name, :content, :create_at)');
        $query->execute([
          'name' => $_POST['name'],
          'content' => $_POST['message'],
          'create_at' =>  date("Y-m-d H:i:s")
        ]);
        header('Location: /blog/edit.php?id=' . $pdo->lastInsertId());
        $succes = 'Your article have been sent';
      }

    $query = $pdo->query('SELECT * FROM posts');
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
   } catch (PDOException $th) {
       $error= $th->getMessage();
   }

    if ($query === false) {
        var_dump($pdo->errorInfo());
    }
    $posts = $query->fetchAll(PDO::FETCH_CLASS, Posts::class);

?>
<?php if($error) : ?>
    <div class="alert alert-d">
        <p><?php echo $error ?></p>
    </div>
<?php endif ?>

<ul>
   <?php foreach ($posts as $post): ?>
        <h2>
            <a href="/blog/edit.php?id=<?= htmlentities($post->ID) ?>"><?php echo htmlentities($post->name )?></a>
        </h2>
        <p class="small"><?php echo  $post->created_at ?> </p>
        <p class=""><?=$post->getBody() ?></p>
    <?php endforeach ?>
</ul>

<form class="m-5" action="" method="post">
    <div class="form-group mt-5 ">
        <input  class="form-control" type="text" name="name" id="" value="">
    </div>
    <div class="pt-2">
    <textarea class="form-control" name="message" id=""></textarea>
    </div>
    <button type="submit" class="btn btn-primary m-5">submit</button>
</form>


<?php require '../elements/footer.php' ?>