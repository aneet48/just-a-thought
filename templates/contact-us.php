<?php
/**
 * Template Name: Contact Page Template
 */
    get_header();

?>


<section class="contact-wrapper pad-75 has-animation" data-delay="0">
		<div class="container">
			<div class="row">

				<div class="col-lg-10 text-left offset-lg-1">
					<h2>Write us</h2>
					<p>We would love to meet you</p>

					<div id="contact-formular">

						<div id="notResults" class="dark f-small error"></div>
						<div id="MainResult" class="error"></div>
						
						

						<form id="contact-form" class="checkform" action="#" target="contact-send.php" method="post" >
                      	
			                <div class="form-row clearfix form-field">
			                    <label for="name" class="req">Name *</label>
			                    <input type="text" name="name" class="name" id="name" value="" placeholder="Name" />
			                </div>
			                
			                <div class="form-row clearfix form-field">
			                    <label for="email" class="req">Email *</label>
			                    <input type="text" name="email" class="email" id="email" value="" placeholder="Email"/>
			                </div>
			                
			                <div class="form-row clearfix textbox form-field">
			                    <label for="message" class="req">Message *</label>
			                    <textarea name="message" class="message" id="message" rows="15" cols="50" placeholder="Message"></textarea>
			                </div>
			                
			                <div id="form-note">
			                    <div class="alert alert-error pl-0 pr-0">
			                        <strong>Error</strong>: Please check your entries!
			                    </div>
			                </div>
			                
			                <div class="form-row form-submit">
			                	<div class="button-4">
			    					<div class="eff-4"></div>
			                    	<input type="submit" name="submit_form" class="submit send_message" value="Send Message" />
			                    </div>
			                </div>
			        
			                <input type="hidden" name="subject" value="Contact Subject Pond html" />
			                <input type="hidden" name="fields" value="name,email,message," />
			                <input type="hidden" name="sendto" value="YOUREMAIL" /> 
			            
			            </form>

					</div>


				</div>
			</div>
		</div>
	</section>


<?php
    get_footer();

?>