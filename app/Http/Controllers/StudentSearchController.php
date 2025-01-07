<?php

namespace App\Http\Controllers;

use App\Models\ExpresDashboardMonthly;
use App\Models\ExpressClient;
use App\Models\ExpressUser;
use App\Models\JobDetail;
use App\Models\LifeStrength;
use App\Models\LifeSuggestion;
use App\Models\LifevitaeCharacter;
use Carbon\Carbon;
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

        $script = "python3 D:/01-LifeVitae/00-Laravel/ExpressAdminDashboard/public/get_charachter.py {$id}";

        $ch = json_decode(shell_exec($script), true);
        
        $top_ch = LifevitaeCharacter::find($ch['lifevitae_charachter']);


        $skills = ['Cognitive', 'Interactive', 'Emotive', 'Adaptive', 'Creative', 'Motive'];
        $skills_data = [
            $expressReport->COGNITIVE,
            $expressReport->INTERACTIVE,
            $expressReport->EMOTIVE,
            $expressReport->ADAPTIVE,
            $expressReport->CREATIVE,
            $expressReport->MOTIVE,
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
                'top_ch'
            )
        );
    }

    function reportTwo($id)
    {
        $user = ExpressUser::find($id);

        $expressReport = $user->expressReport;

        $life_strengths =  explode(',', $expressReport->life_strengths);


        $skills = ['Cognitive', 'Interactive', 'Emotive', 'Adaptive', 'Creative', 'Motive'];
        $skills_data = [
            $expressReport->COGNITIVE,
            $expressReport->INTERACTIVE,
            $expressReport->EMOTIVE,
            $expressReport->ADAPTIVE,
            $expressReport->CREATIVE,
            $expressReport->MOTIVE,
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

    public function monthlyReport($id)
    {
        $monthly_report = ExpresDashboardMonthly::findOrFail($id);

        // Extract skills and other patterns
        $dominant_skills = $this->extractSkillsAndText($monthly_report->dominant_skill_text);
        $developing_skills = $this->extractSkillsAndText($monthly_report->developing_skill_text);
        $co_curricular_patterns = $this->safeJsonDecode($monthly_report->co_curricular_patterns);
        $social_patterns = $this->safeJsonDecode($monthly_report->social_patterns);
        $top_strengths = $this->extractTopStrengths($monthly_report->top_strengths);

        // Extract the start and end dates for the given month
        $start_date = Carbon::createFromFormat('Y-m', $monthly_report->year_month)->startOfMonth();
        $end_date = $start_date->copy()->addMonth()->startOfMonth();

        // Total Licenses Issued in the month
        $total_licenses_issued = ExpressUser::where('omr_client_id', $monthly_report->school_name)
            ->whereBetween('created_at', [$start_date, $end_date])
            ->count();

        // Reports Generated in the month
        $reports_generated = ExpressUser::where('omr_client_id', $monthly_report->school_name)
            ->whereHas('expressReport', function ($query) use ($start_date, $end_date) {
                $query->whereBetween('created_at', [$start_date, $end_date]);
            })
            ->count();

        // Top Life Path data
        $top_lp_data = $this->parseTopLp($monthly_report->top_lp);
        $job_details = JobDetail::whereIn('id', array_keys($top_lp_data))->get();

        $labels = [];
        $values = [];

        foreach ($job_details as $job) {
            $labels[] = $job->title;
            $values[] = $top_lp_data[$job->id];
        }

        array_multisort($values, SORT_DESC, $labels);

        // dd($top_lp_data, $labels,$values,$job_details);

        // Pass data to the view
        return view('monthly_summary_report', [
            'monthly_report' => $monthly_report,
            'dominant_skills' => $dominant_skills,
            'developing_skills' => $developing_skills,
            'co_curricular_patterns' => $co_curricular_patterns,
            'social_patterns' => $social_patterns,
            'top_strengths' => $top_strengths,
            'top_lp_labels' => $labels,
            'top_lp_values' => $values,
            'total_licenses_issued' => $total_licenses_issued,
            'reports_generated' => $reports_generated,
        ]);
    }


    private function parseTopLp(string $top_lp): array
    {
        $data = [];
        $pairs = explode(';', $top_lp);

        foreach ($pairs as $pair) {
            if (strpos($pair, ':') !== false) {
                list($id, $value) = explode(':', $pair);
                $data[(int) $id] = (int) $value;
            }
        }

        return $data;
    }


    private function extractTopStrengths(?string $strengths): array
    {
        if (is_null($strengths) || trim($strengths) === '') {
            return [];
        }

        return array_map('trim', explode(',', $strengths));
    }


    private function safeJsonDecode(?string $jsonString): array
    {
        if (is_null($jsonString) || trim($jsonString) === '') {
            return [];
        }

        // Replace single quotes with double quotes to fix JSON format issues.
        $fixedJson = str_replace("'", "\"", $jsonString);

        $decoded = json_decode($fixedJson, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            return []; // Return an empty array on failure.
        }

        return $decoded;
    }



    protected $skillColors = [
        'MOTIVE' => '#c00000',
        'CREATIVE' => '#ff9000',
        'ADAPTIVE' => '#ffbe00',
        'EMOTIVE' => '#6fac45',
        'INTERACTIVE' => '#5b9bd5',
        'COGNITIVE' => '#2d5497',
    ];


    public function extractSkillsAndText(string $input): array
    {

        list($keys, $content) = explode(':', $input, 2);
        $keyArray = explode(',', $keys);

        $result = [];
        foreach ($keyArray as $index => $key) {
            $trimmedKey = trim($key);

            $result['skills'][] = [
                'name' => $trimmedKey,
                'color' => $this->skillColors[$trimmedKey] ?? '#000000' // Default to black if not found
            ];
        }

        $result['text'] = trim($content);

        return $result;
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
