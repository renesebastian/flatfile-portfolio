<script type="text/javascript" src="<?php echo cdnUrl; ?>assets/js/lazyload.12.5.1.js"></script>
<script>	
    var lazyLoadInstance = new LazyLoad({
        elements_selector: ".lazy"
    });
</script>	
<div class="container breakout contentpage">
    <h1><?php echo $collectionTitle; ?></h1>
    <?php if($clientName){ ?><div class="meta"><?php echo $pageH1.' '.$clientName; ?></div><?php } ?>
    <p class="lg"><?php echo $collectionContent; ?></p>

    <?php 
        if($collectionLoopcount){
            echo '<div class="show">';
            for ($x = 1; $x <= $collectionLoopcount; $x++) { 
            echo '<a href="'.cdnUrl.'collections/'.$collectionSlug.'/'.$x.'.jpg" title="Rene Sebastian - '.$collectionTitle.'" target="_blank">
            <img 
            src="'.cdnUrl.'?src=collections/'.$collectionSlug.'/'.$x.'.jpg&width=160"
            alt="'.$collectionTitle.'" title="'.$collectionTitle.'"
            class="lazy"
            data-src="'.cdnUrl.'collections/'.$collectionSlug.'/'.$x.'.jpg"
            data-srcset="'.cdnUrl.'?src=collections/'.$collectionSlug.'/'.$x.'.jpg&width=400 400w, '.cdnUrl.'?src=collections/'.$collectionSlug.'/'.$x.'.jpg&width=800 800w, '.cdnUrl.'?src=collections/'.$collectionSlug.'/'.$x.'.jpg 1600w"
            data-sizes="100w"
        >           
                </a>';            
            }
            echo '</div>';
        } 
    ?>
    
    <?php if($clientContent){ ?>
    <h2 class="h4"><?php echo $pageContent.' '.$clientName; ?></h2>
    <div class="lg">
        <?php echo $clientContent; ?>
        <hr />
    </div>        
    <?php } ?>
    <?php require_once $_SERVER['DOCUMENT_ROOT'].'/partials/_contact-'.siteLang.'.php'; ?>
</div>
<script>
    lazyLoadInstance.update();
</script>