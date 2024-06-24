<?php

namespace App\Http\Controllers;

use App\Models\ExpressClient;
use App\Models\ExpressUser;
use App\Models\JobDetail;
use App\Models\LifeStrength;
use App\Models\LifeSuggestion;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

class StudentSearchController extends Controller
{
    function search()
    {
        $express_client_admin = Auth::guard('express_client_admin')->user();
        $studebt_name = request()->student_name;

        $searched_users = ExpressUser::where('name', 'LIKE', "%{$studebt_name}%")->where('omr_client_id', $express_client_admin->omr_client_id)->paginate(10);

        return view('search_data', compact('searched_users'));
    }


    function reportOne($id)
    {
        $user = ExpressUser::find($id);
        $expressReport = $user->expressReport;

        $life_strengths =  explode(',', $expressReport->life_strengths);


        $skills = ['MOTIVE', 'CREATIVE', 'ADAPTIVE', 'EMOTIVE', 'INTERACTIVE', 'COGNITIVE'];
        $skills_data = [
            $expressReport->MOTIVE,
            $expressReport->CREATIVE,
            $expressReport->ADAPTIVE,
            $expressReport->EMOTIVE,
            $expressReport->INTERACTIVE,
            $expressReport->COGNITIVE,
        ];

        $dominant_skills = explode(',', $expressReport->dominant_skills);
        $developing_skills = explode(',', $expressReport->developing_skills);
        $dominant_data = $this->getDominantSkillData($dominant_skills[0], $dominant_skills[1], $expressReport->dominant_skills_text);
        $developing_data = $this->getDevelopingSkillData($developing_skills[0], $developing_skills[1], $expressReport->developing_skills_text);

        $suggestedActivity = $this->suggestedActivity($dominant_skills);

        $life_strengths_images = $this->lifeStrengthImages($life_strengths);
        $life_strengths_bg = $this->lifeStrengthBg($life_strengths);

        return view(
            'summary_student_report_one',
            compact(
                'user',
                'life_strengths',
                'skills',
                'skills_data',
                'dominant_data',
                'developing_data',
                'expressReport',
                'suggestedActivity',
                'life_strengths_images',
                'life_strengths_bg',
            )
        );
    }

    function reportTwo($id)
    {
        $user = ExpressUser::find($id);

        $expressReport = $user->expressReport;

        $life_strengths =  explode(',', $expressReport->life_strengths);


        $skills = ['MOTIVE', 'CREATIVE', 'ADAPTIVE', 'EMOTIVE', 'INTERACTIVE', 'COGNITIVE'];
        $skills_data = [
            $expressReport->MOTIVE,
            $expressReport->CREATIVE,
            $expressReport->ADAPTIVE,
            $expressReport->EMOTIVE,
            $expressReport->INTERACTIVE,
            $expressReport->COGNITIVE,
        ];

        $dominant_skills = explode(',', $expressReport->dominant_skills);
        $developing_skills = explode(',', $expressReport->developing_skills);
        $dominant_data = $this->getDominantSkillData($dominant_skills[0], $dominant_skills[1], $expressReport->dominant_skills_text);
        $developing_data = $this->getDevelopingSkillData($developing_skills[0], $developing_skills[1], $expressReport->developing_skills_text);

        $suggestedActivity = $this->suggestedActivity($dominant_skills);

        $life_strengths_images = $this->lifeStrengthImages($life_strengths);
        $life_strengths_bg = $this->lifeStrengthBg($life_strengths);
        $lifeStrengthText = $this->lifeStrengthText($life_strengths);
        $Top4Pathway = $this->Top4Pathway($expressReport->safety);

        return view(
            'professional_report',
            compact(
                'user',
                'life_strengths',
                'skills',
                'skills_data',
                'dominant_data',
                'developing_data',
                // 'expressReport',
                // 'suggestedActivity',
                'life_strengths_images',
                'life_strengths_bg',
                'lifeStrengthText',
                'Top4Pathway',
            )
        );
    }

    public function quaterlyReport()
    {
        return view('report_one');
    }

    function suggestedActivity($DominantSkills)
    {
        $firstThreeDominantSkills = $DominantSkills;

        $suggestedActivity = [];

        foreach ($firstThreeDominantSkills as $ds) {
            if (!isset($suggestedActivity[$ds])) {
                $suggestedActivity[$ds] = [];
            }

            $ls = LifeSuggestion::where('strength_type', $ds)->get('text');

            foreach ($ls as $data) {
                $suggestedActivity[$ds][] = $data['text'];
            }
        }

        return $suggestedActivity;
    }

    public function getDominantSkillData($dominant_skill1, $dominant_skill2, $dominant_skills_text)
    {
        $skillImages = [
            'MOTIVE' => asset('assets/images/report/hex-MOTIVE.png'),
            'CREATIVE' => asset('assets/images/report/hex-CREATIVE.png'),
            'ADAPTIVE' => asset('assets/images/report/hex-ADAPTIVE.png'),
            'EMOTIVE' => asset('assets/images/report/hex-EMOTIVE.png'),
            'INTERACTIVE' => asset('assets/images/report/hex-INTERACTIVE.png'),
            'COGNITIVE' => asset('assets/images/report/hex-COGNITIVE.png'),
        ];
        $skillInnerImages = [
            'MOTIVE' => asset('assets/images/report/hax-inner-MOTIVE.png'),
            'CREATIVE' => asset('assets/images/report/hax-inner-CREATIVE.png'),
            'ADAPTIVE' => asset('assets/images/report/hax-inner-ADAPTIVE.png'),
            'EMOTIVE' => asset('assets/images/report/hax-inner-EMOTIVE.png'),
            'INTERACTIVE' => asset('assets/images/report/hax-inner-INTERACTIVE.png'),
            'COGNITIVE' => asset('assets/images/report/hax-inner-COGNITIVE.png'),
        ];
        $skillColors = [
            'MOTIVE' => '#bdd6ff',
            'CREATIVE' => '#add5f8',
            'ADAPTIVE' => '#dfffc9',
            'EMOTIVE' => '#ffebaf',
            'INTERACTIVE' => '#ffd7a3',
            'COGNITIVE' => '#ffdbdb',
        ];

        $skillTextColors = [
            'MOTIVE' => '#2d5497',
            'CREATIVE' => '#5b9bd5',
            'ADAPTIVE' => '#6fac45',
            'EMOTIVE' => '#ffbe00',
            'INTERACTIVE' => '#ff9000',
            'COGNITIVE' => '#c00000',
        ];

        $dominant_skill_img1 = '';
        $dominant_skill_img2 = '';
        $dominant_skill_inner_img1 = '';
        $dominant_skill_inner_img2 = '';
        $dominant_skill_color1 = '';
        $dominant_skill_color2 = '';
        $dominant_skill_text_color1 = '';
        $dominant_skill_text_color2 = '';

        if (isset($skillImages[$dominant_skill1])) {
            $dominant_skill_img1 = $skillImages[$dominant_skill1];
            $dominant_skill_inner_img1 = $skillInnerImages[$dominant_skill1];
            $dominant_skill_color1 = $skillColors[$dominant_skill1];
            $dominant_skill_text_color1 = $skillTextColors[$dominant_skill1];
        }

        if (isset($skillImages[$dominant_skill2])) {
            $dominant_skill_img2 = $skillImages[$dominant_skill2];
            $dominant_skill_inner_img2 = $skillInnerImages[$dominant_skill2];
            $dominant_skill_color2 = $skillColors[$dominant_skill2];
            $dominant_skill_text_color2 = $skillTextColors[$dominant_skill2];
        }

        return [
            'dominant_skill1' => $dominant_skill1,
            'dominant_skill2' => $dominant_skill2,
            'dominant_skill_img1' => $dominant_skill_img1,
            'dominant_skill_img2' => $dominant_skill_img2,
            'dominant_skill_inner_img1' => $dominant_skill_inner_img1,
            'dominant_skill_inner_img2' => $dominant_skill_inner_img2,
            'dominant_skill_color1' => $dominant_skill_color1,
            'dominant_skill_color2' => $dominant_skill_color2,
            'dominant_skill_text_color1' => $dominant_skill_text_color1,
            'dominant_skill_text_color2' => $dominant_skill_text_color2,
            'dominant_skills_text' => $dominant_skills_text,
        ];
    }

    public function getDevelopingSkillData($developing_skill1, $developing_skill2, $developing_skills_text)
    {
        $skillImages = [
            'MOTIVE' => asset('assets/images/report/hex-MOTIVE.png'),
            'CREATIVE' => asset('assets/images/report/hex-CREATIVE.png'),
            'ADAPTIVE' => asset('assets/images/report/hex-ADAPTIVE.png'),
            'EMOTIVE' => asset('assets/images/report/hex-EMOTIVE.png'),
            'INTERACTIVE' => asset('assets/images/report/hex-INTERACTIVE.png'),
            'COGNITIVE' => asset('assets/images/report/hex-COGNITIVE.png'),
        ];
        $skillInnerImages = [
            'MOTIVE' => asset('assets/images/report/hax-inner-MOTIVE.png'),
            'CREATIVE' => asset('assets/images/report/hax-inner-CREATIVE.png'),
            'ADAPTIVE' => asset('assets/images/report/hax-inner-ADAPTIVE.png'),
            'EMOTIVE' => asset('assets/images/report/hax-inner-EMOTIVE.png'),
            'INTERACTIVE' => asset('assets/images/report/hax-inner-INTERACTIVE.png'),
            'COGNITIVE' => asset('assets/images/report/hax-inner-COGNITIVE.png'),
        ];
        $skillColors = [
            'MOTIVE' => '#bdd6ff',
            'CREATIVE' => '#add5f8',
            'ADAPTIVE' => '#dfffc9',
            'EMOTIVE' => '#ffebaf',
            'INTERACTIVE' => '#ffd7a3',
            'COGNITIVE' => '#ffdbdb',
        ];

        $skillTextColors = [
            'MOTIVE' => '#2d5497',
            'CREATIVE' => '#5b9bd5',
            'ADAPTIVE' => '#6fac45',
            'EMOTIVE' => '#ffbe00',
            'INTERACTIVE' => '#ff9000',
            'COGNITIVE' => '#c00000',
        ];

        $developing_skill_img1 = '';
        $developing_skill_img2 = '';
        $developing_skill_inner_img1 = '';
        $developing_skill_inner_img2 = '';
        $developing_skill_color1 = '';
        $developing_skill_color2 = '';
        $developing_skill_text_color1 = '';
        $developing_skill_text_color2 = '';

        if (isset($skillImages[$developing_skill1])) {
            $developing_skill_img1 = $skillImages[$developing_skill1];
            $developing_skill_inner_img1 = $skillInnerImages[$developing_skill1];
            $developing_skill_color1 = $skillColors[$developing_skill1];
            $developing_skill_text_color1 = $skillTextColors[$developing_skill1];
        }

        if (isset($skillImages[$developing_skill2])) {
            $developing_skill_img2 = $skillImages[$developing_skill2];
            $developing_skill_inner_img2 = $skillInnerImages[$developing_skill2];
            $developing_skill_color2 = $skillColors[$developing_skill2];
            $developing_skill_text_color2 = $skillTextColors[$developing_skill2];
        }

        return [
            'developing_skill1' => $developing_skill1,
            'developing_skill2' => $developing_skill2,
            'developing_skill_img1' => $developing_skill_img1,
            'developing_skill_img2' => $developing_skill_img2,
            'developing_skill_inner_img1' => $developing_skill_inner_img1,
            'developing_skill_inner_img2' => $developing_skill_inner_img2,
            'developing_skill_color1' => $developing_skill_color1,
            'developing_skill_color2' => $developing_skill_color2,
            'developing_skill_text_color1' => $developing_skill_text_color1,
            'developing_skill_text_color2' => $developing_skill_text_color2,
            'developing_skills_text' => $developing_skills_text,
        ];
    }

    function lifeStrengthImages($life_strengths)
    {
        $life_strengths_images = [];

        foreach ($life_strengths as $ls) {
            $image = LifeStrength::where('achievements_strength', $ls)->first(['image']);

            if ($image) {
                $life_strengths_images[] = $image->image;
            }
        }

        return $life_strengths_images;
    }
    function lifeStrengthBg($life_strengths)
    {
        $strength_category_images = [];

        foreach ($life_strengths as $ls) {
            $strength_category = LifeStrength::where('achievements_strength', $ls)->first(['strength_category']);

            if ($strength_category) {
                $strength_category_images[] = strtoupper($strength_category->strength_category);
            }
        }

        return $strength_category_images;
    }
    function lifeStrengthText($life_strengths)
    {
        $data = [];

        foreach ($life_strengths as $ls) {
            $strength_category = LifeStrength::where('achievements_strength', $ls)->first();

            if ($strength_category) {
                $data['achievements_strength'][] = $strength_category->achievements_strength;
                $data['description'][] = $strength_category->description;
            }
        }

        return $data;
    }

    function Top4Pathway($safety)
    {
        $pathway_values_arr = explode(',', $safety);

        $value_counts = array_count_values($pathway_values_arr);

        arsort($value_counts);

        $top4_values = array_slice(array_keys($value_counts), 0, 4);

        $records = JobDetail::whereIn('id', $top4_values)->get();

        return $records;
    }
}
