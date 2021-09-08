<?php
    //Yes thats right. This is some super duper nasty shit echo'ing in a function. Sorry 🤷🏻‍♂️
    function collectionLooop($type,$limit = 100){
        $jsonCollections = file_get_contents(cdnUrl.'data/collections.json'); 
        $collectionLoop = json_decode($jsonCollections);
        
        echo '<ul class="projects">';

        foreach($collectionLoop->collections->collection as $collectionData){
            if($collectionData->type == $type){
                foreach($collectionData->languages->language as $collection){
                    if($collection->lang == siteLang  && $collection->public == true){
                        if (++$loop < $limit) {
                        ?>
                            <li>
                                <a href="/<?php echo siteCollectionSlug.'/'.$collectionData->slug; ?>" title="<?php echo $collection->title; ?>">
                                    <div class="aspect-lock show">
                                        <img class="lazy ratio" src="<?php echo cdnUrl; ?>?src=collections/<?php echo $collectionData->slug; ?>/cover.jpg&width=160" data-src="<?php echo cdnUrl; ?>?src=collections/<?php echo $collectionData->slug; ?>/cover.jpg&width=640" alt="<?php echo $collection->title; ?>" title="<?php echo $collection->title; ?>">
                                        <div class="overlay look"></div>
                                        <h3><?php echo $collection->title; ?></h3>
                                    </div>
                                </a>
                            </li>
                        <?php
                        }
                    }
                }
            }    
        }
        echo '</ul>';
    }

    function videoLooop($type,$limit = 100){
        
        $jsonVideos = file_get_contents(cdnUrl.'data/videos.json'); 
        $videoLoop = json_decode($jsonVideos);
        
        echo '<ul class="projects">';
        
        foreach($videoLoop->videos->video as $videoData){
            if($videoData->type == $type){
                foreach($videoData->languages->language as $video){
                    if($video->lang == siteLang  && $video->public == true){
                        if (++$loop < $limit) {
                        ?>
                            <li>
                                <a href="/<?php echo siteVideoSlug.'/'.$videoData->slug; ?>" title="<?php echo $video->title; ?>">
                                    <div class="aspect-lock">
                                        <img class="ratio" src="//i.vimeocdn.com/video/<?php echo $videoData->thumbid; ?>_640.jpg" alt="<?php echo $video->title; ?>" title="<?php echo $video->title; ?>">
                                        <div class="overlay play"></div>
                                        <h3><?php if($video->category){ echo $video->category.': '; } echo $video->title; ?></h3>
                                    </div>
                                </a>
                            </li>
                        <?php
                        }
                    }
                }
            }
        }
        echo '</ul>';
    }
?>