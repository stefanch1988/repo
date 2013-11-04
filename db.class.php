<?php

class db {
    public static $queriesCounter = 0;
    private static $conn;

    public function connect () {
        global $cfg;

        self::$conn = @mysql_connect ($cfg['db']['server'], $cfg['db']['user'], $cfg['db']['pass']);
        $select = @mysql_select_db ($cfg['db']['name'], self::$conn);

        if (self::$conn == false) {
            logger::addEvent (1, __FILE__, __LINE__, "Can't connect to database: ".self::getError());
            die ('Can\'t connect to database');
        }

        if ($select == false) {
            logger::addEvent (1, __FILE__, __LINE__, "Can't select database: ".self::getError());
            die ("Can't select database");
        }

    }

    public function query ($query) {
        global $cfg;

        $query = str_replace('{prefix}', $cfg['db']['prefix'], $query);
        $resource = @mysql_query(trim($query), self::$conn);

        if ($resource == false) {
            logger::addEvent (1, __FILE__, __LINE__, 'SQL query error: '.self::getError());
        }

        else {
            ++self::$queriesCounter;
            return $resource;
        }
    }

    public function secure ($data) {
        return mysql_real_escape_string($data, self::$conn);
    }

    public function fetch ($result, $mode = '') {
        switch ($mode) {
            case 'ROW':
                return mysql_fetch_row($result);
                break;

            case 'BOTH':
                return mysql_fetch_array($result);
                break;

            default:
                return mysql_fetch_assoc($result);
                break;
        }
    }

    public function returnedRows ($resource) {
    $result = mysql_num_rows($resource);
    return $result;
    }

    public function modifiedRows ($resource) {
    $result = mysql_affected_rows($resource);
    return $result;
    }

    public function getError () {
        return '['.mysql_errno().']'.' '.mysql_error();
    }

    public function getOneRecord ($query) {
        $record = self::fetch(self::query($query), 'ROW');
        return $record[0];
    }

    public function close() {
        mysql_close();
        self::$queriesCounter = 0;
    }

}
?>