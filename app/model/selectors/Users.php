<?php

namespace Selector;

use Entity\Group;


class Users extends \ORM\Table
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
