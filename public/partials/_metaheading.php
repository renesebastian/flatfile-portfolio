<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="nl">
<head>
<!-- 

Before we start, yes this website is handcoded by Yours Truly, Rene Sebastian
Interested in the code that gets this site running? Checkout the github link on the website itself.
It may not be perfect, but it suits all my needs. Thanks for checking! ✌🏻

Let's start with the basics:
 -->
<meta charset="UTF-8">
<?php if($metaTitle){ ?><title><?php echo $metaTitle; ?></title><?php } ?>

<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<?php if($metaDescription){ ?><meta name="description" content="<?php echo $metaDescription; ?>" /><?php } ?>

<?php if($metaKeywords){ ?><meta name="keywords" content="<?php echo $metaKeywords; ?> " /><?php } ?>

<meta name="copyright" content="<?php echo date("Y"); ?> Rene Sebastian" />
<meta name="author" content="Rene Sebastian" />
<meta name="revisit-after" content="7 days" />
<meta name="rating" content="general" />
<meta name="robots" content="index,follow" />
<meta name="robots" content="All" />

<!-- favi and appicons -->
<link rel="shortcut icon" href="/favicon.ico" />
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo cdnUrl; ?>assets/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo cdnUrl; ?>assets/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo cdnUrl; ?>assets/favicon-16x16.png">
<link rel="mask-icon" href="<?php echo cdnUrl; ?>assets/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">

<!-- css -->
<link rel="stylesheet" type="text/css" href="<?php echo cdnUrl; ?>assets/css/rene-io-20-<?php echo md5(lastUpdate) ?>.css">

<!-- language alternates -->
<?php if($canonicalUrl){ ?><link rel="canonical" href="<?php echo $canonicalUrl; ?>" /><?php } ?>
<?php if($alternate){ echo $alternate; } ?> 

<!-- structured data -->
<?php if($pageStructuredData == 'default'){ ?>
<script type="application/ld+json">{
"@context": "https://schema.org",
"@type": "ProfessionalService",
"image": ["<?php echo cdnUrl;?>renesebastian.jpg","<?php echo cdnUrl;?>headers/paaspop.jpg","<?php echo cdnUrl;?>headers/nyc.jpg"],
"@id": "<?php echo siteUrl;?>",
"name": "Rene Sebastian",
"brand": "<?php echo siteBrand; ?>",
"founder": "Rene Sebastian",
"slogan": "<?php echo siteSlogan; ?>",
"url": "<?php echo siteUrl ?>",
"telephone": "+31640538368",
"priceRange": "$",
"knowsAbout": "<?php echo siteKnowsAbout; ?>",
"address": {"@type": "PostalAddress","addressLocality": "Eindhoven","addressCountry": "NL"},
"vatID": "NL001847674B08"}</script>
<? }elseif($pageStructuredData == 'collection'){ ?>
<script type="application/ld+json">
{
  "@context": "http://schema.org/",
  "@type": "CreativeWork",
  "name": "<?php echo $collectionTitle; ?>",
  "creator": "Rene Sebastian",
  "editor": "Rene Sebastian",
  "genre": "<?php echo $pageSlug; ?>",
  "accessMode": "visual",
  <?php if($collectionContent){?>"accessibilitySummary": "<?php echo strip_tags($collectionContent); ?>",<?php } ?>
  <?php if($clientContent){?>"contributor": "<?php echo $clientName; ?>",<? } ?>
  "text": "<?php echo $collectionTitle; ?> - Rene Sebastian<?php if($collectionContent){ echo ' -  '.strip_tags($collectionContent); } ?>"
}
</script>
<? }elseif($pageStructuredData == 'video'){ ?>
<script type="application/ld+json">
{
  "@context": "http://schema.org/",
  "@type": "CreativeWork",
  "name": "<?php echo $videoTitle; ?>",
  "creator": "Rene Sebastian",
  "editor": "Rene Sebastian",
  "genre": "<?php echo $pageSlug; ?>",
  "accessMode": "visual",
  <?php if($videoContent){?>"accessibilitySummary": "<?php echo strip_tags($videoContent); ?>",<?php } ?>
  <?php if($clientContent){?>"contributor": "<?php echo $clientName; ?>",<? } ?>
  "text": "<?php echo $videoTitle; ?> - Rene Sebastian<?php if($videoContent){ echo ' -  '.strip_tags($videoContent); } ?>"
}
</script>
<? } ?>

<!-- keeping mark happy -->
<meta property="og:type" content="website">
<meta property="og:title" content="<?php echo $metaTitle; ?>">
<meta property="og:site_name" content="<?php echo siteName; ?>">
<meta property="og:description" content="<?php echo $metaDescription; ?>">
<meta property="og:image" content="<?php echo $metaImage; ?>" name="image">
<?php if($canonicalUrl){ ?><meta property="og:url" content="<?php echo $canonicalUrl; ?>"><?php } ?>


<!-- okay i admit, i want some insights too -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-40623174-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', '<?php echo siteGtag; ?>');
</script>

<!-- end of meta heading -->
</head>