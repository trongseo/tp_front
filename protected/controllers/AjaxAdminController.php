<?php
Yii::app()->theme = '';
class AjaxadminController extends UsersController {


    public function actionIndex() {

        $this->pageTitle = 'Danh sách sản phẩm';
        $this->render('index',  array('model'=>""));
    }
    public  function  checkImageFile($ctrName){
        $max_file_size = 1024*2000; // 200kb
        // Check filesize
        if($_FILES[$ctrName]['size'] > $max_file_size){
            return "Lỗi upload > 2MB";
        }

        // Check for errors
        if($_FILES[$ctrName]['error'] > 0){
            return "Lỗi upload.> 2MB";
        }

        if(!getimagesize($_FILES[$ctrName]['tmp_name'])){
            return "Lỗi upload (không tìm thấy)";
        }

        return "";

    }

    public function actionUpdateisshowhome() {
        $guid_id=$_REQUEST["guid_id"];
        $queryGuid="Select * from san_pham wherer san_pham_guid='".$guid_id."' ";
        $dataR = CommonDB::GetDataRowKeyGuid("san_pham",$guid_id);
       $san_pham_loai_guid = $dataR["san_pham_loai_guid"];
        $query = "update  san_pham set isshowhome=0 where san_pham_loai_guid='".$san_pham_loai_guid."' ";
        CommonDB::runSQL($query,[]);
        $query = "update  san_pham set isshowhome=1 where san_pham_guid='".$guid_id."' ";
        CommonDB::runSQL($query,[]);
        echo "ok";Yii::app()->end();
    }

    public function actionUploadImage() {

        if( isset($_POST['bsubmit']) && isset($_FILES["uploaded_image"]["name"]) && ($_FILES["uploaded_image"]["name"]!="") ) {
            $strResult = $this->checkImageFile("uploaded_image");
            if($strResult !=""){
                echo $strResult;Yii::app()->end();exit();

            }
            $guid_id_insert = Common::guid();
            $image = new SimpleImage();
            $guid_id=$_REQUEST["san_pham_guid"];
            $colorId=$_REQUEST["color_id"];
            $image->load($_FILES['uploaded_image']['tmp_name']);
            $imageName =$colorId.'_'.$guid_id.date('m_d_Y_hisa').'.jpg';
            $imageNameicon_="icon_".$imageName;
            define("image_folder","item_image/");
            $image->save(image_folder.$imageName);

//            $image->resizeToWidth(1024); $image->save('1024picture2.jpg');
//            $image->maxarea(450,450); $image->save('450450picture2.jpg');

            $image->resizeToWidth(133);
            $image->save(image_folder.$imageNameicon_);
            $queryIn="insert into san_pham_hinh(san_pham_hinh_guid,san_pham_guid,image1,so_thu_tu,tooltip,is_daidien,color_guid_id)
             values(:san_pham_hinh_guid,:san_pham_guid,:image1,:so_thu_tu,:tooltip,:is_daidien,:color_guid_id)";
            $hsTable["san_pham_hinh_guid"]=$guid_id_insert;
            $hsTable["san_pham_guid"]=$guid_id;
            $hsTable["image1"]=$imageName;
            $hsTable["so_thu_tu"]='0';
            $hsTable["tooltip"]='';
            $hsTable["is_daidien"]='0';
            $hsTable["color_guid_id"]=$colorId ;
           CommonDB::runSQL($queryIn,$hsTable);
            // $image->output();
            //$image->scale(50);

        }
        Yii::app()->end();
    }
	public function actionUploadImagetrangchu() {
define("image_folder","item_image/trangchu/");
if( isset($_POST['bsubmit']) && isset($_FILES["uploaded_image2"]["name"]) && ($_FILES["uploaded_image2"]["name"]!="") ) {
				    $strResult = $this->checkImageFile("uploaded_image2");
					if($strResult !=""){
						echo $strResult;Yii::app()->end();exit();
					}
					  $image1 = new SimpleImage();
					  
					  $image1->load($_FILES['uploaded_image2']['tmp_name']);
					  $image1->save(image_folder.'hinhtrangchubenphai.jpg');
					 // $queryIn ="update trangchu set hinh_dai_dien='hinhtrangchubenphai.jpg' where san_pham_guid='1'"
					   //CommonDB::runSQL($queryIn,$hsTable);
			   }
        if( isset($_POST['bsubmit']) && isset($_FILES["uploaded_image"]["name"]) && ($_FILES["uploaded_image"]["name"]!="") ) {
            $strResult = $this->checkImageFile("uploaded_image");
            if($strResult !=""){
                echo $strResult;Yii::app()->end();exit();

            }
			   
            $guid_id_insert = Common::guid();
            $image = new SimpleImage();
            $guid_id=$_REQUEST["san_pham_guid"];
            $colorId=$_REQUEST["color_id"];
            $image->load($_FILES['uploaded_image']['tmp_name']);
            $imageName ='trangchu_'.$guid_id.date('m_d_Y_hisa').'.jpg';
            $imageNameicon_="icon_".$imageName;
            
            $image->save(image_folder.$imageName);

//            $image->resizeToWidth(1024); $image->save('1024picture2.jpg');
//            $image->maxarea(450,450); $image->save('450450picture2.jpg');

            $image->resizeToWidth(133);
            $image->save(image_folder.$imageNameicon_);
            $queryIn="insert into trangchuhinh(san_pham_hinh_guid,san_pham_guid,image1,so_thu_tu,tooltip,is_daidien,color_guid_id)
             values(:san_pham_hinh_guid,:san_pham_guid,:image1,:so_thu_tu,:tooltip,:is_daidien,:color_guid_id)";
            $hsTable["san_pham_hinh_guid"]=$guid_id_insert;
            $hsTable["san_pham_guid"]=$guid_id;
            $hsTable["image1"]=$imageName;
            $hsTable["so_thu_tu"]='0';
            $hsTable["tooltip"]='';
            $hsTable["is_daidien"]='0';
            $hsTable["color_guid_id"]=$colorId ;
           CommonDB::runSQL($queryIn,$hsTable);Yii::app()->end();
            // $image->output();
            //$image->scale(50);

        }
    }
    public function actionSanphamedit() {

        if( isset($_POST['bsubmit'])) {

            //update image
            if( isset($_FILES["uploaded_image"]["name"]) && ($_FILES["uploaded_image"]["name"]!="")  ){
                $strResult = $this->checkImageFile("uploaded_image");
                if($strResult !=""){
                    echo $strResult;exit();Yii::app()->end();return;

                }

            }

            $guid_id=$_REQUEST["san_pham_guid"];
            $queryIn ="Update  san_pham set date_update=now(), ma_sp=:ma_sp,san_pham_loai_guid=:san_pham_loai_guid,mo_ta_dai=:mo_ta_dai where san_pham_guid=:san_pham_guid";
            $hsTable="";
            if($guid_id==""){
                $hsTable["mo_ta_ngan"]="" ; $hsTable["ten_sp"]="" ;
                $guid_id = Common::guid();
                $queryIn="insert into san_pham(date_update,san_pham_guid,ma_sp,ten_sp,san_pham_loai_guid,mo_ta_ngan,mo_ta_dai)
                    values(now(),:san_pham_guid,:ma_sp,:ten_sp,:san_pham_loai_guid,:mo_ta_ngan,:mo_ta_dai)";
            }
            $ma_sp=$_REQUEST["ma_sp"];

//            $image->resizeToWidth(1024); $image->save('1024picture2.jpg');
//            $image->maxarea(450,450); $image->save('450450picture2.jpg');


            $hsTable["san_pham_guid"]=$guid_id ;
            $hsTable["ma_sp"]=$ma_sp ;

           // $hsTable["hinh_dai_dien"]=$imageName ;
            $hsTable["san_pham_loai_guid"]=$_REQUEST["san_pham_loai_guid"];

            $hsTable["mo_ta_dai"]=$_REQUEST["mo_ta_dai"];
//            var_dump($hsTable);
            CommonDB::runSQL($queryIn,$hsTable);

            //update image
            if( isset($_FILES["uploaded_image"]["name"]) && ($_FILES["uploaded_image"]["name"]!="")  ){
                $strResult = $this->checkImageFile("uploaded_image");
                if($strResult !=""){
                    echo $strResult;exit();Yii::app()->end();return;
                }
            }
            if( isset($_FILES["uploaded_image"]["name"]) && ($_FILES["uploaded_image"]["name"]!="")  ){
                $image = new SimpleImage();
                $image->load($_FILES['uploaded_image']['tmp_name']);
                $imageName ='daidien_'.$guid_id.date('m_d_Y_hisa').'.jpg';
                $imageNameicon_="icon_".$imageName;
                define("image_folder","item_image/");
                $image->save(image_folder.$imageName);

                $image->resizeToWidth(133);
                $image->save(image_folder.$imageNameicon_);
                $queryIn ="Update  san_pham set hinh_dai_dien=:hinh_dai_dien where san_pham_guid=:san_pham_guid";
                $hsTableImage["san_pham_guid"]=$guid_id ;
                $hsTableImage["hinh_dai_dien"]=$imageName ;
                CommonDB::runSQL($queryIn,$hsTableImage);
            }


            // $image->output();
            //$image->scale(50);

        }
        Yii::app()->end();
    }

    public function actionDeleteSanPham() {
        $guid_id=$_REQUEST["guid_id"];
        $query = "delete from san_pham where san_pham_guid='".$guid_id."' ";
        CommonDB::runSQL($query,[]);
        echo "ok";Yii::app()->end();
    }
	public function actionDeleteimagetrangchu() {

        //deleteimage&guid_id="+guid_id +"&imagename="+imagename
        $guid_id=$_REQUEST["guid_id"];
        $imagename=$_REQUEST["imagename"];

        $file= $_SERVER['DOCUMENT_ROOT']."/item_image/".$imagename;
        if (file_exists($file)) {
            unlink( $file);
        }
        $file= $_SERVER['DOCUMENT_ROOT']."/item_image/"."icon_".$imagename;
        if (file_exists($file)) {
            unlink( $file);
        }
        $query = "delete from trangchuhinh where san_pham_hinh_guid='".$guid_id."' ";
        CommonDB::runSQL($query,[]);Yii::app()->end();

    }
    public function actionDeleteimage() {

        //deleteimage&guid_id="+guid_id +"&imagename="+imagename
        $guid_id=$_REQUEST["guid_id"];
        $imagename=$_REQUEST["imagename"];

        $file= $_SERVER['DOCUMENT_ROOT']."/item_image/".$imagename;
        if (file_exists($file)) {
            unlink( $file);
        }
        $file= $_SERVER['DOCUMENT_ROOT']."/item_image/"."icon_".$imagename;
        if (file_exists($file)) {
            unlink( $file);
        }
        $query = "delete from san_pham_hinh where san_pham_hinh_guid='".$guid_id."' ";
        CommonDB::runSQL($query,[]);Yii::app()->end();

    }
    public function actionHinhtrangchulist() {

        $san_pham_guid=$_REQUEST["san_pham_guid"];
        $colorId=$_REQUEST["color_id"];
        $query="Select * from trangchuhinh where color_guid_id='$colorId' and san_pham_guid='$san_pham_guid'";
        $data = CommonDB::GetAll($query,[]);
        $this->render('hinhtrangchulist',array('data'=>$data));Yii::app()->end();


    }
    public function actionListImage() {

        $san_pham_guid=$_REQUEST["san_pham_guid"];
        $colorId=$_REQUEST["color_id"];
        $query="Select * from san_pham_hinh where color_guid_id='$colorId' and san_pham_guid='$san_pham_guid'";
        $data = CommonDB::GetAll($query,[]);
        $this->render('hinhsanphamlist',array('data'=>$data));Yii::app()->end();


    }
    public function actionCheckmasp() {

        $san_pham_guid= Common::getPara("guid_id");
        $ma_sp=$_REQUEST["ma_sp"];
        $query="Select * from san_pham where ma_sp=:ma_sp and san_pham_guid<>'$san_pham_guid'";
        if($san_pham_guid==""){
            $query="Select * from san_pham where ma_sp=:ma_sp ";
        }
        $hsTable["ma_sp"]=$ma_sp;
        $data = CommonDB::GetAll($query,$hsTable);
        if(count($data)>0){
            echo "0";Yii::app()->end();
            return;
        }
        echo "1";Yii::app()->end();

    }

    public function actionColorUpdateList() {

        Yii::app()->theme = 'admin-green';
        $this->pageTitle = 'Danh sách màu sắc';
        if(isset($_REQUEST["add"])){
            $colorId = CommonDB::guid();
            $query="insert into m_color(color_id) values('$colorId')";
           CommonDB::runSQL($query,[]);
            $this->redirect("index.php?r=ajaxadmin/colorupdatelist");
            return;
        }
        if( isset($_POST['bsubmit'])) {
            $this->colorUpdateList();
        }
        $query="Select * from m_color order by date_create";
        $data = CommonDB::GetAll($query,[]);



        $this->render('colorupdatelist',array('data'=>$data));
    }
	public function actionNvkinhdoanh() {

        Yii::app()->theme = 'admin-green';
        $this->pageTitle = 'Danh sách nhân viên kinh doanh';
        if(isset($_REQUEST["add"])){
            $nvkinhdoanh_id = CommonDB::guid();
            $query="insert into nvkinhdoanh(nvkinhdoanh_id) values('$nvkinhdoanh_id')";
           CommonDB::runSQL($query,[]);
            $this->redirect("index.php?r=ajaxadmin/nvkinhdoanh");
            return;
        }
        if( isset($_POST['bsubmit'])) {
            $this->NvkinhdoanhUpdate();
        }
        $query="Select * from nvkinhdoanh	 order by ten ";
        $data = CommonDB::GetAll($query,[]);

        $this->render('nvkinhdoanh',array('data'=>$data));
    }
	public function NvkinhdoanhUpdate() {

        $i=0;
        $list =[];
        $forbiddenword = 'ten_';  
        foreach($_POST as $key=>$value)
        {
            if(preg_match("/$forbiddenword/i", $key)){
                $guid_id = substr($key,strlen ($forbiddenword));
                if (!in_array($guid_id, $list)){
                    $list[$i]=$guid_id;
                    $i++;
                    $query="update nvkinhdoanh set ten=:ten where nvkinhdoanh_id=:nvkinhdoanh_id";
                    $hs["ten"]=$_REQUEST["ten_".$guid_id];
                    $hs["nvkinhdoanh_id"]=$guid_id;
                    CommonDB::runSQL($query,$hs);
                }
            }
        }

        $i=0;
        $list =[];
        $forbiddenword1 = 'email_';
        foreach($_POST as $key=>$value)
        {
            if(preg_match("/$forbiddenword1/i", $key)){
                $guid_id = substr($key,strlen ($forbiddenword1));
                if (!in_array($guid_id, $list)){
                    $list[$i]=$guid_id;
                    $i++;
                    $query="update nvkinhdoanh set email=:email where nvkinhdoanh_id=:nvkinhdoanh_id";
                    $hs1["email"]=$_REQUEST["email_".$guid_id];
                    $hs1["nvkinhdoanh_id"]=$guid_id;
                    CommonDB::runSQL($query,$hs1);
                }
            }

        }
		
		 $i=0;
        $list =[];
        $forbiddenword2 = 'sodienthoai_';
		$hs2=[];
        foreach($_POST as $key=>$value)
        {
            if(preg_match("/$forbiddenword2/i", $key)){
                $guid_id = substr($key,strlen ($forbiddenword2));
                if (!in_array($guid_id, $list)){
                    $list[$i]=$guid_id;
                    $i++;
                    $query="update nvkinhdoanh set sodienthoai=:sodienthoai where nvkinhdoanh_id=:nvkinhdoanh_id";
                    $hs2["sodienthoai"]=$_REQUEST[$forbiddenword2.$guid_id];
                    $hs2["nvkinhdoanh_id"]=$guid_id;
                    CommonDB::runSQL($query,$hs2);
                }
            }

        }
		
        



    }
	
    public function colorUpdateList() {

        $i=0;
        $list =[];
        $forbiddenword = 'color_name_';
        foreach($_POST as $key=>$value)
        {
            if(preg_match("/$forbiddenword/i", $key)){
                $guid_id = substr($key,strlen ($forbiddenword));
                if (!in_array($guid_id, $list)){
                    $list[$i]=$guid_id;
                    $i++;
                    $query="update m_color set color_name=:color_name where color_id=:color_id";
                    $hs["color_name"]=$_REQUEST["color_name_".$guid_id];
                    $hs["color_id"]=$guid_id;
                    CommonDB::runSQL($query,$hs);
                }
            }
        }

        $i=0;
        $list =[];
        $forbiddenword1 = 'so_thu_tu_';
        foreach($_POST as $key=>$value)
        {
            if(preg_match("/$forbiddenword1/i", $key)){
                $guid_id = substr($key,strlen ($forbiddenword1));
                if (!in_array($guid_id, $list)){
                    $list[$i]=$guid_id;
                    $i++;
                    $query="update m_color set stt=:stt where color_id=:color_id";
                    $hs1["stt"]=$_REQUEST["so_thu_tu_".$guid_id];
                    $hs1["color_id"]=$guid_id;
                    CommonDB::runSQL($query,$hs1);
                }
            }

        }
        //upload hinh

        if(!defined("image_folder")){
            define("image_folder","item_image/");
        }
        $i=0;
        $list =[];
        $forbiddenword1 = 'image1_';
        foreach($_FILES as $key=>$value){
            if(preg_match("/$forbiddenword1/i", $key)){
                $guid_id = substr($key,strlen ($forbiddenword1));
                if (!in_array($guid_id, $list)){
                    $list[$i]=$guid_id;
                    $i++;
                    $fileName=$_REQUEST["so_thu_tu_".$guid_id];
                    $this->uploadIcon("image1_".$guid_id,$guid_id);
                }
            }
        }



    }
    public  function  uploadIcon($uploaded_image,$guid_id){

        if( isset($_FILES[$uploaded_image]["name"]) && ($_FILES[$uploaded_image]["name"]!="")  ){

            $image = new SimpleImage();
            $image->load($_FILES[$uploaded_image]['tmp_name']);
            $imageName ='color_'.$guid_id.date('m_d_Y_hisa').'.jpg';
            $imageNameicon_="color_icon_".$imageName;

            $image->save(image_folder.$imageName);

            $image->resize(20,20);
            $image->save(image_folder.$imageNameicon_);
            $query="update m_color set image1=:image1 where color_id=:color_id";
            $hs1["image1"]=$imageName;
            $hs1["color_id"]=$guid_id;
            CommonDB::runSQL($query,$hs1);
        }
    }
	public function actionSizeList() {

        Yii::app()->theme = 'admin-green';
        $this->pageTitle = 'Danh sách kích thước';
        if(isset($_REQUEST["add"])){
            $guidId = CommonDB::guid();
            $query="insert into m_size(m_size_guid) values('$guidId')";
           CommonDB::runSQL($query,[]);
            $this->redirect("index.php?r=ajaxadmin/sizelist");
            return;
        }
        if( isset($_POST['bsubmit'])) {
            $this->sizeUpdateList();
        }
        $query="Select * from m_size order by date_create";
        $data = CommonDB::GetAll($query,[]);
        //$mydb = new MyDb();
      
       // $mydb->connect();
        //$mydb->query($query);
       
        $this->render('sizelist',array('data'=>$data));
    }
	 public function sizeUpdateList() {
        $i=0;
        $list =[];
        $forbiddenword = 'size_text_';
        foreach($_POST as $key=>$value)
        {
            if(preg_match("/$forbiddenword/i", $key)){
                $guid_id = substr($key,strlen ($forbiddenword));
                if (!in_array($guid_id, $list)){
                    $list[$i]=$guid_id;
                    $i++;
                    $query="update m_size set size_text=:size_text where m_size_guid=:m_size_guid";
                    $hs["size_text"]=$_REQUEST["size_text_".$guid_id];
                    $hs["m_size_guid"]=$guid_id;
                    CommonDB::runSQL($query,$hs);
                }
            }
        }
    }
	public function actionSizeDelete() {
        $m_size_guid = $_REQUEST["m_size_guid"];
        $query=" delete from m_size  where m_size_guid=:m_size_guid ";
        $hs["m_size_guid"]=$m_size_guid;
        CommonDB::runSQL($query,$hs);
        echo "1";Yii::app()->end();
    }
    public function actionColorDelete() {
        $color_id = $_REQUEST["color_id"];
        $query=" delete from m_color  where color_id=:color_id ";
        $hs["color_id"]=$color_id;
        CommonDB::runSQL($query,$hs);
        echo "1";Yii::app()->end();
    }


}