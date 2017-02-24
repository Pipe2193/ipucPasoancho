<?php
session_name('ONAF_ADMIN');
session_start();
/**
 * Makes AJAX requests fo create live report of customer process
 *
 * @author PMI development <bpo@pmilimited.com>
 * @package ONAF
 * @subpackage live report
 * @version 1.0.0
 */
include 'functions.php';
include 'connect.php';
include 'queries.php';


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id_customer'])) {

        $customerinfo = getCustomerInfo($_GET['id_customer']);
        if (isset($customerinfo->id_account)) {
            $accountinfo = getAccountInfo($_GET['id_customer'], getCustomerAccount($_GET['id_customer']));
        }
        ?>

        <style type="text/css">
            #table_live_process th{
                text-align: right;
                padding-right: 15px;
            }
        </style>

        <table width="100%" id="table_live_process" border="0" cellpadding="0" cellspacing="6">

            <tr>
                <th align="right" width="50%">Email Address</th>
                <td align="left" width="50%"><?php echo $customerinfo->email_onaf_customer; ?></td>
            </tr>

            <tr>
                <th align="right">PIN Number</th>
                <td align="left"><?php echo $customerinfo->pin_number_customer; ?></td>
            </tr>

            <tr>
                <th align="right">Peffix</th>
                <td align="left"><?php echo getPrefixById($customerinfo->id_prefix) ?></td>
            </tr>
            <tr>
                <th align="right">First Name</th>
                <td align="left"><?php echo $customerinfo->first_name_onaf_customer ?></td>
            </tr>
            <tr>
                <th align="right">Middle Name</th>
                <td align="left"><?php echo $customerinfo->middle_name_customer ?></td>
            </tr>
            <tr>
                <th align="right">Last Name</th>
                <td align="left"><?php echo $customerinfo->last_name_customer ?></td>
            </tr>
            <tr>
                <th align="right">Suffix</th>
                <td align="left"><?php echo getSuffixById($customerinfo->id_suffix); ?></td>
            </tr>
            <tr>
                <th align="right">Phone Number</th>
                <td align="left"><?php echo getTypePhoneById($customerinfo->id_type_phone_number) . " " . $customerinfo->phone_number_customer . " " . $customerinfo->phone_number_customer_ext; ?></td>
            </tr>
            <?php
            if (isset($customerinfo->id_type_secondary_phone_number) && $customerinfo->secondary_phone_number_customer != '') {
                ?>
                <tr>
                    <th align="right">Secondary Phone Number</th>
                    <td align="left"><?php echo getTypePhoneById($customerinfo->id_type_secondary_phone_number) . " " . $customerinfo->secondary_phone_number_customer . " " . $customerinfo->secondary_phone_number_customer_ext; ?></td>
                </tr>
                <?php
            }
            ?>

            <tr>
                <th align="right">Country of Citizenship</th>
                <td align="left"><?php echo getCountryById($customerinfo->id_country); ?></td>
            </tr>
            <tr>
                <th align="right">Country of Residency</th>
                <td align="left"><?php echo getCountryById($customerinfo->id_country_recidency); ?></td>
            </tr>

            <tr>
                <th align="right">Type of Account</th>
                <td align="left"><?php echo getAccountById($customerinfo->id_account); ?></td>
            </tr>

            <?php
            if ($customerinfo->id_account == 3) {
                $corporateinfo = getAllInfoAccount($_GET['id_customer'], getCustomerAccount($_GET['id_customer']));
                ?>

                <!-- Corporate Information -->
                <tr>
                    <th align="right">Date of Incorporation</th>
                    <td align="left"><?php echo $corporateinfo->date_incorp_coporate_onaf; ?></td>
                </tr>
                <tr>
                    <th align="right">Business Name</th>
                    <td align="left"><?php echo $corporateinfo->business_name_coporate_onaf; ?></td>
                </tr>
                <tr>
                    <th align="right">Type of Business</th>
                    <td align="left"><?php echo $corporateinfo->type_bussiness_coporate_onaf; ?></td>
                </tr>
                <tr>
                    <th align="right">Country</th>
                    <td align="left"><?php echo getCountryById($corporateinfo->id_country_corporate_onaf); ?></td>
                </tr>
                <tr>
                    <th align="right">City</th>
                    <td align="left"><?php echo $corporateinfo->city_corporate_onaf; ?></td>
                </tr>
                <tr>
                    <th align="right">Street Address 1</th>
                    <td align="left"><?php echo $corporateinfo->street_address1_coporate_onaf; ?></td>
                </tr>
                <?php if ($corporateinfo->street_address2_coporate_onaf != '') { ?>
                    <tr>
                        <th align="right">Street Address 2</th>
                        <td align="left"><?php echo $corporateinfo->street_address2_coporate_onaf; ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <th align="right">Zip / Postal Code</th>
                    <td align="left"><?php echo $corporateinfo->zip_code_corporate_onaf; ?></td>
                </tr>
                <!-- end Corporate Information --><!-- Account Owner -->
                <?php
            }
            ?>

            <tr>
                <th align="right">Date of Birth</th>
                <td align="left"><?php echo $accountinfo->datebirth_onaf_customer_account; ?></td>
            </tr>
            <tr>
                <th align="right">Primary ID</th>
                <td align="left"><?php echo $accountinfo->primaryid_onaf_customer_account; ?></td>
            </tr>

            <tr>
                <th align="right">Type of ID</th>
                <td align="left"><?php echo getTypeIDById($accountinfo->idtype_id_onaf_customer_account); ?></td>
            </tr>
            <tr>
                <th align="right">ID Number</th>
                <td align="left"><?php echo $accountinfo->secondayid_onaf_customer_account; ?></td>
            </tr>
            <tr>
                <th align="right">Expiry Date</th>
                <td align="left"><?php echo $accountinfo->expirydate_secondaryid_onaf_customer_account; ?></td>
            </tr>

            <?php if (isset($accountinfo->sanswer_question1_onaf_customer_account) && $accountinfo->sanswer_question1_onaf_customer_account != '') { ?>
                <tr>
                    <th align="right"><?php echo getSecurityQuestionsById($accountinfo->idsecurity_question1_onaf_customer_account); ?></th>
                    <td align="left"><?php echo $accountinfo->sanswer_question1_onaf_customer_account; ?></td>
                </tr>
                <?php
            }
            if (isset($accountinfo->sanswer_question2_onaf_customer_account) && $accountinfo->sanswer_question2_onaf_customer_account != '') {
                ?>
                <tr>
                    <th align="right"><?php echo getSecurityQuestionsById($accountinfo->idsecurity_question2_onaf_customer_account); ?></th>
                    <td align="left"><?php echo $accountinfo->sanswer_question2_onaf_customer_account; ?></td>
                </tr>
            <?php } ?>

            <tr>
                <th align="right">Street Address 1</th>
                <td align="left"><?php echo $customerinfo->home_address_customer; ?></td>
            </tr>
            <tr>
                <th align="right">Street Address2 </th>
                <td align="left"><?php echo $customerinfo->home_address2_customer; ?></td>
            </tr>
            <tr>
                <th align="right">City</th>
                <td align="left"><?php echo $customerinfo->city_onaf_customer; ?></td>
            </tr>
            <tr>
                <th align="right">State / Province</th>
                <td align="left"><?php echo getStateById($customerinfo->id_state); ?></td>
            </tr>
            <tr>
                <th align="right">Zip / Postal Code</th>
                <td align="left"><?php echo $customerinfo->zipcode_onaf_customer; ?></td>
            </tr>
            <tr>
                <th align="right">Country</th>
                <td align="left"><?php echo getCountryById($customerinfo->id_country); ?></td>
            </tr>
            <?php if (isset($customerinfo->secondary_home_address_customer) && $customerinfo->secondary_home_address_customer != '') { ?>
                <tr>
                    <th align="right">Mailing Street Address 1 </th>
                    <td align="left"><?php echo $customerinfo->secondary_home_address_customer; ?></td>
                </tr>
                <tr>
                    <th align="right">Mailing Street Address 2 </th>
                    <td align="left"><?php echo $customerinfo->secondary_home_address2_customer; ?></td>
                </tr>
                <tr>
                    <th align="right">Mailing City</th>
                    <td align="left"><?php echo $customerinfo->secondary_city_onaf_customer; ?></td>
                </tr>
                <tr>
                    <th align="right">Mailing State / Province</th>
                    <td align="left"><?php echo getStateById($customerinfo->secondary_id_state); ?></td>
                </tr>
                <tr>
                    <th align="right">Mailing Zip / Postal Code</th>
                    <td align="left"><?php echo $customerinfo->secondary_zipcode_onaf_customer; ?></td>
                </tr>
                <tr>
                    <th align="right">Mailing Country</th>
                    <td align="left"><?php echo getCountryById($customerinfo->id_country); ?></td>
                </tr>
            <?php } ?>
            <tr>
                <th align="right">Employment Information</th>
                <td align="left"><?php echo getEmploymentById($accountinfo->id_employment_onaf_customer_account); ?></td>
            </tr>
            <?php if ($accountinfo->id_employment_onaf_customer_account == 1 || $accountinfo->id_employment_onaf_customer_account == 4) { ?>
                <tr>
                    <th align="right">Business / Employer Name</th>
                    <td align="left"><?php echo $accountinfo->businessemployer_onaf_customer_account; ?></td>
                </tr>
                <tr>
                    <th align="right">Street Address 1</th>
                    <td align="left"><?php echo $accountinfo->businessAddress1_onaf_customer_account; ?></td>
                </tr>
                <tr>
                    <th align="right">Street Address 2</th>
                    <td align="left"><?php echo $accountinfo->businessAddress2_onaf_customer_account; ?></td>
                </tr>
                <tr>
                    <th align="right">City</th>
                    <td align="left"><?php echo $accountinfo->businesscityaddress_onaf_customer_account; ?></td>
                </tr>
                <tr>
                    <th align="right">State / Province</th>
                    <td align="left"><?php echo getStateById($accountinfo->businessstateaddress_onaf_customer_account); ?></td>
                </tr>
                <tr>
                    <th align="right">Zip / Postal Code</th>
                    <td align="left"><?php echo $accountinfo->businesszipcode_onaf_customer_account; ?></td>
                </tr>
                <tr>
                    <th align="right">Country</th>
                    <td align="left"><?php echo getCountryById($accountinfo->businesscountryaddress_onaf_customer_account); ?></td>
                </tr>
            <?php } ?>

            <tr>
                <th align="right">Approximate Annual Income</th>
                <td align="left"><?php echo getFinantialInfoById($accountinfo->income_onaf_customer_account); ?></td>
            </tr>
            <tr>
                <th align="right">Approximate Net Worth</th>
                <td align="left"><?php echo getFinantialInfoById($accountinfo->networth_onaf_customer_account); ?></td>
            </tr>
            <tr>
                <th align="right">Approximate Liquid Net Worth</th>
                <td align="left"><?php echo getFinantialInfoById($accountinfo->liquidnetworth_onaf_customer_account); ?></td>
            </tr>
            <tr>
                <th align="right">Savings</th>
                <td align="left">
                    <?php
                    if ($accountinfo->sourcefunds1_onaf_customer_account == 'savings') {
                        echo 'Yes';
                    } else {
                        echo 'No';
                    }
                    ?>
                </td>
            </tr>
            <?php if ($accountinfo->sourcefunds2_onaf_customer_account == 'other') { ?>
                <tr>
                    <th align="right">Other</th>
                    <td align="left"><?php echo $accountinfo->describesourcefunds_onaf_customer_account; ?></td>
                </tr>
            <?php }; ?>

            <?php
            if ($accountinfo->idinvestmentexperience_onaf_customer_account == 1) {
                ?> 
                <tr>
                    <th align="right"> · </th> 
                    <td align="left"> <?php echo getInvestmentExpById($accountinfo->idinvestmentexperience_onaf_customer_account); ?> </td>
                </tr>
            <?php } ?>
            <?php
            if ($accountinfo->idinvestmentexperience2_onaf_customer_account == 2) {
                ?> 
                <tr>
                    <th align="right"> · </th> 
                    <td align="left"> <?php echo getInvestmentExpById($accountinfo->idinvestmentexperience2_onaf_customer_account); ?> </td>
                </tr>
            <?php } ?>
            <?php
            if ($accountinfo->idinvestmentexperience3_onaf_customer_account == 3) {
                ?> 
                <tr>
                    <th align="right"> · </th> 
                    <td align="left"> <?php echo getInvestmentExpById($accountinfo->idinvestmentexperience3_onaf_customer_account); ?> </td>
                </tr>
            <?php } ?>
            <?php
            if ($accountinfo->idinvestmentexperience4_onaf_customer_account == 4) {
                ?> 
                <tr>
                    <th align="right"> · </th> 
                    <td align="left"> <?php echo getInvestmentExpById($accountinfo->idinvestmentexperience4_onaf_customer_account); ?> </td>
                </tr>
            <?php } ?>
            <?php
            if ($accountinfo->idinvestmentexperience5_onaf_customer_account == 5) {
                ?> 
                <tr>
                    <th align="right"> · </th> 
                    <td align="left"> <?php echo getInvestmentExpById($accountinfo->idinvestmentexperience5_onaf_customer_account); ?> </td>
                </tr>
            <?php } ?>
            <?php
            if ($accountinfo->idinvestmentexperience6_onaf_customer_account == 6) {
                ?> 
                <tr>
                    <th align="right"> · </th> 
                    <td align="left"> <?php echo getInvestmentExpById($accountinfo->idinvestmentexperience6_onaf_customer_account); ?> </td>
                </tr>
            <?php } ?>

            <tr>
                <th align="right">Personal Affiliations 1</th>
                <td align="left"><?php echo $accountinfo->pa1_onaf_customer_account; ?></td>
            </tr>

            <?php if ($accountinfo->pa1_onaf_customer_account != 'no') { ?>
                <tr>
                    <th align="right">Business / Employer Name</th>
                    <td align="left"><?php echo $accountinfo->pa1businessEmployer_onaf_customer_account; ?></td>
                </tr>
                <tr>
                    <th align="right">Country</th>
                    <td align="left"><?php echo getCountryById($accountinfo->idpa1businesscountryaddress_onaf_customer_account); ?></td>
                </tr>
                <tr>
                    <th align="right">Street Address 1</th>
                    <td align="left"><?php echo $accountinfo->pa1businessAddress1_onaf_customer_account; ?></td>
                </tr>
                <?php if ($accountinfo->pa1businessAddress2_onaf_customer_account != '') { ?>
                    <tr>
                        <th align="right">Street Address 2</th>
                        <td align="left"><?php echo $accountinfo->pa1businessAddress2_onaf_customer_account; ?></td>
                    </tr>
                <?php }; ?>
                <tr>
                    <th align="right">City</th>
                    <td align="left"><?php echo $accountinfo->pa1businessCityAddress_onaf_customer_account; ?></td>
                </tr>
                <tr>
                    <th align="right">State / Province</th>
                    <td align="left"><?php echo getStateById($accountinfo->idpa1businessstateaddress_onaf_customer_account); ?></td>
                </tr>
                <tr>
                    <th align="right">Zip / Postal Code</th>
                    <td align="left"><?php echo $accountinfo->pa1businesszipcode_onaf_customer_account; ?></td>
                </tr>
            <?php }; ?>
            <tr>
                <th align="right">Personal Affiliations 2</th>
                <td align="left"><?php echo $accountinfo->pa2_onaf_customer_account; ?></td>
            </tr>
            <?php if ($accountinfo->pa2_onaf_customer_account != 'no') { ?>
                <tr>
                    <th align="right">Senior Political Figure Name</th>
                    <td align="left"><?php echo $accountinfo->pa2politicalfigure_onaf_customer_account; ?></td>
                </tr>
                <tr>
                    <th align="right">Political Title</th>
                    <td align="left"><?php echo $accountinfo->pa2politicaltittle_onaf_customer_account; ?></td>
                </tr>
                <tr>
                    <th align="right">Country Where Title is Held</th>
                    <td align="left"><?php echo getCountryById($accountinfo->idpa2CountryAddress_onaf_customer_account); ?></td>
                </tr>
                <tr>
                    <th align="right">Relationship to Account Owner</th>
                    <td align="left"><?php echo $accountinfo->pa2Relationship_onaf_customer_account; ?></td>
                </tr>
            <?php }; ?>
            <tr>
                <th align="right">Personal Affiliations 3</th>
                <td align="left"><?php echo $accountinfo->pa3_onaf_customer_account; ?></td>
            </tr>
            <?php if ($accountinfo->pa3_onaf_customer_account != 'no') { ?>
                <tr>
                    <th align="right">Company Ticker</th>
                    <td align="left"><?php echo $accountinfo->pa3CompanyTicker_onaf_customer_account; ?></td>
                </tr>
                <tr>
                    <th align="right">Country</th>
                    <td align="left"><?php echo getCountryById($accountinfo->idpa3CountryAddress_onaf_customer_account); ?></td>
                </tr>
            <?php } ?>

            <tr>
                <th align="right">Signature - Review</th>
                <td align="left"><?php echo $accountinfo->reviewsign_officerbroker_onaf_customer_account; ?></td>
            </tr>
            <tr>
                <th  align="right">Date &amp; NY Time · IP Address</th>
                <td align="left"><?php echo $accountinfo->reviewsigntime_onaf_customer_account . ' · ' . $accountinfo->ip_onaf_customer_account ?></td>
            </tr>
            <tr>
                <th align="right">Signature - Docs</th>
                <td align="left"><?php echo $accountinfo->primary_officer_onaf_customer_account4; ?></td>
            </tr>  
            <tr>
                <th align="right">Date &amp;   NY Time · IP Address</th>
                <td align="left"><?php echo $accountinfo->signtime_onaf_customer_account4 . ' · ' . $accountinfo->ip_onaf_customer_account ?></td>
            </tr>

            <?php
            if ($customerinfo->id_account == 2) {

                $accountinfo = getSaoCustomerInfo($_GET['id_customer']);
                $saocustomerinfo = getSaoCustomerInfo($_GET['id_customer']);
                ?>
                <tr>
                    <td colspan="2">
                        <div class=" pmi-panel-heading page-tittle">

                            <h3><center> Secondary Customer Account Information</center></h3>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th align="right">Peffix</th>
                    <td align="left"><?php echo getPrefixById($saocustomerinfo->id_prefix); ?></td>
                </tr>
                <tr>
                    <th align="right">First Name</th>
                    <td align="left"><?php echo $saocustomerinfo->first_name_onaf_customer; ?></td>
                </tr>
                <tr>
                    <th align="right">Middle Name</th>
                    <td align="left"><?php echo $saocustomerinfo->middle_name_customer; ?></td>
                </tr>
                <tr>
                    <th align="right">Last Name</th>
                    <td align="left"><?php echo $saocustomerinfo->last_name_customer; ?></td>
                </tr>
                <tr>
                    <th align="right">Suffix</th>
                    <td align="left"><?php echo getSuffixById($saocustomerinfo->id_suffix); ?></td>
                </tr>
                <!-- TODO phone number -->
                <tr>
                    <th align="right"> Phone Number</th>
                    <td align="left"><?php echo getTypePhoneById($saocustomerinfo->id_type_phone_number) . " " . $saocustomerinfo->phone_number_customer . " " . $saocustomerinfo->phone_number_customer_ext; ?></td>
                </tr>
                <?php
                if (isset($saocustomerinfo->id_type_secondary_phone_number) && $saocustomerinfo->secondary_phone_number_customer != '') {
                    ?>
                    <tr>
                        <th align="right"> Secondary Phone Number</th>
                        <td align="left"><?php echo getTypePhoneById($saocustomerinfo->id_type_secondary_phone_number) . " " . $saocustomerinfo->secondary_phone_number_customer . " " . $saocustomerinfo->secondary_phone_number_customer_ext; ?></td>
                    </tr>
                    <?php
                }
                ?>

                <!-- citizenship & residency status -->
                <tr>
                    <th align="right">Country of Citizenship</th>
                    <td align="left"><?php echo getCountryById($saocustomerinfo->id_country); ?></td>
                </tr>
                <tr>
                    <th align="right">Country of Residency</th>
                    <td align="left"><?php
                        if ($saocustomerinfo->id_country_recidency == NULL) {
                            echo getCountryById($saocustomerinfo->id_country);
                        } else {
                            echo getCountryById($saocustomerinfo->id_country_recidency);
                        }
                        ?></td>
                </tr>
                <!-- end citizenship & residency status -->
                <!-- Account Owner -->
                <tr>
                    <th align="right">Date of Birth</th>
                    <td align="left"><?php echo $saocustomerinfo->datebirth_onaf_customer_account; ?></td>
                </tr>
                <tr>
                    <th align="right">Primary ID</th>
                    <td align="left"><?php echo $saocustomerinfo->primaryid_onaf_customer_account; ?></td>
                </tr>
                <!-- end Account Owner -->
                <!-- Secondary id -->
                <tr>
                    <th align="right">Type of ID</th>
                    <td align="left"><?php echo getTypeIDById($saocustomerinfo->idtype_id_onaf_customer_account); ?></td>
                </tr>
                <tr>
                    <th align="right">ID Number</th>
                    <td align="left"><?php echo $saocustomerinfo->secondayid_onaf_customer_account; ?></td>
                </tr>
                <tr>
                    <th align="right">Expiry Date</th>
                    <td align="left"><?php echo $saocustomerinfo->expirydate_secondaryid_onaf_customer_account; ?></td>
                </tr>
                <!-- end Secondary id -->
                <!-- security question -->      

                <?php if (isset($saocustomerinfo->sanswer_question1_onaf_customer_account) && $saocustomerinfo->sanswer_question1_onaf_customer_account != '') { ?>
                    <tr>
                        <th align="right"><?php echo getSecurityQuestionsById($saocustomerinfo->idsecurity_question1_onaf_customer_account); ?></th>
                        <td align="left"><?php echo $saocustomerinfo->sanswer_question1_onaf_customer_account; ?></td>
                    </tr>
                    <?php
                }
                if (isset($saocustomerinfo->sanswer_question2_onaf_customer_account) && $saocustomerinfo->sanswer_question2_onaf_customer_account != '') {
                    ?>
                    <tr>
                        <th align="left"><?php echo getSecurityQuestionsById($saocustomerinfo->idsecurity_question2_onaf_customer_account); ?></th>
                        <td align="left"><?php echo $saocustomerinfo->sanswer_question2_onaf_customer_account; ?></td>
                    </tr>
                <?php } ?>
                <!-- end security question -->
                <!-- home address -->
                <tr>
                    <th align="right">Country</th>
                    <td align="left"><?php echo getCountryById($saocustomerinfo->id_country); ?></td>
                </tr>
                <tr>
                    <th align="right">Street Address </th>
                    <td align="left"><?php echo $saocustomerinfo->home_address_customer; ?></td>
                </tr>
                <tr>
                    <th align="right">Street Address 1</th>
                    <td align="left"><?php echo $saocustomerinfo->home_address2_customer; ?></td>
                </tr>
                <tr>
                    <th align="right">City</th>
                    <td align="left"><?php echo $saocustomerinfo->city_onaf_customer; ?></td>
                </tr>
                <tr>
                    <th align="right">State / Province</th>
                    <td align="left"><?php echo getStateById($saocustomerinfo->id_state); ?></td>
                </tr>
                <tr>
                    <th align="right">Zip / Postal Code</th>
                    <td align="left"><?php echo $saocustomerinfo->zipcode_onaf_customer; ?></td>
                </tr>
                <?php if (isset($saocustomerinfo->secondary_home_address_customer) && $saocustomerinfo->secondary_home_address_customer != '') { ?>
                    <tr>
                        <th align="right">&nbsp;</th>
                        <td align="left"> <span class="different-mailing">Mailing Address</span> </td>
                    </tr>
                    <tr>
                        <th align="right">Country</th>
                        <td align="left"><?php echo getCountryById($saocustomerinfo->id_country); ?></td>
                    </tr>
                    <tr>
                        <th align="right">Secondary Street Address  </th>
                        <td align="left"><?php echo $saocustomerinfo->secondary_home_address_customer; ?></td>
                    </tr>
                    <tr>
                        <th align="right">Secondary Street Address 2 </th>
                        <td align="left"><?php echo $saocustomerinfo->secondary_home_address2_customer; ?></td>
                    </tr>
                    <tr>
                        <th align="right">City</th>
                        <td align="left"><?php echo $saocustomerinfo->secondary_city_onaf_customer; ?></td>
                    </tr>
                    <tr>
                        <th align="right">State / Province</th>
                        <td align="left"><?php echo getStateById($saocustomerinfo->secondary_id_state); ?></td>
                    </tr>
                    <tr>
                        <th align="right">Zip / Postal Code</th>
                        <td align="left"><?php echo $saocustomerinfo->secondary_zipcode_onaf_customer; ?></td>
                    </tr>
                <?php } ?>
                <!-- end home address -->
                <!-- Employment Information -->
                <tr>
                    <th align="right">>Employment Information</th>
                    <td align="left"> <?php echo getEmploymentById($saocustomerinfo->id_employment_onaf_customer_account); ?></td>
                </tr>
                <?php if ($saocustomerinfo->id_employment_onaf_customer_account == 1 || $saocustomerinfo->id_employment_onaf_customer_account == 4) { ?>
                    <tr>
                        <th align="right">Business / Employer Name</th>
                        <td align="left"><?php echo $saocustomerinfo->businessemployer_onaf_customer_account; ?></td>
                    </tr>
                    <tr>
                        <th align="right">Country</th>
                        <td align="left"><?php echo getCountryById($saocustomerinfo->businesscountryaddress_onaf_customer_account); ?></td>
                    </tr>
                    <tr>
                        <th align="right">Street Address 1</th>
                        <td align="left"><?php echo $saocustomerinfo->businessAddress1_onaf_customer_account; ?></td>
                    </tr>
                    <tr>
                        <th align="right">Street Address 2</th>
                        <td align="left"><?php echo $saocustomerinfo->businessAddress2_onaf_customer_account; ?></td>
                    </tr>
                    <tr>
                        <th align="right">City</th>
                        <td align="left"><?php echo $saocustomerinfo->businesscityaddress_onaf_customer_account; ?></td>
                    </tr>
                    <tr>
                        <th align="right">State / Province</th>
                        <td align="left"><?php echo getStateById($saocustomerinfo->businessstateaddress_onaf_customer_account); ?></td>
                    </tr>
                    <tr>
                        <th align="right">Zip / Postal Code</th>
                        <td align="left"><?php echo $saocustomerinfo->businesszipcode_onaf_customer_account; ?></td>
                    </tr>
                    <!-- TODO phone number -->
                <?php } ?>
                <!-- end Employment Information -->
                <!-- Financial Information -->
                <tr>
                    <th align="right">Approximate Annual Income</th>
                    <td align="left"><?php echo getFinantialInfoById($saocustomerinfo->income_onaf_customer_account); ?></td>
                </tr>
                <tr>
                    <th align="right">Approximate Net Worth</th>
                    <td align="left"><?php echo getFinantialInfoById($saocustomerinfo->networth_onaf_customer_account); ?></td>
                </tr>
                <tr>
                    <th align="right">Approximate Liquid Net Worth</th>
                    <td align="left"><?php echo getFinantialInfoById($saocustomerinfo->liquidnetworth_onaf_customer_account); ?></td>
                </tr>
                <!-- end Financial Information -->
                <!-- Sources of funds -->
                <tr>
                    <th align="right">Savings</th>
                    <td align="left">
                        <?php
                        if ($saocustomerinfo->sourcefunds1_onaf_customer_account == 'savings') {
                            echo 'Yes';
                        } else {
                            echo 'No';
                        }
                        ?>
                    </td>
                </tr>
                <?php if (isset($saocustomerinfo->sourcefunds2_onaf_customer_account) && $saocustomerinfo->sourcefunds2_onaf_customer_account != '') { ?>
                    <tr>
                        <th align="right">Other</th>
                        <td align="left"><?php echo $saocustomerinfo->describesourcefunds_onaf_customer_account; ?></td>
                    </tr>
                <?php } ?>
                <!-- end Sources of Funds -->    
                <!-- Investment Experience -->

                <?php
                if ($saocustomerinfo->idinvestmentexperience_onaf_customer_account != '') {
                    ?> 
                    <tr>
                        <th align="right"> · </th> 
                        <td align="left"> <?php echo getInvestmentExpById($saocustomerinfo->idinvestmentexperience_onaf_customer_account); ?> </td>
                    </tr>
                <?php } ?>
                <?php
                if ($saocustomerinfo->idinvestmentexperience2_onaf_customer_account != '') {
                    ?> 
                    <tr>
                        <th align="right"> · </th> 
                        <td align="left"> <?php echo getInvestmentExpById($saocustomerinfo->idinvestmentexperience2_onaf_customer_account); ?> </td>
                    </tr>
                <?php } ?>
                <?php
                if ($saocustomerinfo->idinvestmentexperience3_onaf_customer_account != '') {
                    ?> 
                    <tr>
                        <th align="right"> · </th> 
                        <td align="left"> <?php echo getInvestmentExpById($saocustomerinfo->idinvestmentexperience3_onaf_customer_account); ?> </td>
                    </tr>
                <?php } ?>
                <?php
                if ($saocustomerinfo->idinvestmentexperience4_onaf_customer_account != '') {
                    ?> 
                    <tr>
                        <th align="right"> · </th> 
                        <td align="left"> <?php echo getInvestmentExpById($saocustomerinfo->idinvestmentexperience4_onaf_customer_account); ?> </td>
                    </tr>
                <?php } ?>
                <?php
                if ($saocustomerinfo->idinvestmentexperience5_onaf_customer_account != '') {
                    ?> 
                    <tr>
                        <th align="right"> · </th> 
                        <td align="left"> <?php echo getInvestmentExpById($saocustomerinfo->idinvestmentexperience5_onaf_customer_account); ?> </td>
                    </tr>
                <?php } ?>
                <?php
                if ($saocustomerinfo->idinvestmentexperience6_onaf_customer_account != '') {
                    ?> 
                    <tr>
                        <th align="right"> · </th> 
                        <td align="left"> <?php echo getInvestmentExpById($saocustomerinfo->idinvestmentexperience6_onaf_customer_account); ?> </td>
                    </tr>
                <?php } ?>
                <!-- end Investment Experience -->
                <!-- Personal Affiliations 1 -->
                <tr>
                    <th align="right"> Personal Affiliations 1 </th> 
                    <td align="left"> <?php echo $saocustomerinfo->pa1_onaf_customer_account; ?></td>
                </tr>
                <?php if ($saocustomerinfo->pa1_onaf_customer_account != 'no') { ?>
                    <tr>
                        <th align="right">Business / Employer Name</th>
                        <td align="left"><?php echo $saocustomerinfo->pa1businessEmployer_onaf_customer_account; ?></td>
                    </tr>
                    <tr>
                        <th align="right">Country</th>
                        <td align="left"><?php echo getCountryById($saocustomerinfo->idpa1businesscountryaddress_onaf_customer_account); ?></td>
                    </tr>
                    <tr>
                        <th align="right">Street Address 1</th>
                        <td align="left"><?php echo $saocustomerinfo->pa1businessAddress1_onaf_customer_account; ?></td>
                    </tr>
                    <?php if ($saocustomerinfo->pa1businessAddress2_onaf_customer_account != '') { ?>
                        <tr>
                            <th align="right">Street Address 2</th>
                            <td align="left"><?php echo $saocustomerinfo->pa1businessAddress2_onaf_customer_account; ?></td>
                        </tr>
                    <?php }; ?>
                    <tr>
                        <th align="right">City</th>
                        <td align="left"><?php echo $saocustomerinfo->pa1businessCityAddress_onaf_customer_account; ?></td>
                    </tr>
                    <tr>
                        <th align="right">State / Province</th>
                        <td align="left"><?php echo getStateById($saocustomerinfo->idpa1businessstateaddress_onaf_customer_account); ?></td>
                    </tr>
                    <tr>
                        <th align="right">Zip / Postal Code</th>
                        <td align="left"><?php echo $saocustomerinfo->pa1businesszipcode_onaf_customer_account; ?></td>
                    </tr>
                <?php } ?>
                <!-- end Personal Affiliations 1 -->
                <!-- Personal Affiliations 2 -->
                <tr>
                    <th align="right">Personal Affiliations 2</th>
                    <td align="left"> <?php echo $saocustomerinfo->pa2_onaf_customer_account; ?></td>
                </tr>
                <?php if ($saocustomerinfo->pa2_onaf_customer_account != 'no') { ?>
                    <tr>
                        <th align="right">Senior Political Figure Name</th>
                        <td align="left"><?php echo $saocustomerinfo->pa2politicalfigure_onaf_customer_account; ?></td>
                    </tr>
                    <tr>
                        <th align="right">Political Title</th>
                        <td align="left"><?php echo $saocustomerinfo->pa2politicaltittle_onaf_customer_account; ?></td>
                    </tr>
                    <tr>
                        <th align="right">Country Where Title is Held</th>
                        <td align="left"><?php echo getCountryById($saocustomerinfo->idpa2CountryAddress_onaf_customer_account); ?></td>
                    </tr>
                    <tr>
                        <th align="right">Relationship to Account Owner</th>
                        <td align="left"><?php echo $saocustomerinfo->pa2Relationship_onaf_customer_account; ?></td>
                    </tr>
                <?php } ?>
                <!-- end Personal Affiliations 2 -->
                <!-- Personal Affiliations 3 -->
                <tr>
                    <th align="right">Personal Affiliations 3</th>
                    <td align="left"><?php echo $saocustomerinfo->pa3_onaf_customer_account; ?></td>
                </tr>
                <?php if ($saocustomerinfo->pa3_onaf_customer_account != 'no') { ?>
                    <tr>
                        <th align="right">Company Ticker</th>
                        <td align="left"><?php echo $saocustomerinfo->pa3CompanyTicker_onaf_customer_account; ?></td>
                    </tr>
                    <tr>
                        <th align="right">Country</th>
                        <td align="left"><?php echo getCountryById($saocustomerinfo->idpa3CountryAddress_onaf_customer_account); ?></td>
                    </tr>
                <?php } ?>
                <!-- end Personal Affiliations 3 -->
                <tr>
                    <th align="right">Signature - Review</th>
                    <td align="left"><?php echo $saocustomerinfo->reviewsign_officerbroker_onaf_customer_account; ?></td>
                </tr>
                <tr>
                    <th  align="right">Date &amp; NY Time · IP Address</th>
                    <td align="left"><?php echo $saocustomerinfo->reviewsigntime_onaf_customer_account . ' · ' . $accountinfo->ip_onaf_customer_account ?></td>
                </tr>
                <tr>
                    <th  align="right">Secondary Signature - Docs</th>
                    <td align="left"><?php echo $saocustomerinfo->saoprimary_officer_onaf_customer_account4; ?></td>
                </tr>    
                <th  align="right">Date &amp; NY Time · IP Address</th>
                <td align="left"><?php echo $saocustomerinfo->saosigntime_onaf_customer_account4 . ' · ' . $accountinfo->ip_onaf_customer_account ?></td>
                <!-- end first sign -->
                <?php
            }
            ?>
        </table>
        <?php
    }
}



if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id_acknow'])) {

        $customerinfo = getAcknowlegementsInfo($_GET['id_acknow']);
        ?>

        <style type="text/css">
            #table_live_process th{
                text-align: right;
                padding-right: 15px;
            }
        </style>

        <table width="100%" id="table_live_process" border="0" cellpadding="0" cellspacing="6">
            <tr>
                <td colspan="2">
                    <div class=" pmi-panel-heading page-tittle">

                        <h3><center> Customer Acknowlegement Form</center></h3>
                    </div>
                </td>
            </tr>
            <tr>
                <th align="right">Peffix</th>
                <td align="left"><?php echo getPrefixById($customerinfo->id_prefix_cust_acknow) ?></td>
            </tr>
            <tr>
                <th align="right">First Name</th>
                <td align="left"><?php echo $customerinfo->first_name_cust_acknow ?></td>
            </tr>
            <tr>
                <th align="right">Middle Name</th>
                <td align="left"><?php echo $customerinfo->middle_name_cust_acknow ?></td>
            </tr>
            <tr>
                <th align="right">Last Name</th>
                <td align="left"><?php echo $customerinfo->last_name_cust_acknow ?></td>
            </tr>
            <tr>
                <th align="right" width="50%">Email Address</th>
                <td align="left" width="50%"><?php echo $customerinfo->email_cust_acknow; ?></td>
            </tr>

            <tr>
                <th align="right">Country</th>
                <td align="left"><?php echo getCountryById($customerinfo->id_country_cust_acknow); ?></td>
            </tr>
            <tr>
                <th align="right">State / Province</th>
                <td align="left"><?php echo getStateById($customerinfo->id_state_cust_acknow); ?></td>
            </tr>
            <tr>
                <th align="right">Street Address 1</th>
                <td align="left"><?php echo $customerinfo->street_address_cust_acknow; ?></td>
            </tr>
            <tr>
                <th align="right">Street Address2 </th>
                <td align="left"><?php echo $customerinfo->secondary_street_address_cust_acknow; ?></td>
            </tr>
            <tr>
                <th align="right">City</th>
                <td align="left"><?php echo $customerinfo->city_cust_acknow; ?></td>
            </tr>
            <tr>
                <th align="right">Zip / Postal Code</th>
                <td align="left"><?php echo $customerinfo->zip_code_cust_acknow; ?></td>
            </tr>
            <tr>
                <th align="right">Home Phone Number</th>
                <td align="left"><?php echo '<b>Home</b>  ' . $customerinfo->home_phone_cust_acknow; ?></td>
            </tr>
            <?php
            if (isset($customerinfo->mobile_phone_cust_acknow) && $customerinfo->mobile_phone_cust_acknow != '') {
                ?>
                <tr>
                    <th align="right">Mobile Phone Number</th>
                    <td align="left"><?php echo '<b>Mobile </b>  ' . $customerinfo->mobile_phone_cust_acknow; ?></td>
                </tr>
                <?php
            }
            ?>
            <?php
            if (isset($customerinfo->business_phone_cust_acknow) && $customerinfo->business_phone_cust_acknow != '') {
                ?>
                <tr>
                    <th align="right">Business Phone Number</th>
                    <td align="left"><?php echo '<b> Work </b>  ' . $customerinfo->business_phone_cust_acknow; ?></td>
                </tr>
                <?php
            }
            ?>
            <tr>
                <th align="right">Reffered By</th>
                <td align="left"><?php echo $customerinfo->referred_cust_acknow; ?></td>
            </tr>

        </table>
        <?php
    }
}
?>