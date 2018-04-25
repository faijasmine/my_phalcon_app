<?php
use Phalcon\Mvc\View;
class AddController extends ControllerBase{
 
 public function indexAction(){
  if($this->request->isPost()){
    $temp=new Event();
  $temp->event_name=trim($this->request->getPost('name'));
  $temp->event_date=trim($this->request->getPost('day'));
  $temp->event_detail=trim($this->request->getPost('detail'));

  $photoUpdate='';
  if($this->request->hasFiles() == true){
    $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
    $uploads = $this->request->getUploadedFiles();
    $isUploaded = false;			
    foreach($uploads as $upload){
      if(in_array($upload->gettype(), $allowed)){					
        $photoName=md5(uniqid(rand(), true)).strtolower($upload->getname());
        $path = '../public/img/'.$photoName;
        ($upload->moveTo($path)) ? $isUploaded = true : $isUploaded = false;
      }
    }
    if($isUploaded)  $photoUpdate=$photoName ;
    }else
    die('You must choose at least one file to send. Please try again.');

  $temp->event_picture=$photoUpdate;
  
  $temp->save();
  $this->response->redirect('event');
  }
  
  }

}
