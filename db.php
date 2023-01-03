<?php

require_once 'config.php';

class Database extends Config {

    // Insert User Into Database
    public function insertNewUser ($fname, $lname, $email, $phone): bool {
        $sql = 'INSERT INTO users (first_name, last_name, email, phone) VALUES (:fname, :lname, :email, :phone)';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'fname' => $fname,
            'lname' => $lname,
            'email' => $email,
            'phone' => $phone
        ]);
        return true;
    }

    public function insertNewCar ($license, $brand, $model, $milage): bool {
        $sql = 'INSERT INTO cars (license, brand, model, milage) VALUES (:license, :brand, :model, :milage)';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'license' => $license,
            'brand' => $brand,
            'model' => $model,
            'milage' => $milage
        ]);
        return true;
    }

    // Fetch All Users From Database
    public function read($table) {
        $sql = 'SELECT * FROM table ORDER BY id DESC';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    // Fetch Single User From Database
    public function readOne($id) {
        $sql = 'SELECT * FROM users WHERE id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch();
        return $result;
    }

    // Update Single User
    public function update($id, $fname, $lname, $email, $phone) {
        $sql = 'UPDATE users SET first_name = :fname, last_name = :lname, email = :email, phone = :phone WHERE id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'fname' => $fname,
            'lname' => $lname,
            'email' => $email,
            'phone' => $phone,
            'id' => $id
        ]);

        return true;
    }

    // Delete User From Database
    public function delete($id) {
        $sql = 'DELETE FROM users WHERE id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return true;
    }
}

?>