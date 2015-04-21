<?php

class FirstController extends CController {

    public function actionIndex() {
//va quass
        Yii::app()->theme = '';

    $this->render('index',array('errors' =>''));

}
    public function actionSignOut() {
        Yii::app()->session->clear();
        Yii::app()->session->destroy();
        $this->redirect(array('login/index'));
    }



} 