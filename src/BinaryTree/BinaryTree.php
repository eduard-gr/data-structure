<?php

declare(strict_types=1);

namespace DataStructure\BinaryTree;

use DataStructure\Node;

class BinaryTree{
	private ?Node $root = null;

	public function get(
		int $index
	):mixed
	{
		$node = $this->root;

		while ($node) {
			if ($index > $node->index) {
				$node = $node->right;
			} elseif ($index < $node->index) {
				$node = $node->left;
			} else {
				return $node->data;
			}
		}

		return null;
	}

    /**
     * @param $tuple
     * @return void
     */
	public function insert(
		int $index,
		mixed $data,
		callable $merge
	):void
	{
		$node = $this->root;

		if ($node == null) {
			$this->root = new Node($index, $data);
			return;
		}

		while ($node) {
			if ($index > $node->index) {
				if ($node->right) {
					$node = $node->right;
                    continue;
				} else {
					$node->right = new Node($index, $data);
                    return;
				}
			} elseif ($index < $node->index) {
				if ($node->left) {
					$node = $node->left;
                    continue;
				} else {
					$node->left = new Node($index, $data);
                    return;
				}
			} else {
                $node->data = $merge($node->data, $data);
				return;
			}
		}

		return;
	}

	/**
	 * @return Node|null
	 */
	public function getRoot(): ?Node
	{
		return $this->root;
	}

}
