<?php namespace DigArt\Ecole\Controllers;

use Backend;
use BackendMenu;
use Backend\Classes\Controller;

class MyController  extends Controller
{
/*    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
        'Backend.Behaviors.RelationController',
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';
    public $relationConfig = 'config_relation.yaml';*/
    public $requiredPermissions = [
        'digart.ecole.eleves' 
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('DigArt.Ecole', 'bases','mycontroller');
    }

    public function index()
    {
        $config = $this->makeConfig('$/digart/ecole/models/eleve/columns.yaml');
        $config->model = new \DigArt\Ecole\Models\Eleve;
        $config->recordUrl = 'digart/ecole/mycontroller/update/:id';
        $widget = $this->makeWidget('Backend\Widgets\Lists',$config);
        $widget-> bindToController();
        $this->vars['widget'] = $widget;
    }

    public function update($id = null, $context = null)
    {
        $this->vars['myId'] = $id;

        $config = $this->makeConfig('$/digart/ecole/models/eleve/fields_test.yaml');
        $config->model = \DigArt\Ecole\Models\Eleve::find($id);
        $widget = $this->makeWidget('Backend\Widgets\Form',$config);
        $this->vars['widget'] = $widget;
    }

    public function onUpdate($id = null)
    {
        trace_log('On update was called with id'.$id);

        $data = post();
        trace_log($data);

        \Flash::success('Job done');

    }
}
