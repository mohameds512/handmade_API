<?php

namespace App\Console\Commands;


use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class Migration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Resolve {data}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'To Migration O6U DATABASE';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $data = $this->argument('data');

        foreach (Applicant::whereRaw("created_at > '2022-08-18 00:00:00' AND term_id IS null and send_email = 0")->whereDate('created_at', '<', Carbon::today())->limit(200)->get() as $applicant) {
            Applicant::changeStatus($applicant, ['status' => $applicant->status, 'flag' => 3, 'ignore_status' => true, 'message' => Applicant::REMEMBER_MESSAGE]);
            $applicant->send_email = 1;
            $applicant->save();
//            d($applicant->email);
        }


//        $startTime = PostGraduate::startTimer();
//        SBControl::gradeCont();
//        SBControl::gradeTermCont();
//        Credit::grades();
//        Credit::gradesTermsAndFinal();
//        StudentAffair::resolveGrade();
//        StudentAffair::resolveGrade2();
//        StudentAffair::generateGradeTerm();
//        StudentAffair::generateGradsMarks();

//        StudentAffair::updateStudentStatus();


//        PostGraduate::start();
//        PostGraduate::postGraduateStudents();
//        StudentAffair::generateCoursesMarks();
//        StudentAffair::faculties();
//        PostGraduate::terms();
//        SBControl::bylawsOfCont();
//        SBControl::programsFromCont();
//        Credit::programs();
//        Credit::coursesPreRequest();
//        PostGraduate::postgraduatePrograms();
////
//        SBControl::coursesFromCont();
//        Credit::academicSettings();
//        Credit::gradingSystem();

//        PostGraduate::courses();
//        Credit::programCourses();


//        if ($data == 'F') {
//            StudentAffair::faculties();
//            PostGraduate::terms();
//            SBControl::bylawsOfCont();
//            SBControl::programsFromCont();
//            Credit::academicSettings();
//            StudentAffair::migrate();
//        } elseif ($data == 'S') {
//            StudentAffair::motzStudents();
//            Credit::migrate();
//            SBControl::migrate();
//            PostGraduate::migrateClass();
//            StudentAffair::resolveGrade();
//        }

//        resolve_offerings();

//        Credit::gradesTermsAndFinal();
//        Credit::grades();
//
//        SBControl::gradeCont();
//        SBControl::gradeTermCont();

//        StudentAffair::resolveGrade();


////
//       Credit::grades();
//        StudentAffair::tempRegistrations();
//        StudentAffair::motzStudents();

//        PostGraduate::endTimer($startTime);
//        PostGraduate::end();

        return 0;

    }
}
