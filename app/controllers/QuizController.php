<?php

namespace App\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\StudentQuiz;
use App\Models\StudentQuizDetail;
use App\Models\Subject;
use App\Models\User;
use DateTime;

class QuizController
{
    public function index()
    {
        $user = User::find($_SESSION['id_user']);
        $subjects = Subject::all();
        $quiz = null;
        $quiz = Quiz::where('subject_id', '=', $subjects[0]->id)->get();

        return view('quiz.index', [
            'subjects' => $subjects,
            'quiz' => $quiz,
            'user' => $user
        ]);
    }

    public function quiz_by_subject_id($subject_id)
    {
        $user = User::find($_SESSION['id_user']);
        $subjects = Subject::all();
        $quiz = Quiz::where('subject_id', '=', $subject_id)->get();
        return view('quiz.index', [
            'subjects' => $subjects,
            'quiz' => $quiz,
            'user' => $user
        ]);
    }
    public function addForm()
    {
        $user = User::find($_SESSION['id_user']);
        $subject = Subject::all();
        return view('quiz.add-form', [
            'user' => $user,
            'subject' => $subject
        ]);
        // $VIEW_PAGE = "./app/views/quiz/add-form.php";
        // include "./app/views/layout.php";
    }
    public function saveAdd()
    {
        $model = new Quiz;
        $model->name = $_POST['name'];
        $model->subject_id = $_POST['mon_hoc'];
        $model->duration_minutes = $_POST['tg_lam'];
        $model->start_time = $_POST['tg_mo'];
        $model->end_time = $_POST['tg_dong'];
        $model->status = $_POST['trang_thai'];
        $model->is_shuffle = $_POST['tron_de'];
        $model->save();
        header('location: ' . BASE_URL . 'quiz');
        die;
    }
    public function updateForm($id)
    {
        $user = User::find($_SESSION['id_user']);

        $quiz = Quiz::find($id);
        $subject = Subject::all();
        $tg_mo = new DateTime($quiz->start_time);
        $tg_dong = new DateTime($quiz->end_time);
        return view('quiz.update-form', [
            'quiz' => $quiz,
            'user' => $user,
            'subject' => $subject,
            'tg_mo' => $tg_mo,
            'tg_dong' => $tg_dong
        ]);
    }
    public function saveUpdate()
    {
        // $data = [
        //     'name' => $_POST['name'],
        //     'subject_id' => $_POST['mon_hoc'],
        //     'duration_minutes' => $_POST['tg_lam'],
        //     'start_time' => $_POST['tg_mo'],
        //     'end_time' => $_POST['tg_dong'],
        //     'status' => $_POST['trang_thai'],
        //     'is_shuffle' => $_POST['tron_de']
        // ];
        $model = Quiz::find($_POST['id']);
        $model->name = $_POST['name'];
        $model->subject_id = $_POST['mon_hoc'];
        $model->duration_minutes = $_POST['tg_lam'];
        $model->start_time = $_POST['tg_mo'];
        $model->end_time = $_POST['tg_dong'];
        $model->status = $_POST['trang_thai'];
        $model->is_shuffle = $_POST['tron_de'];
        $model->save();
        header('location: ' . BASE_URL . 'quiz');
        die;
    }
    public function remove($id)
    {
        Quiz::destroy($id);
        header('location: ' . BASE_URL . 'quiz');
        die;
    }

    public function lamBai($quiz_id)
    {
        $a = 1;
        $tg_lam = Quiz::find($quiz_id)->duration_minutes;
        // $tg_lam = Quiz::rawQuery('select duration_minutes from quizs where id = ' . $quiz_id . '')->first()->duration_minutes;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $start_time = new \DateTime(date("F d, Y h:i:s A"));
        $time =  $start_time->format('Y-m-d\TH:i:s');
        $data = [
            'student_id' => $_SESSION['id_user'],
            'quiz_id' => $quiz_id,
            'start_time' => $time,
            'score' => 0,
            'old' => 1
        ];
        $kq = StudentQuiz::selectRaw('MAX(id) as result')->where('student_id', '=', $_SESSION['id_user'])->where('quiz_id', '=', $quiz_id)->first()->result;
        if (isset($kq)) {
            $model = StudentQuiz::find($kq);
            $model->old = 0;
            $model->save();
        }

        $model =  new StudentQuiz();
        $model->student_id = $_SESSION['id_user'];
        $model->quiz_id = $quiz_id;
        $model->start_time = $time;
        $model->score = 0;
        $model->old = 1;
        $model->save();
        $questions = Question::where('quiz_id', '=', $quiz_id)->get();
        $answer = fn ($ts) => Answer::where('question_id', '=', $ts)->get();
        $user = User::find($_SESSION['id_user']);
        return view('site.start-quiz', [
            'questions' => $questions,
            'answer' => $answer,
            'user' => $user,
            'tg_lam' => $tg_lam,
            'quiz_id' => $quiz_id,
            'a' => $a
        ]);
        // include "./app/views/site/start-quiz.php";
    }

    public function kiemTra()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $end_time = new \DateTime(date("F d, Y h:i:s A"));
        $time =  $end_time->format('Y-m-d\TH:i:s');
        $count = 0;
        $score = null;
        $quiz_id = $_POST['quiz_id'];
        $so_cau = Question::selectRaw('count(id)  as result')->where('quiz_id', '=', $quiz_id)->first()->result;
        // $so_cau = Question::rawQuery('select count(id) result from questions where quiz_id = ' . $quiz_id . '')->first()->result;
        $answer_students = array();
        $anwser_correct = Answer::where('is_correct', '=', 1)->get();
        for ($i = 1; $i <= $so_cau; $i++) {
            array_push($answer_students, $_POST['form-dap-an' . $i . '']);
        }

        for ($i = 0; $i < count($answer_students); $i++) {
            $model = new StudentQuizDetail();
            $model->student_quiz_id = StudentQuiz::where('student_id', '=', $_SESSION['id_user'])->orderBy('id', 'asc')->first()->id;
            $model->question_id = Answer::find($answer_students[$i])->question_id;
            $model->save();
        }
        for ($i = 0; $i < count($anwser_correct); $i++) {
            for ($j = 0; $j < count($answer_students); $j++) {
                if ($anwser_correct[$i]->id == $answer_students[$j]) {
                    $count += 1;
                }
            }
        }
        if ($count  == 0) {
            $score = 0;
        } else {
            $score = (10 / $so_cau) * $count;
        }
        // $data = [
        //     'end_time' => $time,
        //     'score' => $score
        // ];
        var_dump($score);
        $update_id = StudentQuiz::where('student_id', '=', $_SESSION['id_user'])->orderBy('id', 'desc')->first()->id;
        $model = StudentQuiz::find($update_id);
        $model->end_time = $time;
        $model->score = $score;
        $model->save();
        header('location: ' . BASE_URL . 'mon-hoc/' . Quiz::find($quiz_id)->subject_id . '/chi-tiet');
        die;
    }
}
