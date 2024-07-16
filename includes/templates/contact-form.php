<?php  if(get_plugin_options('contact_plugin_active')): ?>

<div id="form_success" style="background:green; color:#fff;"></div>
<div id="form_error" style="background:red; color:#fff;"></div>

<form id="enquiry_form" action="">

<?php wp_nonce_field('wp_rest');?>

 <label>Name</label>
<input type="text" name="name"><br>

<label>Email</label>
<input type="text" name="email"><br>

<label>Phone</label>
<input type="text" name="phone"><br>

<label>Your Message</label><br>
<textarea name="message"></textarea><br><br>

<button type="submit">Submit form</button>
</form>


<script>

   jQuery(document).ready(function($){

        $("#enquiry_form").submit(function(event){

            event.preventDefault();
            var form = $(this);


            $.ajax({
                type:"POST",
                url:"<?php echo get_rest_url(null, 'v1/contact-form/submit'); ?>",
                data: form.serialize(),
                success: function(res){
                    form.hide();
                    $("#form_success").html(res).fadeIn();
                },
                error: function(){
                    $("#form_error").html("There was an error submitting your form").fadeIn
                }
            })

        });

   });

</script>

<?php else: ?>

      This form is not acctive
      
<?php endif; ?>