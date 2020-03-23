<script type="text/javascript" src="<?php echo cdnUrl; ?>assets/js/lazyload.12.5.1.js"></script>
<script>	
    var lazyLoadInstance = new LazyLoad({
        elements_selector: ".lazy"
    });
</script>	
<div class="container">
    <h1 class="welcome"><?php echo $pageH1; ?></h1>
    <p class="lg m-b-3"><?php echo $pageContent; ?></p>
    <section>
        <h2 class="m-b-1">Uitgelichte foto collecties</h2>
        <?php collectionLooop('collections',7); ?>
        <a href="/fotografie" class="show-all" title="bekijk alle foto collecties">- alle foto collecties -</a>
    </section>
    <section>
        <h2 class="m-b-1">Uitgelichte videos</h2>
        <?php videoLooop(7); ?>
        <a href="/videos" class="show-all" title="bekijk alle videoproducties">- alle videos -</a>
    </section>
    <section>
        <h2 class="m-b-1">FPV Dronerace fotografie</h2>
        <?php collectionLooop('droneracing',7); ?>
        <a href="/droneracing" class="show-all" title="bekijk alle fpv dronerace collecties">- alle fpv dronerace collecties -</a>
    </section>
    <?php require_once $_SERVER['DOCUMENT_ROOT'].'/partials/_contact-'.siteLang.'.php'; ?>        
</div>
<script>
    lazyLoadInstance.update();
</script>