<?php

class FirstController extends CController {

    public function actionIndex() {
//va quass
        Yii::app()->theme = '';
        $data = CommonDB::GetAll("Select * from trangchuhinh order by date_create desc ",[]);
        $rightImage = CommonDB::GetAll("Select hinh_dai_dien from trangchu ",[]);
        $imgRight ="";
        if(count($rightImage)>0) $imgRight =$rightImage[0]["hinh_dai_dien"];

    $this->render('index',array('imgRight' =>$imgRight,'data' =>$data));

}
    public function actionSignOut() {
        Yii::app()->session->clear();
        Yii::app()->session->destroy();
        $this->redirect(array('login/index'));
    }



} 