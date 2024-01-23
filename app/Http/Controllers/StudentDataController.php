<?php

namespace App\Http\Controllers;

use App\Models\ExpressClient;
use App\Models\ExpressUser;
use App\Models\JobDetail;
use App\Models\LifeSuggestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentDataController extends Controller
{
    public function studentData()
    {
        $express_client_admin = Auth::guard('express_client_admin')->user();
        $genderCount = $this->genderCount($express_client_admin);

        $skills = ['COGNITIVE', 'INTERACTIVE', 'EMOTIVE', 'ADAPTIVE', 'CREATIVE', 'MOTIVE'];
        $SkillDistributionChart = $this->SkillDistributionChart($express_client_admin, $skills);
        $DominantSkills = $this->DominantSkills($express_client_admin);
        $DevelopingSkills = $this->DevelopingSkills($express_client_admin);
        $Top10Strengths = $this->Top10Strengths($express_client_admin);
        $suggestedActivity = $this->suggestedActivity($DominantSkills);
        $Top3Pathway = $this->Top3Pathway($express_client_admin);

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

    function SkillDistributionChart($express_client_admin, $skills)
    {
        $express_client = ExpressClient::with('expressUsers.expressReport')->where('slug', $express_client_admin->omr_client_id)->first();
        $averages = array();

        foreach ($skills as $skill) {
            $skill_avg = 0;
            $skill_values = array();

            foreach ($express_client->expressUsers as $user) {
                array_push($skill_values, $user->expressReport->$skill ?? 0);
            }

            if (count($skill_values) > 0) {
                $skill_avg = array_sum($skill_values) / count($skill_values);
            }

            $averages[$skill] = $skill_avg;
        }

        return $averages;
    }

    function DominantSkills($express_client_admin)
    {
        $express_client = ExpressClient::with('expressUsers.expressReport')->where('slug', $express_client_admin->omr_client_id)->first();

        $skill_values = "";

        foreach ($express_client->expressUsers as $user) {
            $dominant_skills = $user->expressReport->dominant_skills ?? "";

            if ($dominant_skills !== null && $dominant_skills !== "") {
                $skill_values .= $dominant_skills . ',';
            }
        }

        $skill_values = rtrim($skill_values, ',');

        $skill_values_arr = explode(',', $skill_values);

        $skill_counts = array_count_values($skill_values_arr);

        return [
            'labels' => array_keys($skill_counts),
            'data' => array_values($skill_counts),
        ];
    }
    function DevelopingSkills($express_client_admin)
    {
        $express_client = ExpressClient::with('expressUsers.expressReport')->where('slug', $express_client_admin->omr_client_id)->first();

        $skill_values = "";

        foreach ($express_client->expressUsers as $user) {
            $developing_skills = $user->expressReport->developing_skills ?? "";

            if ($developing_skills !== null && $developing_skills !== "") {
                $skill_values .= $developing_skills . ',';
            }
        }

        $skill_values = rtrim($skill_values, ',');

        $skill_values_arr = explode(',', $skill_values);

        $skill_counts = array_count_values($skill_values_arr);

        return [
            'labels' => array_keys($skill_counts),
            'data' => array_values($skill_counts),
        ];
    }
    function Top10Strengths($express_client_admin)
    {
        $express_client = ExpressClient::with('expressUsers.expressReport')->where('slug', $express_client_admin->omr_client_id)->first();

        $skill_values = "";

        foreach ($express_client->expressUsers as $user) {
            $life_strengths = $user->expressReport->life_strengths ?? "";

            if ($life_strengths !== null && $life_strengths !== "") {
                $skill_values .= $life_strengths . ',';
            }
        }

        $skill_values = rtrim($skill_values, ',');


        $skill_values_arr = explode(',', $skill_values);

        $strength_counts = array_count_values($skill_values_arr);

        arsort($strength_counts);

        $top_10_strengths = array_slice($strength_counts, 0, 10);

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
        $firstThreeDominantSkills = array_slice($DominantSkills['labels'], 0, 3);

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
}
