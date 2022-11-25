<?php

declare(strict_types=1);

namespace DataStructure;

class Node
{
	public int $index;
	public mixed $data;

	public ?Node $left;
	public ?Node $right;

	public function __construct(int $index, $data)
	{
		$this->index = $index;
		$this->data = $data;
	}
}
