
<div class="body">
    <div class="Section">
        <div class="Section-title">
            <h2><?php echo $exp_section_name;?></h2>
        </div>
        <div class="Section-content">
        <?php
        for($i = 0;$i< $exp_table_len;$i++){
            echo '<div class="Section-content-core">';
            echo '<h3>'.$exp_table[$i]['Job'].'</h3>';
            echo '<span>'.$exp_table[$i]['Title'].'</span>';
            echo '<ul>';
            for($j = 0;$j< $skills_table_len;$j++){
                if($skills_table[$j]['id'] == 0 && $skills_table[$j]['under_id'] == $exp_table[$i]['id']){ 
                    echo '<li>'. $skills_table[$j]['Content'].'</li>';
                }
            }
            echo '</ul>'.'</div>';
            echo '<div class="Section-content-infos">';
            echo '<h3>'.$exp_table[$i]['Place'].'</h3>';
            echo '<p>'.$exp_table[$i]['Place_description'].'</p>';
            echo '<span>'.$exp_table[$i]['Date'].'</span>';
            echo '</div>';
        }
        ?>
        </div>
    </div>
    <div class="Section">
        <div class="Section-title">
            <h2><?php echo $study_section_name;?></h2>
        </div>
        <div class="Section-content">
        <?php
        for($i = 0;$i< $study_table_len;$i++){
            echo '<div class="Section-content-core-study">';
            echo '<h3>'.$study_table[$i]['Level'].' : </h3>';
            echo '<span>'.$study_table[$i]['Title'];
            if($study_table[$i]['Mention'] != '')
                echo' (Mention : '.$study_table[$i]['Mention'].')</span>';
            else
                echo'</span>';

            echo '<div class="competences-study">';
            $lastTitle = '';
            $index = 0;
            for($j = 0;$j< $skills_table_len;$j++){
                if($skills_table[$j]['id'] == 1 && $skills_table[$j]['under_id'] == $exp_table[$i]['id']){
                    if($lastTitle != $skills_table[$j]['Title']){
                        if($index != 0)
                            echo '</div></ul>';
                        echo '<div> <h3>'.$skills_table[$j]['Title'].'</h3><ul>';
                        $index++;
                    }
                    
                    if($skills_table[$j]['Title'] != ''){
                        echo '<li>'.$skills_table[$j]['Content'] . '</li>';
                    }
                    $lastTitle = $skills_table[$j]['Title'];
                }
            }
            if($index != 0)
                echo '</ul></div>';
            echo '</div></div>';
            echo '<div class="Section-content-infos-study">';
            echo '<h3>'. $study_table[$i]['Place'].'</h3>';
            echo '<span>'. $study_table[$i]['Date'].'</span></div>';
            
        }
        ?>
        </div>
    </div>
    <div class="Section">
        <div class="Section-title">
            <h2><?php echo $interest_section_name;?></h2>
        </div>
        <div class="Section-content">
            <div class="interest">
                <ul>
                    <?php
                    for($j = 0;$j< $skills_table_len;$j++){
                        if($skills_table[$j]['id'] == 2 ){
                            echo '<li>'.$skills_table[$j]['Content'] . '</li>';
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>