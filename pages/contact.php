<div class="page">
    <div class="contact-container">
        <div class="contact-infos">
            <span> <?php echo $cotact_info['email_span'];?></span>
            <span><a href="mailto:houdeifa.aflihaou@gmail.com">houdeifa.aflihaou@gmail.com</a>
            <span> <?php echo $cotact_info['linkedin_span'];?></span></span>
            <span><a href="https://www.linkedin.com/in/houdeifa-aflihaou-11551318a/">
                <img src="imgs/linkedin-icon-vector.png">
                <span>@Houdeifa AFLIHAOU</span></a></span>
        </div>
        <div class="contact-form">
            <span><?php echo $cotact_form['form_span'];?></span> 
            <form action="#" method="post" onsubmit="event.preventDefault(); validateMyForm();">

                <div class="field-container">
                    <input type="text" class="field-input" placeholder="<?php echo $cotact_form['name'];?>" id="name" name="name" required="" oninvalid="event.preventDefault();requiredMessage('invalideName');">
                    <small class="field-msg error" data_error="invalideName"><?php echo $form_messages['name'];?></small>
                </div>

                <div class="field-container">
                    <input type="email" class="field-input" placeholder="<?php echo $cotact_form['email'];?>" id="email" name="email" required=""  oninvalid="event.preventDefault();requiredMessage('invalideEmail');">
                    <small class="field-msg error" data_error="invalideEmail"><?php echo $form_messages['email'];?></small>
                </div>

                <div class="field-container">
                    <textarea name="message" id="message" class="field-input" placeholder="<?php echo $cotact_form['message'];?>" required=""  oninvalid="event.preventDefault();requiredMessage('invalideMessage');"></textarea>
                    <small class="field-msg error" data_error="invalideMessage"><?php echo $form_messages['message'];?></small>
                </div>
                
                <div class="field-container">
                    <button type="submit" class="btn btn-default btn-lg btn-sunset-form"><?php echo $cotact_form['submit'];?></button>
                    <small class="field-msg waiting js-form-submission"><?php echo $form_messages['submit_current'];?></small>
                    <small class="field-msg success js-form-submission"><?php echo $form_messages['submit_sucess'];?></small>
                    <small class="field-msg error js-form-submission"><?php echo $form_messages['submit_error'];?></small>
                </div>
            </form>
        </div>
    </div>
</div>