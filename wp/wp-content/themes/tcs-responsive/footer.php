<?php

/**
 * @file
 * Copyright (C) 2015 TopCoder Inc., All Rights Reserved.
 * @author TCSASSEMBLER, ecnu_haozi
 * @version 1.2
 *
 * This footer page.
 *
 * Changed in 1.1
 * Add two modals 'filterSavedSuccess' and 'filterSavedFailed' to support "My filters" feature.
 *
 * Changed in 1.2 (topcoder new community site - Removal proxied API calls)
 * Removed twitter, blog, and about section
 */

?>
<footer id="footer">
  <div class="container">
    <div class="connected">
      <section class="social">
        <h4>Get Connected</h4>
        <ul>
          <li><a class="fb" href="<?php echo get_option('facebookURL'); ?>">FB</a></li>
          <li><a class="tw" href="<?php echo get_option('twitterURL'); ?>">TW</a></li>
          <li><a class="gp" href="<?php echo get_option('gPlusURL'); ?>">GP</a></li>
          <li><a class="in" href="<?php echo get_option('linkedInURL'); ?>">IN</a></li>
        </ul>
        <div class="clear"></div>
      </section>
      <section class="updates">
        <div class="row">
          <form id="emailForm" onsubmit="return newsletter_check(this)"
                name="FeedBlitz_9feab01d431311e39e69002590771423" style="display:block" method="POST"
                action="//www.feedblitz.com/f/f.fbz?AddNewUserDirect">
            <input type="email" class="email" name="EMAIL" placeholder="Your email address" maxlength="64"/>
            <input name="FEEDID" type="hidden" value="926643"/>
            <input name="PUBLISHER" type="hidden" value="34610190"/>
            <!-- <a onclick="FeedBlitz_9feab01d431311e39e69002590771423s(this.form);" class="btn">Submit</a> -->
            <input onclick="FeedBlitz_9feab01d431311e39e69002590771423s(this.form);" type="button"
                   class="btn btnSubmitFooter" value="Submit"/>
            <input type="hidden" name="na" value="s"/>
            <input type="hidden" name="nr" value="widget"/>
          </form>
          <script language="Javascript">function FeedBlitz_9feab01d431311e39e69002590771423i() {
              var x = document.getElementsByName('FeedBlitz_9feab01d431311e39e69002590771423');
              for (i = 0; i < x.length; i++) {
                x[i].EMAIL.style.display = 'block';
                x[i].action = '//www.feedblitz.com/f/f.fbz?AddNewUserDirect';
              }
            }
            function FeedBlitz_9feab01d431311e39e69002590771423s(v) {
              v.submit();
            }
            FeedBlitz_9feab01d431311e39e69002590771423i();</script>

        </div>
      </section>
    </div>
    <div class="copyright">
      <section>
        </br>
        © 2014 topcoder. All Rights Reserved.
        </br>
        <a href="/community/how-it-works/privacy-policy/" class="privacyStmtLink">Privacy Policy</a> | <a
          href="/community/how-it-works/terms/" class="legalDisclaimerLink">Terms</a>
      </section>
    </div>
    <div class="clear"></div>
  </div>
</footer>
<!-- /#footer -->
</div>
<!-- /.content -->
</div>
<!-- /#wrapper -->


<div id="bgModal"></div><!-- background modal -->
<div id="bgOverlapModal"></div><!-- background modal -->
<div id="bgLoadingModal"><span></span></div><!-- background loading -->
<div id="thanks" class="modal">
  <a href="javascript:;" class="closeBtn closeModal"></a>

  <div class="content">
    <h2>Thanks for joining!</h2>

    <p>We have sent you an email with activation instructions.<br/>If you do not receive that email within 1 hour,
      please email <a href="mailto:support@topcoder.com">support@topcoder.com</a>.</p>

    <div>
      <a href="javascript:;" class="btn closeModal redirectOnConfirm">Close</a>
    </div>
  </div>
</div><!-- END #thanks -->
<div id="registerSuccess" class="modal">
  <a href="javascript:;" class="btnClose closeModal"></a>
  <div class="content">
    <h2>Registered!</h2>
    <p class="success">Thank you for registering. You may now download the challenge files and participate in the challenge forums.</p>
    <p class="submitBtn">
      <a class="btn closeModalReg" href="javascript:;">OK</a>
    </p>
  </div>
</div><!-- END #registerSuccess -->
<div id="registerFailed" class="modal">
  <a href="javascript:;" class="btnClose closeModal"></a>
  <div class="content">
    <h2>Info</h2>
    <p class="failedMessage"></p>
    <p class="submitBtn">
      <a class="btn closeModal" href="javascript:;">OK</a>
    </p>
  </div>
</div><!-- END #registerFailed -->

<div id="showSubmission" class="modal">
    <a href="javascript:;" class="btnClose closePopupModal"></a>
    <div class="content">
       <img alt="" style="width:910px; height:850px">
    </div>
</div><!-- END #show submission -->

<div id="filterSavedSuccess" class="modal">
  <a href="javascript:;" class="btnClose closeModal"></a>
  <div class="content">
    <h2>Success</h2>
    <p class="success">Your filters have been saved and stored in the "My Filters" dropdown list.</p>
    <p class="submitBtn">
      <a class="btn closeModal" href="javascript:;">OK</a>
    </p>
  </div>
</div><!-- END #filterSavedSuccess -->

<div id="filterSavedFailed" class="modal">
  <a href="javascript:;" class="btnClose closeModal"></a>
  <div class="content">
    <h2>Info</h2>
    <p class="failedMessage"></p>
    <p class="submitBtn">
      <a class="btn closeModal" href="javascript:;">OK</a>
    </p>
  </div>
</div><!-- END #filterSavedFailed -->

<div id="designSubmissionCommentExample" class="modal">
  <a href="javascript:;" class="btnClose closeModal"></a>
  <div class="content">
    <h2>Comment Examples</h2>

    <strong>Example 1:</strong><br>
    The logo represents movement and "taking action" rather than being stagnant.
    The colors I chose signify power and give the brand a strong feel.<br><br>

    <strong>Example 2:</strong><br>
    This is a revised version of my previous submission. Changes include a new
    header graphic, new font choices for the pop-up box and new icons for the
    widget on the fourth page.<br><br>

    <strong>Example 3:</strong><br>
    This is my Round 2 submission. I have implemented all of the feedback you
    gave me after Round 1 and I hope you like the changes.<br><br>
  </div>
</div><!-- END #show submission -->

<div id="register" class="modal">
<a href="javascript:;" class="btnClose closeModal"></a>

<div class="content">
<h2>Sign Up Using An Existing Account</h2>

<div id="socials">
  <a class="register-facebook" href="javascript:;"><span class="animeButton shareFacebook"><span
        class="shareFacebookHover animeButtonHover"></span></span></a>
  <a class="register-google" href="javascript:;"><span class="animeButton shareGoogle"><span
        class="shareGoogleHover animeButtonHover"></span></span></a>
  <a class="register-twitter" href="javascript:;"><span class="animeButton shareTwitter"><span
        class="shareTwitterHover animeButtonHover"></span></span></a>
  <a class="register-github" href="javascript:;"><span class="animeButton shareGithub"><span
        class="shareGithubHover animeButtonHover"></span></span></a>

  <p>Using an existing account is quick and easy.<br/>Select the account you would like to use and we'll do the rest for
    you.</p>

  <div class="clear"></div>
</div>
<!-- END .socials -->
<h2>Or Sign Up Using Your Email</h2>

<form class="register" id="registerForm">
<p class="row">
  <span class="socialUnavailableErrorMessage">Social profile already in use. Please use another profile or register below.</span>
</p>
<p class="row">
  <label>First Name</label>
  <input type="text" class="name firstName" maxlength="64" placeholder="First Name"/>
  <span class="err1">Required field.</span>
  <span class="err2">Maximum length is 64 characters.</span>
  <!--Bugfix I-107905: add error message for invalid characters-->
  <span class="err3">First Name contains invalid characters.</span>
  <span class="err4">First Name cannot consist solely of punctuation.</span>
  <span class="err5">First Name is invalid.</span>
  <span class="valid"></span>
</p>

<p class="row">
  <label>Last Name</label>
  <input type="text" class="name lastName" maxlength="64" placeholder="Last Name"/>
  <span class="err1">Required field.</span>
  <span class="err2">Maximum length is 64 characters.</span>
  <!--Bugfix I-107905: add error message for invalid characters-->
  <span class="err3">Last Name contains invalid characters.</span>
  <span class="err4">Last Name cannot consist solely of punctuation.</span>
  <span class="err5">Last Name is invalid.</span>
  <span class="valid"></span>
</p>

<p class="row">
  <label>Username</label>
  <input type="text" class="handle name" maxlength="15" placeholder="Username"/>
  <span class="err1">Required field.</span>
  <span class="err2">Username already exists or is invalid.</span>
  <span class="err3">Username cannot contain a space.</span>
  <span class="err4">Username cannot consist solely of punctuation.</span>
  <span class="err5">Username contains invalid characters.</span>
  <span class="err6">Username cannot start with "admin".</span>
  <span class="err7">Username must be between 2 and 15 characters long.</span>
  <span class="valid"></span>
</p>

<p class="row">
  <label>Age</label>
  <input type="text" class="userAge" placeholder="Age"/>
  <span class="err1">Required field.</span>
  <span class="err2">Age must be a number.</span>
  <span class="err3">You must be at least 13 years of age to participate.</span>
  <span class="err4">Sorry, but there's no way you're older than the universe.</span>
  <span class="valid"></span>
</p>

<p class="row">
<label>Country</label>
<select class="applyCustomSelect" id="selCountry" name="user.country">
  <option value="">Please Select</option>
  <option value="Afghanistan">Afghanistan</option>
  <option value="Albania">Albania</option>
  <option value="Algeria">Algeria</option>
  <option value="American Samoa">American Samoa</option>
  <option value="Andorra">Andorra</option>
  <option value="Angola">Angola</option>
  <option value="Anguilla">Anguilla</option>
  <option value="Antarctica">Antarctica</option>
  <option value="Antigua and Barbuda">Antigua and Barbuda</option>
  <option value="Argentina">Argentina</option>
  <option value="Armenia">Armenia</option>
  <option value="Aruba">Aruba</option>
  <option value="Australia">Australia</option>
  <option value="Austria">Austria</option>
  <option value="Azerbaijan">Azerbaijan</option>
  <option value="Bahamas">Bahamas</option>
  <option value="Bahrain">Bahrain</option>
  <option value="Bangladesh">Bangladesh</option>
  <option value="Barbados">Barbados</option>
  <option value="Belarus">Belarus</option>
  <option value="Belgium">Belgium</option>
  <option value="Belize">Belize</option>
  <option value="Benin">Benin</option>
  <option value="Bermuda">Bermuda</option>
  <option value="Bhutan">Bhutan</option>
  <option value="Bolivia">Bolivia</option>
  <option value="Bosnia &amp; Herzegowina">Bosnia &amp; Herzegowina</option>
  <option value="Botswana">Botswana</option>
  <option value="Bouvet Island">Bouvet Island</option>
  <option value="Brazil">Brazil</option>
  <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
  <option value="Brunei Darussalam">Brunei Darussalam</option>
  <option value="Bulgaria">Bulgaria</option>
  <option value="Burkina Faso">Burkina Faso</option>
  <option value="Burundi">Burundi</option>
  <option value="Cambodia">Cambodia</option>
  <option value="Cameroon">Cameroon</option>
  <option value="Canada">Canada</option>
  <option value="Cape Verde">Cape Verde</option>
  <option value="Cayman Islands">Cayman Islands</option>
  <option value="Central African Republic">Central African Republic</option>
  <option value="Chad">Chad</option>
  <option value="Chile">Chile</option>
  <option value="China">China</option>
  <option value="Christmas Island">Christmas Island</option>
  <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
  <option value="Colombia">Colombia</option>
  <option value="Comoros">Comoros</option>
  <option value="Congo">Congo</option>
  <option value="Cook Islands">Cook Islands</option>
  <option value="Costa Rica">Costa Rica</option>
  <option value="Cote D'Ivoire">Cote D'Ivoire</option>
  <option value="Croatia">Croatia</option>
  <option value="Cuba">Cuba</option>
  <option value="Cyprus">Cyprus</option>
  <option value="Czech Republic">Czech Republic</option>
  <option value="Denmark">Denmark</option>
  <option value="Djibouti">Djibouti</option>
  <option value="Dominica">Dominica</option>
  <option value="Dominican Republic">Dominican Republic</option>
  <option value="East Timor">East Timor</option>
  <option value="Ecuador">Ecuador</option>
  <option value="Egypt">Egypt</option>
  <option value="El Salvador">El Salvador</option>
  <option value="Equatorial Guinea">Equatorial Guinea</option>
  <option value="Eritrea">Eritrea</option>
  <option value="Estonia">Estonia</option>
  <option value="Ethiopia">Ethiopia</option>
  <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
  <option value="Faroe Islands">Faroe Islands</option>
  <option value="Fiji">Fiji</option>
  <option value="Finland">Finland</option>
  <option value="France">France</option>
  <option value="French Guiana">French Guiana</option>
  <option value="French Polynesia">French Polynesia</option>
  <option value="French Southern Territories">French Southern Territories</option>
  <option value="Gabon">Gabon</option>
  <option value="Gambia">Gambia</option>
  <option value="Georgia">Georgia</option>
  <option value="Germany">Germany</option>
  <option value="Ghana">Ghana</option>
  <option value="Gibraltar">Gibraltar</option>
  <option value="Greece">Greece</option>
  <option value="Greenland">Greenland</option>
  <option value="Grenada">Grenada</option>
  <option value="Guadeloupe">Guadeloupe</option>
  <option value="Guam">Guam</option>
  <option value="Guatemala">Guatemala</option>
  <option value="Guinea">Guinea</option>
  <option value="Guinea-Bissau">Guinea-Bissau</option>
  <option value="Guyana">Guyana</option>
  <option value="Haiti">Haiti</option>
  <option value="Heard and Mc Donald Islands">Heard and Mc Donald Islands</option>
  <option value="Honduras">Honduras</option>
  <option value="Hong Kong">Hong Kong</option>
  <option value="Hungary">Hungary</option>
  <option value="Iceland">Iceland</option>
  <option value="India">India</option>
  <option value="Indonesia">Indonesia</option>
  <option value="Iran">Iran</option>
  <option value="Iraq">Iraq</option>
  <option value="Ireland">Ireland</option>
  <option value="Israel">Israel</option>
  <option value="Italy">Italy</option>
  <option value="Jamaica">Jamaica</option>
  <option value="Japan">Japan</option>
  <option value="Jordan">Jordan</option>
  <option value="Kazakhstan">Kazakhstan</option>
  <option value="Kenya">Kenya</option>
  <option value="Kiribati">Kiribati</option>
  <option value="Kuwait">Kuwait</option>
  <option value="Kyrgyzstan">Kyrgyzstan</option>
  <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
  <option value="Latvia">Latvia</option>
  <option value="Lebanon">Lebanon</option>
  <option value="Lesotho">Lesotho</option>
  <option value="Liberia">Liberia</option>
  <option value="Libya">Libya</option>
  <option value="Liechtenstein">Liechtenstein</option>
  <option value="Lithuania">Lithuania</option>
  <option value="Luxembourg">Luxembourg</option>
  <option value="Macau">Macau</option>
  <option value="Macedonia">Macedonia</option>
  <option value="Madagascar">Madagascar</option>
  <option value="Malawi">Malawi</option>
  <option value="Malaysia">Malaysia</option>
  <option value="Maldives">Maldives</option>
  <option value="Mali">Mali</option>
  <option value="Malta">Malta</option>
  <option value="Marshall Islands">Marshall Islands</option>
  <option value="Martinique">Martinique</option>
  <option value="Mauritania">Mauritania</option>
  <option value="Mauritius">Mauritius</option>
  <option value="Mayotte">Mayotte</option>
  <option value="Mexico">Mexico</option>
  <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
  <option value="Moldova, Republic of">Moldova, Republic of</option>
  <option value="Monaco">Monaco</option>
  <option value="Mongolia">Mongolia</option>
  <option value="Montenegro">Montenegro</option>
  <option value="Montserrat">Montserrat</option>
  <option value="Morocco">Morocco</option>
  <option value="Mozambique">Mozambique</option>
  <option value="Myanmar">Myanmar</option>
  <option value="Namibia">Namibia</option>
  <option value="Nauru">Nauru</option>
  <option value="Nepal">Nepal</option>
  <option value="Netherlands">Netherlands</option>
  <option value="Netherlands Antilles">Netherlands Antilles</option>
  <option value="New Caledonia">New Caledonia</option>
  <option value="New Zealand">New Zealand</option>
  <option value="Nicaragua">Nicaragua</option>
  <option value="Niger">Niger</option>
  <option value="Nigeria">Nigeria</option>
  <option value="Niue">Niue</option>
  <option value="Norfolk Island">Norfolk Island</option>
  <option value="North Korea">North Korea</option>
  <option value="Northern Mariana Islands">Northern Mariana Islands</option>
  <option value="Norway">Norway</option>
  <option value="Oman">Oman</option>
  <option value="Pakistan">Pakistan</option>
  <option value="Palau">Palau</option>
  <option value="Palestine">Palestine</option>
  <option value="Panama">Panama</option>
  <option value="Papua New Guinea">Papua New Guinea</option>
  <option value="Paraguay">Paraguay</option>
  <option value="Peru">Peru</option>
  <option value="Philippines">Philippines</option>
  <option value="Pitcairn">Pitcairn</option>
  <option value="Poland">Poland</option>
  <option value="Portugal">Portugal</option>
  <option value="Puerto Rico">Puerto Rico</option>
  <option value="Qatar">Qatar</option>
  <option value="Reunion">Reunion</option>
  <option value="Romania">Romania</option>
  <option value="Russia">Russia</option>
  <option value="Rwanda">Rwanda</option>
  <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
  <option value="Saint Lucia">Saint Lucia</option>
  <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
  <option value="Samoa">Samoa</option>
  <option value="San Marino">San Marino</option>
  <option value="Sao Tome and Principe">Sao Tome and Principe</option>
  <option value="Saudi Arabia">Saudi Arabia</option>
  <option value="Senegal">Senegal</option>
  <option value="Serbia">Serbia</option>
  <option value="Seychelles">Seychelles</option>
  <option value="Sierra Leone">Sierra Leone</option>
  <option value="Singapore">Singapore</option>
  <option value="Slovakia">Slovakia</option>
  <option value="Slovenia">Slovenia</option>
  <option value="Solomon Islands">Solomon Islands</option>
  <option value="Somalia">Somalia</option>
  <option value="South Africa">South Africa</option>
  <option value="South Georgia and The S.Sandwich Is.">South Georgia and The S.Sandwich Is.</option>
  <option value="South Korea">South Korea</option>
  <option value="Spain">Spain</option>
  <option value="Sri Lanka">Sri Lanka</option>
  <option value="St. Helena">St. Helena</option>
  <option value="St. Kitts and Nevis">St. Kitts and Nevis</option>
  <option value="St. Lucia">St. Lucia</option>
  <option value="St. Pierre and Miquelon">St. Pierre and Miquelon</option>
  <option value="St. Vincent and Grenadines">St. Vincent and Grenadines</option>
  <option value="Sudan">Sudan</option>
  <option value="Suriname">Suriname</option>
  <option value="Svalbard and Jan Mayen Islands">Svalbard and Jan Mayen Islands</option>
  <option value="Swaziland">Swaziland</option>
  <option value="Sweden">Sweden</option>
  <option value="Switzerland">Switzerland</option>
  <option value="Syria">Syria</option>
  <option value="Taiwan">Taiwan</option>
  <option value="Tajikistan">Tajikistan</option>
  <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
  <option value="Thailand">Thailand</option>
  <option value="Togo">Togo</option>
  <option value="Tokelau">Tokelau</option>
  <option value="Tonga">Tonga</option>
  <option value="Trinidad and Tobago">Trinidad and Tobago</option>
  <option value="Tunisia">Tunisia</option>
  <option value="Turkey">Turkey</option>
  <option value="Turkmenistan">Turkmenistan</option>
  <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
  <option value="Tuvalu">Tuvalu</option>
  <option value="Uganda">Uganda</option>
  <option value="Ukraine">Ukraine</option>
  <option value="United Arab Emirates">United Arab Emirates</option>
  <option value="United Kingdom">United Kingdom</option>
  <option value="United States">United States</option>
  <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
  <option value="Uruguay">Uruguay</option>
  <option value="Uzbekistan">Uzbekistan</option>
  <option value="Vanuatu">Vanuatu</option>
  <option value="Vatican City State (Holy See)">Vatican City State (Holy See)</option>
  <option value="Venezuela">Venezuela</option>
  <option value="Viet Nam">Viet Nam</option>
  <option value="Virgin Islands (British)">Virgin Islands (British)</option>
  <option value="Virgin Islands (U.S.)">Virgin Islands (U.S.)</option>
  <option value="Wallis and Futuna Islands">Wallis and Futuna Islands</option>
  <option value="Western Sahara">Western Sahara</option>
  <option value="Yemen">Yemen</option>
  <option value="Zaire">Zaire</option>
  <option value="Zambia">Zambia</option>
  <option value="Zimbabwe">Zimbabwe</option>
</select>
<span class="err1">Required field.</span>
<span class="valid"></span>
</p>
<p class="row">
  <label>Email</label>
  <input name="email" type="text" class="email" placeholder="Email"/>
  <span class="err1">Required field.</span>
  <span class="err2">Invalid email address.</span>
  <span class="err3">Email already in use.</span>
  <span class="valid"></span>
</p>

<p class="row">
  <label>Password</label>
  <input type="password" class="pwd" maxlength="30" placeholder="Password"/>
  <span class="err1">Required field.</span>
  <span class="err2">3/4 needed: capital, lowercase, number, symbol</span>
  <span class="err3">Password cannot contain an apostrophe.</span>
  <span class="err4">Password must be between 7 and 30 characters.</span>
  <span class="err5">Password must not contain only spaces.</span>
  <span class="valid">Strong</span>
</p>

<p class="row info lSpace">
					<span class="strength">
						<span class="field"></span>
						<span class="field"></span>
						<span class="field"></span>
						<span class="field"></span>
					</span>
  7 characters with letters, numbers, &amp; symbols.
</p>

<p class="row">
  <label>Password Confirmation</label>
  <input type="password" class="confirm" maxlength="30" placeholder="Password Confirmation"/>
  <span class="err1">Required field.</span>
  <span class="err2">Password confirmation different from above field.</span>
  <span class="valid"></span>
</p>

<p class="row lSpace">
  <label><input type="checkbox">I agree to the <a target="_blank" href="/community/how-it-works/terms/">terms of
      service</a> and <a target="_blank" href="/community/how-it-works/privacy-policy/">privacy policy</a>.</label>
  <span class="err1">You must agree to the terms.</span>
  <span class="err2">You must agree to the terms.</span>
</p>

</form>
<!-- END .form register -->
<div class="clear"></div>
<p class="submitBtn">
  <a href="javascript:;" class="btn btnSubmit">Sign Up</a>
</p>
</div>
</div><!-- END #register -->
<div id="login" class="modal">
  <a href="javascript:;" class="btnClose closeModal"></a>

  <div class="content">
    <h2>Login Using An Existing Account</h2>

    <div id="socials">
      <a class="signin-facebook" href="javascript:;"><span class="animeButton shareFacebook"><span
            class="shareFacebookHover animeButtonHover"></span></span></a>
      <a class="signin-google" href="javascript:;"><span class="animeButton shareGoogle"><span
            class="shareGoogleHover animeButtonHover"></span></span></a>
      <a class="signin-twitter" href="javascript:;"><span class="animeButton shareTwitter"><span
            class="shareTwitterHover animeButtonHover"></span></span></a>
      <a class="signin-github" href="javascript:;"><span class="animeButton shareGithub"><span
            class="shareGithubHover animeButtonHover"></span></span></a>

      <p>Using an existing account is quick and easy.<br/>Select the account you would like to use and we'll do the rest
        for you.</p>

      <div class="clear"></div>
    </div>
    <!-- END .socials -->
    <h2>Login With A topcoder Account</h2>
    <div class="tc-login-form">
      <form class="login" id="loginForm">
        <p class="row">
          <label>Username</label>
          <input id="username" type="text" class="name" placeholder="Username"/>
          <span class="err1">Your username or password are incorrect.</span>
          <span class="err3">Please input your username.</span>
        </p>

        <p class="row">
          <label>Password</label>
          <input id="password" type="password" class="pwd" placeholder="Password"/>
          <span class="err4">Please input your password.</span>
        </p>

        <p class="row lSpace">
          <label><input id="rememberMe" type="checkbox"/>Remember me</label>
        </p>

        <p class="row lSpace btns">
          <a href="javascript:;" class="signin-db btn btnSubmit">Login</a>
            <?php
                $fp_page = get_page_by_path( 'password-recovery' );
                $fp_link = get_permalink($fp_page->ID);
                $fp_link = str_replace('http:', 'https:', $fp_link);
            ?>
          <a href="<?php echo $fp_link; //http://community.topcoder.com/tc?module=FindUser ?>" target="_blank" class="forgotPwd">Forgot
            password?</a>
          <span class="not-a-member">Not a member? <a href="javascript:;" class="switch-to-register">Sign Up Now!</a></span>
        </p>
      </form>
      <div class="register-text"></div>
      <div class="clear"></div>
    </div>
    <!-- END .form login -->
  </div>
</div><!-- END #login -->

<div id="typeTooltip" class="tooltip hide">
  <div class="inner">
    <header></header>
    <div class="data">
      <p class="contestTy"></p>
    </div>
    <div class="arrow"></div>
  </div>
</div><!-- /.tooltip -->
<div id="winnerTooltip" class="tooltip hide">
  <div class="inner">
    <header></header>
    <div class="data">
      <div class="winnerInfo"></div>
    </div>
    <div class="arrow alt"></div>
  </div>
</div><!-- /.tooltip -->
<div id="badgeTooltip" class="tooltip hide">
  <div class="inner">
    <header></header>
    <div class="data">
      <p class="earnedOn"></p>
    </div>
    <div class="data">
      <p class="currentlyEarned"><span></span></p>
    </div>
    <div class="arrow"></div>
  </div>
</div><!-- /.tooltip -->
<?php wp_footer(); ?>
<script>
  window.prerenderReady = false;
  function getParameterByName(name, source) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
    results = regex.exec(source || location.search);
    return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
  }
  function getHashParameterByName(name, source) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\#&]" + name + "=([^&#]*)"),
    results = regex.exec(source || location.hash);
    return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
  }
</script>


<!-- START Marketo Code -->
<script type="text/javascript">
document.write(unescape("%3Cscript src='//munchkin.marketo.net/munchkin.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script>Munchkin.init('921-UOU-112', {"wsInfo":"jFRS"});</script>
<!-- END Marketo Code -->

<!-- START Google Retargeting Marketing Code -->
<script type="text/javascript">
adroll_adv_id = "LOUA2FVRTJDYZC2BMX72Z7";
adroll_pix_id = "4XU6H3BYL5EQBFHZM4DIUU";
(function () {
var oldonload = window.onload;
window.onload = function(){
   __adroll_loaded=true;
   var scr = document.createElement("script");
   var host = (("https:" == document.location.protocol) ? "https://s.adroll.com" : "http://a.adroll.com");
   scr.setAttribute('async', 'true');
   scr.type = "text/javascript";
   scr.src = host + "/j/roundtrip.js";
   ((document.getElementsByTagName('head') || [null])[0] ||
    document.getElementsByTagName('script')[0].parentNode).appendChild(scr);
   if(oldonload){oldonload()}};
}());
</script>
<!-- END Google Retargeting Marketing Code -->


<!-- START Twitter Marketing Code -->
<script src="//platform.twitter.com/oct.js" type="text/javascript"></script>
<script type="text/javascript">
twttr.conversion.trackPid('l4r4k');
</script>
<noscript>
<img height="1" width="1" style="display:none;" alt="" src="https://analytics.twitter.com/i/adsct?txn_id=l4r4k&p_id=Twitter" />
<img height="1" width="1" style="display:none;" alt="" src="//t.co/i/adsct?txn_id=l4r4k&p_id=Twitter" />
</noscript>
<!-- END Twitter Marketing Code -->

<!-- START KISSmetrics -->
<script type="text/javascript">var _kmq = _kmq || [];
var _kmk = _kmk || 'aa23cd43c455ef33b6a0df3de81a79af9ea30f75';
function _kms(u){
  setTimeout(function(){
    var d = document, f = d.getElementsByTagName('script')[0],
    s = d.createElement('script');
    s.type = 'text/javascript'; s.async = true; s.src = u;
    f.parentNode.insertBefore(s, f);
  }, 1);
}
_kms('//i.kissmetrics.com/i.js');
_kms('//doug1izaerwt3.cloudfront.net/' + _kmk + '.1.js');
</script>
<!-- END KISSmetrics -->

</div>

</body>

</html>
