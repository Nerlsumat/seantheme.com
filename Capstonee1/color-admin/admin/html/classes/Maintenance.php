<?php

$objectMaintenance = new Maintenance();
$dateNow = date("Y-m-d");

class Maintenance extends DatabaseHelper
{
    public function selectAllRecords($tableName){
        $sqlPK = "SELECT * FROM $tableName";
        $queryPK = $this->dbConnect()->query($sqlPK);
        $fetchPK = $queryPK->fetch_field_direct(0);
        $columnName = $fetchPK->name;

        $sqlStatement = "SELECT * FROM $tableName  ORDER BY $columnName DESC";
        $queryStatement = $this->dbConnect()->query($sqlStatement);
        if($queryStatement->num_rows > 0){
            while($fetchStatement = $queryStatement->fetch_assoc()){
                $result[] = $fetchStatement;
            }
            return $result;
        }
        else{
            return 0;
        }
    }

    public function selectOrderBySeq($tableName){
        $sqlStatement = "SELECT * FROM $tableName  ORDER BY sequence DESC";
        $queryStatement = $this->dbConnect()->query($sqlStatement);
        if($queryStatement->num_rows > 0){
            while($fetchStatement = $queryStatement->fetch_assoc()){
                $result[] = $fetchStatement;
            }
            return $result;
        }
        else{
            return 0;
        }
    }

    public function selectCount($tableName){
        $sqlStatement = "SELECT COUNT(id) AS 'total_rows' FROM $tableName";
        $queryStatement = $this->dbConnect()->query($sqlStatement);
        if($queryStatement->num_rows > 0){
            while($fetchStatement = $queryStatement->fetch_assoc()){
                $result[] = $fetchStatement;
            }
            return $result;
        }
        else{
            return 0;
        }
    }

    public function selectCountActive($tableName){
        $sqlStatement = "SELECT COUNT(id) AS 'total_rows' FROM $tableName WHERE is_active = 1";
        $queryStatement = $this->dbConnect()->query($sqlStatement);
        if($queryStatement->num_rows > 0){
            while($fetchStatement = $queryStatement->fetch_assoc()){
                $result[] = $fetchStatement;
            }
            return $result;
        }
        else{
            return 0;
        }
    }

    public function selectStation(){
        $sqlStatement = "SELECT * FROM tbl_stations WHERE is_active = 1";
        $queryStatement = $this->dbConnect()->query($sqlStatement);
        if($queryStatement->num_rows > 0){
            while($fetchStatement = $queryStatement->fetch_assoc()){
                $result[] = $fetchStatement;
            }
            return $result;
        }
        else{
            return 0;
        }
    }

    public function selectAllStation(){
        $sqlStatement = "SELECT * FROM tbl_stations where is_active = 1";
        $queryStatement = $this->dbConnect()->query($sqlStatement);
        if($queryStatement->num_rows > 0){
            while($fetchStatement = $queryStatement->fetch_assoc()){
                $result[] = $fetchStatement;
            }
            return $result;
        }
        else{
            return 0;
        }
    }

    public function selectUser(){
        $sqlStatement = "SELECT *, tbl_user.id AS 'UserId' FROM tbl_user JOIN tbl_position ON tbl_user.position_id = tbl_position.id order by UserId desc";
        $queryStatement = $this->dbConnect()->query($sqlStatement);
        if($queryStatement->num_rows > 0){
            while($fetchStatement = $queryStatement->fetch_assoc()){
                $result[] = $fetchStatement;
            }
            return $result;
        }
        else{
            return 0;
        }
    }

    public function selectPosition(){
        $sqlStatement = "SELECT * FROM tbl_position WHERE id != 1 ORDER by id DESC";
        $queryStatement = $this->dbConnect()->query($sqlStatement);
        if($queryStatement->num_rows > 0){
            while($fetchStatement = $queryStatement->fetch_assoc()){
                $result[] = $fetchStatement;
            }
            return $result;
        }
        else{
            return 0;
        }
    }

    public function selectAdvice($rating){
        $sqlStatement = "SELECT advise FROM tbl_rating_advise WHERE rating = '$rating'";
        $queryStatement = $this->dbConnect()->query($sqlStatement);
        if($queryStatement->num_rows > 0){
            while($fetchStatement = $queryStatement->fetch_assoc()){
                $result[] = $fetchStatement;
            }
            return $result;
        }
        else{
            return 0;
        }
    }

    public function selectAccessRight($position){
        $sqlStatement = "SELECT * FROM tbl_access_rights WHERE position_id = '$position'";
        $queryStatement = $this->dbConnect()->query($sqlStatement);
        if($queryStatement->num_rows > 0){
            while($fetchStatement = $queryStatement->fetch_assoc()){
                $result[] = $fetchStatement;
            }
            return $result;
        }
        else{
            return 0;
        }
    }

    public function selectLastPosition(){
        $sqlStatement = "SELECT * FROM tbl_position ORDER BY ID DESC LIMIT 1";
        $queryStatement = $this->dbConnect()->query($sqlStatement);
        if($queryStatement->num_rows > 0){
            while($fetchStatement = $queryStatement->fetch_assoc()){
                $result[] = $fetchStatement;
            }
            return $result;
        }
        else{
            return 0;
        }
    }

    public function selectWithJoin($sqlStatement){
        $queryStatement = $this->dbConnect()->query($sqlStatement);
        if($queryStatement->num_rows > 0){
            while($fetchStatement = $queryStatement->fetch_assoc()){
                $result[] = $fetchStatement;
            }
            return $result;
        }
    }

    public function selectView($view){
        $sqlStatement = "SELECT * FROM $view";
        $queryStatement = $this->dbConnect()->query($sqlStatement);
        if($queryStatement->num_rows > 0){
            while($fetchStatement = $queryStatement->fetch_assoc()){
                $result[] = $fetchStatement;
            }
            return $result;
        }
    }

    public function permanentDelete($tableName, $id){
        $sqlStatement = "DELETE FROM $tableName WHERE id = $id";
        $queryStatement = $this->dbConnect()->query($sqlStatement);
        if($queryStatement) {
            return "DELETED";
        } else {
            return "NOT DELETED";
        }
    }

    public function clearData($tableName){
        $sqlStatement = "TRUNCATE TABLE $tableName";
        $queryStatement = $this->dbConnect()->query($sqlStatement);
        if($queryStatement) {
            return "1";
        } else {
            return "0";
        }
    }

    public function activatePartner($tableName, $id){
        $sqlStatement = "UPDATE $tableName SET is_active = 1 WHERE id = $id";
        $queryStatement = $this->dbConnect()->query($sqlStatement);
        if($queryStatement) {
            return "1";
        } else {
            return "0";
        }
    }

    public function deactivatePartner($tableName, $id){
        $sqlStatement = "UPDATE $tableName SET is_active = 0 WHERE id = $id";
        $queryStatement = $this->dbConnect()->query($sqlStatement);
        if($queryStatement) {
            return "1";
        } else {
            return "0";
        }
    }

    public function updateInventory($tableName, $tableSequence, $whereClause){
        $sqlStatement = "UPDATE $tableName SET $tableSequence WHERE $whereClause ";
        $queryStatement = $this->dbConnect()->query($sqlStatement);
        if($queryStatement) {
            return "UPDATE";
        } else {
            return "NOT UPDATE";
        }
    }

    public function insertRecord($tableName, $tableSequence){
        $sqlStatement = "INSERT INTO $tableName VALUES ($tableSequence)";
        $queryStatement = $this->dbConnect()->query($sqlStatement);
        if($queryStatement) {
            return "INSERTED";
        } else {
            return "NOT INSERTED";
        }
    }

    public function updateRecord($tableName, $tableSequence, $id){
        $sqlPK = "SELECT * FROM $tableName";
        $queryPK = $this->dbConnect()->query($sqlPK);
        $fetchPK = $queryPK->fetch_field_direct(0);
        $columnName = $fetchPK->name;

        $sqlStatement = "UPDATE $tableName SET $tableSequence WHERE $columnName = $id";
        $queryStatement = $this->dbConnect()->query($sqlStatement);
        if($queryStatement) {
            return "INSERTED";
        } else {
            return "NOT INSERTED";
        }
    }

    public function selectRecord($tableName, $id){
        $sqlPK = "SELECT * FROM $tableName";
        $queryPK = $this->dbConnect()->query($sqlPK);
        $fetchPK = $queryPK->fetch_field_direct(0);
        $columnName = $fetchPK->name;

        $sqlStatement = "SELECT * FROM $tableName WHERE $columnName = $id";
        $queryStatement = $this->dbConnect()->query($sqlStatement);
        if($queryStatement->num_rows > 0){
            while($fetchStatement = $queryStatement->fetch_assoc()){
                $result[] = $fetchStatement;
            }
            return $result;
        }
    }
    public function auditTrail($txtAction){
        $txtUserId = $_SESSION["EMP_ID"];
        $txtDate = date("Y-m-d");
        $txtTime = date("H:i:s");

        $tableSequence = "NULL, '$txtUserId', '$txtAction', '$txtDate', '$txtTime'";
        $this->insertRecord('tbl_audit_trail', $tableSequence);
    }
    public function setId($id){
        if($id >= 0 && $id <= 9){
            return "00".$id;
        }
        elseif($id >= 10 && $id <= 99){
            return "0".$id;
        }
        else{
            return $id;
        }
    }

    public function resetPassword($tableName, $id){
        $txtPassword = password_hash('SymbolAdmin',PASSWORD_DEFAULT);


        $sqlStatement = "UPDATE $tableName set password = '$txtPassword' WHERE id = $id";
        $queryStatement = $this->dbConnect()->query($sqlStatement);
        if($queryStatement) {
            return "DELETED";
        } else {
            return "NOT DELETED";
        }
    }

    public function imgLogo(){
        foreach ($this->selectAllRecords("tbl_logo") as $value) {
            return $value['image'];
        }
    }

    public function imgAboutUsCover(){
        foreach ($this->selectAllRecords("tbl_about_us") as $value) {
            return $value['image'];
        }
    }
}
