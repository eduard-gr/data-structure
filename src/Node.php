<?php

declare(strict_types=1);

namespace DataStructure;

class Node
{
	public int $index;
	public mixed $data = null;

	public ?Node $left = null;
	public ?Node $right = null;

	public function __construct(int $index, $data)
	{
		$this->index = $index;
		$this->data = $data;
	}
}
