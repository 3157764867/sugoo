<script type="text/javascript" src="js/n_nav.js"></script>
<div class="top">
    <div class="logo"><a href="index"><img src="/images/logo.png" /></a></div>
    <div class="search">
        <form>
            <input type="text" value="" class="s_ipt" />
            <input type="submit" value="搜索" class="s_btn" />
        </form>                      
        <span class="fl"><a href="#">咖啡</a><a href="#">iphone 6S</a><a href="#">新鲜美食</a><a href="#">蛋糕</a><a href="#">日用品</a><a href="#">连衣裙</a></span>
    </div>
    <div class="i_car">
        <div class="car_t">购物车 [ <span>3</span> ]</div>
        <div class="car_bg">
            <!--Begin 购物车未登录 Begin-->
            <div class="un_login">还未登录！<a href="Login.html" style="color:#ff4e00;">马上登录</a> 查看购物车！</div>
            <!--End 购物车未登录 End-->
            <!--Begin 购物车已登录 Begin-->
            <ul class="cars">
                <li>
                    <div class="img"><a href="#"><img src="/images/car1.jpg" width="58" height="58" /></a></div>
                    <div class="name"><a href="#">法颂浪漫梦境50ML 香水女士持久清新淡香 送2ML小样3只</a></div>
                    <div class="price"><font color="#ff4e00">￥399</font> X1</div>
                </li>
                <li>
                    <div class="img"><a href="#"><img src="/images/car2.jpg" width="58" height="58" /></a></div>
                    <div class="name"><a href="#">香奈儿（Chanel）邂逅活力淡香水50ml</a></div>
                    <div class="price"><font color="#ff4e00">￥399</font> X1</div>
                </li>
                <li>
                    <div class="img"><a href="#"><img src="/images/car2.jpg" width="58" height="58" /></a></div>
                    <div class="name"><a href="#">香奈儿（Chanel）邂逅活力淡香水50ml</a></div>
                    <div class="price"><font color="#ff4e00">￥399</font> X1</div>
                </li>
            </ul>
            <div class="price_sum">共计&nbsp; <font color="#ff4e00">￥</font><span>1058</span></div>
            <div class="price_a"><a href="car">去购物车结算</a></div>
            <!--End 购物车已登录 End-->
        </div>
    </div>
</div>
<!--End Header End--> 
<!--Begin Menu Begin-->
<div class="menu_bg">
	<div class="menu">
    	<!--Begin 商品分类详情 Begin-->    
    	<div class="nav">
        	<div class="nav_t">全部商品分类</div>
            <div class="leftNav none">
                <ul>      
                     <li>
                        @foreach($data as $k => $v)
                        <div class="fj">
                            <span class="n_img"><span></span><img src="/images/nav1.png" /></span>
                            <span class="fl"><?=$v['c_name']?></span>
                        </div>
                        <div class="zj">
                            <div class="zj_l">
                                <?php if(!empty($v['sonCate'])):?>
                                <?php foreach($v['sonCate'] as $sk => $sv):?>
                                <div class="zj_l_c">
                                    <h2><?=$sv['c_name']?></h2>
                                    <?php if(!empty($sv['sonList'])):?>
                                        <?php foreach($sv['sonList'] as $key => $val):?>
                                            <a href="/catelist/<?php echo $val['c_id']?>"><?=$val['c_name']?></a>|
                                        <?php endforeach;?>
                                <?php endif;?>
                                </div>
                            <?php endforeach;?>
                        <?php endif;?>
                            </div>
                            <div class="zj_r">
                                <a href="#"><img src="/images/n_img1.jpg" width="236" height="200" /></a>
                                <a href="#"><img src="/images/n_img2.jpg" width="236" height="200" /></a>
                            </div>
                        </div>
                        @endforeach
                    </li>
                </ul>            
            </div>
        </div>  
        <!--End 商品分类详情 End-->                                                     
    	<ul class="menu_r">
            <li><a href="/index">首页</a></li>
            @foreach($err as $k => $v)
        	<li><a href="/getcateall/<?php echo $v['c_id']?>"><?php echo $v['c_name']?></a></li>
            @endforeach
        </ul>
        <div class="m_ad">中秋送好礼！</div>
    </div>
</div>