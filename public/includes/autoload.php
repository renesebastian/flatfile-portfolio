<?php
$jsonEssentials = file_get_contents(cdnUrl.'data/essentials.json'); 
$essentials = json_decode($jsonEssentials);

//for now, this works for 2 languages.
foreach($essentials->sites->site as $site){
    //first load the site configured
    if($site->id == siteId){
        define('siteName', $site->sitename);
        define('siteBrand', $site->brand);
        define('siteUrl', $site->url);
        define('siteLang', $site->baseLang);
        define('siteTextLang', $site->textLang);
        define('siteSlogan', $site->slogan);
        define('siteKnowsAbout', $site->knowsAbout);
        define('siteFooter', $site->footer);
        define('siteNotFoundTitle', $site->notFoundTitle);
        define('siteNotFoundContent', $site->notFoundContent);
        define('siteGtag', $site->gtag);
    //and load the alternative website
    }else{ 
        define('alternateName', $site->sitename);
        define('alternateBrand', $site->brand);
        define('alternateUrl', $site->url);
        define('alternateLang', $site->baseLang);
        define('alternateTextLang', $site->textLang);
    }
}

//need to figure out how this bit can be cleaner... i need those vars though.
foreach($essentials->pages->page[5]->languages->language as $fetchslug) {
    if($fetchslug->lang == siteLang){
        define('siteCollectionSlug', $fetchslug->slug);
    }
}
foreach($essentials->pages->page[6]->languages->language as $fetchslug) {
    if($fetchslug->lang == siteLang){
        define('siteVideoSlug', $fetchslug->slug);
    }
}
?>