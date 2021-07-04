<?php


namespace App\Entity;


use App\Database\Database;

class User implements EntityInterface
{
    private int $id;

    private string $username;

    private string $password;

    private array $role;

    private static array $users = [];

    const TABLE_NAME = 'users';

    public static function createTable()
    {
        $conn = Database::connect();

        $sql = "CREATE TABLE ".self::TABLE_NAME." (id int NOT NULL AUTO_INCREMENT PRIMARY KEY , username varchar(255) NOT NULL, password varchar(255), role varchar(1024))";

        $stmt = $conn->prepare($sql);

        if(!$stmt->execute()){
            $sql = "DROP TABLE ".self::TABLE_NAME;
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $sql = "CREATE TABLE ".self::TABLE_NAME." (id int NOT NULL AUTO_INCREMENT PRIMARY KEY , username varchar(255) NOT NULL, password varchar(255), role varchar(1024))";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
        };

        $conn->close();

    }

    public function create()
    {
        $conn = Database::connect();

        $sql = "INSERT INTO ".self::TABLE_NAME." (username, password, role) VALUES (?, ?, ?)";

        $stmt = $conn->prepare($sql);

        if(!isset($this->username) || !isset($this->password) || !isset($this->role)){
            //TODO exception
            echo 'Object is not prepared for INSERT - Missing fields';
            exit;
        }
        $roles = json_encode($this->role);
        $stmt->bind_param('sss', $this->username, $this->password, $roles);

        $stmt->execute();

        $conn->close();

    }

    public function read(int $id)
    {
        $conn = Database::connect();

        $sql = "SELECT id, username, password, role FROM ".self::TABLE_NAME." WHERE id=?";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param('i', $id);

        $stmt->execute();

        $result = $stmt->get_result();

        $user = $result->fetch_object();

        $this->setUsername($user->username);

        $this->setPassword($user->password);

        $this->setRole(json_decode($user->role, true));

        $conn->close();

    }

    public function update(int $id)
    {
        $conn = Database::connect();

        $sql = "UPDATE ".self::TABLE_NAME." SET username=?, password=?, role=? WHERE id=?";

        $stmt = $conn->prepare($sql);

        if(!isset($this->username) || !isset($this->password) || !isset($this->role)){
            //TODO exception
            echo 'Object is not prepared for UPDATE - Missing fields';
            exit;
        }
        $roles = json_encode($this->role);
        $stmt->bind_param('sssi', $this->username, $this->password, $roles, $id);

        $stmt->execute();

        $conn->close();

    }

    public function delete(int $id)
    {
        $conn = Database::connect();

        $sql = "DELETE FROM ".self::TABLE_NAME." WHERE id=?";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param('i', $id);

        $stmt->execute();

        $conn->close();

    }

    public static function getAll()
    {
        $conn = Database::connect();

        $sql = "SELECT id, username, password, role FROM ".self::TABLE_NAME;

        $stmt = $conn->prepare($sql);

        $stmt->execute();

        $results = $stmt->get_result();

        while($row = $results->fetch_object()){
            self::$users[] = $row;
        }
        return self::$users;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getRole(): array
    {
        return $this->role;
    }

    public function setRole(array $role): void
    {
        $this->role = $role;
    }
}
