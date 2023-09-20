<?php

class NoteService implements INote
{
    private $db = null;
    public function __construct()
    {
        $databse = new Database();
        $this->db = $databse->getConnection();
    }

    public function createNote(string $title, string $detail): int
    {
        print "1. \n";
        $sql = 'insert into note values(null, ?, ?, now() )';
        $pre = $this->db->prepare($sql);
        $status = $pre->execute([$title, $detail]);
        if ($status) {
            return $this->db->lastInsertId();
        }
        print "2. \n";
        return 0;
    }

    public function allNote(): array
    {
        $sql = 'select * from note';
        $pre = $this->db->query($sql);
        $result = $pre->fetchAll();
        return $result;
        //foreach ($result as $item) {
          //  print $item['title'];
        //}
        //return [];
    }
}