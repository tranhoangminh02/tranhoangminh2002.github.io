<style>
    /*dùng ảnh gif*/
.load{
	width: 100%;
	height: 100%;
	background: #fff;
	position: fixed;
	top: 0;
	left: 0;
	z-index: 100000000000;
	display: block;
	overflow: hidden;
}
.load img{
	width: 150px;
	height: 150px;
	position: absolute; 
	top: 50%;
	left: 50%;
	margin-top: -75px;
	margin-left: -75px;
}

</style>

<span class="preloading">
    <!-- Hiệu ứng load -->
    <div class="load">
        <img src="./images/loader.gif">
    </div>
</span>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(window).on('load', function(event) {
        $('span').removeClass('preloading');
        $('.load').delay(1000).fadeOut('fast');
    });
</script>