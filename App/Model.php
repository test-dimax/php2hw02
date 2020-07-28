<?php


namespace App;

//делаем абстрактный класс (объекты абстрактного класса нельзя создавать)
abstract class Model
{
    protected static $table = null;

    public $id;

    //метод решающий новая модель (insert) или редактируемая модель (update)
    public function save(int $id = null)
    {
        if ( !empty($id) ) {
            //если передан id, то обновляем запись
            $this->update($id);
        } else {
            //иначе создаем новую
            $this->insert();
        }
    }

    //метод удаляющий запись из базы данных
    public static function delete(int $id)
    {
        if ( !empty($id) ) {
            $sql = 'DELETE FROM '. static::$table . ' WHERE id=:id';
            //$data - массив данных
            $data = [':id' => $id];

            $db = new Db();
            $db->execute($sql, $data);
        }
    }

    //метод вставки новой записи в базу данных
    public function insert()
    {
        $props = get_object_vars($this);
        //$fields - массив полей которые нужно вставить в базу данных
        $fields = [];
        //$binds - массив вставок
        $binds = [];
        //$data - массив данных
        $data = [];
        foreach ($props as $name => $value) {
            //поле id пропускаем за ненадобностью
            if ('id' == $name) {
                continue;
            }
            $fields[] = $name;
            $binds[] = ':' . $name;
            $data[':' . $name] = $value;
        }
        $sql = '
        INSERT INTO '. static::$table . '
        (' . implode(',', $fields) . ') 
        VALUES (' . implode(',', $binds) . ')';

        $db = new Db();
        $db->execute($sql, $data);

        $this->id = $db->lastInsertId();
    }

    //метод редактирования записи в базе данных
    public function update(int $id)
    {
        $props = get_object_vars($this);
        //$fields - массив полей которые нужно редактировать (сразу делаем со вставками title=:title)
        $fields = [];
        //$data - массив данных
        $data = [];
        foreach ($props as $name => $value) {
            //поле id пропускаем за ненадобностью
            if ('id' == $name) {
                $data[':' . $name] = $id;
                continue;
            }
            $fields[] = $name . '=:'.$name;
            $data[':' . $name] = $value;
        }
        $sql = '
        UPDATE '. static::$table . '
        SET ' . implode(',', $fields) . ' 
        WHERE id=:id';

        $db = new Db();
        $db->execute($sql, $data);
    }

    //метод возвращает одну запись из базы данных с соответствующим id
    public static function findById($id) {
        $db = new Db;
        $data = $db->query(
            'SELECT * FROM '. static::$table . ' WHERE id=:id',
            static::class,
            [':id' => $id]
        );
        if (!empty($data)) {
            return $data[0];
        }
        return false;
    }


    //метод возвращает все записи из базы данных
    public static function findAll()
    {
        $db = new Db;
        $data = $db->query(
            'SELECT * FROM '. static::$table,
            static::class
        );
        return $data;
    }

    //метод возвращает определенное к-во записей ($limit - к-во записей которое нужно вытащить)
    public static function findSomeRecords(int $limit)
    {
        $db = new Db;
        $sql = 'SELECT * from ' . static::$table . ' ORDER by id desc LIMIT ' . (int)$limit;
        $data = $db->query($sql, static::class);

        return $data;
    }


}