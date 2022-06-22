<?php
namespace App\Controllers;

use App\Models\Quiz;
use App\Models\StudentQuiz;
use App\Models\Subject;
use App\Models\User;

class SubjectController{
    public function index(){
       
        // $subjects = Subject::select()->orderBy('id','desc')->get();
        $user = User::find($_SESSION['id_user']);
        $subjects = Subject::selectRaw('subjects.name as subName,subjects.id as subId,users.name as authorName')->join('users','subjects.author_id','=','users.id')->orderBy('subjects.id','desc')->get();
        return view('mon-hoc.index',[
            'subjects' => $subjects,
            'user' => $user

        ]);
        // $VIEW_PAGE = "./app/views/mon-hoc/index.php";
        // include_once "./app/views/layout.php";
    }

    public function addForm(){
    $user = User::find($_SESSION['id_user']);
      return view('mon-hoc.add-form',[
          'user' => $user
      ]);
    }

    public function saveAdd(){
        $model = new Subject();
        $model->name =  $_POST['name'];
        $model->author_id = $_SESSION['id_user'];
        // $model->insert($data);
        $model->save();
        header('location: ' . BASE_URL . 'mon-hoc');
        die;
    }

    public function updateForm($subject_id){
        $subject = Subject::find($subject_id);
        $user = User::find($_SESSION['id_user']);
        return view('mon-hoc.update-form',[
            "subject" => $subject,
            'user' => $user
        ]);
    }

    public function saveUpdate(){
        $model = Subject::find($_POST['id']);
        $model->name = $_POST['name'];
        $model->save();
        header('location: ' . BASE_URL . 'mon-hoc');
        die;
    }

    public function remove($id){
        Subject::destroy($id);
        header('location: ' . BASE_URL . 'mon-hoc');
        die;
    }

    public function detail($id){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        if(!isset($_SESSION['id_user'])){
            header('location: '.BASE_URL.'login');
            die;
        }
        $subject = Subject::find($id);
        $quiz = fn($ts) => Quiz::where('subject_id', '=', $ts)->get();
        $studentQuiz = fn($ts) => StudentQuiz::where('quiz_id', '=', $ts)->where('student_id', '=', $_SESSION['id_user'])->get();
       
        $tg = fn($tg) => new \DateTime($tg);
        // $today = new \DateTime(date("F d, Y h:i:s A"));
       
        // var_dump($subject);
        $userSub = User::find($subject->author_id);
        $user = User::find($_SESSION['id_user']);

        // include "./app/views/site/detail-subject.php";
        return view('site.detail-subject',[
            'subject' => $subject,
            'quiz' => $quiz,
            'studentQuiz' =>$studentQuiz,
            'tg' => $tg,
            'userSub' => $userSub,
            'user' => $user,
        ]);
    }

    public function FormInfo($id){
        $user = User::find($_SESSION['id_user']);
        $infomations = Quiz::selectRaw('AVG(score) dtb,quiz_id,name title,COUNT(student_id) so_nguoi_lam')->join('student_quizs','quizs.id','=','student_quizs.quiz_id')->where('old','=',1)->where('subject_id','=',$id)->groupBy('quiz_id')->get();
        // $infomations = Subject::rawQuery('SELECT  FROM quizs JOIN student_quizs on quizs.id = student_quizs.quiz_id WHERE old = 1  AND subject_id = '.$id.' GROUP BY quiz_id ')->get();
        return view('mon-hoc.list-info',[
            'infomations' => $infomations,
            'user' => $user
        ]);
        // $VIEW_PAGE = "./app/views/mon-hoc/list-info.php";;
        // include "./app/views/layout.php";
    }

    public function detail_test($quiz_id){
        $user = User::find($_SESSION['id_user']);
        $quiz = Quiz::find($quiz_id);
        $detail = User::selectRaw('avatar,name student_name,start_time,end_time,score,users.id id_hv')->join('student_quizs','users.id','=','student_quizs.student_id')->where('quiz_id','=',$quiz_id)->where('old','=',1)->get();
        // $detail = Subject::rawQuery('SELECT avatar,name student_name,start_time,end_time,score,users.id id_hv FROM users join student_quizs on users.id = student_quizs.student_id WHERE quiz_id = '.$quiz_id.' AND old = 1')->get();
        return view('mon-hoc.detail-test',[
            'quiz' =>  $quiz,
            'detail' => $detail,
            'user' => $user
        ]);
    //     $VIEW_PAGE = './app/views/mon-hoc/detail-test.php';
    //     include "./app/views/layout.php";
    // }
    }

    public function hoc_vien($id_hv,$quiz_id = 'default'){
        $user = User::find($_SESSION['id_user']);
        $i = 0;
        $name_quizz = Quiz::find($quiz_id)->name;
        $name_student = User::find($id_hv)->name;
        $result = StudentQuiz::select()->where('student_id','=',$id_hv)->where('quiz_id','=',$quiz_id)->orderBy('end_time','asc')->get();
        // $result = Subject::rawQuery('SELECT * FROM student_quizs WHERE student_id = '.$id_hv.' AND quiz_id = '.$quiz_id.' ORDER BY end_time ASC')->get();
        return view('mon-hoc.hoc-vien',[
            'name_quizz' => $name_quizz,
            'name_student' => $name_student,
            'i' => $i,
            'result' => $result,
             'user' => $user
        ]);
        // $VIEW_PAGE = "./app/views/mon-hoc/hoc-vien.php";
        // include "./app/views/layout.php";
    }
}
?>