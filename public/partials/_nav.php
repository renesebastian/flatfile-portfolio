<nav>
    <a href="/" title="<?php echo siteBrand; ?>">
        <img src="<?php echo cdnUrl; ?>assets/rene-io.svg" title="<?php echo siteBrand; ?>" alt="<?php echo siteBrand; ?>">	
    </a>
    <ul>
        <?php 
        foreach($essentials->pages->page as $menuLoop){
            if($menuLoop->showMenu){         
                foreach($menuLoop->languages->language as $menuItem){
                    if($menuItem->lang == siteLang){
                        echo '<li><a href="/'.$menuItem->slug.'" title="'.$menuItem->menuTitle.'">'.$menuItem->menuName.'</a></li>';
                    }   
                }
            }
        }
        ?>
        <li class="small m-t-2"><a href="https://instagram.com/renesebastian" rel="nofollow" target="_blank" title="Rene Sebastian - Instagram">Instagram</a></li>
        <li class="small"><a href="https://youtube.com/renesebastian" rel="nofollow" target="_blank" title="Rene Sebastian - Youtube">Youtube</a></li>
        <li class="small"><a href="https://github.com/renesebastian" rel="nofollow" target="_blank" title="Rene Sebastian - Github">Github</a></li>
        <li class="small"><a href="https://www.linkedin.com/in/renesebastian/" rel="nofollow" target="_blank" title="Rene Sebastian - LinkedIn">Linkedin</a></li>
        <li class="small m-t-2"><a href="<?php echo alternateUrl; ?>" title="<?php echo alternateTextLang; ?>"><?php echo alternateTextLang; ?></a></li>
    </ul>
</nav>


