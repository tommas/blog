<?php
require_once 'Zend/Date.php';
class Application_Form_Album extends Zend_Form
{

	public function init()
	{
		$dateNow = Zend_Date::now();
		
		$this -> setName('album');
		 
		$id = new Zend_Form_Element_Hidden('id');
		$id -> addFilter('Int');
		 
		$artist = new Zend_Form_Element_Textarea('artist');
		$artist -> setLabel('Artist')
		-> setAttrib('cols', '80')
		-> setAttrib('rows', '8')
		-> setRequired(true)
		-> addFilter('StripTags')
		-> addFilter('StringTrim')
		-> addValidator('NotEmpty');
		 
		$title = new Zend_Form_Element_Textarea('title');
		$title -> setLabel('Title')
		-> setAttrib('cols', '80')
		-> setAttrib('rows', '8')
		-> setRequired(true)
		-> addFilter('StripTags')
		-> addFilter('StringTrim')
		-> addValidator('NotEmpty');
		

				 
		$submit = new Zend_Form_Element_Submit('submit');
		$submit -> setAttrib('id', 'date', 'submitbutton');
		 
		$this -> addElements(array($id, $artist, $title, $submit));
	}


}

