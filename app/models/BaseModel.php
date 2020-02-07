<?php

class BaseModel extends DB\SQL\Mapper
{
    public function __construct(DB\SQL $db, $table, $fields = NULL, $ttl = 60)
    {
        parent::__construct($db, $table, $fields, $ttl);
    }

    public function all($options = array()) // e.g. array('id = ? and user = ?', 3, 23);
    {
        $this->load($options);
        
        $res = array();
        for($this; !$this->dry(); $this->next())
            $res[] = $this->cast();

        return $res;
    }

    public function getById($id, $val)
    {
        $this->load(array($id.'=?',$val));
        return $this->query;
    }

    public function add()
    {
        $this->copyFrom('POST');
        $this->save();
    }

    public function edit($id, $val)
    {
        $this->load(array($id.'=?',$val));
        $this->copyFrom('POST');
        $this->update();
    }

    public function delete($id, $val)
    {
        $this->load(array($id.'=?', $val));
        $this->erase();
    }

    function generalMethod()
    {
        return "general method is general";
    }
}