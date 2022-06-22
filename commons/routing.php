<?php

use App\Controllers\AnswerController;
use App\Controllers\DashboardController;
use App\Controllers\LoginController;
use App\Controllers\QuestionController;
use App\Controllers\QuizController;
use App\Controllers\SiteController;
use App\Controllers\SubjectController;
use App\Controllers\UserController;
use App\Models\Quiz;
use Phroute\Phroute\Dispatcher;
use Phroute\Phroute\RouteCollector;

function applyRouting($url){
    $router = new RouteCollector();

    // định nghĩa url trong này
    // $router->get('/', function(){
    //     return "Hello poly";
    // });
    $router->filter('check-login', function(){
      if(!isset($_SESSION['id_user']) || empty($_SESSION['id_user'])){
          header('location: '. BASE_URL . 'login');
          die;
      }
  });

    //Login and Form 
    $router->get('login',[LoginController::class,'index']);
    $router->post('login',[LoginController::class,'dang_nhap']);
    $router->get('logout',[LoginController::class,'logout'],['before' => 'check-login']);
    $router->post('{site}?/resign',[UserController::class,'saveAdd']);
    $router->get('resign',[LoginController::class,'resignForm']);
        //Môn học
    $router->group(['prefix' => 'mon-hoc'], function($router){
    $router->get('{subject_id}/cap-nhat', [SubjectController::class, 'updateForm'],['before' => 'check-login']);
    $router->post('cap-nhat',[SubjectController::class,'saveUpdate'],['before' => 'check-login']);
    $router->get('tao-moi',[SubjectController::class,'addForm'],['before' => 'check-login']);
    $router->post('tao-moi',[SubjectController::class,'saveAdd'],['before' => 'check-login']);
    $router->get('{id}/xoa',[SubjectController::class,'remove'],['before' => 'check-login']);
    $router->get('{id}/chi-tiet',[SubjectController::class,'detail'],['before' => 'check-login']);
    $router->get('{id}/list',[SubjectController::class,'FormInfo'],['before' => 'check-login']);
    $router->get('{quiz_id}/detail-test',[SubjectController::class,'detail_test'],['before' => 'check-login']);
    $router->get('{id_hv}/{quiz_id}?/hoc-vien',[SubjectController::class,'hoc_vien'],['before' => 'check-login']);
    $router->get('/', [SubjectController::class, 'index'],['before' => 'check-login']);
      });
    //dashboard
    $router->get('dashboard',[DashboardController::class,'index'],['before' => 'check-login']);
    //quiz
    $router->group(['prefix' => 'quiz'], function($router){
    $router->get('/',[QuizController::class,'index'],['before' => 'check-login']);
  
    $router->get('tao-moi',[QuizController::class,'addForm'],['before' => 'check-login']);
    $router->post('tao-moi',[QuizController::class,'saveAdd'],['before' => 'check-login']);
    $router->get('{id}/xoa',[QuizController::class,'remove'],['before' => 'check-login']);
    $router->get('{id}/cap-nhat',[QuizController::class,'updateForm'],['before' => 'check-login']);
    $router->post('cap-nhat',[QuizController::class,'saveUpdate'],['before' => 'check-login']);
    $router->get('{quiz_id}/lam-bai',[QuizController::class,'lamBai'],['before' => 'check-login']);
    $router->post('kiem-tra',[QuizController::class,'kiemTra'],['before' => 'check-login']);
    $router->get('/{subject_id}',[QuizController::class,'quiz_by_subject_id'],['before' => 'check-login']);
    });
    //Question
    $router->group(['prefix' => 'question'], function($router){
     $router->get('{id}/list',[QuestionController::class,'index'],['before' => 'check-login']);
     $router->get('{id}/tao-moi',[QuestionController::class,'formAdd'],['before' => 'check-login']);
     $router->post('{id}/tao-moi',[QuestionController::class,'saveAdd'],['before' => 'check-login']);
     $router->get('{id}/cap-nhat',[QuestionController::class,'updateForm'],['before' => 'check-login']);
     $router->post('{id}/cap-nhat',[QuestionController::class,'saveUpdate'],['before' => 'check-login']);
     $router->get('{id}/{quiz_id}?/xoa',[QuestionController::class,'remove'],['before' => 'check-login']);
     $router->get('{id}/view',[QuestionController::class,'view'],['before' => 'check-login']);
      });
    // Answer
     $router->group(['prefix' => 'answer'], function($router){
     $router->get('{id}/cap-nhat',[AnswerController::class,'updateForm'],['before' => 'check-login']);
     $router->post('cap-nhat',[AnswerController::class,'saveUpdate'],['before' => 'check-login']);
       });
    //site
     $router->get('/',[SiteController::class,'index']);
     $router->get('subject',[SiteController::class,'list']);
     $router->get('your-subject',[SiteController::class,'your_subject'],['before' => 'check-login']);
     //user
     $router->group(['prefix' => 'user'], function($router){
      $router->get('/',[UserController::class,'index'],['before' => 'check-login']);
      $router->get('tao-moi',[UserController::class,'addForm'],['before' => 'check-login']);
      $router->post('tao-moi',[UserController::class,'saveAdd'],['before' => 'check-login']);
      $router->get('{id}/cap-nhat',[UserController::class,'updateForm'],['before' => 'check-login']);
      $router->post('cap-nhat',[UserController::class,'saveUpdate'],['before' => 'check-login']);
      $router->get('{id}/xoa',[UserController::class,'remove'],['before' => 'check-login']);
        });
      $router->get('user-profile',[UserController::class,'profileAdmin'],['before' => 'check-login']);
    $dispatcher = new Dispatcher($router->getData());
    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($url, PHP_URL_PATH));
   
    // Print out the value returned from the dispatched function
    echo $response;
}
