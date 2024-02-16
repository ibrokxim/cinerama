<?php
/**
 * @var \App\Kernel\Auth\AuthInterface $auth
 *
 */

$user = $auth->user();
?>

<header>
    <?php if ($auth->check()) {?>
        <h1>User: <?php echo $user->email()?></h1>
        <form action="/logout" method="post">
            <button>Logout</button>
        </form>
    <?php } ?>

</header>

