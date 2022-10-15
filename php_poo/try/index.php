<?php
    
    require_once 'class/Message.php';
    require_once 'class/GuestBook.php';
    $errors = null;
    $success = false;

    if (isset($_POST['username'], $_POST['message'])) {
        $message = new Message($_POST['username'], $_POST['message']);
        if ($message->isValid()) {
            $guestBook = new GuestBook(__DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'messages.txt');
            $guestBook->addMessage($message);
            $guestBook->getMessage();
            $success = true;
            $_POST = [];
        } else {
            $errors = $message->getErrors();
        }
    }

    $title = "Livre d'or";
    require_once 'elements/header.php';
?>

<div class="container">
    <h1>Livre d'or</h1>
    <?php if (!empty($errors)) : ?>
        <div class="alert alert-danger">
            Formulaire invalide
        </div>
    <?php endif ?>
    <?php if ($success) : ?>
        <div class="alert alert-success">
            Merci pour votre message
        </div>
    <?php endif ?>
    <form action="" method="post" >
        <div class="form-group">
            <input type="text" name="username" class="form-control <?= isset($errors['username']) ? 'is-invalid' : '' ?>" placeholder="Votre pseudo">
            <?php if(isset($errors['username'])) : ?>
                <div class="invalid-feedback"><?= $errors['username'] ?></div>
            <?php endif ?>
        </div>
        <div class="form-group">
            <textarea name="message" class="form-control <?= isset($errors['message']) ? 'is-invalid' : '' ?>" placeholder="Votre message"></textarea>
            <?php if(isset($errors['message'])) : ?>
                <div class="invalid-feedback"><?= $errors['message'] ?></div>
            <?php endif ?>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</div>

<?php
    require_once 'elements/footer.php';
?>