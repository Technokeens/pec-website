/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	// 
	// config.pasteFromWordRemoveFontStyles = false;
	
	// config.contentsCss = 'font.css';
	//the next line add the new font to the combobox in CKEditor
	// config.font_names = 'McLaren Regular/mclaren;' + config.font_names;
	// config.font_names = 'BowlbyOneSC/bowlbyonesc;' + config.font_names;
	// config.font_names = 'Bellada/bellada;' + config.font_names;

	// console.log(config.font_names);
	// config.removePlugins = 'save,newpage,flash,about,iframe,language'; 
	config.removePlugins = 'font'; 
	
	config.contentsCss =  ['../../admin_assets/ckeditor2/samples/toolbarconfigurator/css/fontello.css',
			'https://fonts.googleapis.com/css?family=Bungee',
			'https://fonts.googleapis.com/css?family=Satisfy',
			'https://fonts.googleapis.com/css?family=Libre+Baskerville',
			'https://fonts.googleapis.com/css?family=Tajawal',
			'https://fonts.googleapis.com/css?family=Scheherazade'
			];
	config.font_names = 'Bungee; Satisfy; Libre Baskerville; Tajawal; Scheherazade;' + config.font_names;

	// config.contentsCss =  ['fontello.css', 'https://fonts.googleapis.com/css?family=Satisfy'];
	// config.font_names = 'Satisfy;' + config.font_names;
	
};
