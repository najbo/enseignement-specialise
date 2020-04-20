<?php namespace DigArt\Ecole\Updates;

use Seeder;
use DigArt\Ecole\Models\GestionnaireRole;

class Seeder1065 extends Seeder
{
    
    public $droits = [];
        
    public function run()
    {
        
        if (! GestionnaireRole::where('code', 'administrateur-esp')->first()){
            $droits = [
                'digart.ecole.suivis' => 1,
                'digart.ecole.pathologies' => 1,
                'digart.ecole.therapies' => 1,
                'digart.ecole.statuts' => 1,
                'digart.ecole.types' => 1,

                'digart.ecole.eleves' => 1,
                'digart.ecole.interlocuteurs' => 1,
                'digart.ecole.enseignants' => 1,
                'digart.ecole.fonctions' => 1,
                'digart.ecole.prochesroles' => 1,

                'digart.ecole.ecoles' => 1,
                'digart.ecole.cercles' => 1,
                'digart.ecole.annees' => 1,
                'digart.ecole.programmes' => 1,
                'digart.ecole.cycles' => 1,
                'digart.ecole.volees' => 1,
                'digart.ecole.ecoletype' => 1,

                'digart.ecole.pays' => 1,
                'digart.ecole.langues' => 1,
                'digart.ecole.prochespermis' => 1,
                'digart.ecole.genres' => 1,
                'digart.ecole.passages' => 1,
                'digart.ecole.typesfaits' => 1,

                'digart.ecole.can_restore' => 1,
                'digart.ecole.can_bouclement' => 1,

                'backend.manage_users' => 1,
                'backend.impersonate_users' => 1,
                'backend.manage_preferences' => 1,
                'system.access_logs' => 1,
                'system.manage_mail_settings' => 1,
                'panakour.backup.access' => 1,
            ];
            
            GestionnaireRole::create([
                'name' => 'Administrateur ESP',
                'code' => 'administrateur-esp',
                'description' => 'Compte administrateur l\'ESP avec pouvoirs étendus',
                'permissions' => $droits,
            ]); 
        }

        if (! GestionnaireRole::where('code', 'gestionnaire-esp')->first()){
            $droits = [
                'digart.ecole.suivis' => 1,
                'digart.ecole.pathologies' => 1,
                'digart.ecole.therapies' => 1,
                'digart.ecole.statuts' => 1,
                'digart.ecole.types' => 1,

                'digart.ecole.eleves' => 1,
                'digart.ecole.interlocuteurs' => 1,
                'digart.ecole.enseignants' => 1,
                'digart.ecole.fonctions' => 1,
                'digart.ecole.prochesroles' => 1,

                'digart.ecole.ecoles' => 1,
                'digart.ecole.cercles' => 1,
                'digart.ecole.annees' => 1,
                'digart.ecole.programmes' => 1,
                'digart.ecole.cycles' => 1,
                'digart.ecole.volees' => 1,
                'digart.ecole.ecoletype' => 1,

                'digart.ecole.pays' => 1,
                'digart.ecole.langues' => 1,
                'digart.ecole.prochespermis' => 1,
                'digart.ecole.genres' => 1,
                'digart.ecole.passages' => 1,
                'digart.ecole.typesfaits' => 1,

                'digart.ecole.can_restore' => 0,
                'digart.ecole.can_bouclement' => 0,


                'backend.manage_preferences' => 1,
                'backend.manage_users' => 0,
                'backend.impersonate_users' => 0,
                'system.access_logs' => 0,
                'system.manage_mail_settings' => 0,
            ];
            
            GestionnaireRole::create([
                'name' => 'Gestionnaire ESP',
                'code' => 'gestionnaire-esp',
                'description' => 'Compte gestionnaire l\'ESP',
                'permissions' => $droits,
            ]);             
        
        } 

        if (! GestionnaireRole::where('code', 'secretaire-esp')->first()){
            $droits = [
                'digart.ecole.suivis' => 0,
                'digart.ecole.pathologies' => 0,
                'digart.ecole.therapies' => 0,
                'digart.ecole.statuts' => 0,
                'digart.ecole.types' => 0,

                'digart.ecole.eleves' => 1,
                'digart.ecole.interlocuteurs' => 1,
                'digart.ecole.enseignants' => 1,
                'digart.ecole.fonctions' => 1,
                'digart.ecole.prochesroles' => 1,

                'digart.ecole.ecoles' => 0,
                'digart.ecole.cercles' => 0,
                'digart.ecole.annees' => 0,
                'digart.ecole.programmes' => 0,
                'digart.ecole.cycles' => 0,
                'digart.ecole.volees' => 0,
                'digart.ecole.ecoletype' => 0,

                'digart.ecole.pays' => 1,
                'digart.ecole.langues' => 1,
                'digart.ecole.prochespermis' => 1,
                'digart.ecole.genres' => 1,
                'digart.ecole.passages' => 0,
                'digart.ecole.typesfaits' => 0,

                'digart.ecole.can_restore' => 0,
                'digart.ecole.can_bouclement' => 0,


                'backend.manage_preferences' => 1,
                'backend.manage_users' => 0,
                'backend.impersonate_users' => 0,
                'system.access_logs' => 0,
                'system.manage_mail_settings' => 0,
            ];
            
            GestionnaireRole::create([
                'name' => 'Secrétaire ESP',
                'code' => 'secretaire-esp',
                'description' => 'Compte secrétaire l\'ESP',
                'permissions' => $droits,
            ]); 
        }         
    }
}