<?php

require_once 'config.php';

class Database extends Config {

    // Insert User Into Database
    public function insertNewUser ($fname, $lname, $email, $username, $password): bool {
        $sql = 'INSERT INTO accounts (fname, lname, email, username, password) VALUES (:fname, :lname, :email, :username, :password)';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'fname' => $fname,
            'lname' => $lname,
            'email' => $email,
            'username' => $username,
            'password' => $password
        ]);
        return true;
    }

    // Fetch All Users From Database
    public function readAllUsers() {
        $sql = 'SELECT * FROM accounts ORDER BY id DESC';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    // Fetch Single User From Database
    public function readOne($id) {
        $sql = 'SELECT * FROM accounts WHERE id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch();
        return $result;
    }

    // Update Single User
    public function update($id, $fname, $lname, $email, $username, $password) {
        $sql = 'UPDATE accounts SET fname = :fname, lname = :lname, email = :email, username = :username, password = :password WHERE id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
            'fname' => $fname,
            'lname' => $lname,
            'email' => $email,
            'username' => $username,
            'password' => $password
        ]);
        return true;
    }

    // Delete User From Database
    public function delete($id) {
        $sql = 'DELETE FROM accounts WHERE id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return true;
    }
}
?>