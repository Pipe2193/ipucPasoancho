<?php

/**
 * stores all the querys for the system
 *
 * @author PMI development <bpo@pmilimited.com>
 * @package ONAF
 * @subpackage queries
 * @version 1.0.0
 */

/**
 * 
 * @return type
 * @throws PDOException
 */
function getWelcomeInfo($id_customer) {
    try {
        $sql = 'SELECT * '
                . 'FROM welcome_onaf '
                . 'WHERE id_onaf_customer=:id_customer';
        $params = array(
            ':id_customer' => $id_customer,
        );
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute($params);
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return (count($answer) > 0 ) ? $answer[0] : FALSE;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

function getSaoCustomerInfo($id_customer) {
    try {

        $sql = 'SELECT * '
                . ' FROM onaf_customer_sao '
                . ' WHERE id_onaf_customer=:idcustomer';
        $params = array(
            ':idcustomer' => $id_customer,
        );
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute($params);
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return $answer[0];
    } catch (PDOException $exc) {
        throw $exc;
    }
}

/**
 * 
 * @param type $id_customer
 * @param type $account
 * @return type
 * @throws PDOException
 */
function getAccountInfo($id_customer, $account) {
    try {

        $sql = 'SELECT * '
                . ' FROM ' . accountDispatcher($account)
                . ' WHERE id_onaf_customer=:id_customer';
        $params = array(
            ':id_customer' => $id_customer,
        );
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute($params);
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return (count($answer) > 0 ) ? $answer[0] : FALSE;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

/**
 * 
 * @param type $email
 * @return type
 * @throws PDOException
 */
function verifyEmail($email) {
    try {
        $sql = 'SELECT email_onaf_customer'
                . ' FROM onaf_customer '
                . ' WHERE email_onaf_customer=:email';
        $params = array(
            ':email' => $email,
        );
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute($params);
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return (count($answer) > 0 ) ? TRUE : FALSE;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

function ExistingClient($email) {
    try {
        $sql = 'SELECT email_onaf_customer'
                . ' FROM onaf_customer '
                . ' WHERE email_onaf_customer=:email';
        $params = array(
            ':email' => $email,
        );
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute($params);
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return (count($answer) > 0 ) ? TRUE : FALSE;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

/**
 * 
 * @param type $id
 * @return type
 * @throws PDOException
 */
function verifyDealer($id) {
    try {
        $sql = "SELECT id_dealer FROM dealer WHERE id_dealer=:id";
        $params = array(
            ':id' => $id,
        );
        $answer = $GLOBALS['instanceDealer']->prepare($sql);
        $answer->execute($params);
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return (count($answer) > 0 ) ? $answer[0]->id_dealer : FALSE;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

/**
 * 
 * @param type $id
 * @return type
 * @throws PDOException
 */
function getDealerName($id) {
    try {
        $sql = "SELECT id_dealer, dealer_name FROM dealer WHERE id_dealer=:id";
        $params = array(
            ':id' => $id,
        );
        $answer = $GLOBALS['instanceDealer']->prepare($sql);
        $answer->execute($params);
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return (count($answer) > 0 ) ? $answer[0]->dealer_name : FALSE;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

/**
 * 
 * @param type $id
 * @return type
 * @throws PDOException
 */
function getDealerAccron($id) {
    try {
        $sql = "SELECT id_dealer, dealer_accron FROM dealer WHERE id_dealer=:id";
        $params = array(
            ':id' => $id,
        );
        $answer = $GLOBALS['instanceDealer']->prepare($sql);
        $answer->execute($params);
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return (count($answer) > 0 ) ? $answer[0]->dealer_accron : FALSE;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

/**
 * 
 * @param type $id
 * @return type
 * @throws PDOException
 */
function getDealerHash($id) {
    try {
        $sql = "SELECT id_dealer, hashed FROM hash WHERE id_dealer=:id";
        $params = array(
            ':id' => $id,
        );
        $answer = $GLOBALS['instanceDealer']->prepare($sql);
        $answer->execute($params);
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return (count($answer) > 0 ) ? $answer[0]->hashed : FALSE;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

/**
 * 
 * @return type
 * @throws PDOException
 */
function getAdminUsers() {
    try {
        $sql = 'SELECT id, user_name '
                . 'FROM user_onaf';
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute();
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return $answer;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

/**
 * 
 * @return type
 * @throws PDOException
 */
function getUser($username) {
    try {
        $sql = 'SELECT id, user_name, password as pass '
                . 'FROM user_onaf '
                . 'WHERE id=:username';
        $params = array(
            ':username' => $username,
        );
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute($params);
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return (count($answer) > 0 ) ? $answer[0] : FALSE;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

/**
 * 
 * @return type
 * @throws PDOException
 */
function getCustomerInfo($id_customer) {
    try {
        $sql = 'SELECT * '
                . 'FROM onaf_customer '
                . 'WHERE id_onaf_customer=:id_customer';
        $params = array(
            ':id_customer' => $id_customer,
        );
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute($params);
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return (count($answer) > 0 ) ? $answer[0] : FALSE;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

/**
 * 
 * @return type
 * @throws PDOException
 */
function getAcknowlegementsInfo($id_acknow) {
    try {
        $sql = 'SELECT * '
                . 'FROM dealers_cust_acknow '
                . 'WHERE iddealers_cust_acknow=:id_acknow';
        $params = array(
            ':id_acknow' => $id_acknow,
        );
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute($params);
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return (count($answer) > 0 ) ? $answer[0] : FALSE;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

/**
 * 
 * @return type
 * @throws PDOException
 */
function getProfileInfo($id_customer) {
    try {
        $sql = 'SELECT * '
                . 'FROM profile_onaf '
                . 'WHERE id_onaf_customer=:id_customer';
        $params = array(
            ':id_customer' => $id_customer,
        );
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute($params);
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return (count($answer) > 0 ) ? $answer[0] : FALSE;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

/**
 * 
 * @param type $dealer_code
 * @return type
 * @throws PDOException
 */
function getDealerEmail($dealer_code) {
    try {
        $sql = "SELECT id_dealer, dealer_email FROM dealer WHERE id_dealer=:id";
        $params = array(
            ':id' => $dealer_code,
        );
        $answer = $GLOBALS['instanceDealer']->prepare($sql);
        $answer->execute($params);
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return (count($answer) > 0 ) ? $answer[0]->dealer_email : FALSE;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

/**
 * 
 * @return type
 * @throws PDOException
 */
function deleteAccount($id_customer, $account) {
    try {
        $sql = 'DELETE '
                . 'FROM ' . deleteAccountDispatcher($account) . ' '
                . 'WHERE id_onaf_customer=:id_customer';
        $params = array(
            ':id_customer' => $id_customer,
        );
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute($params);
        return TRUE;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

/**
 * 
 * @return type
 * @throws PDOException
 */
function deleteCustomer($id_customer) {
    try {
        $sql = 'DELETE '
                . 'FROM onaf_customer '
                . 'WHERE id_onaf_customer=:id_customer';
        $params = array(
            ':id_customer' => $id_customer,
        );
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute($params);
        return TRUE;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

/**
 * 
 * @return type
 * @throws PDOException
 */
function deleteRobotCustomer($id_customer) {
    try {
        $sql = 'DELETE '
                . 'FROM robot_onaf '
                . 'WHERE id_onaf_customer=:id_customer';
        $params = array(
            ':id_customer' => $id_customer,
        );
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute($params);
        return TRUE;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

/**
 * 
 * @return type
 * @throws PDOException
 */
function deleteRecoveryCustomer($id_customer) {
    try {
        $sql = 'DELETE '
                . 'FROM recovery_onaf '
                . 'WHERE id_onaf_customer=:id_customer';
        $params = array(
            ':id_customer' => $id_customer,
        );
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute($params);
        return TRUE;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

/**
 * 
 * @return type
 * @throws PDOException
 */
function deleteCustomerAccount($id_customer, $id_account) {
    deleteCustomer($id_customer);
    if (!empty($id_account)) {
        deleteAccount($id_customer, $id_account);
    }
    deleteRobotCustomer($id_customer);
    deleteRecoveryCustomer($id_customer);
    if ($id_account == 2) {
        deleteAccount($id_customer, 4);
    }
}

/**
 * 
 * @return type
 * @throws PDOException
 */
function getStageRobot($id_customer_process) {
    try {
        $sql = 'SELECT id_onaf_customer, stage_robot_onaf AS stage, session_robot_onaf AS section '
                . 'FROM robot_onaf '
                . 'WHERE id_onaf_customer=:id_customer_process';
        $params = array(
            ':id_customer_process' => $id_customer_process,
        );
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute($params);
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return (count($answer) > 0 ) ? $answer[0] : FALSE;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

/**
 * 
 * @return type
 * @throws PDOException
 */
function getAccounts() {
    try {
        $sql = 'SELECT id_account, account_name, account_description '
                . 'FROM account';
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute();
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return $answer;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

function setSessionStage($session, $id_customer) {
    try {
        $sql = "UPDATE robot_onaf "
                . "SET 	session_robot_onaf=:session "
                . "WHERE id_onaf_customer=:id_customer ";
        $params = array(
            ':session' => $session,
            ':id_customer' => $id_customer
        );
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute($params);
        return true;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

/**
 * 
 * @return type
 * @throws PDOException
 */
function getPrefix() {
    try {
        $sql = 'SELECT id_prefix, prefix '
                . 'FROM prefix';
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute();
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return $answer;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

/**
 * 
 * @param type $type
 * @return type
 * @throws PDOException
 */
function getFinantialInfo($type) {
    try {
        $sql = 'SELECT id_finantial_info, description_finantial_id, type_finantial_info '
                . 'FROM finantial_info_onaf '
                . 'WHERE type_finantial_info=:type';
        $params = array(
            ':type' => $type,
        );
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute($params);
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return $answer;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

/**
 * 
 * @return type
 * @throws PDOException
 */
function getSuffix() {
    try {
        $sql = 'SELECT id_suffix, suffix '
                . 'FROM suffix';
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute();
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return $answer;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

/**
 * 
 * @return type
 * @throws PDOException
 */
function getTypeID() {
    try {
        $sql = 'SELECT id_type_id, description_type_id '
                . 'FROM type_id_onaf';
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute();
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return $answer;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

/**
 * 
 * @param type $type
 * @return type
 * @throws PDOException
 */
function getSecurityQuestions($type) {
    try {
        $sql = 'SELECT 	idsecurity_questions_onaf, security_questions_onaf, type_security_questions_onaf '
                . 'FROM security_questions_onaf '
                . 'WHERE type_security_questions_onaf=:type';
        $params = array(
            ':type' => $type,
        );
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute($params);
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return $answer;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

function getEmploymentStatus() {
    try {
        $sql = 'SELECT id_employment, employment_description '
                . 'FROM employment_onaf';
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute();
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return $answer;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

/**
 * 
 * @return type
 * @throws PDOException
 */
function getPhonetype() {
    try {
        $sql = 'SELECT id_type_phone, type_phone '
                . 'FROM type_phone';
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute();
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return $answer;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

/**
 * 
 * @return type
 * @throws PDOException
 */
function getAllCountries() {
    try {
        $sql = 'SELECT id_country, country_code, country_name '
                . 'FROM country';
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute();
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return $answer;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

function getAllStatesByCountry($idCountry) {
    try {
        $sql = 'SELECT id_state, state_name, id_country '
                . 'FROM state '
                . 'WHERE id_country=:country';
        $params = array(
            ':country' => $idCountry,
        );
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute($params);
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return $answer;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

/**
 * 
 * @param type $idState
 * @return type
 * @throws PDOException
 */
function getAllCitiesByState($idState) {
    try {
        $sql = 'SELECT id_city, city_name, id_state '
                . 'FROM city '
                . 'WHERE id_state=:state';
        $params = array(
            ':state' => $idState,
        );
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute($params);
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return $answer;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

function getCountryById($idCountry) {
    try {
        $sql = 'SELECT id_country, country_code, country_name '
                . 'FROM country '
                . 'WHERE id_country=:id';
        $params = array(
            ':id' => $idCountry,
        );
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute($params);

        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return (count($answer) > 0 ) ? $answer[0]->country_name : FALSE;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

/**
 * 
 * @param type $id_customer
 * @return type
 * @throws PDOException
 */
function getCustomerAccount($id_customer) {
    try {
        $sql = "SELECT id_onaf_customer, id_account  FROM  onaf_customer "
                . "WHERE id_onaf_customer=:id_customer ";
        $params = array(
            ':id_customer' => $id_customer
        );
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute($params);
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return (count($answer) > 0 ) ? $answer[0]->id_account : FALSE;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

/**
 * 
 * @param type $id_customer
 * @return type
 * @throws PDOException
 */
function getSecondaryCustomerAccount($id_customer) {
    try {
        $sql = "SELECT id_onaf_customer, id_secondary_account  FROM  onaf_customer "
                . "WHERE id_onaf_customer=:id_customer ";
        $params = array(
            ':id_customer' => $id_customer
        );
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute($params);
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return (count($answer) > 0 ) ? $answer[0]->id_account : FALSE;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

function getCustomerToken($id_customer) {
    try {
        $sql = "SELECT id_onaf_customer, token_recovery_onaf  FROM  recovery_onaf "
                . "WHERE id_onaf_customer=:id_customer ";
        $params = array(
            ':id_customer' => $id_customer
        );
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute($params);
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return (count($answer) > 0 ) ? $answer[0]->token_recovery_onaf : FALSE;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

function getCustomerDealer($id_customer) {
    try {
        $sql = "SELECT id_onaf_customer, dealer_code_customer "
                . "FROM  onaf_customer "
                . "WHERE id_onaf_customer=:id_customer ";
        $params = array(
            ':id_customer' => $id_customer
        );
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute($params);
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return (count($answer) > 0 ) ? $answer[0]->dealer_code_customer : FALSE;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

function getAccountById($id_Account) {
    try {
        $sql = 'SELECT id_account, account_name '
                . 'FROM account_onaf '
                . 'WHERE id_account=:id';
        $params = array(
            ':id' => $id_Account,
        );
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute($params);
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return (count($answer) > 0 ) ? $answer[0]->account_name : FALSE;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

function getPrefixById($id_Prefix) {
    try {
        $sql = 'SELECT id_prefix, prefix '
                . 'FROM prefix '
                . 'WHERE id_prefix=:id';
        $params = array(
            ':id' => $id_Prefix,
        );
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute($params);
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return (count($answer) > 0 ) ? $answer[0]->prefix : FALSE;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

function getSuffixById($id_suffix) {
    try {
        $sql = 'SELECT id_suffix, suffix '
                . 'FROM suffix '
                . 'WHERE id_suffix=:id';
        $params = array(
            ':id' => $id_suffix,
        );
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute($params);
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return (count($answer) > 0 ) ? $answer[0]->suffix : FALSE;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

function getTypePhoneById($id_type_phone) {
    try {
        $sql = 'SELECT id_type_phone, type_phone '
                . 'FROM type_phone '
                . 'WHERE id_type_phone=:id';
        $params = array(
            ':id' => $id_type_phone,
        );
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute($params);
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return (count($answer) > 0 ) ? $answer[0]->type_phone : FALSE;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

function getTypeIDById($id_type_id) {
    try {
        $sql = 'SELECT id_type_id, description_type_id '
                . 'FROM type_id_onaf '
                . 'WHERE id_type_id=:id ';
        $params = array(
            ':id' => $id_type_id,
        );
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute($params);
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return (count($answer) > 0 ) ? $answer[0]->description_type_id : FALSE;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

function getSecurityQuestionsById($idsecurity_questions_onaf) {
    try {
        $sql = 'SELECT idsecurity_questions_onaf, security_questions_onaf '
                . 'FROM security_questions_onaf '
                . 'WHERE idsecurity_questions_onaf=:id';
        $params = array(
            ':id' => $idsecurity_questions_onaf,
        );
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute($params);
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return (count($answer) > 0 ) ? $answer[0]->security_questions_onaf : FALSE;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

function getStateById($id_state) {
    try {
        $sql = 'SELECT id_state, state_name '
                . 'FROM state '
                . 'WHERE id_state=:id';
        $params = array(
            ':id' => $id_state,
        );
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute($params);
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return (count($answer) > 0 ) ? $answer[0]->state_name : FALSE;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

function getEmploymentById($id_employment) {
    try {
        $sql = 'SELECT id_employment, employment_description '
                . 'FROM employment_onaf '
                . 'WHERE id_employment=:id';
        $params = array(
            ':id' => $id_employment,
        );
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute($params);
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return (count($answer) > 0 ) ? $answer[0]->employment_description : FALSE;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

function getFinantialInfoById($id_finantial_info) {
    try {
        $sql = 'SELECT id_finantial_info, description_finantial_id '
                . 'FROM finantial_info_onaf '
                . 'WHERE id_finantial_info=:id';
        $params = array(
            ':id' => $id_finantial_info,
        );
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute($params);
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return (count($answer) > 0 ) ? $answer[0]->description_finantial_id : FALSE;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

function getInvestmentExpById($id_investment_experience_onaf) {
    try {
        $sql = 'SELECT id_investment_experience_onaf, description_investment_experience_onaf '
                . 'FROM investment_experience_onaf '
                . 'WHERE id_investment_experience_onaf=:id';
        $params = array(
            ':id' => $id_investment_experience_onaf,
        );
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute($params);
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return (count($answer) > 0 ) ? $answer[0]->description_investment_experience_onaf : FALSE;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

/**
 * 
 * @return type
 * @throws PDOException
 */
function getAllCustomers() {
    try {
        $sql = 'SELECT id_onaf_customer as id, dealer_code_customer as dealer, email_onaf_customer as email, first_name_onaf_customer as name, '
                . 'create_at as date, id_prefix as prefix, id_suffix as suffix, middle_name_customer as middle, '
                . 'last_name_customer as last_name,  id_type_phone_number, phone_number_customer as phone, '
                . 'phone_number_customer_ext as ext, pdf_path_customer as pdf, id_account as account, idstatus_onaf_customer as status, followup_status_onaf_customer as followup '
                . ' FROM onaf_customer';
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute();
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return $answer;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

/**
 * 
 * @return type
 * @throws PDOException
 */
function getAllAcknowlegements() {
    try {
        $sql = 'SELECT iddealers_cust_acknow as id, hash_cust_acknow as hash, id_prefix_cust_acknow as prefix, first_name_cust_acknow as name, '
                . 'middle_name_cust_acknow as middle_name, last_name_cust_acknow as last_name, email_cust_acknow as email, id_country_cust_acknow as country, '
                . 'id_state_cust_acknow as state,  street_address_cust_acknow as street_address, secondary_street_address_cust_acknow as secondary_street_address, '
                . 'city_cust_acknow as city, zip_code_cust_acknow as zip_code, home_phone_cust_acknow as home_phone, mobile_phone_cust_acknow as mobile_phone, business_phone_cust_acknow as business_phone, '
                . 'referred_cust_acknow as reffered, customer_sign_cust_acknow as sign,  customer_signtime_cust_acknow as signtime, idstatus_cust_acknow as status, followup_status_cust_acknow as followup '
                . ' FROM dealers_cust_acknow ';
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute();
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return $answer;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

/**
 * 
 * @param type $id_customer
 * @return type
 * @throws PDOException
 */
function getDealers() {
    try {
        $sql = "SELECT *  FROM  dealer, hash "
                . "WHERE dealer.id_dealer=hash.id_dealer";
        $answer = $GLOBALS['instanceDealer']->prepare($sql);
        $answer->execute();
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return $answer;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

/**
 * 
 * @param type $id_customer
 * @return type
 * @throws PDOException
 */
function getPMIApps() {
    try {
        $sql = "SELECT *  FROM  pmi_info ";
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute();
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return (count($answer) > 0 ) ? $answer : FALSE;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

/**
 * 
 * @return type
 * @throws PDOException
 */
function countUnfinishedCustomers() {
    try {
        $sql = 'SELECT COUNT(id_onaf_customer) AS customers, idstatus_onaf_customer '
                . ' FROM onaf_customer '
                . 'WHERE idstatus_onaf_customer=:status';
        $params = array(
            ':status' => 0,
        );
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute($params);
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return (count($answer) > 0 ) ? $answer[0]->customers : FALSE;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

/**
 * 
 * @return type
 * @throws PDOException
 */
function countUnfinishedAcknowlegements() {
    try {
        $sql = 'SELECT COUNT(iddealers_cust_acknow) AS acknowlegements, idstatus_cust_acknow '
                . ' FROM dealers_cust_acknow '
                . 'WHERE idstatus_cust_acknow=:status';
        $params = array(
            ':status' => 0,
        );
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute($params);
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return (count($answer) > 0 ) ? $answer[0]->acknowlegements : FALSE;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

/**
 * 
 * @return type
 * @throws PDOException
 */
function countAllCustomers() {
    try {
        $sql = 'SELECT COUNT(id_onaf_customer) AS customers '
                . ' FROM onaf_customer ';
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute();
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return (count($answer) > 0 ) ? $answer[0]->customers : FALSE;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

/**
 * 
 * @return type
 * @throws PDOException
 */
function countAllAcknowlegements() {
    try {
        $sql = 'SELECT COUNT(iddealers_cust_acknow) AS acknowlegements '
                . ' FROM dealers_cust_acknow ';
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute();
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return (count($answer) > 0 ) ? $answer[0]->acknowlegements : FALSE;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

function getAllInfoAccount($id_customer, $account) {
    try {

        $sql = 'SELECT * '
                . ' FROM ' . accountDispatcher($account) . ' '
                . ' WHERE id_onaf_customer=:idcustomer';
        $params = array(
            ':idcustomer' => $id_customer,
        );
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute($params);
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return $answer[0];
    } catch (PDOException $exc) {
        throw $exc;
    }
}

function getAllInfoSecondaryCustomer($id_customer) {
    try {

        $sql = 'SELECT * '
                . ' FROM onaf_customer_sao '
                . ' WHERE id_onaf_customer=:idcustomer';
        $params = array(
            ':idcustomer' => $id_customer,
        );
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute($params);
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return $answer[0];
    } catch (PDOException $exc) {
        throw $exc;
    }
}

/**
 * 
 * @param type $attibute
 * @param type $id_customer
 * @return boolean
 * @throws PDOException
 */
function getWelcomeStatus($id_customer) {
    try {
        $sql = 'SELECT * '
                . ' FROM welcome_onaf '
                . ' WHERE id_onaf_customer=:id_customer';
        $params = array(
            ':id_customer' => $id_customer,
        );
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute($params);
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return (count($answer) > 0 ) ? $answer[0]->status_welcome_onaf : FALSE;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

/**
 * 
 * @param type $attibute
 * @param type $id_customer
 * @return boolean
 * @throws PDOException
 */
function getProfileStatus($id_customer) {
    try {
        $sql = 'SELECT * '
                . ' FROM profile_onaf '
                . ' WHERE id_onaf_customer=:id_customer';
        $params = array(
            ':id_customer' => $id_customer,
        );
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute($params);
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return (count($answer) > 0 ) ? $answer[0]->status_profile_onaf : FALSE;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

function setProfileNotification($profile_id_customer, $date, $count_notifiications) {
    try {
        $sql = "INSERT INTO profile_notifications_onaf "
                . "( id_onaf_customer, date_profile_notifications, detail_profile_notifications) "
                . "VALUES (:id_customer, :date, :notifications)";
        $params = array(
            ':notifications' => $count_notifiications,
            ':date' => $date,
            ':id_customer' => $profile_id_customer
        );
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute($params);
        return true;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

function updateProfileNotification($profile_id_customer, $date, $count_notifiications) {
    try {
        $sql = "UPDATE profile_notifications_onaf "
                . "SET 	detail_profile_notifications=:notifications, date_profile_notifications=:date "
                . "WHERE id_onaf_customer=:id_customer ";
        $params = array(
            ':notifications' => $count_notifiications,
            ':date' => $date,
            ':id_customer' => $profile_id_customer
        );
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute($params);
        return true;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

/**
 * 
 * @param type $attibute
 * @param type $id_customer
 * @return boolean
 * @throws PDOException
 */
function findProfile($id_customer) {
    try {
        $sql = 'SELECT * '
                . ' FROM profile_notifications_onaf '
                . ' WHERE id_onaf_customer=:id_customer';
        $params = array(
            ':id_customer' => $id_customer,
        );
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute($params);
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return (count($answer) > 0 ) ? TRUE : FALSE;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

function getCustomerStatus($id_status) {
    try {
        $sql = 'SELECT * '
                . ' FROM status_onaf '
                . ' WHERE idstatus_onaf=:id_status';
        $params = array(
            ':id_status' => $id_status,
        );
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute($params);
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return (count($answer) > 0 ) ? $answer[0]->description_status_onaf : FALSE;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

function getNotificationProfile($id_customer) {
    try {
        $sql = 'SELECT * '
                . ' FROM profile_notifications_onaf '
                . ' WHERE id_onaf_customer=:id_customer';
        $params = array(
            ':id_customer' => $id_customer,
        );
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute($params);
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return (count($answer) > 0 ) ? $answer[0]->detail_profile_notifications : FALSE;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

/**
 * 
 * @param type $application_id
 * @return type
 * @throws PDOException
 */
function getPMIInfo($application_id) {
    try {
        $sql = "SELECT * "
                . "FROM pmi_info "
                . "WHERE idpmi_info=:app_id";
        $params = array(
            ':app_id' => $application_id,
        );
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute($params);
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return (count($answer) > 0 ) ? $answer[0] : FALSE;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

/**
 * 
 * @param type $id_customer
 * @return type
 * @throws PDOException
 */
function getCustomerHash($id_customer) {
    try {
        $sql = "SELECT token_recovery_onaf FROM recovery_onaf WHERE id_onaf_customer=:id";
        $params = array(
            ':id' => $id_customer,
        );
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute($params);
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return (count($answer) > 0 ) ? $answer[0]->token_recovery_onaf : FALSE;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

/**
 * 
 * @param type $dealer_code
 * @param type $dealer_name
 * @param type $dealer_accron
 * @param type $dealer_email
 * @return boolean
 * @throws PDOException
 */
function createDealer($dealer_code, $dealer_name, $dealer_accron, $dealer_email) {
    try {
        $sql = 'INSERT INTO dealer (id_dealer, dealer_name, dealer_accron, dealer_email) VALUES (:dealer_code, :dealer_name, :dealer_accron, :dealer_email)';
        $params = array(
            ':dealer_code' => $dealer_code,
            ':dealer_name' => $dealer_name,
            ':dealer_accron' => $dealer_accron,
            ':dealer_email' => $dealer_email
        );
        $answer = $GLOBALS['instanceDealer']->prepare($sql);
        $answer->execute($params);
        return true;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

/**
 * 
 * @param type $dealer_code
 * @param type $dealer_hash
 * @return boolean
 * @throws PDOException
 */
function createHashDealer($dealer_code, $dealer_hash) {
    try {
        $sql = 'INSERT INTO hash (id_dealer, hashed) VALUES (:dealer_code, :dealer_hash)';
        $params = array(
            ':dealer_code' => $dealer_code,
            ':dealer_hash' => $dealer_hash,
        );
        $answer = $GLOBALS['instanceDealer']->prepare($sql);
        $answer->execute($params);
        return true;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

/**
 * 
 * @param type $attibute
 * @param type $id_customer
 * @return boolean
 * @throws PDOException
 */
function update_email_dealer($dealer_email, $id_dealer) {
    try {
        $sql = "UPDATE dealer "
                . "SET dealer_email=:dealer_email "
                . "WHERE id_dealer=:dealer_id ";
        $params = array(
            ':dealer_email' => $dealer_email,
            ':dealer_id' => $id_dealer
        );
        $answer = $GLOBALS['instanceDealer']->prepare($sql);
        $answer->execute($params);
        return true;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

/**
 * 
 * @param type $address1
 * @param type $address2
 * @param type $phone1
 * @param type $phone2
 * @param type $phone3
 * @param type $status
 * @return boolean
 * @throws PDOException
 */
function updateCorporatePMIinfo($address1, $address2, $phone1, $phone2, $phone3, $status = 1) {
    try {
        $sql = "UPDATE pmi_info "
                . "SET address1_pmi_info=:address1, address2_pmi_info=:address2, phone1_pmi_info=:phone1, phone2_pmi_info=:phone2, phone3_pmi_info=:phone3 "
                . "WHERE app_status=:status ";
        $params = array(
            ':address1' => $address1,
            ':address2' => $address2,
            ':phone1' => $phone1,
            ':phone2' => $phone2,
            ':phone3' => $phone3,
            ':status' => $status
        );
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute($params);
        return TRUE;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

function updatepmiInfotittle($idpmi_info, $value) {
    try {
        $sql = "UPDATE pmi_info "
                . "SET app_tittle_pmi_info=:value "
                . "WHERE idpmi_info=:id_pmi ";
        $params = array(
            ':value' => $value,
            ':id_pmi' => $idpmi_info
        );
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute($params);
        return true;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

function updatepmiInfosubtittle($idpmi_info, $value) {
    try {
        $sql = "UPDATE pmi_info "
                . "SET app_subtittle_pmi_info=:value "
                . "WHERE idpmi_info=:id_pmi ";
        $params = array(
            ':value' => $value,
            ':id_pmi' => $idpmi_info
        );
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute($params);
        return true;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

/**
 * 
 * @param type $attibute
 * @param type $id_customer
 * @return boolean
 * @throws PDOException
 */
function updateFollowupStatus($attibute, $id_customer) {
    try {
        $sql = "UPDATE onaf_customer "
                . "SET followup_status_onaf_customer=:followup "
                . "WHERE id_onaf_customer=:id_customer ";
        $params = array(
            ':followup' => $attibute,
            ':id_customer' => $id_customer
        );
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute($params);
        return true;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

/**
 * 
 * @param type $id_customer
 * @return type
 * @throws PDOException
 */
function getFollowupStatus($id_customer) {
    try {
        $sql = 'SELECT id_onaf_customer, followup_status_onaf_customer '
                . ' FROM onaf_customer '
                . ' WHERE id_onaf_customer=:id_customer';
        $params = array(
            ':id_customer' => $id_customer,
        );
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute($params);
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return (count($answer) > 0 ) ? $answer[0]->followup_status_onaf_customer : FALSE;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

/**
 * 
 * @param type $id_acknow
 * @return type
 * @throws PDOException
 */
function getFollowupAcknowStatus($id_acknow) {
    try {
        $sql = 'SELECT iddealers_cust_acknow, followup_status_cust_acknow '
                . ' FROM dealers_cust_acknow '
                . ' WHERE iddealers_cust_acknow=:id_acknow';
        $params = array(
            ':id_acknow' => $id_acknow,
        );
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute($params);
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return (count($answer) > 0 ) ? $answer[0]->followup_status_cust_acknow : FALSE;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

/**
 * 
 * @param type $id_customer
 * @return type
 * @throws PDOException
 */
function getCorporateResolutionInfo($id_customer) {
    try {

        $sql = 'SELECT * '
                . ' FROM corporate_resolution'
                . ' WHERE id_onaf_customer=:idcustomer';
        $params = array(
            ':idcustomer' => $id_customer,
        );
        $answer = $GLOBALS['instance']->prepare($sql);
        $answer->execute($params);
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return $answer[0];
    } catch (PDOException $exc) {
        throw $exc;
    }
}


/**
 * 
 * @param type $id
 * @return type
 * @throws PDOException
 */
function getDealerIdByHash($hash) {
    try {
        $sql = "SELECT id_dealer, hashed FROM hash WHERE hashed=:hash";
        $params = array(
            ':hash' => $hash,
        );
        $answer = $GLOBALS['instanceDealer']->prepare($sql);
        $answer->execute($params);
        $answer = $answer->fetchAll(\PDO::FETCH_OBJ);
        return (count($answer) > 0 ) ? $answer[0]->id_dealer : FALSE;
    } catch (PDOException $exc) {
        throw $exc;
    }
}

?>
