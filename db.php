<?php

require_once 'config.php';

class Database extends Config {

    //generic query execution
    public function select($query) {
        //$query = mysqli_real_escape_string(trim($query));
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetch();
    }

    // Insert User Into Database
    public function insertNewUser ($fname, $lname, $email, $username, $password, $role): bool {
        $sql = 'INSERT INTO accounts (fname, lname, email, username, password, role) VALUES (:fname, :lname, :email, :username, :password, :role)';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'fname' => $fname,
            'lname' => $lname,
            'email' => $email,
            'username' => $username,
            'password' => $password,
            'role' => $role
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
    public function update($id, $fname, $lname, $email, $username, $password, $role) {
        $sql = 'UPDATE accounts SET fname = :fname, lname = :lname, email = :email, username = :username, password = :password, role = :role WHERE id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
            'fname' => $fname,
            'lname' => $lname,
            'email' => $email,
            'username' => $username,
            'password' => $password,
            'role' => $role
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