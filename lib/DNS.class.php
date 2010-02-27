<?php
class DNS
{
	static public function slugify($text)
	{
		// replace all non letters or digits by -
		$text = preg_replace('/\W+/', '-', $text);
		// trim and lowercase
		$text = strtolower(trim($text, '-'));
		return $text;
	}
    public static function resizeImage($mx, $my, $filename, $olddir, $newdir=false)
    {
        if (!$newdir) $newdir = $olddir;
        
        $thumbnail = new sfThumbnail($mx, $my);
        $thumbnail->loadFile($olddir.$filename);
        $thumbnail->save($newdir.$filename, 'image/png');
    }
}
?>