<?php

	class Jaime extends Lannister{
		public function sleepWith($p)
		{
			$parent = get_parent_class($p);
			if ($parent == "Lannister")
			{
				if (get_class($p) == "Cersei")
					print("With pleasure, but only in a tower in Winterfell, then.".PHP_EOL);
				else
					print("Not even if I'm drunk !".PHP_EOL);
			} else
				parent::sleepWith($p);
		}
	}

?>
