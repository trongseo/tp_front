
<?php
$datasp =$dataspshow['datasp'];$datakichco =$dataspshow['datakichco'];$datamausp =$dataspshow['datamausp'];
//array('datasp'=>$datasp,'datakichco'=>$datakichco,'datamausp'=>$datamausp);
?>
    <div class="row">
        <div class="col-md-3 col-sm-4 col-xs-4">
            <h4 class="title-cate">Kệ kính tivi</h4>
            <input type="hidden" value="<?php echo $datasp["san_pham_guid"] ?>" id="san_pham_guid" name="san_pham_guid" />

            <div class="aside-right">
                <h5><i class="fa fa-caret-right append-icon"></i><strong><?php echo $datasp["ma_sp"] ?></strong></h5>
            </div>
            <div class="aside-right">
                <h5><i class="fa fa-caret-right append-icon"></i>Màu sắc</h5>
                <ul class="list-color">
                    <?php foreach($datamausp as $value):?>
                        <li>
                            <div class="box-color color-two"></div>
									<span class="underline">
									<?php echo $value["color_name"]?>
									</span>
                        </li>


                    <?php endforeach?>



                </ul>
            </div>
            <div class="aside-right">
                <h5><i class="fa fa-caret-right append-icon"></i>Kích thước</h5>
                <p class="param">Rộng - cao - dài</p>
                <ul class="list-size listsize">


<!--                    <li>-->
<!--                        <input type="radio" name="radio-size">-->
<!--									<span>-->
<!--										420 - 700 - 1400-->
<!--									</span>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <input type="radio" name="radio-size">-->
<!--									<span>-->
<!--										420 - 700 - 1400-->
<!--									</span>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <input type="radio" name="radio-size">-->
<!--									<span>-->
<!--										420 - 700 - 1400-->
<!--									</span>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <input type="radio" name="radio-size">-->
<!--									<span>-->
<!--										420 - 700 - 1400-->
<!--									</span>-->
<!--                    </li>-->
                </ul>
            </div>
            <div class="aside-right">
                <span class="price-tag">Giá : <span id="spprice">... </span>đ</span>
                <a class="btn-cart btn-simple mg-l-40" href="order.html"><i class="fa fa-caret-right"></i><span>đặt hàng</span></a>
            </div>
        </div>
        <div class="col-md-9 col-sm-8 col-xs-8 text-center">
            <div class="box-img">
                <a class="width-100p" href=""> <?php echo $datasp["hinh_dai_dien"] ?> <img src="images/Sanpham.png" width="450" alt=""></a>
            </div>

            <a class="btn-cart btn-simple mg-t-15" href="product-detail.html"><i class="fa fa-caret-right"></i><span>xem chi tiết</span></a>
        </div>
    </div>

    <div class="row">
        <div class="product-other">
            <h3>
							<span class="bg_title">
								sản phẩm khác
							</span>
            </h3>
            <div class="col-md-offset-2 col-md-9 col-sm-offset-1 col-sm-10 col-xs-offset-1 col-xs-10">
                <div class="owl-carousel owl-theme owl-responsive-1000 owl-loaded">











                    <div class="owl-stage-outer"><div class="owl-stage" style="width: 1350px; transform: translate3d(-750px, 0px, 0px); transition: 0.25s; -webkit-transition: 0.25s;"><div class="owl-item" style="width: auto; margin-right: 15px;"><div class=" funfact-item   text-center">
                                    <a href=""><img src="images/Sanpham02.png" alt=""></a>
                                    <a class="detail" href="product-detail.html"><span>chi tiết</span></a>
                                </div></div><div class="owl-item" style="width: auto; margin-right: 15px;"><div class=" funfact-item text-center">
                                    <a href=""><img src="images/Sanpham03.png" alt=""></a>
                                    <a class="detail" href="product-detail.html"><span>chi tiết</span></a>
                                </div></div><div class="owl-item" style="width: auto; margin-right: 15px;"><div class=" funfact-item color-waikawa_gray text-center">
                                    <a href=""><img src="images/Sanpham04.png" alt=""></a>
                                    <a class="detail" href="product-detail.html"><span>chi tiết</span></a>
                                </div></div><div class="owl-item" style="width: auto; margin-right: 15px;"><div class=" funfact-item color-waikawa_gray text-center">
                                    <a href=""><img src="images/Sanpham05.png" alt=""></a>
                                    <a class="detail" href="product-detail.html"><span>chi tiết</span></a>
                                </div></div><div class="owl-item" style="width: auto; margin-right: 15px;"><div class=" funfact-item color-waikawa_gray text-center">
                                    <a href=""><img src="images/Sanpham06.png" alt=""></a>
                                    <a class="detail" href="product-detail.html"><span>chi tiết</span></a>
                                </div></div><div class="owl-item active" style="width: auto; margin-right: 15px;"><div class=" funfact-item color-waikawa_gray text-center">
                                    <a href=""><img src="images/Sanpham02.png" alt=""></a>
                                    <a class="detail" href="product-detail.html"><span>chi tiết</span></a>
                                </div></div><div class="owl-item active" style="width: auto; margin-right: 15px;"><div class=" funfact-item color-waikawa_gray text-center">
                                    <a href=""><img src="images/Sanpham04.png" alt=""></a>
                                    <a class="detail" href="product-detail.html"><span>chi tiết</span></a>
                                </div></div><div class="owl-item active" style="width: auto; margin-right: 15px;"><div class=" funfact-item color-waikawa_gray text-center">
                                    <a href=""><img src="images/Sanpham03.png" alt=""></a>
                                    <a class="detail" href="product-detail.html"><span>chi tiết</span></a>
                                </div></div><div class="owl-item active" style="width: auto; margin-right: 15px;"><div class=" funfact-item color-waikawa_gray text-center">
                                    <a href=""><img src="images/Sanpham05.png" alt=""></a>
                                    <a class="detail" href="product-detail.html"><span>chi tiết</span></a>
                                </div></div></div></div><div class="owl-controls"><div class="owl-nav"><div class="owl-prev" style=""><i class="fa fa-angle-left"></i></div><div class="owl-next" style=""><i class="fa fa-angle-right"></i></div></div><div class="owl-dots" style=""><div class="owl-dot"><span></span></div><div class="owl-dot"><span></span></div><div class="owl-dot"><span></span></div><div class="owl-dot"><span></span></div><div class="owl-dot"><span></span></div><div class="owl-dot active"><span></span></div><div class="owl-dot"><span></span></div><div class="owl-dot"><span></span></div><div class="owl-dot"><span></span></div></div></div></div>
                <!-- end ourstory carousel -->

            </div>

        </div>
    </div>
<script>
    function AjaxGetColor(){
        var san_pham_guid= $('#san_pham_guid').val();//luon luon co hidden field
        var  color_id = '1';//$('#color_id').val();//luon luon co hidden field san_pham_guid color_id
        $.get( "index.php?r=front/AjaxGetSize&san_pham_guid="+san_pham_guid+"&color_id="+color_id+"", function( data,status ) {
            //  size_text,sp_price,aa.san_pham_price_guid,color_id
            var obj = jQuery.parseJSON(data );
            if(data.length==2){
                $("#san_pham_price_guid").val("");
                $("#sp_price").val("");
                return;
            }else{




for(var i=0;i<obj.length;i++){
    var myTemplate = $("#repeating-form-section-template").html();
   var size_text= obj[i]["size_text"];
    var sp_price= obj[i]["sp_price"];
    var san_pham_price_guid= obj[i]["san_pham_price_guid"];
    var color_id= obj[i]["color_id"];
    myTemplate1 = myTemplate.replace(/zzzsan_pham_price_guidzzz/g, san_pham_price_guid);
    myTemplate1 = myTemplate1.replace(/zzzsp_pricezzz/g, sp_price);
    myTemplate1 = myTemplate1.replace(/zzzsize_textzzz/g, size_text);
    $(".listsize").append(myTemplate1);
}

//                $("#san_pham_price_guid").val(obj[0]["san_pham_price_guid"]);
//                sppri = parseFloat( obj[0]["sp_price"]);
//                sppri= sppri.formatMoney(0, ',', '.');
//                $("#sp_price").val(sppri);

            }

        });


    }
    AjaxGetColor();
    $(document).on('click', '.rdSelect', function () {
        var sp_price= $('input:radio[name=radiosize]:checked').attr('sp_price');
        $('#spprice').html(sp_price);
    });

</script>
<script type="text/template" id="repeating-form-section-template">
    <li>
        <input type="radio" class="rdSelect" name="radiosize" san_pham_price_guid='zzzsan_pham_price_guidzzz'  sp_price='zzzsp_pricezzz' >
									<span>
										zzzsize_textzzz
									</span>
    </li>
</script>