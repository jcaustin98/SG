<?php
/*
*/
include_once('src/yearMostAlive.php');

assert_options(ASSERT_ACTIVE,   true);
assert_options(ASSERT_BAIL,     false);
assert_options(ASSERT_WARNING,  true);
//assert_options(ASSERT_CALLBACK, 'assert_message');

$max_age = new yearMostAlive();
class yearMostAliveTest {

    public function testStandardCase() {
        $data = [
            ['birth' => 1901, 'end' => 1931,],
            ['birth' => 1901, 'end' => 1931,],
            ['birth' => 1901, 'end' => 1932,],
            ['birth' => 1901,  'end' => 1933,],
            ['birth' => 1901, 'end' => 1931,],
            ['birth' => 1901, 'end' => 1931,],
            ['birth' => 1901, 'end' => 1932,],
            ['birth' => 1901,  'end' => 1933,],
        ];
        $expected = ['alive' => 4, 'year' => 31];
        $results = $this->test_object->getYearMostAlive($data);
        assert($expected === $results,'testStandardCase');
    }

    public function testUpperBound() {
        $data = [
            ['birth' => 1901, 'end' => 1999,],
            ['birth' => 1901, 'end' => 1999,],
            ['birth' => 1901, 'end' => 1932,],
            ['birth' => 1901,  'end' => 1933,],
            ['birth' => 1901, 'end' => 1999,],
            ['birth' => 1901, 'end' => 1999,],
            ['birth' => 1901, 'end' => 1932,],
            ['birth' => 1901,  'end' => 1933,],
        ];
        $expected = ['alive' => 4, 'year' => 99];
        $results = $this->test_object->getYearMostAlive($data);
        assert($expected === $results, 'testUpperBound');
    }

    public function testInvalidLowBirthYear() {
        $data = [

            ['birth' => 1901, 'end' => 1932,],
            ['birth' => 1890,  'end' => 1933,],
        ];
        $expected = [];
        $results = $this->test_object->getYearMostAlive($data);
        assert($expected === $results, 'testInvalidLowBirthYear');
    }
    public function testInvalidHighBirthYear() {
        $data = [

            ['birth' => 1901, 'end' => 1932,],
            ['birth' => 2000,  'end' => 1933,],
        ];
        $expected = [];
        $results = $this->test_object->getYearMostAlive($data);
        assert($expected === $results, 'testInvalidHighBirthYear');
    }

    public function testInvalidLowEndYear() {
        $data = [

            ['birth' => 1901, 'end' => 1932,],
            ['birth' => 1933,  'end' => 1900,],
        ];
        $expected = [];
        $results = $this->test_object->getYearMostAlive($data);
        assert($expected === $results, 'testInvalidLowEndYear');
    }

    public function testInvalidHighEndYear() {
        $data = [

            ['birth' => 1901, 'end' => 1932,],
            ['birth' => 1933,  'end' => 2001,],
        ];
        $expected = [];
        $results = $this->test_object->getYearMostAlive($data);
        assert($expected === $results, 'testInvalidHighEndYear');
    }

    public function testInvalidBirthHigherThanEndYear() {
        $data = [

            ['birth' => 1901, 'end' => 1932,],
            ['birth' => 1933,  'end' => 1932,],
        ];
        $expected = [];
        $results = $this->test_object->getYearMostAlive($data);
        assert($expected === $results, 'testInvalidBirthHigherThanEndYear');
    }

    public function test()
    {
        $methods = get_class_methods($this);

        forEach($methods as $method)
        {
            if($method != 'test' && $method != '__construct')
            {
                echo $method . "\n";
                $this->{$method}();

            }
        }
    }

    public function __construct($test_object){
        $this->test_object = $test_object;
    }
}

$test = new yearMostAliveTest($max_age);
$test->test();