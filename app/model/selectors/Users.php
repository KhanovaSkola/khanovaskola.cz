<?php

class Users extends Table
{

	public function findByGroup(Group $group)
	{
		return $this->getTable()->where('id', $group->getUsersIds());
	}

}
