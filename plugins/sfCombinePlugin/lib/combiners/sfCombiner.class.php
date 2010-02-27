<?php
/**
 * sfCombiner
 *
 * @package    sfCombinePlugin
 * @author     Alexandre Mogère
 */
abstract class sfCombiner
{

  abstract public function process($key);

  abstract protected function minify($content);

  abstract protected function getAssetPath($file);

  public function __construct()
  {
    sfContext::getInstance()->getConfiguration()->loadHelpers('sfCombine');
  }

  /**
   * Join an array of file contents
   *
   * @param array $files List ($file_path => $file_content) of the assets
   * @param boolean $includeComment
   *
   * @return string Merged assets
   */
  protected function merge($files, $includeComment = true)
  {
    $ret = '';
    foreach ($files as $filePath => $fileContent)
    {
      if ($includeComment)
      {
        $ret .= "/*$filePath*/\n";
      }
      $ret .= $fileContent."\n";
    }
    return $ret;
  }

  /**
   * Retrieve the content of the assets corresponding to a hash
   *
   * @param string $key Key to a list of asset files in the `sf_combine` table
   *
   * @return array list ($file_path => $file_content) of the assets
   */
  protected function getContents($key)
  {

    $asset_include = '';

    $combine = DbFinder::from('sfCombine')->
      where('AssetsKey', $key)->
      findOne();

    if (!$combine)
    {
      throw new Exception('Calling non-existent combined asset file: ' . $key);
    }

    $contents = array();

    foreach ($combine->getFiles() as $file)
    {
      $filePath = $this->getAssetPath($file);
      $include = $this->get_php_contents(sfConfig::get('sf_web_dir') . $filePath);
      if ($include === false)
      {
        // maybe we are looking for a file under $symfony_data_dir/web/sf ?
        $include = $this->get_php_contents(sfConfig::get('sf_symfony_data_dir') . '/web'.$filePath);
        if ($include === false)
        {
          sfContext::getInstance()->getLogger()->err('Can not open '.sfConfig::get('sf_web_dir') . $filePath.' for merging');
        }
      }
      if($include)
      {
        $contents[$file] = $include;
      }
    }

    return $contents;
  }
  protected function get_php_contents($file){
  	ob_start();
    @include $file;
    return ob_get_clean();
  }
}