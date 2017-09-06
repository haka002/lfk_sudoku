<?php

namespace SudokuValidator;

use Prophecy\Exception\InvalidArgumentException;

/**
 * @package SudokuValidator
 */
class SudokuValidator
{
	const DIMENSION_COUNT = 9;

	/**
	 * @param array $board
	 *
	 * @return bool
	 */
	public function validateSolution(array $board): bool
	{
		$this->validateInput($board);

		return
			$this->isValidBoard($board)
			&& $this->isValidColumns($board);
	}

	/**
	 * @param array $board
	 */
	private function validateInput(array $board): void
	{
		$this->validateDimension($board);

		array_walk_recursive(
			$board, function ($number) {
				if (
					!is_numeric($number)
					|| $number < 0
					|| $number > 9
				) {
					throw new InvalidArgumentException('The elemnt of array must be [0-9].');
				}
			}
		);
	}

	/**
	 * @param array $board
	 *
	 * @throws InvalidArgumentException On invalid dimension.
	 */
	private function validateDimension(array $board): void
	{
		$this->validateCount($board);

		foreach ($board as $row)
		{
			$this->validateCount($row);
		}
	}

	/**
	 * @param array $board
	 */
	private function validateCount(array $board): void
	{
		if (count($board) != self::DIMENSION_COUNT)
		{
			throw new InvalidArgumentException('The array must be 9 x 9 dimensions.');
		}
	}

	/**
	 * @param array $board
	 *
	 * @return bool
	 */
	private function isValidBoard(array $board): bool
	{
		if ($this->isEmptyFieldOnTheBoard($board))
		{
			return false;
		}

		return
			$this->isValidRows($board);
	}

	/**
	 * @param array $board
	 *
	 * @return bool
	 */
	private function isEmptyFieldOnTheBoard(array $board): bool
	{
		try
		{
			array_walk_recursive(
				$board,	function ($number)
				{
					if ($number === 0)
					{
						throw new InvalidArgumentException('The board can not contains empty fields!');
					}
				}
			);
		}
		catch (InvalidArgumentException $exception)
		{
			return true;
		}

		return false;
	}

	/**
	 * @param array $board
	 *
	 * @return bool
	 */
	private function isValidRows(array $board): bool
	{
		foreach ($board as $row)
		{
			if (count(array_unique($row)) != self::DIMENSION_COUNT)
			{
				return false;
			}
		}

		return true;
	}

	/**
	 * @param array $board
	 *
	 * @return bool
	 */
	private function isValidColumns(array $board): bool
	{
		$columns = [];
		foreach ($board as $row)
		{
			foreach ($row as $number => $index)
			{
				$columns[$index][] = $number;
			}
		}

		return $this->isValidRows($columns);
	}
}
