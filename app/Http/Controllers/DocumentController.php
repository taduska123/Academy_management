<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Time;
use App\Trainee;
use PhpOffice\PhpWord\TemplateProcessor;

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
        $templateProcessor = new TemplateProcessor('word-template\user.docx');
        $fileName = Trainee::findorFail($trainee_id)->wholename()->get();
        $data = Time::weeks($times);
        //dd($data);
        $templateProcessor->cloneRowAndSetValues('week', $data);
        $templateProcessor->saveAs($fileName . '.docx');
        return response()->download($fileName . '.docx')->deleteFileAfterSend(true);
    }
   
}
