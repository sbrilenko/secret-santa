<?php

/* @var $this yii\web\View */

$this->title = 'Secret Santa';
$this->registerJsFile(Yii::$app->request->baseUrl.'/js/config.js',['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile(Yii::$app->request->baseUrl.'/js/snow.js',['depends' => [\yii\web\JqueryAsset::className()]]);
?>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>

<script src="/js/snow.js"></script>
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
    jQuery(document).ready(function($){
        $(document).on('submit','form',function(e){
            e.preventDefault();
            var th=$(this);
            var ser=th.serializeArray();
            $.ajax({
                url: 'index.php?r=site%2Fchooseplayer',
                data:ser,
                type:'POST',
                dataType:'json',
                success: function(data) {
                    $("#dialog").text(data.error?data.error:data.result)
                        $("#dialog").dialog({
                            close: function( event, ui ) {
                                $("#dialog").text('')
                            },
                            dialogClass: data.error?"dialog-error":"dialog-result",
                            draggable: false,
                            modal: true,
                            buttons: [
                                {
                                    text: 'Ok',
                                    click: function() {
                                        $('input[name=player_code]').val('')
                                        $( this ).dialog( "close" );
                                    }
                                }
                            ]
                        });
                }
            });
            return false
        })
    })
</script>
<div class="site-index">
    <div class="jumbotron">
        <h1 style="color:#fff;text-shadow:0 0 10px #fff, 0 0 20px #00d2ff, 0 0 30px #00d2ff, 0 0 40px #00d2ff, 0 0 50px #00d2ff, 0 0 60px #00d2ff, 0 0 70px #00d2ff;">Приветствуем вас на сайте Тайного Санты</h1>
        <div class="info-block">
            <p class="lead">Узнайте кому вы будете дарить подарок - введите код ниже</p>
            <form>
                <div class="input-append">
                    <input class="span2" placeholder="Введите код" size="16" name="player_code" type="text">
                    <button class="btn" type="submit" >выбрать участника</button>
                </div>
            </form>
        </div>
    </div>

    <div class="body-content">
    </div>

    </div>
</div>
<div id="dialog">
</div>
