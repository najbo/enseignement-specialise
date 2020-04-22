<?php namespace DigArt\Ecole\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Config;
use DigArt\Ecole\Models\Suivi;

class Statistiques extends Controller
{
    public $implement = [    ];
    
    

    public $requiredPermissions = [
        'digart.ecole.statistiques' 
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('DigArt.Ecole', 'protocoles', 'statistiques');
    }


    public function index()
    {
    	# Renvoie automatiquement le contenu du fichier index.htm dans le dossier statistiques

    	$this->pageTitle = 'Statistiques | ' . Config::get('app.name');   
    	$this->vars['statistiques'] = 'Base : suivi';

    	$suivis = new Suivi ;
    	$this->vars['suivis'] = $suivis->all();
    	  

    	$stats = [
    		"nom" => "bar",
    		"prenom" => "toto",
		];

		$this->vars['stats'] = $stats;

    }


    public function Data() {
    	return 'Hello world';
    }  	   

}
