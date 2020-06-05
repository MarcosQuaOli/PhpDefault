<?php

namespace App\DAO;

use App\DAO\Connection;
use App\Models\User;

class UserDAO extends Connection {

    public function show() {

        $query = 'select id, nome, email, senha from usuarios';

        return $this->select($query);
    }

    public function showId($id) {
        
        $query = "select id, nome, email, senha from usuarios where id = $id";

        return $this->select($query);
    }

    public function insert(User $user) {

        $query = 'insert into usuarios(nome, email, senha) values(:nome, :email, :senha)';        

        $this->query($query, array(
            ':nome' => $user->__get('nome'),
            ':email' => $user->__get('email'),
            ':senha' => $user->__get('senha')
        ));
    }

    public function delete(User $user) {

        $query = 'delete from usuarios where id = :id';

        $this->query($query, array(
            ':id' => $user->__get('id')
        ));
    }

    public function update(User $user) {

        $query = 'update usuarios set nome = :nome, email = :email, senha = :senha where id = :id';

        $this->query($query, array(
            ':nome' => $user->__get('nome'),
            ':email' => $user->__get('email'),
            ':senha' => $user->__get('senha'),
            ':id' => $user->__get('id')
        ));
    }

}

?>