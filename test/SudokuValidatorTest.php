<?php

namespace Test\SudokuValidator;

use PHPUnit\Framework\TestCase;
use SudokuValidator\SudokuValidator;

/**
 * @package Test\SudokuValidator
 */
class SudokuValidatorTest extends TestCase
{
	/** @var SudokuValidator */
	private $sudokuValidator;

	public function setUp()
	{
		parent::setup();

		$this->sudokuValidator = new SudokuValidator();
	}

	/**
	 * @param array $board
	 *
	 * @covers \SudokuValidator\SudokuValidator
	 *
	 * @expectedException Throwable
	 *
	 * @dataProvider wrongInputProvider
	 */
	public function testWrongInput(array $board)
	{
		$this->sudokuValidator->validateSolution($board);
	}

	/**
	 * @param array $sudokuBoard
	 *
	 * @covers \SudokuValidator\SudokuValidator
	 *
	 * @dataProvider goodInputProvider
	 */
	public function testGoodInput(array $sudokuBoard): void
	{
		$this->assertTrue(
			$this->sudokuValidator->validateSolution($sudokuBoard)
		);
	}

	/**
	 * @param array $board
	 *
	 * @covers \SudokuValidator\SudokuValidator
	 *
	 * @dataProvider invalidBoardContentProvider
	 */
	public function testInvalidBoardContent(array $board)
	{
		$this->assertFalse(
			$this->sudokuValidator->validateSolution($board),
			'The board contains valid data instead of invalid.'
		);
	}

	/**
	 * @return array
	 */
	public function goodInputProvider(): array
	{
		return [
			[
				[
					[5, 3, 4, 6, 7, 8, 9, 1, 2],
					[6, 7, 2, 1, 9, 5, 3, 4, 8],
					[1, 9, 8, 3, 4, 2, 5, 6, 7],
					[8, 5, 9, 7, 6, 1, 4, 2, 3],
					[4, 2, 6, 8, 5, 3, 7, 9, 1],
					[7, 1, 3, 9, 2, 4, 8, 5, 6],
					[9, 6, 1, 5, 3, 7, 2, 8, 4],
					[2, 8, 7, 4, 1, 9, 6, 3, 5],
					[3, 4, 5, 2, 8, 6, 1, 7, 9]
				]
			]
		];
	}

	/**
	 * @return array
	 */
	public function wrongInputProvider(): array
	{
		return [
			['string'],
			[
				[
					['sdf', 2, 3, 4, 5, 6, 7, 8, 9],
					[1, 2, 3, 4, 5, 6, 7, 8, 9],
					[1, 2, 3, 4, 5, 6, 7, 8, 9],
					[1, 2, 3, 4, 5, 6, 7, 8, 9],
					[1, 2, 3, 4, 5, 6, 7, 8, 9],
					[1, 2, 3, 4, 5, 6, 7, 8, 9],
					[1, 2, 3, 4, 5, 6, 7, 8, 9],
					[1, 2, 3, 4, 5, 6, 7, 8, 9],
					[1, 2, 3, 4, 5, 6, 7, 8, 9],
					[1, 2, 3, 4, 5, 6, 7, 8, 9]
				]
			],
			[
				[
					[11, 2, 3, 4, 5, 6, 7, 8, 9],
					[1, 2, 3, 4, 5, 6, 7, 8, 9],
					[1, 2, 3, 4, 5, 6, 7, 8, 9],
					[1, 2, 3, 4, 5, 6, 7, 8, 9],
					[1, 2, 3, 4, 5, 6, 7, 8, 9],
					[1, 2, 3, 4, 5, 6, 7, 8, 9],
					[1, 2, 3, 4, 5, 6, 7, 8, 9],
					[1, 2, 3, 4, 5, 6, 7, 8, 9],
					[1, 2, 3, 4, 5, 6, 7, 8, 9]
				]
			],
			[
				[
					[1, 2, 3, 4, 5, 6, 7, 8, 9],
					[1, 2, 3, 4, 5, 6, 7, 8, 9],
					[1, 2, 3, 4, 5, 6, 7, 8, 9],
					[1, 2, 3, 4, 5, 6, 7, 8, 9],
					[1, 2, 3, 4, 5, 6, 7, 8, 9]
				]
			],
			[
				[
					[1, 2, 3, 4, 5, 6, 7, 8, 9],
					[1, 2, 3, 4, 5, 6, 7, 8, 9],
					[1, 2, 3, 4, 5, 6, 7, 8, 9],
					[1, 2, 3, 4, 5, 6, 7, 8, 9],
					[1, 2, 3, 4, 5, 6, 7, 8, 9],
					[1, 2, 3, 4, 5, 6, 7, 8, 9],
					[1, 2, 3, 4, 5, 6, 7, 8, 9],
					[1, 2, 3, 4, 5, 6, 7, 8, 9],
					[1, 2, 3, 4, 5, 6, 7, 8, 9],
					[1, 2, 3, 4, 5, 6, 7, 8, 9],
					[1, 2, 3, 4, 5, 6, 7, 8, 9]
				]
			],
			[
				[
					[1, 2, 3, 4, 5, 6, 7, 8, 9],
					[1, 2, 3, 4, 5, 6, 7, 8, 9],
					[1, 2, 3, 4, 5, 6, 7, 8, 9],
					[1, 2, 3, 4, 5, 6, 7, 8, 9],
					[1, 2, 3, 5, 6, 7, 8, 9],
					[1, 2, 3, 4, 5, 6, 7, 8, 9],
					[1, 2, 3, 4, 5, 6, 7, 8, 9],
					[1, 2, 3, 4, 5, 6, 7, 8, 9],
					[1, 2, 3, 4, 5, 6, 7, 8, 9],
				]
			],
		];
	}

	/**
	 * @return array
	 */
	public function invalidBoardContentProvider(): array
	{
		return [
			[
				[
					[1, 2, 0, 4, 5, 6, 7, 8, 9],
					[0, 2, 3, 4, 5, 6, 7, 8, 9],
					[1, 2, 3, 4, 5, 6, 7, 8, 9],
					[1, 2, 3, 4, 5, 6, 7, 8, 9],
					[1, 2, 3, 4, 5, 6, 7, 8, 9],
					[1, 2, 3, 4, 0, 6, 7, 8, 9],
					[0, 2, 3, 4, 5, 6, 7, 8, 9],
					[1, 2, 3, 4, 5, 6, 7, 8, 9],
					[1, 2, 0, 4, 5, 6, 7, 8, 9]
				]
			],
			[
				[
					[1, 1, 3, 4, 5, 6, 7, 8, 9],
					[1, 2, 3, 4, 5, 6, 7, 8, 9],
					[1, 2, 3, 4, 5, 6, 7, 8, 9],
					[1, 2, 3, 4, 5, 6, 7, 8, 9],
					[1, 2, 3, 4, 5, 6, 7, 8, 9],
					[1, 2, 3, 4, 5, 6, 7, 8, 9],
					[1, 2, 3, 4, 5, 6, 7, 8, 9],
					[1, 2, 3, 4, 5, 6, 7, 8, 9],
					[1, 2, 3, 4, 5, 6, 7, 8, 8],
				]
			],
			[
				[
					[1, 2, 3, 4, 5, 6, 7, 8, 9],
					[1, 2, 3, 4, 5, 6, 7, 8, 9],
					[1, 2, 3, 4, 5, 6, 7, 8, 9],
					[1, 2, 3, 4, 5, 6, 7, 8, 9],
					[1, 2, 3, 4, 5, 6, 7, 8, 9],
					[1, 2, 3, 4, 5, 6, 7, 8, 9],
					[1, 2, 3, 4, 5, 6, 7, 8, 9],
					[1, 2, 3, 4, 5, 6, 7, 8, 9],
					[1, 2, 3, 4, 5, 6, 7, 8, 9],
				]
			],
			[
				[
					[5, 3, 4, 6, 7, 8, 9, 1, 2],
					[6, 7, 2, 1, 9, 0, 3, 4, 8],
					[1, 0, 0, 3, 4, 2, 5, 6, 0],
					[8, 5, 9, 7, 6, 1, 0, 2, 0],
					[4, 2, 6, 8, 5, 3, 7, 9, 1],
					[7, 1, 3, 9, 2, 4, 8, 5, 6],
					[9, 0, 1, 5, 3, 7, 2, 1, 4],
					[2, 8, 7, 4, 1, 9, 6, 3, 5],
					[3, 0, 0, 4, 8, 1, 1, 7, 9]
				]
			]
		];
	}
}

