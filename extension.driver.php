<?php

	if(!defined("__IN_SYMPHONY__")) die("<h2>Error</h2><p>You cannot directly access this file</p>");

	/*
	Copyight: Solutions Nitriques 2011
	License: MIT
	*/
	class extension_auto_collapse_fields extends Extension {

		public function about() {
			return array(
				'name'			=> 'Auto Colapse Fields',
				'version'		=> '1.0',
				'release-date'	=> '2011-04-27',
				'author'		=> array(
					'name'			=> 'Solutions Nitriques',
					'website'		=> 'http://www.nitriques.com/',
					'email'			=> 'nico@nitriques.com'
				),
				'description'	=> 'Really simple ext that collapses fields when editing a Section',
				'compatibility' => array(
					'2.2.1' => true,
					'2.2' => true
				)
	 		);
		}

		public function getSubscribedDelegates(){
			return array(
				array(
					'page' => '/backend/',
					'delegate' => 'InitaliseAdminPageHead',
					'callback' => 'appendJS'
				)
			);
		}

		public function appendJS($context){
			$c = Administration::instance()->getPageCallback();
			$c = $c['pageroot'];
			if ($c == '/blueprints/sections/') {
			Administration::instance()->Page->addElementToHead(
				new XMLElement(
					'script',
					"(function($){
						$(function(){
							$('#fields-duplicator .controls > .collapser:first').trigger('click.duplicator');
						});
					})(jQuery);"
				), time()+1
			);
			}
		}
	}
	
?>