<?php
namespace App\Controllers;

use App\Models\Answer;
use App\Models\Subject;
use App\Models\User;

class AnswerController{
    public function updateForm($id){
        $user = User::find($_SESSION['id_user']);
        $answer = Answer::find($id);
        return view('answer.form-update',[
            'user' => $user,
            'answer' => $answer
        ]);
        // $VIEW_PAGE = './app/views/answer/form-update.php';
        // include "./app/views/layout.php";
    }

    public function saveUpdate(){
        $img = $_FILES['form-img-answer']['name'];
        if(strlen($img) > 0){
            move_uploaded_file($_FILES["form-img-answer"]["tmp_name"],$_SERVER["DOCUMENT_ROOT"].'/asm1/img/'.$_FILES['form-img-answer']['name']);
        }
        else{
            $img = Answer::find($_POST['id_ans'])->img;
        }
        
        if($_POST['form-correct'] == 1){
            $listID = Answer::where('question_id','=',$_POST['question_id'])->get();
            foreach($listID as $item){
                if($item->id != $_POST['id_ans']){
                    $model =  Answer::find($item->id);
                    $model->is_correct = 0;
                    $model->save();
                }
            }
        
        }    
        $data = [
            'content' => $_POST['form-answer'],
            'is_correct' => $_POST['form-correct'],
            'img' => $img
        ];
        $model = Answer::find($_POST['id_ans']);
        $model->content = $_POST['form-answer'];
        $model->is_correct = $_POST['form-correct'];
        $model->img = $img;
        $model->save();
        header('location: '.BASE_URL.'question/'.Answer::find($_POST['id_ans'])->question_id.'/view');
        die;
    }
}
?>