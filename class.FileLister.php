<?php 
/**
 * Class to list Files in my own way
 * @author Nikhil Chaughule
 * @version 1.0.0
 */
class FileLister{
	private $_dirs = array();
	
	public function __construct($dirsarray) {
		$this->_dirs = $dirsarray;
	}
	/**
	 * Function to list all directories
	 *  
	 * @return array Array of Directories
	 */
	public function lister(){
		if(empty($this->_dirs)) 
			return false;
		$dirbase = array();
		$excludes = array(".","..");
		foreach($this->_dirs as $dir){
			$tempdirbase = scandir($dir);
			foreach($tempdirbase as $eachfilefolder){
				if(in_array($eachfilefolder,$excludes) || strlen($eachfilefolder)==1) 
					continue;
				$dirbase[] = array(
						'parent'=>$dir,
						'name'=>$eachfilefolder,
						'combined'=>$dir.'\\'.$eachfilefolder
				);
			}
	
		}
		return $dirbase;
	}
}
?>