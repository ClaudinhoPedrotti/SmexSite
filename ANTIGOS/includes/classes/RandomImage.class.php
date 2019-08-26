<?php
/*

	RANDOM IMAGE SELECTOR
	Date - Mar 21, 2005


	ABOUT
	This PHP script will randomly select an image file from a
	folder of images you specify. The script will select a random
	image each time you reload.
	

	INSTRUCTIONS
	1. Add image types if needed (currently its working for JPEGs and GIFs).
	2. Upload this file to your webserver.  
	
	That's it, you are on your way.

*/

class RandomImage
{
	/* 
	* The function will verify if the file is a valid picture file
	*/
	function isFileValid($filename)
	{	
		$validFileList = array("JPG", "jpg", "GIF", "gif"); // valid files list
		$fileExt = substr($filename,-3);
		
		if (in_array($fileExt, $validFileList)) // it will verify the existence of the file extension in the valid files list
			return true;
		else
			return false;	
	}

	/* 
	*  The function will return a random image.
	*  The folder's path will be passed to the function as parameter
	*/
	function getRandomImage($imageDir)
	{
		$pics = array();
		$dirHandle = opendir($imageDir);
		$r=0;
		while ( $f = readdir($dirHandle) )
		{
	    	if ( $this->isFileValid($f))  		
				{
					$pics[$r] = $imageDir.$f;
					$r++;
				}
		}
		closedir( $dirHandle );	
	
		if ($r>0)
		{
			$z=rand(0,$r-1);
			return $pics[$z];
		}
		else
		{
			return "EmptyFolder.gif";
		}
	}


}
?>