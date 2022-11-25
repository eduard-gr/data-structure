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

	public function getIterator():Generator
	{
		function dive(Node $node):mixed{
			if ($node->left) {
				yield from dive($node->left);
			}

			yield $node->index => $node->data;

			if ($node->right) {
				yield from dive($node->right);
			}
		}

		yield from dive($this->root);
	}
}