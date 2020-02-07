<?php
class PluginModel extends DB\SQL\Mapper 
{
    public function __construct(DB\SQL $db) 
	{
        parent::__construct($db,'plugins');
    }
	
	public function add($propArray) 
	{
        $this->copyFrom($propArray);
        $this->save();
    }

    
    public function delete($id) 
	{
        $this->load(array('Id=?',$id));
        $this->erase();
    }
}
?>