<?php
namespace App\Controllers;

use App\Models\Subject;
use App\Models\User;

class SiteController{
   public function index(){

         $subjects = Subject::selectRaw('subjects.id as id,subjects.name as nameSub,users.name as nameAuth')->join("users","subjects.author_id",'=','users.id')->get();
         $subject_basic = Subject::select()->limit(5)->get();
         $user = '';
         if(isset($_SESSION['id_user'])){
            $user = User::find($_SESSION['id_user']);
         }
         return view('site.index',[
            'subject_basic' => $subject_basic,
            'subjects' => $subjects,
            'user' => $user
         ]);
      //   include_once './app/views/site/index.php';
   }
   public function list(){
      $subjects = Subject::selectRaw('subjects.id as id,subjects.name as nameSub,users.name as nameAuth')->join("users","subjects.author_id",'=','users.id')->get();
      $user = '';
      if(isset($_SESSION['id_user'])){
         $user = User::find($_SESSION['id_user']);
      }
      return view('site.list-subject',[
         'subjects' => $subjects,
         'user' => $user
      ]);
      // require "./app/views/site/list-subject.php";
   }

   public function your_subject(){
      $user = User::find($_SESSION['id_user']);
      $subjects = Subject::selectRaw('subjects.name as title , subjects.id as sub_id')->join('quizs','subjects.id','=','quizs.subject_id')->join('student_quizs','quizs.id','=','student_quizs.quiz_id')->where('student_id','=',$user->id)->where('old','=',1)->groupBy('subjects.id')->get()  ;
      // $subjects = Subject::rawQuery('SELECT subjects.`name` title,subjects.id sub_id FROM subjects join quizs on subjects.id = quizs.subject_id JOIN student_quizs on quizs.id = student_quizs.quiz_id WHERE student_id = '.$user->id.'  AND old = 1 GROUP BY subjects.id
      // ')->get();
      // require "./app/views/site/profile.php";
      return view('site.profile',[
         'user' => $user,
         'subjects' => $subjects

      ]);
   }
}
