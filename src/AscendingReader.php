<?php

namespace DataStructure;


use Generator;
use IteratorAggregate;


class AscendingReader implements IteratorAggregate
{
	private Node $root;

	/**
	 * @param Node $root
	 */
	public function __construct(Node $root)
	{
		$this->root = $root;
	}

	private function traversal(Node $node):mixed{
		if ($node->left) {
			yield from $this->traversal($node->left);
		}

		yield $node->index => $node->data;

		if ($node->right) {
			yield from $this->traversal($node->right);
		}
	}

	public function getIterator():Generator
	{
		yield from $this->traversal($this->root);
	}
}