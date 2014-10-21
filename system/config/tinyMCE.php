<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package Core
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */

namespace Contao;

if ($GLOBALS['TL_CONFIG']['useRTE']):

?>
<script>window.tinymce || document.write('<script src="<?= TL_ASSETS_URL ?>components/tinymce4/js/tinymce.gzip.js">\x3C/script>')</script>
<script>
window.tinymce && tinymce.init({
  skin: "contao",
  selector: "#<?= $selector ?>",
  language: "<?= Backend::getTinyMceLanguage() ?>",
  element_format: "html",
  document_base_url: "<?= Environment::get('base') ?>",
  entities: "160,nbsp,60,lt,62,gt,173,shy",
  init_instance_callback: function(editor) {
    editor.on('focus', function(){ Backend.getScrollOffset(); });
  },
  file_browser_callback: function(field_name, url, type, win) {
    Backend.openModalBrowser(field_name, url, type, win);
  },
  templates: [
    <?= Backend::getTinyTemplates() ?>
  ],
  plugins: "autosave charmap code fullscreen image importcss link lists paste searchreplace tabfocus table template visualblocks",
  browser_spellcheck: true,
  tabfocus_elements: ":prev,:next",
  importcss_append: true,
  importcss_groups: [{title: "<?= Config::get('uploadPath') ?>/tinymce.css"}],
  content_css: "<?= Environment::get('path') ?>/system/themes/tinymce.css,<?= Environment::get('path') . '/' . Config::get('uploadPath') ?>/tinymce.css",
  extended_valid_elements: "q[cite|class|title],article,section,hgroup,figure,figcaption",
  menubar: "file edit insert view format table",
  toolbar: "link unlink | image | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | undo redo | code"
});
</script>
<?php endif; ?>
