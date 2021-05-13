<?php

include("../../Domain/IRepos/IDispRepo.php");
include("../../Domain/Entities/dispetcher.php");
include("../../Domain/ValueObjects/dispetcher_info.php");
require_once("C:/xampp\htdocs\disp_system\hydrator.php");

class dispRepo implements IDispetcherRepo
{

    private $connection;
    private $hydrator;


    public function __construct($connection)
    {
        $this->connection = $connection;
        $this->hydrator = new Hydrator();
    }

    public function nextIdentity(): int
    {
        $query = "SELECT MAX(id) FROM dispetchers";
        $result = mysqli_query($this->connection, $query);
        $result = mysqli_fetch_assoc($result);

        $id = $result['MAX(id)'];
        settype($id, 'integer');
        $id++;
        return $id;
    }

    public function getDispByLoginData($login, $password): dispetcher
    {
        $query = "SELECT * FROM dispetchers WHERE login='$login' AND password='$password' ";
        $result = mysqli_query($this->connection, $query);
        $result = mysqli_fetch_assoc($result);
        $id = $result['id'];
        settype($id, 'integer');

        $id = $this->hydrator->hydrate(dispetcherId::class, [
            'id' => $id,
        ]);

        $info = $this->hydrator->hydrate(dispetcher_info::class, [
            'name' => $result['name'],
            'surname' => $result['surname'],
            'middle_name' => $result['lastname']
        ]);


        $entity = $this->hydrator->hydrate(dispetcher::class, [
            'id' => $id,
            'personal_info' => $info,
            'position' => $result['position'],
        ]);

        return $entity;
    }

    public function createDisp($name, $surname, $middle_name, $login, $password, $position)
    {
        $id = $this->nextIdentity();
        $query = "INSERT INTO dispetchers(id, login, password, `name`, `position`, surname, lastname) VALUES('$id', '$login', '$password', '$name', '$position', '$surname', '$middle_name')";
        $result = mysqli_query($this->connection, $query);
    }

    public function updateDispPassword($value, dispetcher $disp)
    {
        $id = $disp->getId();
        $query = "UPDATE dispetcher SET password = '$value' WHERE id='$id'";
        mysqli_query($this->connection, $query);
    }

    public function updateDispPosition($value, dispetcher $disp)
    {
        $id = $disp->getId();
        $query = "UPDATE dispetcher SET `position` = '$value' WHERE id='$id'";
        mysqli_query($this->connection, $query);
    }

    public function deleteDisp(dispetcher $disp)
    {
        $id =$disp->getId();
        $query = "DELETE FROM dispetchers WHERE id = '$id'";
        mysqli_query($this->connection, $query);
    }
}