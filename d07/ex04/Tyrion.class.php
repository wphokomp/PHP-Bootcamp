<?php

	class Tyrion extends Lannister {
		public function sleepWith($p)
		{
			$parent = get_parent_class($p);
			if ($parent == "Lannister")
				print("Not even if I'm drunk !".PHP_EOL);
			else
				parent::sleepWith($p);
		}
	}

?>
