<?php
/**
 * @package     Joomla.Plugin
 *
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;
/**
 * Fontawesome and the damn TinyMCE
 *
 * @since  1.5
 */
class plgContentWebFontIcons extends JPlugin
{
    /**
     * Plugin that replaces simple {} for the whole <i class=""></i> syntax
     * due to the (...) tinyMCE always cleans up everything.
     *
     * @param   string   $context  The context of the content being passed to the plugin.
     * @param   mixed    &$article     An object with a "text" property or the string to be replaced
     * @param   mixed    &$params  Additional parameters. Not used
     * @param   integer  $page     Optional page number. Unused. Defaults to zero.
     *
     * @return  void
     */
    public function onContentPrepare($context, &$article, &$params, $page = 0)
    {
        // Don't run this plugin when the content is being indexed
        if ($context == 'com_finder.indexer')
        {
            return true;
        }
        return $this->_iconize($article);
    }

    protected function _iconize($article)
    {
        // expression to search for fontawesome
        // http://fontawesome.io/icons/
        $regex = '/{fa-(.*)}/';
        preg_match_all($regex, $article->text, $matches, PREG_SET_ORDER);

        if ($matches)
        {
          foreach ($matches as $match) 
          {
            $article->text = preg_replace("|$match[0]|",'<i class="fa fa-'.$match[1].'"></i>' , $article->text);
          }
        }

        // expression to search for (glyphicons)
        // http://getbootstrap.com/components/
        $regex = '/{gly-(.*)}/';
        preg_match_all($regex, $article->text, $matches, PREG_SET_ORDER);

        if ($matches)
        {
          foreach ($matches as $match) 
          {
            $article->text = preg_replace("|$match[0]|",'<i class="glyphicon glyphicon-'.$match[1].'"></i>' , $article->text);
          }
        }
    }
}

