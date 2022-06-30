<?php

namespace App\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\User;
use PDO;
use PDOException;

class QuestionController
{
    public function index($id)
    {
        $user = User::find($_SESSION['id_user']);

        $questions = Question::where('quiz_id', '=', $id)->orderBy('id', 'asc')->get();
        return view('question.index', [
            'user' => $user,
            'questions' => $questions,
            'id' => $id
        ]);
    }
    public function formAdd($id)
    {
        $user = User::find($_SESSION['id_user']);

        // $VIEW_PAGE = "./app/views/question/form-add.php";
        // include "./app/views/layout.php";
        return view('question.form-add', [
            'id' => $id,
            'user' => $user
        ]);
    }
    public function saveAdd($id)
    {
        $img = $_FILES['form-img']['name'];
        if (strlen($img) == 0) {
            $img = '20e10d7f0556722e4b4e32c7241d0638.jpg';
        }
        move_uploaded_file($_FILES["form-img"]["tmp_name"], $_SERVER["DOCUMENT_ROOT"] . '/web_lam_quiz/img/' . $img);
        try {
            $conn = new PDO('mysql:host=127.0.0.1;dbname=csdl_web_lam_quiz;charset=utf8', 'root', '');
            try {
                $data_question = [
                    'name' => $_POST['form-name'],
                    'quiz_id' => $id,
                    'img' => $img
                ];
                $model = Question::create($data_question);
                try {
                    $uploadImg = fn ($tmp, $src) =>  move_uploaded_file($tmp, $_SERVER["DOCUMENT_ROOT"] . '/web_lam_quiz/img/' . $src);
                    $id_ques =  $model->id;
                    $img = array();
                    for ($i = 1; $i < 5; $i++) {
                        if (strlen($_FILES['form-img-answer' . $i . '']['name']) == 0) {
                            $_FILES['form-img-answer' . $i . '']['name'] = '20e10d7f0556722e4b4e32c7241d0638.jpg';
                        }
                        array_push($img, $_FILES['form-img-answer' . $i . '']['name']);
                    }
                    $uploadImg($_FILES["form-img-answer1"]["tmp_name"], $img[0]);
                    $uploadImg($_FILES["form-img-answer2"]["tmp_name"], $img[1]);
                    $uploadImg($_FILES["form-img-answer3"]["tmp_name"], $img[2]);
                    $uploadImg($_FILES["form-img-answer4"]["tmp_name"], $img[3]);
                    for ($i = 1; $i < 5; $i++) {
                        $answer = new Answer();
                        $answer->content = $_POST['form-answer' . $i . ''];
                        $answer->question_id = $id_ques;
                        $answer->is_correct = 0;
                        $answer->img = $img[$i - 1];
                        if ($_POST['form-correct'] == $i) {
                            $answer->is_correct = 1;
                        }
                        $answer->save();
                    }
                    header('location: ' . BASE_URL . 'question/' . $id . '/list');
                    die;
                } catch (PDOException $e) {
                    echo 'Thêm đáp án không thành công' . '<br>' . $e->getMessage();
                }
            } catch (PDOException $e) {
                echo 'Thêm câu hỏi không thành công';
            }
        } catch (PDOException $e) {
            echo 'Db kết nối không thành công';
        }
    }

    public function updateForm($id)
    {
        $user = User::find($_SESSION['id_user']);
        $question = Question::where('id', '=', $id)->first();
        return view('question.form-update', [
            'question' => $question,
            'user' => $user,
            'id' => $id
        ]);
    }

    public function saveUpdate($id)
    {
        $img = $_FILES['form-img']['name'];
        if (strlen($img) == 0) {
            $img = Question::find($id)->img;
        }
        move_uploaded_file($_FILES["form-img"]["tmp_name"], $_SERVER["DOCUMENT_ROOT"] . '/web_lam_quiz/img/' . $img);
        $data_question = [
            'name' => $_POST['form-name'],
            'img' => $img
        ];
        $model = Question::find($id);
        $model->name = $_POST['form-name'];
        $model->img = $img;
        $model->save();
        header('location: ' . BASE_URL . 'question/' . Question::where('id', '=', $id)->first()->quiz_id . '/list');
        die;
    }

    public function remove($id, $quiz_id = 'default')
    {
        Question::destroy($id);
        header('location: ' . BASE_URL . 'question/' . $quiz_id . '/list');
        die;
    }

    public function view($id)
    {
        $user = User::find($_SESSION['id_user']);

        $question = Question::find($id);
        $answers = Answer::where('question_id', '=', $id)->get();
        // $VIEW_PAGE = "./app/views/question/view.php";
        // include "./app/views/layout.php";
        return view('question.view', [
            'user' => $user,
            'question' => $question,
            'answers' => $answers
        ]);
    }
}
