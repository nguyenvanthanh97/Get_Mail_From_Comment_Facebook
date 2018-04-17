<?php
	session_start();
	if (!isset($_SESSION['id'])) {
		header("Location: /login.php");  
		exit;
	}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lấy email từ bình luận by Nguyễn Văn Thành</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <link rel="shortcut icon" href="/favico.ico" />
        <link href="/css/fonts.css" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<script type="text/javascript">
			function send(){  
				var link = $("input[name='data']").val();
				if(link != ''){
					$('#content').html('Đang xử lý...<br>Lưu ý: Dữ liệu lớn có thể mất vài phút!');
					var data = $('form#input_data').serialize();
					$.ajax({
					type : 'POST',
					url  : 'getmail.php',
					data : data,
					success :  function(data)
						   {                       
								$('#content').html(data);
						   }
					});
				}
			};
		</script>
		<link rel="stylesheet" href="/css/navbar.css">
		<script src="/css/navbar.js"></script>
        <style type="text/css">
            html,body {height: 100%;}
            body {padding: 0px; margin:0px; background:url(image.jpg) ; background-position: center; background-size: cover; background-attachment: fixed; background-repeat: no-repeat;}

            .search-wrapper {
                position: absolute;
                -webkit-transform: translate(-50%, -50%);
                -moz-transform: translate(-50%, -50%);
                transform: translate(-50%, -50%);
                top:200px;
                left:50%;
            }
            .search-wrapper.active {}

            .search-wrapper .input-holder {
                overflow: hidden;
                height: 70px;
                background: rgba(255,255,255,0);
                border-radius:6px;
                position: relative;
                width:70px;
                -webkit-transition: all 0.3s ease-in-out;
                -moz-transition: all 0.3s ease-in-out;
                transition: all 0.3s ease-in-out;
            }
            .search-wrapper.active .input-holder {
                border-radius: 50px;
                width:450px;
                background: rgba(0,0,0,0.7);
                -webkit-transition: all .5s cubic-bezier(0.000, 0.105, 0.035, 1.570);
                -moz-transition: all .5s cubic-bezier(0.000, 0.105, 0.035, 1.570);
                transition: all .5s cubic-bezier(0.000, 0.105, 0.035, 1.570);
            }

            .search-wrapper .input-holder .search-input {
                width:100%;
                height: 50px;
                padding:0px 70px 0 20px;
                opacity: 0;
                position: absolute;
                top:0px;
                left:0px;
                background: transparent;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                border:none;
                outline:none;
                font-family:"Open Sans", Arial, Verdana;
                font-size: 16px;
                font-weight: 400;
                line-height: 20px;
                color:#FFF;
                -webkit-transform: translate(0, 60px);
                -moz-transform: translate(0, 60px);
                transform: translate(0, 60px);
                -webkit-transition: all .3s cubic-bezier(0.000, 0.105, 0.035, 1.570);
                -moz-transition: all .3s cubic-bezier(0.000, 0.105, 0.035, 1.570);
                transition: all .3s cubic-bezier(0.000, 0.105, 0.035, 1.570);

                -webkit-transition-delay: 0.3s;
                -moz-transition-delay: 0.3s;
                transition-delay: 0.3s;
            }
            .search-wrapper.active .input-holder .search-input {
                opacity: 1;
                -webkit-transform: translate(0, 10px);
                -moz-transform: translate(0, 10px);
                transform: translate(0, 10px);
            }

            .search-wrapper .input-holder .search-icon {
                width:70px;
                height:70px;
                border:none;
                border-radius:6px;
                background: #FFF;
                padding:0px;
                outline:none;
                position: relative;
                z-index: 2;
                float:right;
                cursor: pointer;
                -webkit-transition: all 0.3s ease-in-out;
                -moz-transition: all 0.3s ease-in-out;
                transition: all 0.3s ease-in-out;
            }
            .search-wrapper.active .input-holder .search-icon {
                width: 50px;
                height:50px;
                margin: 10px;
                border-radius: 30px;
            }
            .search-wrapper .input-holder .search-icon span {
                width:22px;
                height:22px;
                display: inline-block;
                vertical-align: middle;
                position:relative;
                -webkit-transform: rotate(45deg);
                -moz-transform: rotate(45deg);
                transform: rotate(45deg);
                -webkit-transition: all .4s cubic-bezier(0.650, -0.600, 0.240, 1.650);
                -moz-transition: all .4s cubic-bezier(0.650, -0.600, 0.240, 1.650);
                transition: all .4s cubic-bezier(0.650, -0.600, 0.240, 1.650);

            }
            .search-wrapper.active .input-holder .search-icon span {
                -webkit-transform: rotate(-45deg);
                -moz-transform: rotate(-45deg);
                transform: rotate(-45deg);
            }
            .search-wrapper .input-holder .search-icon span::before, .search-wrapper .input-holder .search-icon span::after {
                position: absolute;
                content:'';
            }
            .search-wrapper .input-holder .search-icon span::before {
                width: 4px;
                height: 11px;
                left: 9px;
                top: 18px;
                border-radius: 2px;
                background: #974BE0;
            }
            .search-wrapper .input-holder .search-icon span::after {
                width: 14px;
                height: 14px;
                left: 0px;
                top: 0px;
                border-radius: 16px;
                border: 4px solid #974BE0;
            }

            .search-wrapper .close {
                position: absolute;
                z-index: 1;
                top:24px;
                right:20px;
                width:25px;
                height:25px;
                cursor: pointer;
                -webkit-transform: rotate(-180deg);
                -moz-transform: rotate(-180deg);
                transform: rotate(-180deg);
                -webkit-transition: all .3s cubic-bezier(0.285, -0.450, 0.935, 0.110);
                -moz-transition: all .3s cubic-bezier(0.285, -0.450, 0.935, 0.110);
                transition: all .3s cubic-bezier(0.285, -0.450, 0.935, 0.110);
                -webkit-transition-delay: 0.2s;
                -moz-transition-delay: 0.2s;
                transition-delay: 0.2s;
            }
            .search-wrapper.active .close {
                right:-50px;
                -webkit-transform: rotate(45deg);
                -moz-transform: rotate(45deg);
                transform: rotate(45deg);
                -webkit-transition: all .6s cubic-bezier(0.000, 0.105, 0.035, 1.570);
                -moz-transition: all .6s cubic-bezier(0.000, 0.105, 0.035, 1.570);
                transition: all .6s cubic-bezier(0.000, 0.105, 0.035, 1.570);
                -webkit-transition-delay: 0.5s;
                -moz-transition-delay: 0.5s;
                transition-delay: 0.5s;
            }
            .search-wrapper .close::before, .search-wrapper .close::after {
                position:absolute;
                content:'';
                background: #FFF;
                border-radius: 2px;
            }
            .search-wrapper .close::before {
                width: 5px;
                height: 25px;
                left: 10px;
                top: 0px;
            }
            .search-wrapper .close::after {
                width: 25px;
                height: 5px;
                left: 0px;
                top: 10px;
            }
            .search-wrapper .result-container {
                width: 100%;
                position: absolute;
                top:80px;
                left:0px;
                text-align: center;
                font-family: "Open Sans", Arial, Verdana;
                font-size: 18px;
                display:none;
                color:#000000;
            }


            @media screen and (max-width: 560px) {
                .search-wrapper.active .input-holder {width:200px;}
            }

			.noselect {
			  -webkit-touch-callout: none; /* iOS Safari */
				-webkit-user-select: none; /* Safari */
				 -khtml-user-select: none; /* Konqueror HTML */
				   -moz-user-select: none; /* Firefox */
					-ms-user-select: none; /* Internet Explorer/Edge */
						user-select: none; /* Non-prefixed version, currently
											  supported by Chrome and Opera */
			}
        </style>
        <script type="text/javascript">
			$(function(){
				$("div").closest('.search-wrapper').addClass('active');
			});
			function searchToggle(obj, evt){
				var container = $(obj).closest('.search-wrapper');

				if(!container.hasClass('active')){
					  container.addClass('active');
					  evt.preventDefault();
				}
				else if(container.hasClass('active') && $(obj).closest('.input-holder').length == 0){
					  container.removeClass('active');
					  // clear input
					  container.find('.search-input').val('');
					  // clear and hide result container when we press close
					  container.find('.result-container').fadeOut(100, function(){$(this).empty();});
				}
			}

			function submitFn(obj, evt){
				$(obj).find('.result-container').fadeIn(100);

				evt.preventDefault();
			}
        </script>

    </head>

    <body>
		<div id="cssmenu">
			<ul>
				<li><a href="/logout.php">Đăng xuất</a></li>
				<li><a href="#">Xin chào, <?php echo $_SESSION['name']; ?></a></li>
				
			</ul>
		</div>
        <form id="input_data" onsubmit="submitFn(this, event);">
            <div class="search-wrapper">
                <div class="input-holder">
                    <input type="text" name="data" class="search-input" placeholder="Nhập link bài viết" autocomplete="off"/>
                    <button name="button_data" class="search-icon" onclick="searchToggle(this, event); send();"><span></span></button>
                </div>
                <span class="close" onclick="searchToggle(this, event);"></span>
                <div id="content" class="result-container" style="-webkit-user-select: all;-moz-user-select: all;-ms-user-select: all;user-select: all; padding: 20px 20px 20px 20px; background: #ffffff; border: 3px solid #000000; width: 410px; max-height: 400px; overflow: auto;">
                </div>
            </div>
        </form>
		<div id="particles-js"></div>
		<script src="/css/particles.min.js"></script>
		<script>particlesJS.load('particles-js', 'css/particles.json');</script>
		<script>
			var clean_uri = location.protocol + "//" + location.host + location.pathname;
			window.history.replaceState({}, document.title, clean_uri);
		</script>

    </body>
</html>
