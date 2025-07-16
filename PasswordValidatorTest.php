<?php
use PHPUnit\Framework\TestCase;
require_once 'PasswordValidator.php';

class PasswordValidatorTest extends TestCase
{
    /**
     * @dataProvider passwordProvider
     */
    public function testPasswordValidation(string $password, bool $expected)
    {
        $validator = new PasswordValidator();
        $this->assertEquals($expected, $validator->isValid($password));
    }

    public static function passwordProvider(): array
    {
        return [
            ['Abc123!@', true],
            ['abc123!@', false],
            ['ABC123!@', false],
            ['Abcdefgh', false],
            ['Abc12345', false],
            ['12345678', false],
            ['Abc!@#$', false],
            ['A1!@', false],
        ];
    }
}
