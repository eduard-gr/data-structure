<?php

namespace DataStructure;

use Ds\Queue;
use Generator;
use IteratorAggregate;

class DescendingReader implements IteratorAggregate
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
		$queue = new Queue();
		$queue->push($this->root);

		while ($queue->isEmpty() == false) {
			$node = $queue->pop();

			if ($node->left) {
				$queue->push($node->left);
			}

			if ($node->right) {
				$queue->push($node->right);
			}

			yield $node->index => $node->data;
		}
	}
}