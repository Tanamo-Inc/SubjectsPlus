<form class="pure-form pure-form-stacked" id="subjectSpecialistForm">

    <?php

    foreach($this->_staffArray as $staffMember):
        $staffId = $staffMember['staff_id'];
        $staffData = $this->getStaffMember($staffId);
        $array_keys = $this->_array_keys;

        if ($staffData[0]['extra'] == '') {

            $pos = array_search('Instagram', $array_keys);
            unset($array_keys[$pos]);

            $pos = array_search('Facebook', $array_keys);
            unset($array_keys[$pos]);

            $pos = array_search('Twitter', $array_keys);
            unset($array_keys[$pos]);

            $pos = array_search('Pinterest', $array_keys);
            unset($array_keys[$pos]);

        } else {
            $staffSocialMedia = json_decode(html_entity_decode( $staffData[0]['extra'] ), true);

            if($staffSocialMedia['instagram'] == '') {
                $pos = array_search('Instagram', $array_keys);
                unset($array_keys[$pos]);
            }

            if($staffSocialMedia['facebook'] == '') {
                $pos = array_search('Facebook', $array_keys);
                unset($array_keys[$pos]);
            }

            if($staffSocialMedia['twitter'] == '') {
                $pos = array_search('Twitter', $array_keys);
                unset($array_keys[$pos]);
            }

            if($staffSocialMedia['pinterest'] == '') {
                $pos = array_search('Pinterest', $array_keys);
                unset($array_keys[$pos]);
            }

        }

        $this->_body .= "<h4>{$staffMember['fname']} {$staffMember['lname']}</h4>";

        $this->_body .= "<input type='text' name='SubjectSpecialist-extra-staffId{$staffId}' value='{$staffId}' style='display:none;' />";


        foreach($array_keys as $item):

            if($this->_extra == null) {
                $this->_body .= "<input class='checkbox_ss' type='checkbox' name='SubjectSpecialist-extra-show{$item}{$staffId}' value='Yes' checked /><label style='display:inline;'> Show {$item}</label><br>";

            } else {

                if(array_key_exists("show{$item}{$staffId}", $this->_extra)) {

                    $key = 'show'.$item.$staffId;
                    $key_trimmed = rtrim($key, ' 0123456789');

                    $this->_body .= "<input class='checkbox_ss' type='checkbox' name='SubjectSpecialist-extra-show{$item}{$staffId}' value='{$this->_extra[$key][0]}' /><label style='display:inline;'> Show {$item}</label><br>";

                } else {
                    $this->_body .= "<input class='checkbox_ss' type='checkbox' name='SubjectSpecialist-extra-show{$item}{$staffId}' value='No' /><label style='display:inline;'> Show {$item}</label><br>";
                }

            }

        endforeach;


    endforeach;
    ?>

</form>


<script>

    $(document).ready(function(){

        $(".checkbox_ss").each(function() {

            if( $(this, "input").val() == "Yes") {

                $(this, "input").prop("checked", true);
            }
        });


        $(".checkbox_ss").on('click', function() {
            //var value = $(this).attr('value');

            if( ($(this).attr('value') == "No") || $(this).attr('value') == "" ) {
                $(this).attr('value', 'Yes');
                $(this, "input").prop("checked", true);
            } else {
                $(this).attr('value', 'No');
                $(this, "input").prop("checked", false);
            }
        });


    });


</script>