<div class="container contentpage">
    <h1> <?php if($videoCategory){ echo $videoCategory.': '; }?><?php echo $videoTitle; ?></h1>
    <?php if($clientName){ ?><div class="meta"><?php echo $pageH1.' '.$clientName; ?></div><?php } ?>
    <p class="lg"><?php echo $videoContent; ?></p>

    <div class=" m-b-2">
        <script src="//js.mave.io/<?php echo $videoId; ?>"></script>
    </div>
    
    <?php if($clientContent){ ?>
    <h2 class="h4"><?php echo $pageContent.' '.$clientName; ?></h2>
    <div class="lg">
        <?php echo $clientContent; ?>
        <hr />
    </div>        
    <?php } ?>
    <?php if($videoComplementaryId){ ?>
        <?php if($videoComplementaryTitle){ echo '<h2>'.$videoComplementaryTitle.'</h2>'; } ?>
        <?php if($videoComplementaryContent){ echo '<p class="lg">'.$videoComplementaryContent.'</p>'; } ?>
        <div class="aspect-lock m-b-2 lg">
            <img class="ratio" src="<?php echo cdnUrl; ?>assets/16x9.png" title="" />
            <iframe src="//player.vimeo.com/video/<?php echo $videoComplementaryId; ?>?portrait=0&title=0&amp;byline=0"frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            <hr />
        </div>
    <?php } ?>
    <?php require_once $_SERVER['DOCUMENT_ROOT'].'/partials/_contact-'.siteLang.'.php'; ?>
</div>