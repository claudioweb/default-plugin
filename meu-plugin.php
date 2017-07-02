<?php 
/***************************************************************************
Plugin Name:  Meu Plugin
Plugin URI:   https://www.meuplugin.com/
Description:  Plugin base para iniciar o desenvolvimento
Version:      1.0
Author:       Claudio Web (claudioweb)
Author URI:   http://www.claudioweb.com.br/
Text Domain:  meu-plugin
**************************************************************************/

Class MeuPlugin {

	private $name_plugin;

	public function __construct() {

		$this->name_plugin = 'Meu Plugin';

		add_action( 'admin_menu', array( $this, 'add_admin_menu' ) );

		if(!empty($_POST['salvar'])){
			unset($_POST['salvar']);
			foreach ($_POST as $key_field => $value_field) {
				update_option( $key_field, $value_field );
			}

			header('Location:'.admin_url('admin.php?page='.sanitize_title($this->name_plugin)));
			exit;
		}
	}

	public function add_admin_menu(){

		add_menu_page(
			$this->name_plugin,
			$this->name_plugin,
			'manage_options', 
			sanitize_title($this->name_plugin), 
			array($this,'meu_plugin_home'), 
    		'', //URL ICON
    		2 // Ordem menu
    		);

		add_submenu_page( 
			'meu-plugin', 
			'Configurações', 
			'Configurações', 
			'manage_options', 
			sanitize_title($this->name_plugin).'-config', 
			array($this,'meu_plugin_settings')
			);
	}

	public function meu_plugin_home(){

		$fields = array('primeiro_campo'=>'Primeiro Campo');

		include "templates/home.php";
	}

	public function meu_plugin_settings(){

		$fields = array('primeira_config'=>'Primeira Configuração');

		include "templates/configuracoes.php";
	}

}

$init_plugin = new MeuPlugin;

?>