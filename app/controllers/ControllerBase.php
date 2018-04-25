<?php
use Phalcon\Mvc\View; // เรียกใช้ความสามารถของ function view
use Phalcon\Mvc\Controller;

class ControllerBase extends Controller{
 
   
  public function initialize() { // function ที่จะถูกเรียนใช้งานก่อนทุกครั้ง ที่เริ่มระบบ
  
    $this->assets
      ->collection('styles') // pack ไฟล์ css ที่ต้องการใช้งาน
      ->addCss('public/vendor/bootstrap/css/bootstrap.min.css')
      ->addCss('public/vendor/font-awesome/css/font-awesome.min.css')
      ->addCss('https://fonts.googleapis.com/css?family=Cabin:700')
      ->addCss('https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic')
	  ->addCss('public/css/grayscale.css');
	$this->assets
      ->collection('styleslogin') // pack ไฟล์ css ที่ต้องการใช้งาน
      ->addCss('https://fonts.googleapis.com/css?family=Kanit')
      ->addCss('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css')
	  ->addCss('public/css/grayscale.css');
    $this->assets
      ->collection('scripts') // pack ไฟล์ js ที่ต้องการใช้งาน
      ->addJs('vendor/jquery/jquery.min.js')
      ->addJs('vendor/bootstrap/js/bootstrap.bundle.min.js')
      ->addJs('vendor/jquery-easing/jquery.easing.min.js')
      ->addJs('https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false')
      ->addJs('public/js/grayscale.min.js');
 
     
  }
	
  public function checkAuthen()
  {
	 if(!$this->session->has('memberAuthen')) // ตรวจสอบว่ามี session การเข้าระบบ หรือไม่
    		 $this->response->redirect('authen');   
   }
}
