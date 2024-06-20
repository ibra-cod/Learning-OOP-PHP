<?php 
require_once 'class/Message.php';
require_once 'class/GuestBook.php';
    $errors = null;
    $success = false;
    $title = 'Livre d\'or';
    require './elements/header.php';
    $guestbook = new GuestBook(__DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'message');

    if (isset($_POST['username'], $_POST['message'])) {
       $message = new Message($_POST['username'], $_POST['message']);
       if ($message->isValid()) {
            $guestbook->addMessage($message);
            $success = true; 
            $_POST = [];
       } else {
        $errors  = $message->getErrors();
       }
    } 

    $message = $guestbook->getMessages();

?>

    <div class="container pt-4">
        <?php  if (!empty($errors)) : ?>
            <p class="alert alert-danger">Invalid Form</p>
        <?php endif ; ?>

        <?php  if ($success === true) : ?>
            <p class="alert alert-success">Thanks for you messages</p>
        <?php endif ; ?>

        <h1>Livre d'or</h1>
        <form class="form-group" method="post">
            <div class="container pt-3 pb-3">
                    <div>
                    <input value="<?php htmlentities($_POST['username'] ?? '') ?>" type="text" name="username" placeholder="your username" class="from-control" <?php isset($errors['message']) ? 'is-invalid' : ""?>
                    <?php if (isset($errors['username'])) : ?>
                        <div class="invalid-feeback">
                                <?php echo $errors['username'] ?>
                        </div>
                    <?php endif ;?>
                    </div>
                <div class="container">
                    <textarea class="from-control" name="message" placeholder="votre message"
                            <?php isset($errors['message']) ? 'is-invalid' : ""  ?>
                    ><?php htmlentities($_POST['message'] ?? '') ?></textarea>
                    <?php if (isset($errors['message'])) : ?>
                            <div class="invalid-feeback">
                                    <?php echo $errors['username'] ?>
                            </div>
                        <?php endif ;?>
                </div>
                <div class="container">
                    <button class="btn btn-primary" type="submit">submit</button>
                </div>

            </div>

        </form>
    </div>


<?php
    require './elements/footer.php';
    ?>