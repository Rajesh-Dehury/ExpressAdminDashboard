<?php

namespace App\Http\Controllers;

use App\Models\ExpressClient;
use App\Models\ExpressDashboard;
use App\Models\ExpressUser;
use App\Models\JobDetail;
use App\Models\LifeSuggestion;
use App\Models\LifevitaeCharacter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentDataController extends Controller
{
    public function studentData()
    {
        $express_client_admin = Auth::guard('express_client_admin')->user();
        $genderCount = $this->genderCount($express_client_admin);

        $skills = ['COGNITIVE', 'INTERACTIVE', 'EMOTIVE', 'ADAPTIVE', 'CREATIVE', 'MOTIVE'];
        $ExpressDashboard = ExpressDashboard::first();
        $SkillDistributionChart = $this->SkillDistributionChart($ExpressDashboard, $skills);
        $DominantSkills = $this->DominantSkills($ExpressDashboard, $skills);
        $DevelopingSkills = $this->DevelopingSkills($ExpressDashboard, $skills);
        $Top10Strengths = $this->Top10Strengths($ExpressDashboard);
        $suggestedActivity = $this->suggestedActivity($DominantSkills);
        $Top3Pathway = $this->Top3Pathway($express_client_admin);
        $lifevitae_characters = $ExpressDashboard->topCharacter;
        $express_client_admin = Auth::guard('express_client_admin')->user();

        return view(
            'student_data',
            compact(
                'genderCount',
                'SkillDistributionChart',
                'DominantSkills',
                'DevelopingSkills',
                'Top10Strengths',
                'skills',
                'suggestedActivity',
                'Top3Pathway',
                'lifevitae_characters',
                'ExpressDashboard',
                'express_client_admin',
            )
        );
    }

    function genderCount($express_client_admin)
    {
        $registered_users = ExpressUser::where('omr_client_id', $express_client_admin->omr_client_id)->get();

        $genderCount = [
            'male' => 0,
            'female' => 0,
        ];

        foreach ($registered_users as $user) {
            if ($user->gender == 1) {
                $genderCount['male']++;
            } else {
                $genderCount['female']++;
            }
        }

        return $genderCount;
    }

    function SkillDistributionChart($ExpressDashboard, $skills)
    {
        $averages = array();

        foreach ($skills as $skill) {
            $averages[$skill] = $ExpressDashboard->$skill;
        }

        return $averages;
    }

    function DominantSkills($ExpressDashboard, $skills)
    {
        $skill_values = explode(',', $ExpressDashboard->dominant_skills_stat);

        $skill_labels = array();

        foreach ($skills as $skill) {
            array_push($skill_labels, $skill);
        }

        return [
            'labels' => $skill_labels,
            'data' => array_values($skill_values),
        ];
    }
    function DevelopingSkills($ExpressDashboard, $skills)
    {
        $skill_values = explode(',', $ExpressDashboard->developing_skills_stat);

        $skill_labels = array();

        foreach ($skills as $skill) {
            array_push($skill_labels, $skill);
        }

        return [
            'labels' => $skill_labels,
            'data' => array_values($skill_values),
        ];
    }
    function Top10Strengths($ExpressDashboard)
    {
        $top_10_strengths = explode(',', $ExpressDashboard->top_strengths);
        return $top_10_strengths;
    }

    function Top3Pathway($express_client_admin)
    {
        $express_client = ExpressClient::with('expressUsers.expressReport')->where('slug', $express_client_admin->omr_client_id)->first();

        $pathway_values = "";

        foreach ($express_client->expressUsers as $user) {
            $safety = $user->expressReport->safety ?? "";

            if ($safety !== null && $safety !== "") {
                $pathway_values .= $safety . ',';
            }
        }

        $pathway_values = rtrim($pathway_values, ',');


        $pathway_values_arr = explode(',', $pathway_values);

        $value_counts = array_count_values($pathway_values_arr);

        arsort($value_counts);

        $top3_values = array_slice(array_keys($value_counts), 0, 3);

        $records = JobDetail::whereIn('id', $top3_values)->get();

        return $records;
    }

    function suggestedActivity($DominantSkills)
    {
        $firstThreeDominantSkills = array_slice($DominantSkills['labels'], 0, 2);

        $suggestedActivity = [];

        foreach ($firstThreeDominantSkills as $ds) {
            if (!isset($suggestedActivity[$ds])) {
                $suggestedActivity[$ds] = [];
            }

            $ls = LifeSuggestion::where('strength_type', $ds)->get('text');

            foreach ($ls as $data) {
                $suggestedActivity[$ds][] = $data['text'];
            }

            $suggestedActivity[$ds] = implode(', ', $suggestedActivity[$ds]);
        }

        return $suggestedActivity;
    }

    function expressInfo()
    {
        return view(
            'info'
        );
    }

    public function summeryReport()
    {
        $express_client_admin = Auth::guard('express_client_admin')->user();
        $genderCount = $this->genderCount($express_client_admin);

        $skills = ['COGNITIVE', 'INTERACTIVE', 'EMOTIVE', 'ADAPTIVE', 'CREATIVE', 'MOTIVE'];
        $ExpressDashboard = ExpressDashboard::first();
        $SkillDistributionChart = $this->SkillDistributionChart($ExpressDashboard, $skills);
        $DominantSkills = $this->DominantSkills($ExpressDashboard, $skills);
        $DevelopingSkills = $this->DevelopingSkills($ExpressDashboard, $skills);
        $Top10Strengths = $this->Top10Strengths($ExpressDashboard);
        $suggestedActivity = $this->suggestedActivity($DominantSkills);
        $Top3Pathway = $this->Top3Pathway($express_client_admin);
        $lifevitae_characters = $ExpressDashboard->topCharacter;
        $express_client_admin = Auth::guard('express_client_admin')->user();

        return view(
            'summery_report',
            compact(
                'genderCount',
                'SkillDistributionChart',
                'DominantSkills',
                'DevelopingSkills',
                'Top10Strengths',
                'skills',
                'suggestedActivity',
                'Top3Pathway',
                'lifevitae_characters',
                'ExpressDashboard',
                'express_client_admin',
            )
        );
    }
}
