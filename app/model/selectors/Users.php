<?php

class Users extends Table
{

    /**
     * @param Group $group
     * @return User[]
     */
    public function findByGroup(Group $group)
	{
		return $this->getTable()->where('id', $group->getUsersIds());
	}

}
