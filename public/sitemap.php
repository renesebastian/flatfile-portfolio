<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/../config.php';
header('Content-type: application/xml; charset=utf-8');
echo '<?xml version="1.0" encoding="UTF-8"?>' 
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <?php 
        //load all the basic pages:
        foreach($essentials->pages->page as $menuLoop){
            if($menuLoop->showSitemap){         
                foreach($menuLoop->languages->language as $menuItem){
                    if($menuItem->lang == siteLang){
                        echo '
    <url>
        <loc>'.siteUrl.''.$menuItem->slug.'</loc>
        <lastmod>'.lastUpdate.'</lastmod>
        <changefreq>weekly</changefreq>
        <priority>1</priority>
    </url>';
                    }   
                }
            }
        }

        //load all the photo collections
        $jsonCollections = file_get_contents(cdnUrl.'data/collections.json'); 
        $collectionLoop = json_decode($jsonCollections);
        foreach($collectionLoop->collections->collection as $collectionData){
            foreach($collectionData->languages->language as $collection){
                if($collection->lang == siteLang  && $collection->public == true){
                    echo '
    <url>
        <loc>'.siteUrl.''.siteCollectionSlug.'/'.$collectionData->slug.'</loc>
        <lastmod>'.lastUpdate.'</lastmod>
        <changefreq>weekly</changefreq>
        <priority>1</priority>
    </url>';  
                }
            }
        }


        //load all the video collections
         //load all the photo collections
         $jsonCollections = file_get_contents(cdnUrl.'data/videos.json'); 
         $videoLoop = json_decode($jsonCollections);
         foreach($videoLoop->videos->video as $videoData){
            foreach($videoData->languages->language as $video){
                if($video->lang == siteLang  && $video->public == true){
                     echo '
     <url>
         <loc>'.siteUrl.''.siteVideoSlug.'/'.$videoData->slug.'</loc>
         <lastmod>'.lastUpdate.'</lastmod>
         <changefreq>weekly</changefreq>
         <priority>1</priority>
     </url>';  
                 }
             }
         }

    ?>
</urlset>

