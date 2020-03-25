<?php 
/*
    The Master IO file... input output you know. Get the input... and well, bake some output 🤓🍰

    As you may notice. Everything is build on top of a few flate Json files which run the whole site.
    This gives me the flexibility to update the website with a single (file) adjustment and still maintain
    highspeed performance and some sweet SEO enhancements.
*/

//load basic page information
if($pageData = array_shift(array_filter($essentials->pages->page, function($e)
    {
        //check if you get page id from htaccess
        if(addslashes($_GET['page'])){
            $pageId = addslashes($_GET['page']);
        
        //if no page id is known, return one (the index):
        }else{
            $pageId = 1;
        }

        //and return all the pagedata to the pageData var
        return $e->id == $pageId;
    })
))

//if we have page data:
{ 
    foreach($pageData->languages->language as $page){
        if($page->lang == siteLang){
            $pageId = $pageData->id;
            $pageTemplate = $page->template;
            $pageLang = $page->lang;
            $pageSlug = $page->slug;
            $pageStructuredData = $pageData->structuredData;
            $canonicalUrl = siteUrl.''.$page->slug;
            $alternate .= '<link rel="alternate" hreflang="'.$page->lang.'" href="'.siteUrl.''.$page->slug.'" />';
            
            //all meta stuff
            if($page->metaTitle){ $metaTitle = $page->metaTitle; }
            if($page->metaKeywords){ $metaKeywords = $page->metaKeywords; }
            if($page->metaDescription){ $metaDescription = $page->metaDescription; }
            if($page->metaImage){ $metaImage = cdnUrl.''.$page->metaImage; }
            if($page->h1){ $pageH1 = $page->h1; }
            if($page->content){ $pageContent = $page->content; }
            
            if($pageData->loadCollection){ $loadCollection = true; }
            if($pageData->loadVideo){ $loadVideo = true; }

            
        //make sure alternate is being filled:    
        }else{
            $alternate .= '<link rel="alternate" hreflang="'.alternateLang.'" href="'.alternateUrl.''.$page->slug.'" />';
            $alternateSlug = $page->slug;
        }
    }
    
    
    //If a collection is requested:
    if($loadCollection){
        
        $jsonSource = file_get_contents(cdnUrl.'data/collections.json'); 
        $sourceData = json_decode($jsonSource);
        $alternate = '';
        $notfound = true;
        
        $tempslug = addslashes($_GET['collection']);
        $collectionOb = array_shift(array_filter($sourceData->collections->collection, function($e)  use($tempslug){
            return $e->slug == $tempslug;
        }));
        
        if($collectionOb){
            
            foreach($collectionOb->languages->language as $collection){
                //making sure we output all the data that matches the slug, and site language
                
                if($collection->lang == siteLang && $collectionOb->slug == $tempslug){
                    
                    $collectionType = $collectionOb->type;
                    $collectionTitle = $collection->title;
                    $collectionKeywords = $collection->keywords;
                    $collectionSlug = $collectionOb->slug;
                    $collectionClient = $collectionOb->client;
                    $collectionContent = $collection->content;
                    $collectionLoopcount = $collectionOb->loopcount;
                    
                    //and fetch some client info as wel
                    if($collectionClient){
                        $jsonClients = file_get_contents(cdnUrl.'data/clients.json'); 
                        $clientData = json_decode($jsonClients);
                        
                        $clientInfo = array_shift(array_filter($clientData->clients->client, function($a) use($collectionClient) {
                            return $a->slug == $collectionClient;
                        }));
                        
                        foreach($clientInfo->languages->language as $clientLoop){
                            if($clientLoop->lang == siteLang){
                                $clientContent = $clientLoop->content;
                            }
                        }

                        $clientName = $clientInfo->name;
                    }
                    
                    //almost done, let's fill some metadata
                    $metaTitle = siteBrand.' - '.$collectionTitle;
                    $metaKeywords = $collectionKeywords;
                    $metaDescription = substr(strip_tags($collectionContent), 0, 150).'...';
                    $metaImage = cdnUrl.'?src=collections/'.$collectionSlug.'/cover.jpg&width=640';
                    $canonicalUrl = siteUrl.''.$pageSlug.'/'.$collectionOb->slug;
                    $alternate .= '<link rel="alternate" hreflang="'.$pageLang.'" href="'.$canonicalUrl.'" />';
                    $notfound = false;
                
                //fill the alternate url
                }else{ 
                    $alternate .= '<link rel="alternate" hreflang="'.alternateLang.'" href="'.alternateUrl.''.$alternateSlug.'/'.$collectionOb->slug.'" />';
                }
            }
        }else{
            $notfound = true;
        }
            
        //if no collection is found with the given slug. Return a 404
        if($notfound){
            $metaTitle = '404 - Not found';
            $metaKeywords = '404, not, found';
            $metaDescription = '404 - Page not found';
            header("HTTP/1.0 404 Not Found");
            $pageTemplate = '404.php';
        }
    }

    //If a video is requested:
    if($loadVideo){
        $jsonSource = file_get_contents(cdnUrl.'data/videos.json'); 
        $sourceData = json_decode($jsonSource);
        $alternate = '';
        $notfound = true;

        $tempslug = addslashes($_GET['video']);
        $videoOb = array_shift(array_filter($sourceData->videos->video, function($e)  use($tempslug){
            return $e->slug == $tempslug;
        }));

        if($videoOb){
            foreach($videoOb->languages->language as $video){
                
                //making sure we output all the data that matches the slug, and site language
                if($video->lang == siteLang){
                    
                    $videoId = $videoOb->id;
                    $videoThumbId = $videoOb->thumbid;
                    $videoTitle = $video->title;
                    $videoTitle = $video->title;
                    $videoSlug = $videoOb->slug;
                    $videoKeywords = $video->keywords;
                    $videoContent = $video->content;
                    $videoRelease = $videosOb->release;
                    $videoClient = $videoOb->client;
                    $videoCategory = $video->category;
                    if($videoOb->complementaryId){ $videoComplementaryId = $videoOb->complementaryId; }
                    if($video->complementaryTitle){ $videoComplementaryTitle = $video->complementaryTitle; }
                    if($video->complementaryContent){ $videoComplementaryContent = $video->complementaryContent; }
                    
                    //and fetch some client info as wel
                    if($videoClient){
                        $jsonClients = file_get_contents(cdnUrl.'data/clients.json'); 
                        $clientData = json_decode($jsonClients);
                        
                        $clientInfo = array_shift(array_filter($clientData->clients->client, function($a) use($videoClient) {
                            return $a->slug == $videoClient;
                        }));
                        
                        foreach($clientInfo->languages->language as $clientLoop){
                            if($clientLoop->lang == siteLang){
                                $clientContent = $clientLoop->content;
                            }
                        }
                        $clientName = $clientInfo->name;
                    }
                    
                    //almost done, let's fill some metadata
                    $metaTitle = siteBrand.' - '.$videoTitle;
                    if($videoKeywords){ $metaKeywords = $videoKeywords; }
                    if($videoContent){ $metaDescription = substr(strip_tags($videoContent), 0, 150).'...'; }
                    $metaImage = '//i.vimeocdn.com/video/'.$videoData->thumbid.'_640.jpg';
                    $canonicalUrl = siteUrl.''.$pageSlug.'/'.$videoOb->slug;
                    $alternate .= '<link rel="alternate" hreflang="'.$pageLang.'" href="'.$canonicalUrl.'" />';
                    $notfound = false;
                
                //fill the alternate url
                }else{ 
                    $alternate .= '<link rel="alternate" hreflang="'.alternateLang.'" href="'.alternateUrl.''.$alternateSlug.'/'.$videoOb->slug.'" />';
                }
            }
        }else{
            $notfound = true;
        }
            
        //if no collection is found with the given slug. Return a 404
        if($notfound){
            $metaTitle = '404 - Not found';
            $metaKeywords = '404, not, found';
            $metaDescription = '404 - Page not found';
            header("HTTP/1.0 404 Not Found");
            $pageTemplate = '404.php';
        }
    }


//in case the page data function fails for some reason, return a 404    
}else{
    $metaTitle = '404 - Not found';
    $metaKeywords = '404, not, found';
    $metaDescription = '404 - Page not found';
    header("HTTP/1.0 404 Not Found");
    $pageTemplate = '404.php';
}
?>