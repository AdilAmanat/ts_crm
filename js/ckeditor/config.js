/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For the complete reference:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config

	// The toolbar groups arrangement, optimized for two toolbar rows.
	config.toolbarGroups = [
		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
		{ name: 'links' },
		{ name: 'insert' },
		{ name: 'filebrowser' },
		{ name: 'forms' },
		{ name: 'tools' },
		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'others' },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
		{ name: 'styles' },
		{ name: 'colors',      groups: ['TextColor','BGColor']}
		/*{ name: 'about' }*/
	];

	// Remove some buttons, provided by the standard plugins, which we don't
	// need to have in the Standard(s) toolbar.
						//config.removeButtons = 'Underline,Subscript,Superscript';

	// Se the most common block elements.
	config.format_tags = 'p;h1;h2;h3;pre';

	// Make dialogs simpler.
	//config.removeDialogTabs = 'image:advanced;link:advanced';
	config.height = '500px';
	
	// remove <p>&nbsp;</p>
	config.enterMode = CKEDITOR.ENTER_BR;
	config.fillEmptyBlocks = false;	// Prevent filler nodes in all empty blocks.
	//default font size
	config.fontSize_defaultLabel = '12px';
	//default font size
	config.font_defaultLabel = 'Arial,Helvetica,sans-serif';
// Prevent filler node only in float cleaners.
config.fillEmptyBlocks = function( element )
{
	if ( element.attributes[ 'class' ].indexOf ( 'clear-both' ) != -1 )
		return false;
}
	//adding plugin for background image in table and table field --------------  maavratech.com
	config.extraPlugins='backgrounds';	
	//------------------------------filebrowser------------------------------//added by maavratech.com
	var _FileBrowserLanguage    = 'php' ;	// asp | aspx | cfm | lasso | perl | php | py
	var _QuickUploadLanguage    = 'php' ;
	
};
