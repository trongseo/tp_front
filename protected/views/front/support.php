<section class="support">
    <div class="row">
        <div class="form-group">

            <div class="col-sm-10" style="margin-left: 16.6667%; display: inline-flex;">
                <input type="text" class="form-control" style="width: 40%" name="ma_sp" id="ma_sp" placeholder="Mã sản phẩm">&nbsp;

                    <input type="submit" id="btnsave" name="btnsave" class="btn btn-default" value="Tìm">

            </div>
        </div>
        <div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
            <div class="list-group">
                <ul>
                    <?php foreach($hsTable as $value):?>
                        <li>
                            <div class="video-block">
                                <?php  echo $value["text_embed"]; ?>
                                <a href="support-detail.html"></a>
                            </div>
                            <div class="content-block">
                                <a href="support-detail.html" class="">
                                    <h4 class=""><?php  echo $value["ma_sp"]; ?></h4>
                                </a>

                                <p class="param list-group-item-text">
                                    <?php  echo $value["mo_ta_ngan"]; ?></p>
                            </div>
                        </li>


                    <?php endforeach?>


                </ul>

            </div>
        </div>
    </div>
<!--    <div class="row">-->
<!--        <div class="col-md-8 col-md-offset-4 col-sm-offset-2 col-sm-8 col-xs-12">-->
<!--            <nav>-->
<!--                <ul class="pagination">-->
<!--                    <li>-->
<!--                        <a href="#" aria-label="Previous">-->
<!--                            <span aria-hidden="true">Quay Lại</span>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li><a href="#">1</a></li>-->
<!--                    <li><a href="#">2</a></li>-->
<!--                    <li><a href="#">3</a></li>-->
<!--                    <li><a href="#">4</a></li>-->
<!--                    <li><a href="#">5</a></li>-->
<!--                    <li>-->
<!--                        <a href="#" aria-label="Next">-->
<!--                            <span aria-hidden="true">Tiếp Theo</span>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </nav>-->
<!--        </div>-->
<!--    </div>-->
</section>
<script>
    $('.support').addClass('active');
</script>