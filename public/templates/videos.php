<div class="container">
    <h1><?php echo $pageH1; ?></h1>
    <p class="lg m-b-3"><?php echo $pageContent; ?></p>
    <?php videoLooop(); ?>
    <?php require_once $_SERVER['DOCUMENT_ROOT'].'/partials/_contact-'.siteLang.'.php'; ?>
</div>
