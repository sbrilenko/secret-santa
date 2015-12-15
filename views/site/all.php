<?php

$this->title = 'All';
?>
<div class="site-about">
    <h1>Все тестера</h1>
    <table>
        <tr>
            <th>Имя участника</th>
            <th>Кому дарят</th>
            <th>Код</th>
        </tr>
        <?php for($i=0;$i<count($ret);$i++){ ?>
            <tr>
                <td><?php echo $ret[$i]->nameofagiver;?> </td>
                <td>
                    <?php
                    if($ret[$i]->whogift!==0){
                        for($j=0;$j<count($ret);$j++){
                            if($ret[$j]->id==$ret[$i]->whogift){
                                echo $ret[$j]->nameofagiver;
                            }
                        }
                    }
                    ?>
                </td>
                <td><?php echo $ret[$i]->token;?></td>
            </tr>
        <?php } ?>

    </table>

</div>
