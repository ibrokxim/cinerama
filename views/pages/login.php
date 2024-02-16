<?php /** @var \App\Kernel\Session\Session $session
 * @var \App\Kernel\View\View $view
 * */?>

<?php $view->component('start') ?>
    <h1>Login </h1>

    <form action="/login" method="post">
        <?php if($session->has('error')) {?>
            <p style="color: #d20c0c">
                <?php echo $session->getFlash('error')?>
            </p>
        <?php }?>

        <p>email</p>
        <input type="email" name="email">

        <p>Password</p>
        <input type="password" name="password">

        <button>Login</button>
    </form>
<?php $view->component('end') ?>