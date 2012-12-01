<!-- -*- mode: html; tab-width: 2 -*- -->
<?php
   if (!defined('DOKU_INC')) die(); /* must be run from within DokuWiki */
   @require_once(dirname(__FILE__).'/tpl_functions.php'); /* include hook for template functions */

   $showTools = !tpl_getConf('hideTools') || ( tpl_getConf('hideTools') && $_SERVER['REMOTE_USER'] );
   ?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $conf['lang'] ?>"
      lang="<?php echo $conf['lang'] ?>" dir="<?php echo $lang['direction'] ?>" class="no-js">
  <head>
    <meta charset="UTF-8" />
    <title>
      <?php
         if (tpl_pagetitle($id=NULL, $ret=true) != "home") tpl_pagetitle();
         ?>
      [<?php echo strip_tags($conf['title']) ?>]
    </title>
    <script>(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)</script>
    <?php tpl_metaheaders() ?>
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <?php echo tpl_favicon(array('favicon', 'mobile')) ?>
    <?php tpl_includeFile('meta.html') ?>
  </head>

  <body>
    <?php /* the "dokuwiki__top" id is needed somewhere at the top, because that's where the "back to top" button/link links to */ ?>
    <?php /* classes mode_<action> are added to make it possible to e.g. style a page differently if it's in edit mode,
          see http://www.dokuwiki.org/devel:action_modes for a list of action modes */ ?>
    <?php /* .dokuwiki should always be in one of the surrounding elements (e.g. plugins and templates depend on it) */ ?>
    <div id="dokuwiki__site"><div id="dokuwiki__top" class="dokuwiki site mode_<?php echo $ACT ?>">
        <?php html_msgarea() /* occasional error and info messages on top of the page */ ?>
        <?php tpl_includeFile('header.html') ?>

        <!-- ********** HEADER ********** -->
        <div id="dokuwiki__header">

          <div class="headings">
            <?php /* how to insert logo instead (if no CSS image replacement technique is used):
                  upload your logo into the data/media folder (root of the media manager) and replace 'logo.png' accordingly: */
                  tpl_link(wl(),'<img src="'.ml('logo.png').'" alt="'.$conf['title'].'" />','id="dokuwiki__top" accesskey="h"')  ?>
            <div class="clearer"></div>
          </div>

          <div class="clearer"></div>
          <hr class="a11y" />
        </div><!-- /header -->

        <div class="wrapper">

          <div id="tpl_simple_navi"> <?php tpl_topbar() ?> </div>
          <div class="clearer"></div>

          <!-- SITE TOOLS -->
          <div class="dokuwiki__tools" id="noborder">
            <div class="dokuwiki__tool_right">
              <?php tpl_searchform(); ?>
            </div>
            <div id="dokuwiki__tool_flushleft">
              <?php
                 if ($_SERVER['REMOTE_USER']) { /* if logged in... */
                   tpl_actionlink('edit'); tpl_actionlink('media'); tpl_actionlink('revisions');
                 }
                 ?>
            </div>
          </div> <!-- site tools -->
          <div class="clearer"></div>

          <!-- ********** CONTENT ********** -->
          <div id="dokuwiki__content">
            <?php tpl_flush() /* flush the output buffer */ ?>
            <?php tpl_includeFile('pageheader.html') ?>

            <div class="page">
              <!-- wikipage start -->
              <?php tpl_content() /* the main content */ ?>
              <!-- wikipage stop -->
              <div class="clearer"></div>
            </div>

            <?php tpl_flush() ?>
            <?php tpl_includeFile('pagefooter.html') ?>
            <!-- pagetools_bottom -->

            <div class="dokuwiki__tools" id="dokuwiki__tools_back_to_top">
                <?php tpl_actionlink('top'); ?>
            </div>

          </div><!-- /content -->

          <div class="clearer"></div>

          <div class="dokuwiki__tools" id="add_border">
            <div class="dokuwiki__tool_left">
              <?php tpl_userinfo()?>
            </div>
            <div class="dokuwiki__tool_right">
              <?php tpl_pageinfo()?>
            </div>
          </div>
          <div class="clearer"></div>

          <div class="dokuwiki__tools" id="dokuwiki__tools_flushright">
            <?php tpl_actionlink('admin')?>
            <?php tpl_actionlink('profile')?>
            <?php tpl_actionlink('login')?>
          </div>

        </div><!-- /wrapper -->

        <!-- ********** FOOTER ********** -->
        <?php tpl_includeFile('footer.html') ?>

    </div></div><!-- /site -->

    <div class="no"><?php tpl_indexerWebBug() /* provide DokuWiki housekeeping, required in all templates */ ?></div>
  </body>
</html>
