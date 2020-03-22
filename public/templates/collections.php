
<div class="container">
    <h1><?php echo $pageH1; ?></h1>
    <p class="lg m-b-3"><?php echo $pageContent; ?></p>

    <?php 
        //sloppy code, but always give 1 more to the limit then needed
        collectionLooop($pageData->name);
    ?>

    <?php require_once $_SERVER['DOCUMENT_ROOT'].'/partials/_contact-'.siteLang.'.php'; ?>        
</div>