<?php require '../elements/header.php';
    require '../function.php';
    $pdo = new PDO('mysql:dbname=grafikartphp;host=127.0.0.1','root','Trackmania12--!!');
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $error = null;
    $succes = null;
    $id = $_GET['id'];
   try {

    if (isset($_POST['name'],$_POST['message'])) {
      
      $query = $pdo->prepare('Update posts SET name = :name, content = :content WHERE ID = :id');
      $query->execute([
        'name' => $_POST['name'],
        'content' => $_POST['message'],
        'id' => $id
      ]);

      $succes = 'Your article have been sent';
    }


    $query = $pdo->prepare('SELECT * FROM posts where ID = :id ');
    $query->execute([
        'id' => $id
    ]);
    $post = $query->fetch(PDO::FETCH_OBJ);
    } catch (PDOException $th) {
       $error= $th->getMessage();
    }

    if ($query === false) {
        var_dump($pdo->errorInfo());
    }

?>
<?php if($error) : ?>
    <div class="alert alert-d">
        <p><?php echo  $error ?></p>
    </div>
<?php else : ?>

    <p>
        <a href="/blog">Return back</a>
    </p>
    <?php endif  ?>
    <?php if($succes) : ?>
    <div class="alert alert-success">
        <p><?php echo  $succes ?></p>
    </div>
    <?php endif  ?>
  



<?php require '../elements/footer.php' ?>