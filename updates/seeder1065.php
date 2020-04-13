<?php namespace DigitalArtisan\Enseignement\Updates;

use Seeder;
use DigitalArtisan\Enseignement\Models\GestionnaireRole;

class Seeder1065 extends Seeder
{
    
    public $droits = [];
        
    public function run()
    {
        
        if (! GestionnaireRole::where('code', 'administrateur-esp')->first()){
            $droits = [
                'digitalartisan.enseignement.suivis' => 1,
                'digitalartisan.enseignement.pathologies' => 1,
                'digitalartisan.enseignement.therapies' => 1,
                'digitalartisan.enseignement.statuts' => 1,
                'digitalartisan.enseignement.types' => 1,

                'digitalartisan.enseignement.eleves' => 1,
                'digitalartisan.enseignement.interlocuteurs' => 1,
                'digitalartisan.enseignement.enseignants' => 1,
                'digitalartisan.enseignement.fonctions' => 1,
                'digitalartisan.enseignement.prochesroles' => 1,

                'digitalartisan.enseignement.ecoles' => 1,
                'digitalartisan.enseignement.cercles' => 1,
                'digitalartisan.enseignement.annees' => 1,
                'digitalartisan.enseignement.programmes' => 1,
                'digitalartisan.enseignement.cycles' => 1,
                'digitalartisan.enseignement.volees' => 1,
                'digitalartisan.enseignement.ecoletype' => 1,

                'digitalartisan.enseignement.pays' => 1,
                'digitalartisan.enseignement.langues' => 1,
                'digitalartisan.enseignement.prochespermis' => 1,
                'digitalartisan.enseignement.genres' => 1,
                'digitalartisan.enseignement.passages' => 1,
                'digitalartisan.enseignement.typesfaits' => 1,

                'digitalartisan.enseignement.can_restore' => 1,
                'digitalartisan.enseignement.can_bouclement' => 1,

                'backend.manage_users' => 1,
                'backend.impersonate_users' => 1,
                'system.access_logs' => 1,
                'system.manage_mail_settings' => 1,
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
                'digitalartisan.enseignement.suivis' => 1,
                'digitalartisan.enseignement.pathologies' => 1,
                'digitalartisan.enseignement.therapies' => 1,
                'digitalartisan.enseignement.statuts' => 1,
                'digitalartisan.enseignement.types' => 1,

                'digitalartisan.enseignement.eleves' => 1,
                'digitalartisan.enseignement.interlocuteurs' => 1,
                'digitalartisan.enseignement.enseignants' => 1,
                'digitalartisan.enseignement.fonctions' => 1,
                'digitalartisan.enseignement.prochesroles' => 1,

                'digitalartisan.enseignement.ecoles' => 1,
                'digitalartisan.enseignement.cercles' => 1,
                'digitalartisan.enseignement.annees' => 1,
                'digitalartisan.enseignement.programmes' => 1,
                'digitalartisan.enseignement.cycles' => 1,
                'digitalartisan.enseignement.volees' => 1,
                'digitalartisan.enseignement.ecoletype' => 1,

                'digitalartisan.enseignement.pays' => 1,
                'digitalartisan.enseignement.langues' => 1,
                'digitalartisan.enseignement.prochespermis' => 1,
                'digitalartisan.enseignement.genres' => 1,
                'digitalartisan.enseignement.passages' => 1,
                'digitalartisan.enseignement.typesfaits' => 1,

                'digitalartisan.enseignement.can_restore' => 0,
                'digitalartisan.enseignement.can_bouclement' => 0,


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
                'digitalartisan.enseignement.suivis' => 0,
                'digitalartisan.enseignement.pathologies' => 0,
                'digitalartisan.enseignement.therapies' => 0,
                'digitalartisan.enseignement.statuts' => 0,
                'digitalartisan.enseignement.types' => 0,

                'digitalartisan.enseignement.eleves' => 1,
                'digitalartisan.enseignement.interlocuteurs' => 1,
                'digitalartisan.enseignement.enseignants' => 1,
                'digitalartisan.enseignement.fonctions' => 1,
                'digitalartisan.enseignement.prochesroles' => 1,

                'digitalartisan.enseignement.ecoles' => 0,
                'digitalartisan.enseignement.cercles' => 0,
                'digitalartisan.enseignement.annees' => 0,
                'digitalartisan.enseignement.programmes' => 0,
                'digitalartisan.enseignement.cycles' => 0,
                'digitalartisan.enseignement.volees' => 0,
                'digitalartisan.enseignement.ecoletype' => 0,

                'digitalartisan.enseignement.pays' => 1,
                'digitalartisan.enseignement.langues' => 1,
                'digitalartisan.enseignement.prochespermis' => 1,
                'digitalartisan.enseignement.genres' => 1,
                'digitalartisan.enseignement.passages' => 0,
                'digitalartisan.enseignement.typesfaits' => 0,

                'digitalartisan.enseignement.can_restore' => 0,
                'digitalartisan.enseignement.can_bouclement' => 0,


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