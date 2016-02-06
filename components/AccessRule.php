<?php
namespace app\components;
class AccessRule extends \yii\filters\AccessRule
{
	protected function matchRole($user)
	{
		if (empty($this->roles)) {
			return true;
		}
		foreach ($this->roles as $role) {
			if ($role === '?' && $user->getIsGuest()) {
				return true;
			} elseif ($role === '@' && !$user->getIsGuest()) {
				return true;
			} elseif (!$user->getIsGuest()) {
				
				// user is not guest, let's check his role (or do something else)
				if ($role === $user->identity->groupId) {
					return true;
				}
			}
		}
		return false;
	}
}