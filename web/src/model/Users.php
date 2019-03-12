<?php


class Users implements MemberRepository
{

    private $link;
    private $user = 'root';
    private $pass = '01151522223m';

    public function __construct()
    {
        try{

            $this->link = new PDO('mysql:host=localhost;dbname=ProPUBG_databases', $this->user, $this->pass);

        } catch (PDOException $e){
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function save(Member $member){
        try {
            $this->link->prepare('INSERT INTO users VALUES(:user_name, :user_password)');
            $this->link->bindParam(':user_name', $member['username']);
            $this->link->bindParam(':user_password', $member['user_password']);
            $this->link->execute();
        } catch (PDOException $e){
            print "Error!: " . $e->getMessage() . "<br/>";
        }
    }
    public function getAll(){

    }
    public function findById(MemberId $memberId){

    }
}