<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Time;
use App\Trainee;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\Shared\Converter;
use PhpOffice\PhpWord\Style\TablePosition;
use PhpOffice\PhpWord\Settings;
use Illuminate\Support\Str;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Word($trainee_id)
    {
        $times = Trainee::byidtimes($trainee_id)->timesfordocs()->get();
        $fileName = Trainee::wholename($trainee_id)->get();
        $totalhours = Trainee::byidtimes($trainee_id)->totalhours('practise')->get();
        $contractdates = Trainee::contract($trainee_id)->get();
        $totalhoursbyweeks = Trainee::byidtimes($trainee_id)
        ->groupbyweeks()->totalhours('practise')
        ->addSelect(Time::raw("WEEK(intership_day, 5) AS weeks"))
        ->get();
        $weeks = Time::weeks($times, $totalhoursbyweeks);
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection(
            [
                'orientation' => 'landscape',
                'marginTop' => 600,
                'marginLeft' => 600,
                'marginRight' => 600,
                'marginBottom' => 600,
            ]
        );
        $phpWord->addTitleStyle(1, array('name'=>'HelveticaNeueLT Std Med', 'size'=>24));
        $section->addTitle('INDIVIDUALUS PRAKTIKOS ATLIKIMO GRAFIKAS', 1);
        $section->addText(
            $fileName->first()->whole_name.' praktika atliekama nuo '. $contractdates->first()->contract_start.' iki '. $contractdates->first()->contract_end.', iš viso skiriama '.$totalhours->first()->totalhours.' val.'
        );
        

        $tableStyle = [
            'width' => 100,
            'borderSize' => 6,
            'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER,
        ];
        $phpWord->addTableStyle('myTable', $tableStyle);
        $table = $section->addTable('myTable');
        $row = $table->addRow();
        $row->addCell(4200, ['valign' => 'center', 'vMerge' => 'restart'])
        ->addText('Studijų savaite', null, ['align' => 'center']);
        $row->addCell(null)->addText('Savaitės diena', null, ['align' => 'center']);
        $row->addCell(null)->addText('Paskaitų laikas  (nuo kelintos iki kelintos valandos vyksta)', null, ['align' => 'center']);
        $row->addCell(null)->addText('Praktikos atlikimo laikas  (nuo kelintos iki kelintos valandos vyksta)', null, ['align' => 'center']);

        foreach($weeks as $week)
        {
        $row = $table->addRow();
            $weekdate = Time::getStartAndEndDate($week['week'], $week['year']);
            $weekdate = $weekdate['week_start'].' - '.$weekdate['week_end'];
        $row->addCell(3600, ['valign' => 'center', 'vMerge' => 'restart'])
            ->addText($weekdate, null, ['align' => 'center']);
            $weekcount = null;
        foreach (Time::weekdays($times, $week['week']) as $weekday){
        if($weekcount != null){
        $row = $table->addRow();
        $row->addCell(null, ['vMerge' => 'continue']);
        }
        $row->addCell(null)->addText($weekday['weekday'], null, ['align' => 'center']);
        $row->addCell(null)->addText($weekday['offtimes'], null, ['align' => 'center']);
        $row->addCell(null)->addText($weekday['ontimes'], null, ['align' => 'center']);
        $weekcount = 1;
        }
        $row = $table->addRow();
        $row->addCell(null, ['vMerge' => 'continue', 'gridSpan' => 4])
        ->addText('Praktikai atlikti skiriama valandų suma: '.$week['thw'], null, ['align' => 'center']);
    }
        //echo write($phpWord, basename(__FILE__, '.php'));
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save($fileName->first()->whole_name.'.docx');
        return response()->download($fileName->first()->whole_name.'.docx')->deleteFileAfterSend(true);
    }
}
