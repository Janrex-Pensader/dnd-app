<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller as BaseController;
use Carbon\Carbon;

class dndController extends BaseController{
    
    public function show(){

        $character = DB::table('character_sheet_tbl')
            ->join('LU_gender_tbl', 'character_sheet_tbl.Gender_ID', '=', 'LU_gender_tbl.ID')
            ->join('LU_race_tbl', 'character_sheet_tbl.Race_ID', '=', 'LU_race_tbl.ID')
            ->join('LU_background_tbl', 'character_sheet_tbl.Race_ID', '=', 'LU_background_tbl.ID')
            ->select('character_sheet_tbl.*', 'LU_gender_tbl.Gender AS gender_text', 'LU_race_tbl.Race AS race_text', 'LU_background_tbl.Background AS background_text')
            ->where('character_sheet_tbl.ID', '=', 1)
            ->get();

        $classes = DB::table('class_tbl')
            ->where('character_ID', '=', 1)
            ->get();

        $ability_score = DB::table('ability_score_tbl')
            ->where('Character_ID', '=', 1)
            ->get();

        $skill_prof = DB::table('skills_tbl')
            ->where('Character_ID', '=', 1)
            ->get();

        $level = DB::table('class_tbl')
        ->where('Character_ID', '=', 1)
        ->sum('level');

        $saving_throws = DB::table('saving_throw_tbl')
        ->where('Character_ID', '=', 1)
        ->get();

        if($level >= 1 && $level <=4){
            $proficiency = 2;
        }
        else if($level >= 5 && $level <=8){
            $proficiency = 3;
        }
        else if($level >= 9 && $level <=12){
            $proficiency = 4;
        }
        else if($level >= 13 && $level <=16){
            $proficiency = 5;
        }
        else if($level >= 17 && $level <=20){
            $proficiency = 6;
        }

        
        $skills = array("Acrobatics","Animal Handling","Arcana","Athletics","Deception","History","Insight","Intimidation","Investigation","Medicine","Nature","Perception","Persuasion","Religion","Sleight of Hand","Stealth","Survival"); 
        $mods = array("Strength", "Dexterity", "Constitution", "Intelligence", "Wisdom", "Charisma"); 
        
        // skills
        $str_skills = array("Athletics");
        $dex_skills = array("Acrobatics","Sleight of Hand", "Stealth");
        $int_skills = array("Arcana","History", "Investigation", "Nature","Religion");
        $wis_skills = array("Animal Handling","Insight", "Medicine", "Perception","Survival");
        $cha_skills = array("Deception","Intimidation", "Performance", "Persuasion");

        // passive perception
        $skill = $skills[11];
        $mod = $mods[4];
        
        if($skill_prof[0]->$skill == 1){
            $passive_perception = floor(($ability_score[0]->$mod-10)/2)+10 + $proficiency;
        }
        else{
            $passive_perception = floor(($ability_score[0]->$mod-10)/2)+10;
        }

        // passives Investigation
        $skill = $skills[6];
        $mod = $mods[3];
        
        if($skill_prof[0]->$skill == 1){
            $passive_investigation = floor(($ability_score[0]->$mod-10)/2)+10 + $proficiency;
        }
        else{
            $passive_investigation = floor(($ability_score[0]->$mod-10)/2)+10;
        }

        // passives Insight
        $skill = $skills[8];
        $mod = $mods[4];
        
        if($skill_prof[0]->$skill == 1){
            $passive_insight = floor(($ability_score[0]->$mod-10)/2)+10 + $proficiency;
        }
        else{
            $passive_insight = floor(($ability_score[0]->$mod-10)/2)+10;
        }

        // spells
        $character_spells = DB::table('lu_spell_tbl')
            ->join('class_tbl', 'lu_spell_tbl.Class_ID', '=', 'class_tbl.ID')
            ->select('lu_spell_tbl.*', 'class_tbl.spell_mod AS spell_mod')
            ->where('lu_spell_tbl.character_ID', '=', 1)
            ->get();



        
        return view('character-sheet',[
            'character' =>$character,
            'classes' => $classes,
            'ability_score' =>$ability_score,
            'skill_prof'=> $skill_prof,
            'skills'=> $skills,
            'mods' => $mods,
            'str_skills'=> $str_skills,
            'dex_skills'=> $dex_skills,
            'int_skills'=> $int_skills,
            'wis_skills'=> $wis_skills,
            'cha_skills'=> $cha_skills,
            'level'=> $level,
            'proficiency'=> $proficiency,
            'saving_throws'=> $saving_throws,
            'passive_perception'=> $passive_perception,
            'passive_investigation'=> $passive_investigation,
            'passive_insight'=> $passive_insight,
            'character_spells'=> $character_spells


        ]);
    }
}
