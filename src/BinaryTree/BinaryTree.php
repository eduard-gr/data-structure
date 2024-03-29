<?php

declare(strict_types=1);

namespace DataStructure\BinaryTree;

use DataStructure\Node;

class BinaryTree{
	private ?Node $root = null;

	public function &get(
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

		$null = null;
		return $null;
	}

    /**
     * @param $tuple
     * @return void
     */
	public function insert(
		int $index,
		mixed $data,
		?callable $merge = null
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
				} else {
					$node->right = new Node($index, $data);
                    return;
				}
			} elseif ($index < $node->index) {
				if ($node->left) {
					$node = $node->left;
				} else {
					$node->left = new Node($index, $data);
                    return;
				}
			} else {

                $node->data = $merge
					? $merge($node->data, $data)
					: $data;

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

	public function isEmpty(): bool{
		return $this->root == null;
	}

}
